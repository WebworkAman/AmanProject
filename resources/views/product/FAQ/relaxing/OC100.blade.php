@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 常 見 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-100-600-2.png">
            <h2>蒸氣預縮 OC-100/100L</h2>
            <h3>初代</h3>
        </div>
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('OC-100')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 