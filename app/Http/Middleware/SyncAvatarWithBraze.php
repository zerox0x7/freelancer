<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class SyncAvatarWithBraze
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Check if this is a response from the avatar update route
        if ($request->is(config('chatify.routes.prefix') . '/updateSettings') && 
            $request->hasFile('avatar') &&
            $response->status() === 200) {
            
            try {
                // Get the user's avatar URL
                $user = Auth::user();
                $avatarUrl = asset('storage/' . config('chatify.user_avatar.folder') . '/' . $user->avatar);
                
                // Sync with Braze
                $this->syncWithBraze($user->id, $avatarUrl);
            } catch (\Exception $e) {
                \Log::error('Braze sync error: ' . $e->getMessage());
            }
        }
        
        return $response;
    }
    
    /**
     * Send user profile data to Braze
     */
    private function syncWithBraze($userId, $imageUrl)
    {
        $apiKey = config('services.braze.api_key');
        $endpoint = config('services.braze.endpoint');
        
        if (!$apiKey || !$endpoint) {
            return false; // Braze not configured
        }
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $apiKey
        ])->post($endpoint . '/users/track', [
            'attributes' => [
                [
                    'external_id' => (string) $userId,
                    'image_url' => $imageUrl
                ]
            ]
        ]);
        
        \Log::info('Braze sync response: ' . $response->status());
        
        return $response->successful();
    }
} 