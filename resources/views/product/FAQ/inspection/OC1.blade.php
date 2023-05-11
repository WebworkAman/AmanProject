@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 常 見 問 題 </h1>
        <div class="QA_content">
          <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
            <h2>無對邊驗布機 OC-1</h2>
            <h3>經濟款</h3>
          </div>

            <div class="right-content">
              <div class="faq">
                   <button><a href="{{asset('OC-1')}}">我 要 提 問</a></button>

                    @include('components.faq-message')
              </div>
            </div>

       
        </div>
        

             
        
      </main>
@endsection 