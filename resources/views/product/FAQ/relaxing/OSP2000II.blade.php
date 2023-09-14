@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>蒸氣預縮 OSP-2000II/2000III</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                        <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2000II-600-3.png">
                        <h2>蒸氣預縮 OSP-2000II/2000III</h2>
                        <h3>經典款</h3>
                    </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('OSP-2000II') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
