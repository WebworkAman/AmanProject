@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-700A-600-2.png">
            <h2>帶狀裁剪機 OB-700A/900A/1200A</h2>
            <h3>手的延伸，超值</h3>
        </div>
        <div class="right-content">
              
              @include('layouts.question-message')
              <form method="post" action="{{ route('OB-700A')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="23">
                    
              @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 