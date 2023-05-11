@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="./imgs/photo/OC-5KB-600-2.png">
            <h2>自動對邊驗布機 OC-5B/5K/5KB</h2>
            <h3>低配版</h3>
        </div>
        <div class="right-content">
              
           @include('layouts.question-message')
           
             <div class="baseline"></div>
             <h3>機器相關問題提交</h3>
             <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="3">
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