<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>إنشاء حساب جديد</title>
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
    </style>
  </head>
  <body>
    <div class="min-h-screen flex items-center justify-center px-4">
      <div class="max-w-md w-full bg-[#242c3d] rounded-lg p-8">
        <div class="text-center mb-8">
          <h2 class="text-2xl font-bold">إنشاء حساب جديد</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
          @csrf

          <!-- Name -->
          <div>
            <label for="name" class="block text-sm font-medium mb-2">الاسم</label>
            <input
              id="name"
              type="text"
              name="name"
              value="{{ old('name') }}"
              required
              autofocus
              autocomplete="name"
              class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none focus:ring-primary focus:ring-2"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium mb-2">البريد الإلكتروني</label>
            <input
              id="email"
              type="email"
              name="email"
              value="{{ old('email') }}"
              required
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
              autocomplete="new-password"
              class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none focus:ring-primary focus:ring-2"
              dir="ltr"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
          </div>

          <!-- Confirm Password -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium mb-2">تأكيد كلمة المرور</label>
            <input
              id="password_confirmation"
              type="password"
              name="password_confirmation"
              required
              autocomplete="new-password"
              class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none focus:ring-primary focus:ring-2"
              dir="ltr"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
          </div>

          <button
            type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-button font-medium"
          >
            إنشاء حساب
          </button>

          <div class="text-center mt-4">
            <p class="text-sm text-gray-400">
              لديك حساب بالفعل؟
              <a href="{{ route('login') }}" class="text-primary hover:underline">تسجيل الدخول</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
