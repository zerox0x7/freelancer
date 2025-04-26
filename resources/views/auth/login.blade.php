<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#E7C973", secondary: "" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
      rel="stylesheet"
    />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap');
      body {
      font-family: 'Tajawal', sans-serif;
      background-color: #1a2234;
      color: #f8fafc;
      }
      input:focus, button:focus {
      outline: none;
      }
      .logo {
      font-family: 'Pacifico', cursive;
      }
      .nav-item.active {
      color: #E7C973;
      border-bottom: 2px solid #E7C973;
      }
      .nav-item {
      position: relative;
      }
      .notification-badge {
      position: absolute;
      top: -8px;
      left: -8px;
      background-color: #ef4444;
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      }
    </style>
  </head>
  <body>
    <!-- Header Navigation -->
    <header class="bg-[#1e2538] border-b border-gray-700">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
          <!-- Logo -->
          <div class="flex items-center">
            <a href="/" class="logo text-primary text-2xl">logo</a>
          </div>
          <!-- Main Navigation -->
          <nav class="hidden md:flex space-x-0 gap-6">
            <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
              البريد
              <span class="notification-badge">1</span>
            </a>
            <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
              المراسلات
              <span class="notification-badge">2</span>
            </a>
            <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
              المسابقات
              <span class="notification-badge">1</span>
            </a>
            <a href="#" class="nav-item active px-3 py-2 text-sm font-medium relative">
              الخدمات
              <span class="notification-badge">5</span>
            </a>
          </nav>
          <!-- Right Side Icons -->
          <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div class="relative">
              <input
                type="text"
                placeholder="ابحث عن ..."
                class="bg-[#242c3d] text-gray-300 text-sm rounded-md px-10 py-2 w-64 border-none"
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
            <!-- Login button only for guests -->
            <div class="flex items-center space-x-2">
              <a href="{{ route('login') }}" class="bg-transparent border border-primary text-primary hover:bg-primary hover:text-[#1a2234] px-4 py-2 rounded-button text-sm transition-colors duration-200">
                تسجيل الدخول
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-4 py-12">
      <div class="max-w-md w-full bg-[#242c3d] rounded-lg p-8">
        <div class="text-center mb-8">
          <h2 class="text-2xl font-bold">تسجيل الدخول</h2>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
          @csrf

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium mb-2">البريد الإلكتروني</label>
            <input
              id="email"
              type="email"
              name="email"
              value="{{ old('email') }}"
              required
              autofocus
              autocomplete="username"
              class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none focus:ring-primary focus:ring-2"
              dir="ltr"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium mb-2">كلمة المرور</label>
            <input
              id="password"
              type="password"
              name="password"
              required
              autocomplete="current-password"
              class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none focus:ring-primary focus:ring-2"
              dir="ltr"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
          </div>

          <div class="flex items-center">
            <input 
              id="remember_me" 
              type="checkbox" 
              name="remember" 
              class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" 
            />
            <label for="remember_me" class="mr-2 block text-sm">تذكرني</label>
          </div>

          <button
            type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-button font-medium"
          >
            تسجيل الدخول
          </button>

          <div class="text-center mt-4">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-sm text-gray-400 hover:text-gray-300 inline-block">
                نسيت كلمة المرور؟
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
