<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لوحة التحكم</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">

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
      .progress-bar {
        height: 8px;
        background-color: #1a2234;
        border-radius: 4px;
        overflow: hidden;
      }
      .progress-bar-fill {
        height: 100%;
        background-color: #10b981;
        border-radius: 4px;
      }
    </style>
</head>
<body class="font-tajawal antialiased">

    @include('layouts.parts.header')
    
    <!-- Main Dashboard Content -->
    <div class="container mx-auto px-4 py-6">
        <!-- Welcome Alert -->
        <div class="bg-[#242c3d] rounded-lg p-4 mb-6 text-sm flex items-center justify-between">
            <div class="flex items-center">
                <span class="text-primary ml-2">في 5 ثواني...</span>
                <span>ربط حسابك بـ التزام/توفير لتسليم تسديدات فورية عند شراء خدماتك إذا كنت بائع و أتري إذا كنت مشتري.</span>
            </div>
            <div>
                <button class="text-gray-400 hover:text-white">
                    <i class="ri-settings-line"></i>
                </button>
            </div>
        </div>
        
        <!-- Dashboard Layout with Sidebar -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Right Sidebar -->
            <div class="w-full lg:w-1/4 space-y-6">
                <!-- User Profile Card -->
                <div class="bg-[#242c3d] rounded-lg p-6 text-center">
                    <div class="mx-auto w-24 h-24 mb-4 relative">
                        <img src="https://via.placeholder.com/150" alt="صورة المستخدم" class="w-full h-full rounded-full object-cover border-4 border-[#1a2234]">
                        <div class="absolute -bottom-1 right-0 bg-green-500 w-4 h-4 rounded-full border-2 border-[#242c3d]"></div>
                    </div>
                    
                    <h3 class="text-xl font-bold mb-1">Rami Zahir</h3>
                    <p class="text-green-500 text-sm mb-3">مبرمج تطوير المواقع و التطبيقات</p>
                    <p class="text-xs text-gray-400 mb-3">مشتري مستوى جديد</p>
                    
                    <div class="flex justify-center mb-4">
                        <div class="flex items-center">
                            <span class="text-xs text-gray-400 ml-1">0.0</span>
                            <div class="flex">
                                <i class="ri-star-fill text-primary"></i>
                                <i class="ri-star-fill text-primary"></i>
                                <i class="ri-star-fill text-primary"></i>
                                <i class="ri-star-fill text-primary"></i>
                                <i class="ri-star-fill text-primary"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <div class="inline-block bg-green-500 p-2 rounded-lg">
                            <i class="ri-trophy-line text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Control Panel -->
                <div class="bg-[#242c3d] rounded-lg p-4">
                    <h3 class="text-lg font-bold mb-4 text-center">لوحة التحكم</h3>
                    
                    <div class="grid grid-cols-3 gap-2">
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-settings-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">الإعدادات</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-wallet-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">الرصيد</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-home-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">الرئيسية</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-shopping-bag-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">مشترياتي</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-trophy-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">مسابقاتي</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-customer-service-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">خدماتي</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-message-2-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">الرسائل</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-image-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">المعرض</span>
                        </a>
                        
                        <a href="#" class="flex flex-col items-center bg-[#1a2234] hover:bg-[#2a3347] p-3 rounded-lg transition-colors">
                            <i class="ri-tools-line text-primary text-2xl mb-1"></i>
                            <span class="text-xs text-center">أدوات</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="w-full lg:w-3/4 space-y-6">
                <!-- Balance Section -->
                <div class="bg-[#242c3d] rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold">الرصيد</h2>
                            <div class="ml-2 text-primary">
                                <i class="ri-wallet-3-line"></i>
                            </div>
                        </div>
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-button text-sm">
                            شحن الرصيد
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-[#1a2234] rounded-lg p-6 text-center">
                            <h3 class="text-gray-400 mb-2 text-sm">مجموع الأرباح</h3>
                            <p class="text-4xl font-bold">$ 0.00</p>
                        </div>
                        <div class="bg-[#1a2234] rounded-lg p-6 text-center">
                            <h3 class="text-gray-400 mb-2 text-sm">إجمالي الرصيد</h3>
                            <p class="text-4xl font-bold">$ 0.00</p>
                        </div>
                        <div class="bg-[#1a2234] rounded-lg p-6 text-center">
                            <h3 class="text-gray-400 mb-2 text-sm">الرصيد القابل للسحب</h3>
                            <p class="text-4xl font-bold">$ 0.00</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-4 text-sm text-gray-400">
                        <div>مبالغ للشراء: 0$</div>
                        <div>معلق: 0$</div>
                    </div>
                </div>
                
                <!-- Stats Boxes -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Purchases Box -->
                    <div class="bg-[#242c3d] rounded-lg p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <h3 class="font-bold">مشترياتي</h3>
                                <div class="text-primary ml-2">
                                    <i class="ri-shopping-cart-line"></i>
                                </div>
                            </div>
                            <div class="text-green-500">(0)</div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>بإنتظار موافقة البائع</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>قيد التنفيذ</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>مكتمل</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>تم الإلغاء</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sales Box -->
                    <div class="bg-[#242c3d] rounded-lg p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <h3 class="font-bold">المبيعات</h3>
                                <div class="text-primary ml-2">
                                    <i class="ri-store-line"></i>
                                </div>
                            </div>
                            <div class="text-green-500">(0)</div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>طلبات جديدة</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>قيد التنفيذ</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>مكتمل</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>تم الإلغاء</span>
                                    <span class="text-gray-400">0.0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Services Box -->
                    <div class="bg-[#242c3d] rounded-lg p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <h3 class="font-bold">خدماتي</h3>
                                <div class="text-primary ml-2">
                                    <i class="ri-customer-service-line"></i>
                                </div>
                            </div>
                            <div class="text-green-500">(0)</div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>بإنتظار موافقة الإدارة</span>
                                    <span class="text-gray-400">0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>يحتاج إلى تعديلات</span>
                                    <span class="text-gray-400">0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>منشور</span>
                                    <span class="text-gray-400">0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span>مرفوض</span>
                                    <span class="text-gray-400">0%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-button text-sm w-full flex items-center justify-center">
                                <i class="ri-add-line mr-2"></i>
                                <span>أضف</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userProfileBtn = document.getElementById("userProfileBtn");
            const userDropdown = document.getElementById("userDropdown");
            
            if (userProfileBtn && userDropdown) {
                function toggleUserDropdown(event) {
                    event.stopPropagation();
                    userDropdown.classList.toggle("hidden");
                }
                
                userProfileBtn.addEventListener("click", toggleUserDropdown);
                
                document.addEventListener("click", function (event) {
                    if (!userDropdown.contains(event.target) && !userProfileBtn.contains(event.target)) {
                        userDropdown.classList.add("hidden");
                    }
                });
            }
        });
    </script>
</body>
</html>
