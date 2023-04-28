@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
            <h2>自動對邊驗布機 OC-5B/5K/5KB</h2>
            <h3>低配版</h3>
        </div>
        <div class="right-content">
              
        
             <div class="faq">
                  <button><a href="{{asset('OC-5B')}}">我 要 提 問</a></button>
                  
                  <div class="listblock">
                  <div class="topline"></div>
                  @foreach($faqs as $faq)
                  <ul>
                    <li>
                       <p class="faq-title"><span>Q.</span>{{"$faq->question"}}</p>
                       <p class="faq-content"><span>A.</span>{{"$faq->answer"}}</p>
                    </li>
                  </ul>
                  @endforeach
              </div>
              
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 