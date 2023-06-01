@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/M8S-600-2.png">
            <h2>智能自動裁剪機 M6S/M8S</h2>
            <h3>重型布料裁剪專家</h3>
        </div> -->
        <div class="right-content">
              
            <div class="faq">
                   <button><a href="{{asset('M6S')}}">我 要 提 問</a></button>

                    @include('components.faq-message')
              </div>
             
        </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 