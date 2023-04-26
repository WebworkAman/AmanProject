@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2-600-3.png">
            <h2>無蒸氣鬆布機 UW-2/2L/2M</h2>
            <h3>要慢，就等</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.questionShow')
             
             <div class="baseline"></div>
             <h3>機器相關問題提交</h3>
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="5">
                    <p><label for="title">標題：</label></p>
                    <input type="text" name="title">
                    <p><label for="content">問題詳情：</label></p>
                    <textarea id="content" name="content"  cols="30" rows="10"></textarea>
                    <input type="file" name="photo">
                    <p>
                        <input class='submit' type="submit" name="submit" value="Send">
                    </p>
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 