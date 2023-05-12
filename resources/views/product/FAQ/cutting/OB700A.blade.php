@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-700A-600-2.png">
            <h2>帶狀裁剪機 OB-700A/900A/1200A</h2>
            <h3>手的延伸，超值</h3>
        </div>
        <div class="right-content">
              
               <div class="faq">
                   <button><a href="{{asset('OB-700A')}}">我 要 提 問</a></button>

                    @include('components.faq-message')
              </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 