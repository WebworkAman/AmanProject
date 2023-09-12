@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-10A5-600-3.png">
                <h2>自動轉印機 OP-10A5</h2>
                <h3>自動抓送標 厚膠首選</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('OP-10A5') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
