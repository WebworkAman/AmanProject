@extends('layouts.admin.content')

@section('content')

<main>
<div class="admin_block">

@include('layouts.admin.control')

<div class="Show_">
<div class="Show_form">
<div class="nav">
        <h3>編輯常見問題</h3>
        <a class="btn" href="{{ asset('admin/index') }}">返回列表</a>
</div>
<div class="edit-faq">
<form action="{{ route('faqs.update', $faq) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- 編輯表單的其他欄位 -->

    <div class="form-group">
        <label for="question"></label>
        <input type="text" name="question" id="question" value="{{ $faq->question }}" required>
    </div>

    <div class="form-group">
        <label for="answer">回答</label>
        <textarea name="answer" id="answer" rows="5" required>{{ $faq->answer }}</textarea>
    </div>

    <button type="submit">更新</button>
</form>
</div>
</div>
</div>
</div>
</main>
@endsection 