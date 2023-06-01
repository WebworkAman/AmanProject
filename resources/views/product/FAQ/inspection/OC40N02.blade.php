@extends('layouts.content')

@section('content')
     
     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1646990118.png">
            <h2>人工智慧驗布機 OSHIMA EagleAi/Plus/Pro</h2>
            <h3>縮短AI訓練 與眾不同</h3>
        </div> -->
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{asset('OC40N02')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>    
        </div>    
        </div>
    
    </main>
@endsection 