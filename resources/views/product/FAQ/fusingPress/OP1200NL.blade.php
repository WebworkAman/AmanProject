@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-1800NL-600.png">
                <h2>大型連續式粘合機 OP-1200NL/1600NL/1800NL</h2>
                <h3>高端成衣業首選</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('OP-1200NL') }}">我 要 提 問</a></button>
                    @include('components.faq-message')


                </div>

            </div>


        </div>




    </main>
@endsection
