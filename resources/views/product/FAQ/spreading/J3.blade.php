@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 常 見 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/J3-600-6.png">
            <h2>平織拉布機 J3</h2>
            <h3>貼心的大力士，厚重布料的英雄</h3>
        </div>
        <div class="right-content">
              
             <div class="faq">
             <button><a href="{{route('J3')}}">我 要 提 問</a></button>
                 @include('components.faq-message')
              
             </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 