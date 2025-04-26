@extends('layouts.app')

@section('title', 'البريد')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-[#242c3d] rounded-lg p-6">
        <div class="flex items-center mb-6">
            <h1 class="text-xl font-bold">البريد</h1>
            <div class="w-6 h-6 flex items-center justify-center text-gray-400 mr-2">
                <i class="ri-mail-line"></i>
            </div>
        </div>
        
        <div class="bg-[#1a2234] rounded-lg p-4 text-center">
            <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center text-3xl opacity-50">
                <i class="ri-inbox-line"></i>
            </div>
            <p class="text-gray-400 mb-2">لا توجد رسائل في البريد</p>
            <p class="text-gray-500 text-sm">سيتم عرض الرسائل هنا عند وصولها</p>
        </div>
    </div>
</div>
@endsection 