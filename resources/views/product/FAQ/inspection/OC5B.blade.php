@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')


        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
                <h2>自動對邊驗布機 OC-5B/5K/5KB</h2>
                <h3>低配版</h3>
            </div> -->
            <div class="right-content">


                <div class="faq">
                    <button><a href="{{ asset('OC-5B') }}">我 要 提 問</a></button>

                    @include('components.faq-message')

                </div>


            </div>


        </div>




    </main>
@endsection
