@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/T5-600-2.png">
                <h2>全能拉布機 K5</h2>
                <h3>經典款-愛不釋手</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('K5') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
