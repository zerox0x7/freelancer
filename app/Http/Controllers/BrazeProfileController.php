<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class BrazeProfileController extends Controller
{
    /**
     * Update profile image and sync with Braze
     */
    public function update(Request $request)
    {
        // Let Chatify handle the image upload via its route
        // We'll intercept the response to sync with Braze
        $avatarUrl = asset('storage/' . config('chatify.user_avatar.folder') . '/' . Auth::user()->avatar);
        
        // Send to Braze API
        $this->syncWithBraze(Auth::user()->id, $avatarUrl);
        
        // Return a view or redirect as needed
        return back()->with('success', 'Profile image updated and synced with Braze');
    }
    
    /**
     * Send user profile data to Braze
     */
    private function syncWithBraze($userId, $imageUrl)
    {
        try {
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
            
            return $response->successful();
        } catch (\Exception $e) {
            \Log::error('Failed to sync image with Braze: ' . $e->getMessage());
            return false;
        }
    }
} 