@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                    <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/F8-600-2.png">
                    <h2>平織拉布機 F8</h2>
                    <h3>再黏的膠一定分開</h3>
                </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('F8') }}">我要提問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
