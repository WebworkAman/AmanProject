@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-450GS-600-4.png">
            <h2>小型開邊式粘合機 OP-450GS/520GS/450NS</h2>
            <h3>輕巧桌上型</h3>
        </div>
        <div class="right-content">
              
             <div class="faq">
                  <button><a href="{{asset('OP-450GS')}}">我 要 提 問</a></button>
                  @include('components.faq-message')
      
                  
            </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 