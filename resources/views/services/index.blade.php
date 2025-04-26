@extends('layouts.app')

@section('title', 'الخدمات')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-[#242c3d] rounded-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">الخدمات</h1>
                <div class="w-6 h-6 flex items-center justify-center text-gray-400 mr-2">
                    <i class="ri-briefcase-line"></i>
                </div>
            </div>
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-button flex items-center">
                <span class="ml-2">إضافة خدمة</span>
                <i class="ri-add-line"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Filters Sidebar -->
            <div class="md:col-span-1 space-y-6">
                <!-- Categories Section -->
                <div class="bg-[#1a2234] rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-bold text-lg">الأقسام</h2>
                        <div class="w-6 h-6 flex items-center justify-center text-gray-400">
                            <i class="ri-arrow-up-s-line"></i>
                        </div>
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
                                <span class="bg-[#242c3d] text-xs px-2 py-1 rounded-full">{{ $category->count ?? 0 }}</span>
                            </li>
                            @endforeach
                        @else
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                                        <i class="ri-code-s-slash-line"></i>
                                    </div>
                                    <span class="text-sm">برمجة وتطوير</span>
                                </div>
                                <span class="bg-[#242c3d] text-xs px-2 py-1 rounded-full">14</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                                        <i class="ri-brush-line"></i>
                                    </div>
                                    <span class="text-sm">تصميم</span>
                                </div>
                                <span class="bg-[#242c3d] text-xs px-2 py-1 rounded-full">8</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-5 h-5 flex items-center justify-center text-gray-400 ml-2">
                                        <i class="ri-line-chart-line"></i>
                                    </div>
                                    <span class="text-sm">تسويق</span>
                                </div>
                                <span class="bg-[#242c3d] text-xs px-2 py-1 rounded-full">6</span>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <!-- Price Range Filter -->
                <div class="bg-[#1a2234] rounded-lg p-4">
                    <h2 class="font-bold text-lg mb-4">نطاق السعر</h2>
                    <div class="space-y-3">
                        <div class="relative pt-1">
                            <input type="range" min="0" max="1000" value="500" class="w-full h-2 bg-[#242c3d] rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between mt-2">
                                <span class="text-xs text-gray-400">$0</span>
                                <span class="text-xs text-gray-400">$1000</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="number" placeholder="من" class="w-full bg-[#242c3d] text-gray-300 text-sm rounded-md px-3 py-2 border-none">
                            <span class="text-gray-400">-</span>
                            <input type="number" placeholder="إلى" class="w-full bg-[#242c3d] text-gray-300 text-sm rounded-md px-3 py-2 border-none">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Services Grid -->
            <div class="md:col-span-2">
                @if(isset($services) && count($services) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($services as $service)
                        <!-- Service card would go here -->
                        @endforeach
                    </div>
                @else
                    <!-- Empty state -->
                    <div class="bg-[#1a2234] rounded-lg p-6 text-center">
                        <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center text-4xl opacity-30">
                            <i class="ri-briefcase-line"></i>
                        </div>
                        <p class="text-gray-400 mb-2">لا توجد خدمات متاحة حالياً</p>
                        <p class="text-gray-500 text-sm mb-4">ابدأ بإضافة خدمتك الأولى أو استعرض الخدمات المتاحة</p>
                        <button class="bg-primary text-[#1a2234] px-6 py-2 rounded-button">إضافة خدمة جديدة</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
