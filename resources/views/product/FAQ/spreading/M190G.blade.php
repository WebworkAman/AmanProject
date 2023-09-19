@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>自動升降抓匹布 M190G</h2>
        </div>
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/M190G-600-3.png">
                            <h2>自動升降抓匹布 M190G</h2>
                            <h3>機械手臂來幫你</h3>
                        </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('M190G') }}">我要提問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
