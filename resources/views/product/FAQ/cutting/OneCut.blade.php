@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>低層自動裁剪機 OneCut</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            {{-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/ONECUT-1400S.png?v=1">
                <h2>低層自動裁剪機 OneCut</h2>
                <h3>皮革裁剪如此簡單</h3>
            </div> --}}
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('OneCut') }}">我 要 提 問</a></button>

                    @include('components.faq-message')
                </div>

            </div>


        </div>




    </main>
@endsection
