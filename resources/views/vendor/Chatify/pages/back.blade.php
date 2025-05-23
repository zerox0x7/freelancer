<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ config('chatify.name') }}</title>
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

{{-- Meta tags --}}
<meta name="id" content="{{ $id }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="messenger-theme" content="{{ $dark_mode }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/custom-rtl.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/custom-dark-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet" />

{{-- Setting messenger primary color to css --}}
<style>
    :root {
        --primary-color: {{ $messengerColor }};
    }
    :where([class^="ri-"])::before { content: "\f3c2"; }
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap');
    
    body {
        font-family: 'Tajawal', sans-serif;
        background-color: #1a2234;
        color: #f8fafc;
    }
    
    input:focus, button:focus, textarea:focus {
        outline: none;
    }
    
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    .logo-text {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.8rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        color: #e7c973;
        transition: all 0.3s ease;
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
    
    .chat-bubble {
        position: relative;
        max-width: 80%;
    }
    
    .chat-bubble.received {
        background-color: #242c3d;
        border-radius: 12px 12px 12px 0;
    }
    
    .chat-bubble.sent {
        background-color: #0f7c3a;
        border-radius: 12px 12px 0 12px;
        align-self: flex-start;
    }
    
    .chat-timestamp {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .user-list-item {
        border-bottom: 1px solid #2a334e;
    }
    
    .message-options {
        visibility: hidden;
    }
    
    .chat-bubble:hover .message-options {
        visibility: visible;
    }
    
    .user-avatar {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
    }
    
    /* Chatify overrides and integration */
    /* Modern styling for the messenger container */
    .messenger {
        display: flex;
        width: 100%;
        height: calc(100vh - 80px);
        background-color: #1e2538 !important;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    /* Sidebar styling */
    .messenger-listView {
        width: 320px !important;
        border-left: 1px solid #2a334e !important;
        background-color: #1e2538 !important;
    }
    
    /* Header styling */
    .m-header {
        background-color: #1e2538 !important;
        padding: 1rem !important;
        border-bottom: 1px solid #2a334e !important;
    }
    
    .messenger-headTitle {
        color: #f8fafc !important;
        font-size: 1rem !important;
        font-weight: 600 !important;
    }
    
    /* Search input styling */
    .messenger-search {
        background-color: #242c3d !important;
        color: #f8fafc !important;
        border-radius: 0.5rem !important;
        padding: 0.75rem 2.5rem 0.75rem 1rem !important;
        border: none !important;
        width: 100% !important;
        margin-top: 0.5rem !important;
        font-size: 0.875rem !important;
    }
    
    /* Search container */
    .messenger-listView .m-header .search-container {
        position: relative !important;
        width: 100% !important;
        margin-top: 0.75rem !important;
    }
    
    .messenger-listView .m-header .search-container .search-icon {
        position: absolute !important;
        right: 0.75rem !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        color: #93a3b8 !important;
        font-size: 1rem !important;
        pointer-events: none !important;
    }
    
    /* Header styling - make it more compact */
    .messenger-listView .m-header {
        padding: 0.75rem 1rem !important;
        background-color: #1e2538 !important;
    }
    
    .messenger-listView .m-header .messenger-headTitle {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
    }
    
    /* User list styling */
    .messenger-list-item {
        border-bottom: 1px solid #2a334e !important;
        transition: all 0.2s ease !important;
    }
    
    .messenger-list-item:hover, 
    .messenger-list-item.m-list-active {
        background-color: #242c3d !important;
    }
    
    /* Avatar styling */
    .avatar {
        border-radius: 50% !important;
        background-color: #2a334e !important;
    }
    
    /* Active status dot */
    .activeStatus {
        width: 0.75rem !important;
        height: 0.75rem !important;
        border-radius: 50% !important;
        background-color: #10b981 !important;
        border: 2px solid #1e2538 !important;
    }
    
    /* Main chat area styling */
    .messenger-messagingView {
        background-color: #1a2234 !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }
    
    .m-header-messaging {
        background-color: #1e2538 !important;
        border-bottom: 1px solid #2a334e !important;
    }
    
    /* Message container styling */
    .m-body.messages-container {
        background-color: #1a2234 !important;
        padding: 1rem !important;
        flex: 1 !important;
        overflow-y: auto !important;
    }
    
    /* Message styling */
    .message-card {
        margin-bottom: 1rem !important;
        max-width: 75% !important;
    }
    
    .mc-sender {
        margin-left: 0 !important;
        margin-right: auto !important;
    }
    
    .message-card .message {
        padding: 0.75rem 1rem !important;
        border-radius: 0.5rem !important;
    }
    
    .mc-sender .message {
        background-color: #0f7c3a !important;
        border-radius: 12px 12px 12px 0 !important;
        color: white !important;
    }
    
    .message-card:not(.mc-sender) .message {
        background-color: #242c3d !important;
        border-radius: 12px 12px 0 12px !important;
        color: #f8fafc !important;
    }
    
    /* Override the default Chatify styling for messages to match RTL */
    .message-card.mc-sender .message-card-content {
        border-radius: 12px 12px 12px 0 !important;
    }
    
    .message-card:not(.mc-sender) .message-card-content {
        border-radius: 12px 12px 0 12px !important;
    }
    
    /* Style for message bubbles like in the screenshot */
    .mc-sender .message-card-content {
        background-color: #0f7c3a !important;
        color: white !important;
    }
    
    .message-card:not(.mc-sender) .message-card-content {
        background-color: #1D7BFF !important;
        color: white !important;
    }
    
    /* Fix received message color to match screenshot */
    .message-card:not(.mc-sender) .message-card-content {
        background-color: #1D7BFF !important;
    }
    
    /* Message timestamp */
    .message-time {
        font-size: 0.75rem !important;
        color: rgba(255, 255, 255, 0.6) !important;
        margin-top: 0.25rem !important;
    }
    
    /* Send message area */
    .messenger-sendCard {
        background-color: #1e2538 !important;
        padding: 1rem !important;
        border-top: 1px solid #2a334e !important;
        display: flex !important;
        position: relative !important;
        z-index: 1 !important;
    }
    
    .messenger-sendCard form {
        display: flex !important;
        align-items: center !important;
        width: 100% !important;
    }
    
    .m-send {
        background-color: #242c3d !important;
        color: #f8fafc !important;
        border-radius: 0.5rem !important;
        padding: 0.75rem !important;
        border: none !important;
        resize: none !important;
        flex: 1 !important;
        margin: 0 0.5rem !important;
        min-height: 40px !important;
        max-height: 100px !important;
    }
    
    .messenger-sendCard button,
    .messenger-sendCard label {
        color: #93a3b8 !important;
        background: transparent !important;
        border: none !important;
        font-size: 1.25rem !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
    }
    
    .messenger-sendCard button:hover,
    .messenger-sendCard label:hover {
        color: #e7c973 !important;
    }
    
    /* Attachment button and file input */
    .upload-attachment {
        display: none !important;
    }
    
    /* Typing indicator */
    .typing-indicator {
        padding: 0.5rem !important;
    }
    
    .typing .message {
        background-color: #242c3d !important;
        border-radius: 12px 12px 12px 0 !important;
    }
    
    .typing-dots {
        display: flex !important;
    }
    
    .dot {
        width: 0.5rem !important;
        height: 0.5rem !important;
        background-color: #93a3b8 !important;
        border-radius: 50% !important;
        margin-right: 0.25rem !important;
        animation: bounce 1.5s infinite !important;
    }
    
    @keyframes bounce {
        0%, 60%, 100% { transform: translateY(0); }
        30% { transform: translateY(-0.5rem); }
    }
    
    /* Message hint */
    .message-hint {
        color: #93a3b8 !important;
        font-size: 0.875rem !important;
    }
    
    /* Scrollbar styling */
    .app-scroll::-webkit-scrollbar {
        width: 5px !important;
        height: 5px !important;
    }
    
    .app-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(231, 201, 115, 0.5) !important;
        border-radius: 3px !important;
    }
    
    .app-scroll::-webkit-scrollbar-track {
        background-color: transparent !important;
    }
    
    /* Info side panel */
    .messenger-infoView {
        width: 0 !important;
        background-color: #1e2538 !important;
        border-right: 1px solid #2a334e !important;
        transition: all 0.3s ease !important;
        overflow: hidden !important;
    }
    
    .messenger-infoView.show {
        width: 320px !important;
    }
    
    .messenger-infoView nav {
        padding: 1rem !important;
        border-bottom: 1px solid #2a334e !important;
        color: #f8fafc !important;
    }
    
    /* Title styles */
    .messenger-title {
        color: #93a3b8 !important;
        font-size: 0.875rem !important;
        margin: 1rem 0 0.5rem 0 !important;
        padding: 0 1rem !important;
    }
    
    /* For Chatify utility classes */
    .chatify-d-flex {
        display: flex !important;
    }
    
    .chatify-justify-content-between {
        justify-content: space-between !important;
    }
    
    .chatify-align-items-center {
        align-items: center !important;
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
                <a href="/" class="flex items-center">
                    <span class="logo-text">{{ config('chatify.name') }}</span>
                </a>
            </div>
            
            <!-- Main Navigation -->
            <nav class="hidden md:flex space-x-0 gap-6">
                <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
                    البريد
                    <span class="notification-badge">1</span>
                </a>
                <a href="#" class="nav-item active px-3 py-2 text-sm font-medium relative">
                    المراسلات
                    <span class="notification-badge">2</span>
                </a>
                <a href="#" class="nav-item px-3 py-2 text-sm font-medium relative">
                    المسابقات
                    <span class="notification-badge">1</span>
                </a>
                <a href="/" class="nav-item px-3 py-2 text-sm font-medium relative">
                    الخدمات
                    <span class="notification-badge">5</span>
                </a>
            </nav>
            
            <!-- User Menu -->
            <div class="flex items-center space-x-4">
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
                <button
                    class="w-8 h-8 flex items-center justify-center text-gray-300 hover:text-primary"
                >
                    <i class="ri-notification-3-line"></i>
                </button>
                <div class="relative">
                    <button
                        id="userProfileBtn"
                        class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-[#1a2234]"
                    >
                        <i class="ri-user-line"></i>
                    </button>
                    <div
                        id="userDropdown"
                        class="absolute left-0 mt-2 w-48 bg-[#242c3d] rounded-lg shadow-lg py-2 hidden z-50"
                    >
                        <a
                            href="#"
                            class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a3347] hover:text-primary"
                        >
                            <div class="w-5 h-5 flex items-center justify-center ml-2">
                                <i class="ri-user-line"></i>
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
                        <div class="border-t border-gray-700 my-2"></div>
                        <a
                            href="#"
                            class="flex items-center px-4 py-2 text-sm text-red-500 hover:bg-[#2a3347]"
                        >
                            <div class="w-5 h-5 flex items-center justify-center ml-2">
                                <i class="ri-logout-box-line"></i>
                            </div>
                            <span>تسجيل الخروج</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container mx-auto px-4 py-6">
    <div class="messenger">
        {{-- ----------------------Users/Groups lists side---------------------- --}}
        <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
            {{-- Header and search bar --}}
            <div class="m-header">
                <nav>
                    <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">المحادثات</span> </a>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                        <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                    </nav>
                </nav>
                {{-- Search input --}}
                <div class="search-container relative mt-3">
                    <input type="text" class="messenger-search" placeholder="البحث في المحادثات..." />
                    <div class="search-icon">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </div>

            {{-- tabs and lists --}}
            <div class="m-body contacts-container">
                {{-- Lists [Users/Group] --}}
                {{-- ---------------- [ User Tab ] ---------------- --}}
                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                    
                  
                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                    {{-- Contact --}}
                    
                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                </div>
                {{-- ---------------- [ Search Tab ] ---------------- --}}
                <div class="messenger-tab search-tab app-scroll" data-view="search">
                    {{-- items --}}
                    <p class="messenger-title"><span>البحث</span></p>
                    <div class="search-records">
                        <p class="message-hint center-el"><span>اكتب للبحث...</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView"   style="height: 640px !important;" >
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    {{-- header back button, avatar and user name --}}
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div>
                        <div>
                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                            <p class="user-status">متصل الآن</p>
                        </div>
                    </div>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                        <a href="/"><i class="fas fa-home"></i></a>
                        <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                    </nav>
                </nav>
                {{-- Internet connection --}}
                <div class="internet-connection">
                    <span class="ic-connected">متصل</span>
                    <span class="ic-connecting">جاري الاتصال...</span>
                    <span class="ic-noInternet">لا يوجد اتصال بالإنترنت</span>
                </div>
            </div>

            {{-- Messaging area --}}
            <div class="m-body messages-container app-scroll">
                <div class="messages">
                    <p class="message-hint center-el"><span>الرجاء اختيار محادثة للبدء</span></p>
                </div>
                {{-- Typing indicator --}}
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <div class="message">
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Send Message Form --}}
            <div class="messenger-sendCard">
                <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
                    @csrf
                    <button type="button" class="emoji-button"><span class="fas fa-smile"></span></button>
                    <textarea name="message" class="m-send app-scroll" placeholder="اكتب رسالتك..."></textarea>
                    <label><span class="fas fa-paperclip"></span><input type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
                    <button type="submit" class="send-button"><span class="fas fa-paper-plane"></span></button>
                </form>
            </div>
        </div>
        {{-- ---------------------- Info side ---------------------- --}}
        <div class="messenger-infoView app-scroll">
            {{-- nav actions --}}
            <nav>
                <p>بيانات المستخدم</p>
                <a href="#"><i class="fas fa-times"></i></a>
            </nav>
            {!! view('Chatify::layouts.info')->render() !!}
        </div>
    </div>
</main>

@include('Chatify::layouts.modals')

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const userProfileBtn = document.getElementById("userProfileBtn");
        const userDropdown = document.getElementById("userDropdown");
        
        // Generate a consistent color based on username
        function generateColorFromName(name) {
            let hash = 0;
            for (let i = 0; i < name.length; i++) {
                hash = name.charCodeAt(i) + ((hash << 5) - hash);
            }
            
            const colors = [
                '#4f46e5', // indigo
                '#0891b2', // cyan
                '#0d9488', // teal
                '#4d7c0f', // lime
                '#9333ea', // purple
                '#0369a1', // sky
                '#b45309', // amber
                '#be123c', // rose
                '#115e59', // teal dark
                '#7e22ce', // purple dark
                '#be185d', // pink
                '#65a30d'  // lime light
            ];
            
            // Get a positive index
            const index = Math.abs(hash % colors.length);
            return colors[index];
        }
        
        // Create default avatars for all users
        function createDefaultAvatars() {
            // Set color for the header avatar
            const headerAvatar = document.querySelector('.header-avatar');
            if (headerAvatar) {
                const name = headerAvatar.nextElementSibling?.querySelector('.user-name')?.textContent || 'MT';
                headerAvatar.style.backgroundColor = generateColorFromName(name);
                // If avatar is empty, add initials
                if (!headerAvatar.textContent.trim()) {
                    const initials = name.split(' ')
                        .map(part => part.charAt(0))
                        .join('')
                        .substring(0, 2);
                    headerAvatar.textContent = initials;
                }
            }
        }
        
        // Initialize default avatars when DOM is fully loaded
        setTimeout(createDefaultAvatars, 100);
        
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
    });
</script>

@include('Chatify::layouts.footerLinks')

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Fix height of messaging view
    const messagingView = document.querySelector('.messenger-messagingView');
    if (messagingView) {
        messagingView.style.maxHeight = '650px';
    }
    
    // Initialize Chatify properly
    if (typeof window.messenger !== 'undefined' && typeof window.messenger.init === 'function') {
        // Ensure original initialization is not blocked
        setTimeout(function() {
            // Check if messenger was already initialized
            if (!window.messenger.initialized) {
                window.messenger.init();
            }
        }, 500);
    }
});
</script>

</body>
</html>

