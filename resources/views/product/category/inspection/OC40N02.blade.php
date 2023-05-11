@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1646990118.png">
            <h2>人工智慧驗布機 OSHIMA EagleAi/Plus/Pro</h2>
            <h3>縮短AI訓練 與眾不同</h3>
        </div>
        <div class="right-content">
              
            @include('layouts.question-message')
            
             <div class="baseline"></div>
             
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="1">
                    <p><label for="title">標題：</label></p>
                    <input type="text" name="title">
                    <p><label for="content">問題詳情：</label></p>
                    <textarea id="content" name="content"  cols="30" rows="10"></textarea>
                    <p><label for="content">附加檔案：</label></p>
                    <input type="file" name="photo">
                    <p>
                        <input class='submit' type="submit" name="submit" value="提 交">
                    </p>
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 