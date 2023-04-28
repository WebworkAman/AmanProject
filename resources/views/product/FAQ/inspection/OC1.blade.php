@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 常 見 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
            <h2>無對邊驗布機 OC-1</h2>
            <h3>經濟款</h3>
        </div>
        <div class="right-content">
              
        <button><a href="{{asset('OC-1')}}">我 要 提 問</a></button>
             @foreach($faqs as $faq)
             <div class="faq">
                  
                  
                  <div class="listblock">
                  <div class="topline"></div>
                  <ul>
                    <li>
                       <p class="faq-title"><span>Q.</span>{{"$faq->question"}}</p>
                       <p class="faq-content"><span>A.</span>{{"$faq->answer"}}</p>
                    </li>
                  </ul>
              </div>
              @endforeach
        </div>

       
        </div>
        

             
        
    </main>
@endsection 