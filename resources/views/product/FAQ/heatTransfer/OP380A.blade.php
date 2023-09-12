@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-380A-600-2.png">
                <h2>自動轉印機 OP-380A/380AII/380AIIT/550A</h2>
                <h3>印花首選</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('OP-380A') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
