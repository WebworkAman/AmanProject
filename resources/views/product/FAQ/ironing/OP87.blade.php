@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-87-600.png">
                <h2>全蒸氣式燙斗 OP-87/88S/89</h2>
            </div> -->
            <div class="right-content">

                <div class="faq">

                    <button><a href="{{ asset('OP-87') }}">我 要 提 問</a></button>

                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
