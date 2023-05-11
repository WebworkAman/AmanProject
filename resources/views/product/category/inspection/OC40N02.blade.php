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
             
              <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                
                    <input type="hidden" name="product_id" value="1">
                    @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 