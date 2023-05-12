@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/J3-600-6.png">
            <h2>平織拉布機 J3</h2>
            <h3>貼心的大力士，厚重布料的英雄</h3>
        </div>
        <div class="right-content">
              
              @include('layouts.question-message')
              <form method="post" action="{{ route('J3')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="11">
                    @include('layouts.question-post')
              </form>
             
        </div>     
        </div>

    </main>
@endsection 