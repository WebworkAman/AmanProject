@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OS-5R-600.png">
            <h2>自動送料機 OS-5R/L、OS-6R/L</h2>
            <h3>轉印 貼標必備</h3>
        </div>
        <div class="right-content">
              
             <div class="message_border">
             @foreach($messages as $message)
             <div class="message">
             
              <p>標題：{{ $message->title }}</p>
              <p>內容：{{ $message->content }}</p>
              <p>日期：{{ $message->created_at }}</p>
             </div>
             @endforeach
             </div>
             <div class="baseline"></div>
             <h3>機器相關問題提交</h3>
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    
                    <p><label for="title">標題：</label></p>
                    <input type="title" name="title">
                    <p><label for="content">內文：</label></p>
                    <textarea id="content" name="content"  cols="30" rows="10"></textarea>
                    <p>
                        <input class='submit' type="submit" name="submit" value="Send">
                    </p>
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 