@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-302-600.png">
            <h2>口袋折燙機 OP-302/303</h2>
        </div>
        <div class="right-content">
              
        <div class="faq">

             <button><a href="{{asset('OP-302')}}">我 要 提 問</a></button>
                  
            @include('components.faq-message')
             
        </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 