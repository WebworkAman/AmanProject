@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                    <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-900A-600-4.png">
                    <h2>連續式粘合機 OP-900A/900LA/1000A/1000LA</h2>
                    <h3>經濟款</h3>
                </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('OP900A') }}">我要提問</a></button>
                    @include('components.faq-message')


                </div>

            </div>


        </div>




    </main>
@endsection
