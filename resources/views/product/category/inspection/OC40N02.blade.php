@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1646990118.png">
            <h2>人工智慧驗布機 OSHIMA EagleAi/Plus/Pro</h2>
            <h3>縮短AI訓練 與眾不同</h3>
        </div>
        <div class="right-content">
              
             <div class="message_border">
             
             @foreach($questions as $question)
             <div class="message">
              
              <p>標題：{{ $question->title }}</p>
              <p>內容：{{ $question->content }}</p>
              <p>日期：{{ $question->created_at }}</p>
              <p>姓名：{{ $question->photo}}</p>
             </div>
             @endforeach
             </div>
             <div class="baseline"></div>
             
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="1">
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