<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        {{ __('Update Profile Picture') }}
                    </h3>
                    
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="flex items-center space-x-6 mb-4">
                        <div class="shrink-0">
                            <img class="h-16 w-16 object-cover rounded-full" 
                                 src="{{ asset('storage/' . config('chatify.user_avatar.folder') . '/' . Auth::user()->avatar) }}" 
                                 alt="{{ Auth::user()->name }}" />
                        </div>
                        <div>
                            <h4 class="text-md font-medium">{{ Auth::user()->name }}</h4>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <form id="avatar-form" method="post" action="{{ route('avatar.update') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <input type="file" name="avatar" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                   accept="image/*" />
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 5MB</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Update Image') }}
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">
                            Your profile image will be automatically synced with Braze when updated.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 