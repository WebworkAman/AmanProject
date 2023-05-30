@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/TAC-175-600-2.png">
            <h2>自動裁剪機 TAC</h2>
            <h3>超優，超值</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')
             <form method="post" action="{{ route('TAC')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="18">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 