@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1646990118.png">
        </div>
        <div class="right-content">
              
            @foreach($messages as $message)
             <div class="message">
            
              <p>標題：{{ $message->title }}</p>
              <p>內容：{{ $message->content }}</p>
              <p>日期：{{ $message->created_at }}</p>
             </div>
             @endforeach
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    @csrf
                    <p><label for="title">標題：</label></p>
                    <input type="title" name="title">
                    <p><label for="content">內文：</label></p>
                    <textarea id="content" name="content"  cols="30" rows="10"></textarea>
                    <p>
                        <input type="submit" name="submit" value="Send">
                    </p>
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 