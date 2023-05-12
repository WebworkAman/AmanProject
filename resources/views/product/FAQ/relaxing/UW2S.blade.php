@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2S-600.png">
            <h2>蒸氣鬆布機 UW-2S/2LS/2MS</h2>
            <h3>想快，選它</h3>
        </div>
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('UW-2S')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>  
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 