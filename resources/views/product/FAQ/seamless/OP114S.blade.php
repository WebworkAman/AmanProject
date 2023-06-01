@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-114S-600-2.png">
            <h2>摺邊封膠包邊多功能機 OP-114S</h2>
            <h3>用於曲線加工</h3>
        </div> -->
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('OP-114S')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 