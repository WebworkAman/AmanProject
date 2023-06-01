@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-800SDS-600.png">
            <h2>隧道式蒸氣整燙 OP-800SDS</h2>
        </div> -->
        <div class="right-content">
              
        <div class="faq">

             <button><a href="{{asset('OP-800SDS')}}">我 要 提 問</a></button>
                  
            @include('components.faq-message')
             
        </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 