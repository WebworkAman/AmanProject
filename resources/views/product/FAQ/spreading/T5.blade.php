@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>針織圓筒布拉布機 T5</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            {{-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/T5-600-2.png">
                <h2>針織圓筒布拉布機 T5</h2>
                <h3>貼身衣物的最佳選擇</h3>
            </div> --}}
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('T5') }}">我要提問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
