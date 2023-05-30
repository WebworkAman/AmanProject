@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1597635338.png">
            <h2>電剪裁剪機 A-100U(DS)/100H</h2>
            <h3>手的延伸，超值</h3>
        </div>
        <div class="right-content">
              
           @include('layouts.question-message')
           

           
              <form method="post" action="{{ route('A-100U')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="21">
                    
              @include('layouts.question-post')
              </form>
            </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 