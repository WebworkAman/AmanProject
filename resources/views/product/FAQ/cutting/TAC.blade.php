@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>自動裁剪機 TAC</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                        <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/TAC-175-600-2.png">
                        <h2>自動裁剪機 TAC</h2>
                        <h3>超優，超值</h3>
                    </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('TAC') }}">我要提問</a></button>
                    @include('components.faq-message')


                </div>

            </div>


        </div>




    </main>
@endsection
