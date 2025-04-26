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
        scrollbar-width: thin;
        scrollbar-color: rgba(231, 201, 115, 0.4) rgba(26, 34, 52, 0.1);
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
    
    .nav-item {
        position: relative;
        transition: all 0.2s ease;
    }
    
    .nav-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #E7C973;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .nav-item:hover::after {
        transform: scaleX(0.8);
    }
    
    .nav-item.active::after {
        transform: scaleX(1);
    }
    
    .nav-item.active {
        color: #E7C973;
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
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
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
    
    /* Scrollbar styling - Modern sleek scrollbars for the entire page */
    body {
        scrollbar-width: thin;
        scrollbar-color: rgba(231, 201, 115, 0.4) rgba(26, 34, 52, 0.1);
    }

    /* Target all scrollbars in the entire document */
    ::-webkit-scrollbar {
        width: 6px !important;
        height: 6px !important;
    }

    ::-webkit-scrollbar-track {
        background-color: rgba(26, 34, 52, 0.1) !important;
        border-radius: 10px !important;
        margin: 4px !important;
    }

    ::-webkit-scrollbar-thumb {
        background-color: rgba(231, 201, 115, 0.4) !important;
        border-radius: 10px !important;
        transition: all 0.3s ease !important;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: rgba(231, 201, 115, 0.7) !important;
    }

    ::-webkit-scrollbar-corner {
        background-color: transparent !important;
    }

    /* Specific styling for app-scroll class to maintain consistency */
    .app-scroll::-webkit-scrollbar {
        width: 6px !important;
        height: 6px !important;
    }

    .app-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(231, 201, 115, 0.4) !important;
        border-radius: 10px !important;
    }

    .app-scroll::-webkit-scrollbar-thumb:hover {
        background-color: rgba(231, 201, 115, 0.7) !important;
    }

    .app-scroll::-webkit-scrollbar-track {
        background-color: rgba(26, 34, 52, 0.1) !important;
        border-radius: 10px !important;
        margin: 4px !important;
    }

    /* Firefox scrollbar styling */
    * {
        scrollbar-width: thin;
        scrollbar-color: rgba(231, 201, 115, 0.4) rgba(26, 34, 52, 0.1);
    }

    /* Remove default styling for messenger scrollable areas */
    .messenger-tab, .m-body.messages-container, .messenger-sendCard .m-send {
        scrollbar-width: thin;
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

    /* User dropdown improvements */
    #userProfileBtn {
        transition: all 0.2s ease;
        box-shadow: 0 2px 5px rgba(231, 201, 115, 0.3);
    }
    
    #userProfileBtn:hover {
        transform: scale(1.05);
    }
    
    #userDropdown {
        transform-origin: top right;
        transition: all 0.2s ease-out;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    
    #userDropdown.show {
        display: block;
        animation: dropdownFadeIn 0.2s ease-out forwards;
    }
    
    @keyframes dropdownFadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</head>
<body>

<!-- Header Navigation -->
@include('layouts.parts.header');

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
                    {{-- Favorites --}}
                    <div class="favorites-section">
                     <p class="messenger-title"><span>Favorites</span></p>
                     <div class="messenger-favorites app-scroll-hidden"></div>
                    </div>
                    {{-- Saved Messages --}}
                    <p class="messenger-title"><span>Your Space</span></p>
                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                    {{-- Contact --}}
                    <p class="messenger-title"><span>All Messages</span></p>
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
        <div class="messenger-messagingView" style="height: 640px !important;">
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    {{-- header back button, avatar and user name --}}
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <!-- <img class="avatar" alt="User Avatar" style="width: 40px; height: 40px; border-radius: 50%;" /> -->
<img class="header-avatar" alt="Header Avatar" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px;" />
                        <!-- <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div> -->
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

<script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
<script >
    // Gloabl Chatify variables from PHP to JS
    window.chatify = {
        name: "{{ config('chatify.name') }}",
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: '{{route("pusher.auth")}}'
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
</script>
<script src="{{ asset('js/chatify/utils.js') }}"></script>
<script src="{{ asset('js/chatify/code.js') }}"></script>
<script src="{{ asset('js/chatify/rtl-fixes.js') }}"></script>

<script>
  // User dropdown toggle functionality
  document.addEventListener('DOMContentLoaded', function() {
    const userProfileBtn = document.getElementById('userProfileBtn');
    const userDropdown = document.getElementById('userDropdown');
    
    userProfileBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      userDropdown.classList.toggle('show');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      if (!userDropdown.contains(e.target) && e.target !== userProfileBtn) {
        userDropdown.classList.remove('show');
      }
    });
    
    const messagingView = document.querySelector('.messenger-messagingView');
    if (messagingView) {
        messagingView.style.maxHeight = '650px';
    }
  });
</script>

</body>
</html>
