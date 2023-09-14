@extends('layouts.admin.content')

@section('content')
    <div class="Show_">
        <div class="Show_form">
            <div class="reply_nav">
                <h3>編輯常見問題</h3>
                <a class="btn" href="{{ route('faqList') }}">返回列表</a>
            </div>
            <div class="edit-faq">
                <form action="{{ route('faqs.update', $faq) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- 編輯表單的其他欄位 -->

                    <div class="form-group">
                        <label for="question">問題詳情：</label>
                        <input type="text" name="question" id="question" value="{{ $faq->question }}" required>
                    </div>

                    <div class="form-group">
                        <label for="answer">問題回覆：</label>
                        <textarea name="answer" id="answer" rows="10" required>{{ $faq->answer }}</textarea>
                    </div>

                    <button id="faqEditbtn" type="submit">更新</button>
                </form>
            </div>
        </div>
    </div>
@endsection
