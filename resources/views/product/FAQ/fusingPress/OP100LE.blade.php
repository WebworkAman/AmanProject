@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-100LE-600-2.png">
                <h2>連續式粘合機 OP-100LE/120LE</h2>
                <h3>高端制服專用</h3>
            </div>
            <div class="right-content">

                <div class="message_border">
                    @foreach ($messages as $message)
                        <div class="message">

                            <p>標題：{{ $message->title }}</p>
                            <p>內容：{{ $message->content }}</p>
                            <p>日期：{{ $message->created_at }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="baseline"></div>
                <h3>機器相關問題提交</h3>
                <form method="post" action="{{ route('post') }}" enctype="multipart/form-data">
                    @csrf

                    <p><label for="title">標題：</label></p>
                    <input type="title" name="title">
                    <p><label for="content">內文：</label></p>
                    <textarea id="content" name="content" cols="30" rows="10"></textarea>
                    <p>
                        <input class='submit' type="submit" name="submit" value="Send">
                    </p>
                </form>

            </div>


        </div>




    </main>
@endsection
