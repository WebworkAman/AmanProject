@extends('layouts.content')

@section('content')
     


     <main>

     @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-5881-600.png">
            <h2>襯衫領型定型機 OP-5881/5882</h2>
        </div> -->
        <div class="right-content">
              
             <button><a href="{{asset('OP-5881')}}">我 要 提 問</a></button>
                  
             @include('components.faq-message')
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 