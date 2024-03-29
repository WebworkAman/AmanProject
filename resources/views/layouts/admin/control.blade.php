{{-- <div class="control_">
    <h3>功能列表</h3>
    <div class="control_list">
        <!-- <button id="question_block">客戶問題區</button> -->
        <a href="{{ route('setting') }}" data-url="{{ '/admin/index/setting' }}"class="control-option">管理設定</a>
        <a href="{{ route('memberList') }}" data-url="{{ '/admin/index/member-list' }}"class="control-option">會員管理</a>
        <!-- <a class="control-option" href="/admin/index/member-create">新增會員</a> -->
        <a href="{{ route('faqList') }}" data-url="{{ '/admin/index/faq-list' }}" class="control-option">常見問題</a>
        <a href="{{ route('questions.index') }}" data-url="{{ '/admin/index/question-list' }}"
            class="control-option">客戶問題</a>
        <a href="{{ route('Maintenance.List') }}" data-url="{{ '/admin/index/maintenance-list' }}"
            class="control-option">維修履歷</a>
    </div>
</div> --}}
@php
    $identityPerm = $logIn->identity_perm;
@endphp

<div class="control_">
    <h3>功能列表</h3>
    <div class="control_list">
        @if ($identityPerm == 1)
            <a href="{{ route('setting') }}" class="control-option">收信設定</a>
        @endif
        @if ($identityPerm == 1 || $identityPerm == 2)
            <a href="{{ route('adminList') }}" class="control-option">使用者設定</a>
            <a href="{{ route('memberList') }}" class="control-option">會員管理</a>
        @endif
        <a href="{{ route('faqList') }}" class="control-option">常見問題</a>
        <a href="{{ route('questions.index') }}" class="control-option">客戶問題</a>
        <a href="{{ route('Maintenance.List') }}" class="control-option">維修履歷</a>
    </div>
</div>
