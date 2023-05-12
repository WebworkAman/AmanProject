@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2008-600-3.png">
            <h2>蒸氣預縮 OSP-2008/2008L/2008W/2008WL</h2>
            <h3>中小型工廠 最愛</h3>
        </div>
        <div class="right-content">
             <div class="faq">
             <button><a href="{{route('OSP-2008')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div> 
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 