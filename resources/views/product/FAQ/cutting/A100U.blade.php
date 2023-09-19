@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>電剪裁剪機 A-100U(DS)/100H</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            {{-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1597635338.png">
                <h2>電剪裁剪機 A-100U(DS)/100H</h2>
                <h3>手的延伸，超值</h3>
            </div> --}}
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('A-100U') }}">我要提問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
