@extends('layouts.app')

@section('title', 'المسابقات')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-[#242c3d] rounded-lg p-6">
        <div class="flex items-center mb-6">
            <h1 class="text-xl font-bold">المسابقات</h1>
            <div class="w-6 h-6 flex items-center justify-center text-gray-400 mr-2">
                <i class="ri-trophy-line"></i>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Competition Card Template -->
            <div class="bg-[#1a2234] rounded-lg overflow-hidden">
                <div class="h-40 bg-[#2a334e] relative">
                    <div class="absolute top-0 left-0 bg-primary text-[#1a2234] px-3 py-1 rounded-br-lg">
                        جديد
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 flex items-center justify-center text-4xl text-gray-600">
                            <i class="ri-code-s-slash-line"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold mb-2">مسابقة تطوير واجهات المستخدم</h3>
                    <p class="text-sm text-gray-400 mb-3">قم بتصميم واجهة المستخدم لتطبيق جوال حديث</p>
                    <div class="flex items-center justify-between">
                        <span class="text-primary font-bold">$1000</span>
                        <div class="flex items-center text-gray-500 text-sm">
                            <span>باقي 7 أيام</span>
                            <div class="w-4 h-4 flex items-center justify-center ml-1">
                                <i class="ri-time-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Empty State for Competitions -->
            <div class="md:col-span-2 lg:col-span-3 bg-[#1a2234] rounded-lg p-6 text-center">
                <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center text-4xl opacity-30">
                    <i class="ri-trophy-line"></i>
                </div>
                <p class="text-gray-400 mb-2">لا توجد مسابقات متاحة حالياً</p>
                <p class="text-gray-500 text-sm mb-4">ترقبوا المسابقات القادمة في الأيام المقبلة</p>
                <button class="bg-primary text-[#1a2234] px-6 py-2 rounded-button inline-flex items-center">
                    <span>اشترك في التنبيهات</span>
                    <i class="ri-notification-line mr-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
