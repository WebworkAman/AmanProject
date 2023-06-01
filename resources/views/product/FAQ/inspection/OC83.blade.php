@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-83-600-6.png">
            <h2>自動對邊驗布機 OC-83</h2>
            <h3>新一代的選擇</h3>
        </div> -->
        <div class="right-content">
              
        <div class="faq">

             <button><a href="{{asset('OC-83')}}">我 要 提 問</a></button>
                  
            @include('components.faq-message')
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 