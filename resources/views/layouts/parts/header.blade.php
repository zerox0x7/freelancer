<header class="bg-[#1e2538] border-b border-gray-700">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
          <!-- Logo -->
          <div class="flex items-center">
            <a href="#" class="logo text-primary text-2xl">
                <img src="{{ asset('images/main-logo.png') }}" alt="logo" class="w-40 h-40">
            </a>
          </div>
          <!-- Main Navigation -->
          <nav class="hidden md:flex space-x-0 gap-6">
            <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
              البريد
              <!-- <span class="notification-badge">1</span> -->
            </a>
            <a href="{{ route('chatify') }}" class="nav-item px-3 py-2 text-sm font-medium relative">
              المراسلات
              <!-- <span class="notification-badge">2</span> -->
            </a>
            <a href="{{ route('projects') }}" class="nav-item px-3 py-2 text-sm font-medium relative">
              المشاريع
              <!-- <span class="notification-badge">1</span> -->
            </a>
            <a href="#" class="nav-item active px-3 py-2 text-sm font-medium relative">
              الخدمات
              <!-- <span class="notification-badge">5</span> -->
            </a>
          </nav>
          <!-- Right Side Icons -->
          <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative">
              <input
                type="text"
                placeholder="ابحث عن ..."
                class="bg-[#242c3d] text-gray-300 text-sm rounded-md  px-10 py-2 w-64 border-none"
                style="margin-left: 30px;"
              />
              <div
                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"
              >
                <div
                  class="w-5 h-5 flex items-center justify-center text-gray-400"
                >
                  <i class="ri-search-line"></i>
                </div>
              </div>
            </div>
            
            @auth
            <!-- User Menu for logged in users -->
            <div class="flex items-center space-x-4">
              <button
                class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-primary"
              >
                <i class="ri-mail-line"></i>
              </button>
              <button
                class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-primary"
              >
                <i class="ri-notification-3-line"></i>
              </button>
              <button
                class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-primary"
              >
                <i class="ri-moon-line"></i>
              </button>
              <button
                class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-primary"
              >
                <i class="ri-global-line"></i>
              </button>
              <div class="relative">
                <button
                  id="userProfileBtn"
                  class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-[#1a2234] overflow-hidden"
                >
                  @if(Auth::check() && Auth::user()->avatar)
                    <img src="{{ asset('storage/' . config('chatify.user_avatar.folder') . '/' . Auth::user()->avatar) }}" 
                         alt="{{ Auth::user()->name }}" 
                         class="w-full h-full object-cover">
                  @else
                    {{ Auth::check() ? substr(Auth::user()->name, 0, 2) : '' }}
                  @endif
                </button>
                <div
                  id="userDropdown"
                  class="absolute left-0 mt-2 w-48 bg-[#242c3d] rounded-lg shadow-lg py-2 hidden z-50"
                >
                  <a
                    href="{{ route('profile.avatar') }}"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2 overflow-hidden rounded-full">
                      @if(Auth::check() && Auth::user()->avatar)
                        <img src="{{ asset('storage/' . config('chatify.user_avatar.folder') . '/' . Auth::user()->avatar) }}" 
                             alt="{{ Auth::user()->name }}" 
                             class="w-full h-full object-cover">
                      @else
                        {{ Auth::check() ? substr(Auth::user()->name, 0, 2) : '' }}
                      @endif
                    </div>
                    <span>الملف الشخصي</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2">
                      <i class="ri-settings-line"></i>
                    </div>
                    <span>إعدادات الحساب</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2">
                      <i class="ri-folder-line"></i>
                    </div>
                    <span>مشاريعي</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2">
                      <i class="ri-file-list-line"></i>
                    </div>
                    <span>عروضي</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2">
                      <i class="ri-wallet-line"></i>
                    </div>
                    <span>المدفوعات</span>
                  </a>
                  <a
                    href="#"
                    class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                  >
                    <div class="w-5 h-5 flex items-center justify-center ml-2">
                      <i class="ri-heart-line"></i>
                    </div>
                    <span>المفضلة</span>
                  </a>
                  <div class="border-t border-gray-700 my-2"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                      type="submit"
                      class="flex items-center px-4 py-2 text-sm text-red-500 hover:bg-[#2a3347] w-full text-right"
                    >
                      <div class="w-5 h-5 flex items-center justify-center ml-2">
                        <i class="ri-logout-box-line"></i>
                      </div>
                      <span>تسجيل الخروج</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            @else
            <!-- Login button only for guests -->
            <div class="flex items-center space-x-2">
              <a href="{{ route('login') }}" class="bg-transparent border border-primary text-primary hover:bg-primary hover:text-[#1a2234] px-4 py-2 rounded-button text-sm transition-colors duration-200">
                تسجيل الدخول
              </a>
            </div>
            @endauth
          </div>
        </div>
      </div>
    </header>