@extends('layouts.app')

@section('title', 'المراسلات')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-[#242c3d] rounded-lg p-6">
        <div class="flex items-center mb-6">
            <h1 class="text-xl font-bold">المراسلات</h1>
            <div class="w-6 h-6 flex items-center justify-center text-gray-400 mr-2">
                <i class="ri-chat-3-line"></i>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Contacts list -->
            <div class="w-full md:w-1/3 bg-[#1a2234] rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold">جهات الاتصال</h2>
                    <button class="bg-primary text-[#1a2234] px-3 py-1 rounded-button text-sm">
                        <i class="ri-add-line mr-1"></i> جديد
                    </button>
                </div>
                
                <div class="bg-[#242c3d] rounded-lg p-4 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center text-3xl opacity-50">
                        <i class="ri-user-line"></i>
                    </div>
                    <p class="text-gray-400 mb-2">لا توجد جهات اتصال</p>
                    <p class="text-gray-500 text-sm">ابدأ محادثة جديدة باستخدام الزر أعلاه</p>
                </div>
            </div>
            
            <!-- Message area -->
            <div class="w-full md:w-2/3 bg-[#1a2234] rounded-lg p-4">
                <div class="text-center h-full flex flex-col items-center justify-center">
                    <div class="w-20 h-20 mx-auto mb-4 flex items-center justify-center text-4xl opacity-30">
                        <i class="ri-message-3-line"></i>
                    </div>
                    <p class="text-gray-400 mb-2">لم يتم تحديد محادثة</p>
                    <p class="text-gray-500 text-sm">اختر محادثة أو ابدأ واحدة جديدة</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 