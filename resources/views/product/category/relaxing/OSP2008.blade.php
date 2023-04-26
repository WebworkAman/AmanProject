@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2008-600-3.png">
            <h2>蒸氣預縮 OSP-2008/2008L/2008W/2008WL</h2>
            <h3>中小型工廠 最愛</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.questionShow')

             <div class="baseline"></div>
             <h3>機器相關問題提交</h3>

              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="9">
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