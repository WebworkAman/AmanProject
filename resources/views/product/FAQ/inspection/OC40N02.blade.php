@extends('layouts.content')

@section('content')
    <main>
        @include('components.faq-title')
        <div class="productQuestionTitle">
            <h2>AI驗布機 EagleAi/Plus/Pro</h2>

        </div>
        @include('components.faq-search')

        {{-- <form class="search" action="{{ route('faqs.search') }}" method="GET">
            <div class="form-group">

            </div>

            <input type="text" name="keyword" placeholder="輸入想搜尋問題">
            <button type="submit">搜尋</button>
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

        </form> --}}
        <div class="QA_content">
            <!-- <div class="left-content">
                                            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1646990118.png">

                                            <h3>縮短AI訓練 與眾不同</h3>
                                        </div> -->
            <div class="right-content">

                <div class="faq">
                    <button><a href="{{ asset('OC40N02') }}">我要提問</a></button>
                    @include('components.faq-message')

                </div>
            </div>
        </div>

    </main>
@endsection
