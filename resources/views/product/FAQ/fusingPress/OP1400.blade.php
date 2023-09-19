@extends('layouts.content')

@section('content')
    <main>

        @include('components.faq-title')
        @include('components.faq-search')
        <div class="QA_content">
            <!-- <div class="left-content">
                    <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-1600-600-5.png">
                    <h2>大型連續式粘合機 OP-1400/1600/1800/L</h2>
                    <h3>大型工廠批量生產</h3>
                </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('OP-1400') }}">我要提問</a></button>
                    @include('components.faq-message')


                </div>

            </div>


        </div>




    </main>
@endsection
