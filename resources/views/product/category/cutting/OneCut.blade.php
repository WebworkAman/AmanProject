@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/ONECUT-1400S.png?v=1">
            <h2>低層自動裁剪機 OneCut</h2>
            <h3>皮革裁剪如此簡單</h3>
        </div> -->
        <div class="right-content">
              
              @include('layouts.question-message')
              <form method="post" action="{{ route('OneCut')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="15">
                    
              @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 