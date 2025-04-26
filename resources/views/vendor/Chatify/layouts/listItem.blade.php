{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && !!$lastMessage)
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="{{ $user->id }}" style="padding: 10px 5px; border-radius: 5px;">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative; padding-right: 12px; vertical-align: middle; width: 60px;">
            @if($user->active_status)
                <span class="activeStatus active"></span>
            @endif
        <div class="avatar av-m"
        style="background-image: url('{{ asset('storage/' . config('chatify.user_avatar.folder') . '/' . $user->avatar) }}');">
           
        <img src="{{ $user->avatar }}" style="position:absolute; width:80%; hight:80%; border-radius: 50%;" >
        @if($user->avatar == 'avatar.png')
                {{ substr($user->name, 0, 2) }}
            @endif
        </div>
        </td>
        {{-- center side --}}
        <td style="padding-left: 8px; vertical-align: middle;">
        <p data-id="{{ $user->id }}" data-type="user" style="margin: 0 0 5px 0; display: flex; justify-content: space-between;">
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
            <span style="color: #E7CB73 !important;" class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span></p>
        <span style="display: block; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">أنت :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {!!
                $lastMessageBody
            !!}
            @else
            <span class="fas fa-file"></span> مرفق
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b style='float: right; margin-top: 5px; background-color: var(--primary-color); padding: 0 5px; border-radius: 10px; font-size: 12px; color: white;'>".$unseenCounter."</b>" : '' !!}
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}" style="padding: 8px 5px; border-radius: 5px;">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="padding-right: 12px; vertical-align: middle; width: 60px;">
        <div class="avatar av-m"
        style="background-image: url('{{ $user->avatar }}');">
            @if(!$user->avatar)
                {{ substr($user->name, 0, 2) }}
            @endif
        </div>
        </td>
        {{-- center side --}}
        <td style="padding-left: 8px; vertical-align: middle;">
            <p data-id="{{ $user->id }}" data-type="user" style="margin: 0;">
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
        </td>

    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}'); border-radius: 8px;"></div>
@endif

<style>
.messenger-list-item:hover {
    background-color: rgba(0,0,0,0.04);
    transition: background-color 0.3s;
}
.activeStatus {
    bottom: 0px;
    right: 5px;
}
</style>


