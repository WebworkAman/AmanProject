@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-114-600.png">
            <h2>無縫摺邊/包邊機 OP-114</h2>
            <h3>包邊首選</h3>
        </div> -->
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('OP-114')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 