@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>圓刀裁剪機 OB-90</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            {{-- <div class="left-content">
                    <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-90-600-3.png">
                    <h2>圓刀裁剪機 OB-90</h2>
                    <h3>手的延伸，超值</h3>
                </div> --}}
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('OB-90') }}">我要提問</a></button>

                    @include('components.faq-message')
                </div>

            </div>

        </div>


        </div>




    </main>
@endsection
