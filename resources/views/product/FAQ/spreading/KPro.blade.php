@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/KPro-600.png">
            <h2>智能全能拉布機 KPro</h2>
            <h3>Pro，如其名</h3>
        </div>
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('KPro')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 