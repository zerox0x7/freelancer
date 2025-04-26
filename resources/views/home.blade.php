<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>منصة المشاريع المستقلة</title>
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
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
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
      .project-card {
      background-color: #242c3d;
      transition: all 0.3s ease;
      }
      .project-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
      }
      .status-badge {
      background-color: #22c55e;
      color: white;
      font-size: 12px;
      padding: 2px 8px;
      border-radius: 4px;
      }
    </style>
  </head>
  <body>
    <!-- Header Navigation -->

    @include('layouts.parts.header');
  
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
      <!-- Project Controls -->
      <div
        class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4"
      >
        <div class="flex items-center">
          <h1 class="text-xl font-bold ml-2">المشاريع</h1>
          <div class="w-6 h-6 flex items-center justify-center text-gray-400">
            <i class="ri-folder-line"></i>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <button
            id="addProjectBtn"
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-button flex items-center whitespace-nowrap"
          >
            <span class="ml-2">أضف مشروع</span>
            <div class="w-5 h-5 flex items-center justify-center">
              <i class="ri-add-line"></i>
            </div>
          </button>
        </div>
        <div
          id="projectModal"
          class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50"
        >
          <div class="bg-[#242c3d] rounded-lg p-6 w-full max-w-lg mx-4">
            <div class="flex justify-between items-center mb-6">
              <h3 class="text-xl font-bold">إضافة مشروع جديد</h3>
              <button id="closeModal" class="text-gray-400 hover:text-white">
                <div class="w-6 h-6 flex items-center justify-center">
                  <i class="ri-close-line"></i>
                </div>
              </button>
            </div>
            <form id="projectForm" class="space-y-4">
              <div>
                <label class="block text-sm font-medium mb-2"
                  >عنوان المشروع</label
                >
                <input
                  type="text"
                  class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none"
                  placeholder="أدخل عنوان المشروع"
                />
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">الميزانية</label>
                <div class="flex gap-4">
                  <input
                    type="number"
                    class="w-1/2 bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none"
                    placeholder="الحد الأدنى"
                  />
                  <input
                    type="number"
                    class="w-1/2 bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none"
                    placeholder="الحد الأقصى"
                  />
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium mb-2"
                  >وصف المشروع</label
                >
                <textarea
                  class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none h-32"
                  placeholder="اكتب وصفاً تفصيلياً للمشروع"
                ></textarea>
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">القسم</label>
                <div class="relative">
                  <select
                    class="w-full bg-[#1a2234] text-gray-300 rounded-md px-4 py-2 border-none appearance-none pr-8"
                  >
                    <option value="">اختر القسم</option>
                    <option value="1">برمجة وتطوير</option>
                    <option value="2">تصميم</option>
                    <option value="3">تسويق</option>
                    <option value="4">كتابة وترجمة</option>
                  </select>
                  <div
                    class="absolute left-2 top-1/2 -translate-y-1/2 pointer-events-none"
                  >
                    <div
                      class="w-4 h-4 flex items-center justify-center text-gray-400"
                    >
                      <i class="ri-arrow-down-s-line"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-end gap-4 mt-6">
                <button
                  type="button"
                  id="cancelBtn"
                  class="px-4 py-2 text-gray-300 hover:text-white rounded-button"
                >
                  إلغاء
                </button>
                <button
                  type="submit"
                  id="submitProjectBtn"
                  class="bg-primary hover:bg-primary/90 text-[#1a2234] px-6 py-2 rounded-button flex items-center"
                >
                  <span>نشر المشروع</span>
                  <div
                    class="w-5 h-5 flex items-center justify-center mr-2 hidden"
                    id="submitSpinner"
                  >
                    <i class="ri-loader-4-line animate-spin"></i>
                  </div>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Filters and Search -->
      <div
        class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4"
      >
        <div class="relative w-full md:w-64">
          <input
            type="text"
            placeholder="البحث عن"
            class="w-full bg-[#242c3d] text-gray-300 text-sm rounded-md px-10 py-2 border-none"
          />
          <div
            class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"
          >
            <div class="w-5 h-5 flex items-center justify-center text-gray-400">
              <i class="ri-search-line"></i>
            </div>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <div
            class="flex items-center bg-[#242c3d] rounded-md overflow-hidden"
          >
            <button
              id="advancedSearchBtn"
              class="px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347]"
            >
              البحث
            </button>
            <button class="px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347]">
              الكل
            </button>
            <button class="px-4 py-2 text-sm bg-primary text-[#1a2234]">
              مفتوح
            </button>
          </div>
        </div>
        <div
          id="advancedSearchPanel"
          class="hidden w-full bg-[#242c3d] mt-4 p-4 rounded-lg"
        >
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label class="block text-sm text-gray-300 mb-2">نطاق السعر</label>
              <div class="flex items-center gap-2">
                <input
                  type="number"
                  placeholder="من"
                  class="w-full bg-[#1a2234] text-gray-300 text-sm rounded-md px-3 py-2 border-none"
                />
                <span class="text-gray-400">-</span>
                <input
                  type="number"
                  placeholder="إلى"
                  class="w-full bg-[#1a2234] text-gray-300 text-sm rounded-md px-3 py-2 border-none"
                />
              </div>
            </div>
            <div>
              <label class="block text-sm text-gray-300 mb-2"
                >تاريخ النشر</label
              >
              <select
                class="w-full bg-[#1a2234] text-gray-300 text-sm rounded-md px-3 py-2 border-none appearance-none pr-8 relative"
              >
                <option value="">جميع التواريخ</option>
                <option value="today">اليوم</option>
                <option value="week">آخر أسبوع</option>
                <option value="month">آخر شهر</option>
              </select>
            </div>
            <div>
              <label class="block text-sm text-gray-300 mb-2">ترتيب حسب</label>
              <select
                class="w-full bg-[#1a2234] text-gray-300 text-sm rounded-md px-3 py-2 border-none appearance-none pr-8 relative"
              >
                <option value="newest">الأحدث</option>
                <option value="oldest">الأقدم</option>
                <option value="budget_high">الميزانية: من الأعلى</option>
                <option value="budget_low">الميزانية: من الأقل</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Area -->
      <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar -->
        <div class="w-full md:w-72 space-y-6">
          <!-- Categories Section -->
          <div class="bg-[#242c3d] rounded-lg p-4">
            <div class="flex items-center justify-between mb-4">
              <h2 class="font-bold text-lg">الأقسام</h2>
              <button
                class="w-6 h-6 flex items-center justify-center text-gray-400"
              >
                <i class="ri-arrow-up-s-line"></i>
              </button>
            </div>
            <ul class="space-y-3">
              @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $category)
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="{{ $category->icon ?? 'ri-folder-line' }}"></i>
                    </div>
                    <span class="text-sm">{{ $category->name }}</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">{{ $category->count ?? 0 }}</span>
                </li>
                @endforeach
              @else
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="ri-briefcase-line"></i>
                    </div>
                    <span class="text-sm">أعمال وخدمات استشارية وإدارية</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">9</span>
                </li>
                <!-- Keep other hardcoded categories -->
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="ri-code-s-slash-line"></i>
                    </div>
                    <span class="text-sm">برمجة وتطوير المواقع والتطبيقات</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">63</span>
                </li>
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="ri-movie-line"></i>
                    </div>
                    <span class="text-sm">تصميم فيديو وصوتيات</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">35</span>
                </li>
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="ri-megaphone-line"></i>
                    </div>
                    <span class="text-sm">التسويق والمبيعات</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">19</span>
                </li>
                <li class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                      <i class="ri-file-text-line"></i>
                    </div>
                    <span class="text-sm">كتابة صناعة محتوى، ترجمة ولغات</span>
                  </div>
                  <span class="bg-[#1a2234] text-xs px-2 py-1 rounded-full">29</span>
                </li>
              @endif
            </ul>
          </div>
          <!-- Skills Section -->
          <div class="bg-[#242c3d] rounded-lg p-4">
            <div class="flex items-center justify-between mb-4">
              <h2 class="font-bold text-lg">المهارات</h2>
              <div class="flex items-center gap-2">
                <button
                  id="clearSkills"
                  class="text-xs text-gray-400 hover:text-primary hidden whitespace-nowrap !rounded-button px-2 py-1"
                >
                  مسح الكل
                </button>
                <button
                  class="w-6 h-6 flex items-center justify-center text-gray-400"
                >
                  <i class="ri-arrow-up-s-line"></i>
                </button>
              </div>
            </div>
            <ul class="space-y-3">
              <li class="flex items-center justify-between group">
                <input type="checkbox" id="skill1" class="hidden" />
                <label for="skill1" class="flex items-center cursor-pointer">
                  <span
                    class="w-5 h-5 border border-gray-500 rounded flex items-center justify-center mr-2"
                  >
                    <i class="ri-check-line text-primary hidden"></i>
                  </span>
                  <span class="text-sm">تصميم مواقع</span>
                </label>
                <button
                  class="remove-skill opacity-0 group-hover:opacity-100 transition-opacity duration-200 w-6 h-6 flex items-center justify-center text-gray-400 hover:text-primary"
                >
                  <i class="ri-close-line"></i>
                </button>
              </li>
              <li class="flex items-center justify-between group">
                <input type="checkbox" id="skill2" class="hidden" />
                <label for="skill2" class="flex items-center cursor-pointer">
                  <span
                    class="w-5 h-5 border border-gray-500 rounded flex items-center justify-center mr-2"
                  >
                    <i class="ri-check-line text-primary hidden"></i>
                  </span>
                  <span class="text-sm">برمجة PHP</span>
                </label>
                <button
                  class="remove-skill opacity-0 group-hover:opacity-100 transition-opacity duration-200 w-6 h-6 flex items-center justify-center text-gray-400 hover:text-primary"
                >
                  <i class="ri-close-line"></i>
                </button>
              </li>
              <li class="flex items-center justify-between group">
                <input type="checkbox" id="skill3" class="hidden" />
                <label for="skill3" class="flex items-center cursor-pointer">
                  <span
                    class="w-5 h-5 border border-gray-500 rounded flex items-center justify-center mr-2"
                  >
                    <i class="ri-check-line text-primary hidden"></i>
                  </span>
                  <span class="text-sm">تسويق إلكتروني</span>
                </label>
                <button
                  class="remove-skill opacity-0 group-hover:opacity-100 transition-opacity duration-200 w-6 h-6 flex items-center justify-center text-gray-400 hover:text-primary"
                >
                  <i class="ri-close-line"></i>
                </button>
              </li>
              <li class="flex items-center justify-between group">
                <input type="checkbox" id="skill4" class="hidden" />
                <label for="skill4" class="flex items-center cursor-pointer">
                  <span
                    class="w-5 h-5 border border-gray-500 rounded flex items-center justify-center mr-2"
                  >
                    <i class="ri-check-line text-primary hidden"></i>
                  </span>
                  <span class="text-sm">تطوير تطبيقات</span>
                </label>
                <button
                  class="remove-skill opacity-0 group-hover:opacity-100 transition-opacity duration-200 w-6 h-6 flex items-center justify-center text-gray-400 hover:text-primary"
                >
                  <i class="ri-close-line"></i>
                </button>
              </li>
              <li class="flex items-center justify-between group">
                <input type="checkbox" id="skill5" class="hidden" />
                <label for="skill5" class="flex items-center cursor-pointer">
                  <span
                    class="w-5 h-5 border border-gray-500 rounded flex items-center justify-center mr-2"
                  >
                    <i class="ri-check-line text-primary hidden"></i>
                  </span>
                  <span class="text-sm">كتابة محتوى</span>
                </label>
                <button
                  class="remove-skill opacity-0 group-hover:opacity-100 transition-opacity duration-200 w-6 h-6 flex items-center justify-center text-gray-400 hover:text-primary"
                >
                  <i class="ri-close-line"></i>
                </button>
              </li>
            </ul>
          </div>
        </div>
        <!-- Projects List -->
        <div class="flex-1 space-y-4">
          <!-- Project 1 -->
          <div class="project-card rounded-lg p-4">
            <div class="flex flex-col md:flex-row justify-between">
              <div class="flex items-start">
                <img
                  src="https://readdy.ai/api/search-image?query=professional%20middle%20eastern%20man%20with%20glasses%2C%20business%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=80&height=80&seq=1&orientation=squarish"
                  alt="صورة المستخدم"
                  class="w-12 h-12 rounded-full object-cover ml-4"
                />
                <div>
                  <h3 class="font-bold text-lg mb-1">مصممين SVG</h3>
                  <div class="flex items-center text-sm text-gray-400 mb-2">
                    <span class="ml-4">Nasr Tarawa</span>
                    <div class="flex items-center ml-4">
                      <span class="ml-1">منذ 8 ساعات</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-time-line"></i>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <span>0 عروض</span>
                      <div
                        class="w-4 h-4 flex items-center justify-center ml-1"
                      >
                        <i class="ri-file-list-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center mt-2 md:mt-0">
                <span class="status-badge ml-2">مفتوح</span>
                <span class="text-gray-300 text-sm">$50 - $100</span>
              </div>
            </div>
          </div>
          <!-- Project 2 -->
          <div class="project-card rounded-lg p-4">
            <div class="flex flex-col md:flex-row justify-between">
              <div class="flex items-start">
                <img
                  src="https://readdy.ai/api/search-image?query=young%20middle%20eastern%20professional%20man%2C%20casual%20business%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=80&height=80&seq=2&orientation=squarish"
                  alt="صورة المستخدم"
                  class="w-12 h-12 rounded-full object-cover ml-4"
                />
                <div>
                  <h3 class="font-bold text-lg mb-1">
                    تطوير نشاطي التجاري باسم مختلف وموقع مختلف
                  </h3>
                  <div class="flex items-center text-sm text-gray-400 mb-2">
                    <span class="ml-4">جدة جدا</span>
                    <div class="flex items-center ml-4">
                      <span class="ml-1">منذ 11 يوم</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-time-line"></i>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <span>2 عروض</span>
                      <div
                        class="w-4 h-4 flex items-center justify-center ml-1"
                      >
                        <i class="ri-file-list-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center mt-2 md:mt-0">
                <span class="status-badge ml-2">مفتوح</span>
                <span class="text-gray-300 text-sm">$25 - $50</span>
              </div>
            </div>
          </div>
          <!-- Project 3 -->
          <div class="project-card rounded-lg p-4">
            <div class="flex flex-col md:flex-row justify-between">
              <div class="flex items-start">
                <img
                  src="https://readdy.ai/api/search-image?query=middle%20eastern%20man%20in%20his%2030s%2C%20professional%20business%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=80&height=80&seq=3&orientation=squarish"
                  alt="صورة المستخدم"
                  class="w-12 h-12 rounded-full object-cover ml-4"
                />
                <div>
                  <h3 class="font-bold text-lg mb-1">
                    توثيق إثبات صحة نشاط تجاري جوجل ادز
                  </h3>
                  <div class="flex items-center text-sm text-gray-400 mb-2">
                    <span class="ml-4">Ahmed Ali</span>
                    <div class="flex items-center ml-4">
                      <span class="ml-1">منذ يوم واحد</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-time-line"></i>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <span>7 عروض</span>
                      <div
                        class="w-4 h-4 flex items-center justify-center ml-1"
                      >
                        <i class="ri-file-list-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center mt-2 md:mt-0">
                <span class="status-badge ml-2">مفتوح</span>
                <span class="text-gray-300 text-sm">$50 - $100</span>
              </div>
            </div>
          </div>
          <!-- Project 4 -->
          <div class="project-card rounded-lg p-4">
            <div class="flex flex-col md:flex-row justify-between">
              <div class="flex items-start">
                <img
                  src="https://readdy.ai/api/search-image?query=middle%20eastern%20woman%20with%20hijab%2C%20professional%20business%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=80&height=80&seq=4&orientation=squarish"
                  alt="صورة المستخدم"
                  class="w-12 h-12 rounded-full object-cover ml-4"
                />
                <div>
                  <h3 class="font-bold text-lg mb-1">
                    مدونة تقنية في مجال الجوالف مقبول في جوجل ادسنس
                  </h3>
                  <div class="flex items-center text-sm text-gray-400 mb-2">
                    <span class="ml-4">Maya Khalid</span>
                    <div class="flex items-center ml-4">
                      <span class="ml-1">منذ يومين</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-time-line"></i>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <span>4 عروض</span>
                      <div
                        class="w-4 h-4 flex items-center justify-center ml-1"
                      >
                        <i class="ri-file-list-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center mt-2 md:mt-0">
                <span class="status-badge ml-2">مفتوح</span>
                <span class="text-gray-300 text-sm">$100 - $250</span>
              </div>
            </div>
          </div>
          <!-- Project 5 -->
          <div class="project-card rounded-lg p-4">
            <div class="flex flex-col md:flex-row justify-between">
              <div class="flex items-start">
                <img
                  src="https://readdy.ai/api/search-image?query=middle%20eastern%20man%20in%20his%2040s%2C%20professional%20business%20attire%2C%20neutral%20background%2C%20professional%20headshot&width=80&height=80&seq=5&orientation=squarish"
                  alt="صورة المستخدم"
                  class="w-12 h-12 rounded-full object-cover ml-4"
                />
                <div>
                  <h3 class="font-bold text-lg mb-1">خدمات البرامج مترجمة</h3>
                  <div class="flex items-center text-sm text-gray-400 mb-2">
                    <span class="ml-4">Mostafa Mahmood</span>
                    <div class="flex items-center ml-4">
                      <span class="ml-1">منذ يومين</span>
                      <div class="w-4 h-4 flex items-center justify-center">
                        <i class="ri-time-line"></i>
                      </div>
                    </div>
                    <div class="flex items-center">
                      <span>3 عروض</span>
                      <div
                        class="w-4 h-4 flex items-center justify-center ml-1"
                      >
                        <i class="ri-file-list-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex items-center mt-2 md:mt-0">
                <span class="status-badge ml-2">مفتوح</span>
                <span class="text-gray-300 text-sm">$25 - $50</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("projectModal");
        const addProjectBtn = document.getElementById("addProjectBtn");
        const clearSkillsBtn = document.getElementById("clearSkills");
        const advancedSearchBtn = document.getElementById("advancedSearchBtn");
        const removeSkillBtns = document.querySelectorAll(".remove-skill");

        removeSkillBtns.forEach((btn) => {
          btn.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            const skillItem = this.closest("li");
            const checkbox = skillItem.querySelector('input[type="checkbox"]');
            const skillName = skillItem.querySelector(
              "label span:last-child",
            ).textContent;

            if (checkbox.checked) {
              checkbox.checked = false;
              const checkIcon = skillItem.querySelector(".ri-check-line");
              checkIcon.classList.add("hidden");
              activeFilters.delete(skillName);
              updateFilters();

              const notification = document.createElement("div");
              notification.className =
                "fixed top-4 right-4 bg-[#242c3d] text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center transform translate-y-[-20px] opacity-0 transition-all duration-300";
              notification.innerHTML = `
              <div class="w-5 h-5 flex items-center justify-center ml-2 text-primary">
                <i class="ri-filter-off-line"></i>
              </div>
              <span>تم إلغاء تصفية: ${skillName}</span>
            `;
              document.body.appendChild(notification);

              setTimeout(() => {
                notification.style.transform = "translateY(0)";
                notification.style.opacity = "1";
              }, 100);

              setTimeout(() => {
                notification.style.transform = "translateY(-20px)";
                notification.style.opacity = "0";
                setTimeout(() => notification.remove(), 300);
              }, 3000);
            }
          });
        });
        const advancedSearchPanel = document.getElementById("advancedSearchPanel");
        advancedSearchBtn.addEventListener("click", function () {
          this.classList.toggle("bg-primary");
          this.classList.toggle("text-[#1a2234]");
          this.classList.toggle("text-gray-300");
          advancedSearchPanel.classList.toggle("hidden");
        });
        const userProfileBtn = document.getElementById("userProfileBtn");
        const userDropdown = document.getElementById("userDropdown");
        const projectsList = document.querySelector(".flex-1.space-y-4");
        let activeFilters = new Set();
        function createFilterBadge(skillName) {
          const badge = document.createElement("div");
          badge.className =
            "inline-flex items-center bg-primary/10 text-primary px-3 py-1 rounded-full text-sm mb-4";
          badge.innerHTML = `
      <span class="ml-2">${skillName}</span>
      <button class="w-4 h-4 flex items-center justify-center hover:text-primary/80" onclick="this.parentElement.remove(); updateFilters();">
      <i class="ri-close-line"></i>
      </button>
      `;
          return badge;
        }
        function updateFilters() {
          let filterContainer = document.getElementById("activeFilters");
          const clearSkillsBtn = document.getElementById("clearSkills");
          if (activeFilters.size > 0) {
            clearSkillsBtn.classList.remove("hidden");
          } else {
            clearSkillsBtn.classList.add("hidden");
          }
          if (!filterContainer) {
            filterContainer = document.createElement("div");
            filterContainer.id = "activeFilters";
            filterContainer.className = "mb-4 flex flex-wrap gap-2";
            projectsList.insertBefore(filterContainer, projectsList.firstChild);
          }
          filterContainer.innerHTML = "";
          activeFilters.forEach((filter) => {
            const badge = createFilterBadge(filter);
            filterContainer.appendChild(badge);
          });
          const projects = document.querySelectorAll(".project-card");
          projects.forEach((project) => {
            if (activeFilters.size === 0) {
              project.style.display = "block";
            } else {
              const projectTitle = project
                .querySelector("h3")
                .textContent.toLowerCase();
              const projectDescription = project
                .querySelector("h3")
                .textContent.toLowerCase();
              const shouldShow = Array.from(activeFilters).some((filter) => {
                if (filter === "تطوير تطبيقات") {
                  return (
                    projectTitle.includes("تطبيق") ||
                    projectTitle.includes("app") ||
                    projectDescription.includes("تطبيق") ||
                    projectDescription.includes("app") ||
                    projectTitle.includes("mobile") ||
                    projectDescription.includes("mobile")
                  );
                }
                return projectTitle.includes(filter.toLowerCase());
              });
              project.style.display = shouldShow ? "block" : "none";
            }
          });
          if (activeFilters.size === 0 && filterContainer) {
            filterContainer.remove();
          }
          const noResultsMsg = document.getElementById("noResultsMsg");
          if (noResultsMsg) {
            noResultsMsg.remove();
          }
          const visibleProjects = document.querySelectorAll(
            '.project-card[style="display: block"]',
          );
          if (visibleProjects.length === 0 && activeFilters.size > 0) {
            const noResults = document.createElement("div");
            noResults.id = "noResultsMsg";
            noResults.className = "text-center py-8 text-gray-400";
            noResults.innerHTML = `
      <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center text-3xl opacity-50">
      <i class="ri-inbox-line"></i>
      </div>
      <p>لا توجد مشاريع متاحة تطابق معايير البحث</p>
      `;
            projectsList.appendChild(noResults);
          }
        }
        function toggleUserDropdown(event) {
          event.stopPropagation();
          userDropdown.classList.toggle("hidden");
        }
        userProfileBtn.addEventListener("click", toggleUserDropdown);
        document.addEventListener("click", function (event) {
          if (
            !userDropdown.contains(event.target) &&
            !userProfileBtn.contains(event.target)
          ) {
            userDropdown.classList.add("hidden");
          }
        });
        const closeModal = document.getElementById("closeModal");
        const cancelBtn = document.getElementById("cancelBtn");
        const projectForm = document.getElementById("projectForm");
        function toggleModal() {
          modal.classList.toggle("hidden");
          modal.classList.toggle("flex");
        }
        addProjectBtn.addEventListener("click", toggleModal);
        closeModal.addEventListener("click", toggleModal);
        cancelBtn.addEventListener("click", toggleModal);
        modal.addEventListener("click", function (e) {
          if (e.target === modal) {
            toggleModal();
          }
        });
        projectForm.addEventListener("submit", async function (e) {
          e.preventDefault();
          const submitBtn = document.getElementById("submitProjectBtn");
          const submitSpinner = document.getElementById("submitSpinner");
          const submitText = submitBtn.querySelector("span");
          const title = document.querySelector(
            '#projectForm input[type="text"]',
          ).value;
          const minBudget = document.querySelector(
            '#projectForm input[type="number"]:first-of-type',
          ).value;
          const maxBudget = document.querySelector(
            '#projectForm input[type="number"]:last-of-type',
          ).value;
          const description = document.querySelector("#projectForm textarea").value;
          const category = document.querySelector("#projectForm select").value;
          if (!title || !minBudget || !maxBudget || !description || !category) {
            const errorNotification = document.createElement("div");
            errorNotification.className =
              "fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center";
            errorNotification.innerHTML = `
      <div class="w-5 h-5 flex items-center justify-center ml-2">
      <i class="ri-error-warning-line"></i>
      </div>
      <span>يرجى ملء جميع الحقول المطلوبة</span>
      `;
            document.body.appendChild(errorNotification);
            setTimeout(() => errorNotification.remove(), 3000);
            return;
          }
          if (parseFloat(minBudget) >= parseFloat(maxBudget)) {
            const errorNotification = document.createElement("div");
            errorNotification.className =
              "fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center";
            errorNotification.innerHTML = `
      <div class="w-5 h-5 flex items-center justify-center ml-2">
      <i class="ri-error-warning-line"></i>
      </div>
      <span>يجب أن تكون الميزانية القصوى أكبر من الميزانية الدنيا</span>
      `;
            document.body.appendChild(errorNotification);
            setTimeout(() => errorNotification.remove(), 3000);
            return;
          }
          submitBtn.disabled = true;
          submitSpinner.classList.remove("hidden");
          submitText.textContent = "جاري النشر...";
          try {
            await new Promise((resolve) => setTimeout(resolve, 1500));
            toggleModal();
            const successNotification = document.createElement("div");
            successNotification.className =
              "fixed top-4 right-4 bg-[#242c3d] text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-500 ease-out";
            successNotification.innerHTML = `
      <div class="flex items-center mb-2">
      <div class="w-5 h-5 flex items-center justify-center ml-2 text-green-500">
      <i class="ri-checkbox-circle-line"></i>
      </div>
      <span class="font-medium">تم نشر المشروع بنجاح</span>
      </div>
      <div class="flex items-center justify-end mt-2">
      <a href="#" class="text-primary hover:text-primary/90 text-sm flex items-center group">
      <span>عرض المشروع</span>
      <div class="w-4 h-4 flex items-center justify-center mr-1 transform transition-transform group-hover:translate-x-[-4px]">
      <i class="ri-arrow-left-line"></i>
      </div>
      </a>
      </div>
      `;
            document.body.appendChild(successNotification);
            requestAnimationFrame(() => {
              successNotification.classList.remove("translate-x-full");
            });
            setTimeout(() => {
              successNotification.classList.add("translate-x-full");
              setTimeout(() => successNotification.remove(), 500);
            }, 4500);
            projectForm.reset();
          } catch (error) {
            const errorNotification = document.createElement("div");
            errorNotification.className =
              "fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center";
            errorNotification.innerHTML = `
      <div class="w-5 h-5 flex items-center justify-center ml-2">
      <i class="ri-error-warning-line"></i>
      </div>
      <span>حدث خطأ أثناء نشر المشروع. يرجى المحاولة مرة أخرى.</span>
      `;
            document.body.appendChild(errorNotification);
            setTimeout(() => errorNotification.remove(), 3000);
          } finally {
            submitBtn.disabled = false;
            submitSpinner.classList.add("hidden");
            submitText.textContent = "نشر المشروع";
          }
        });
        // Checkbox functionality
        const checkboxLabels = document.querySelectorAll('label[for^="skill"]');
        clearSkillsBtn.addEventListener("click", function () {
          const checkboxes = document.querySelectorAll('input[type="checkbox"]');
          checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
            const checkIcon = document.querySelector(
              `label[for="${checkbox.id}"] .ri-check-line`,
            );
            checkIcon.classList.add("hidden");
          });
          activeFilters.clear();
          updateFilters();
          const notification = document.createElement("div");
          notification.className =
            "fixed top-4 right-4 bg-[#242c3d] text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center transform translate-y-[-20px] opacity-0 transition-all duration-300";
          notification.innerHTML = `
      <div class="w-5 h-5 flex items-center justify-center ml-2 text-primary">
      <i class="ri-filter-line"></i>
      </div>
      <span>تم مسح جميع التصفيات</span>
      `;
          document.body.appendChild(notification);
          setTimeout(() => {
            notification.style.transform = "translateY(0)";
            notification.style.opacity = "1";
          }, 100);
          setTimeout(() => {
            notification.style.transform = "translateY(-20px)";
            notification.style.opacity = "0";
            setTimeout(() => notification.remove(), 300);
          }, 3000);
        });
        checkboxLabels.forEach((label) => {
          label.addEventListener("click", function () {
            const checkbox = document.getElementById(this.getAttribute("for"));
            const skillName = this.querySelector("span:last-child").textContent;
            checkbox.checked = !checkbox.checked;
            const checkIcon = this.querySelector(".ri-check-line");
            if (checkbox.checked) {
              checkIcon.classList.remove("hidden");
              activeFilters.add(skillName);
              const notification = document.createElement("div");
              notification.className =
                "fixed top-4 right-4 bg-[#242c3d] text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center transform translate-y-[-20px] opacity-0 transition-all duration-300";
              notification.innerHTML = `
      <div class="w-5 h-5 flex items-center justify-center ml-2 text-primary">
      <i class="ri-filter-line"></i>
      </div>
      <span>تم تفعيل تصفية المشاريع حسب: ${skillName}</span>
      `;
              document.body.appendChild(notification);
              setTimeout(() => {
                notification.style.transform = "translateY(0)";
                notification.style.opacity = "1";
              }, 100);
              setTimeout(() => {
                notification.style.transform = "translateY(-20px)";
                notification.style.opacity = "0";
                setTimeout(() => notification.remove(), 300);
              }, 3000);
            } else {
              checkIcon.classList.add("hidden");
              activeFilters.delete(skillName);
            }
            updateFilters();
          });
        });
      });
    </script>
  </body>
</html>