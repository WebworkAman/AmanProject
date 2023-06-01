@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-15A-4600.png">
            <h2>商標轉印機 OP-15A/15AII</h2>
            <h3>商標 單雙工位任選</h3>
        </div> -->
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('OP-15A')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>  
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 