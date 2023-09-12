@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-510-1400-6.png">
                <h2>手動裁剪機 OC-510/510L</h2>
                <h3>手的延伸，超值</h3>
            </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ route('OC-510') }}">我 要 提 問</a></button>
                    @include('components.faq-message')

                </div>

            </div>


        </div>




    </main>
@endsection
