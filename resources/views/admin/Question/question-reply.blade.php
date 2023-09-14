@extends('layouts.admin.content')

@section('content')

    <div class="Show_ reply">
        <div class="Show_form">
            <div class="question_reply">
                <div class="reply_nav">
                    <h3>客戶問題回覆</h3>

                    <a class="btn" href="{{ route('questions.index') }}">返回列表</a>
                </div>

                <div class="ans reply">
                    <div class="question-block">
                        <div class="form-group">
                            <ul>
                                <li>用戶 : <span class="user-content">{{ $question->member->name }}</span></li>
                                <li>
                                    問題標題 : <span class="user-content">{{ $question->title }}</span>

                                </li>

                                <li>

                                    問題內容：<span class="user-content">{{ $question->content }}</span>

                                </li>
                                <li>

                                    @if ($question->answers->count() > 0)
                                        @foreach ($question->answers as $answer)
                                            回覆：
                                            <span class="user-content">{{ $answer->answer }}</span>
                                        @endforeach
                                    @else
                                        回覆：
                                        <span class="user-content">暫無回答</span>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="baseline"></div>
                    <div class="reply-block">
                        <form method="POST" action="{{ route('question.storeReply', $question->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="answer">歐西馬回覆 :</label>
                                <!-- <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea> -->
                                <textarea name="answer" rows="10">{{ $question->answers->count() > 0 ? $question->answers[0]->answer : '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">提交</button>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>



        </div>


    </div>


@endsection
