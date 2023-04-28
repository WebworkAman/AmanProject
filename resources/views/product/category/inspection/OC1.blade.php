@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
            <h2>無對邊驗布機 OC-1</h2>
            <h3>經濟款</h3>
        </div>
        <div class="right-content">
              
             <div class="message_border">
             @foreach($questions as $question)
             <div class="message">
              <p>姓名：{{ $question->member->name}}</p>
              <p>標題：{{ $question->title }}</p>
              <p>內容：{{ $question->content }}</p>
              <p>日期：{{ $question->created_at }}</p>
              
             </div>
             @endforeach
             </div>
             <div class="baseline"></div>
             <h3>機器相關問題提交</h3>
             <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="2">
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