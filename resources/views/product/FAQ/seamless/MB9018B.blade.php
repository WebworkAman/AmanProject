@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/MB9018B-600.png">
                <h2>超聲波花邊機(雙電機) MB9018B</h2>
                <h3>2020必備</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('MB9018B') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
