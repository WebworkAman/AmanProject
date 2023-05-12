@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/M190G-600-3.png">
            <h2>自動升降抓匹布 M190G</h2>
            <h3>機械手臂來幫你</h3>
        </div>
        <div class="right-content">
              
                   @include('layouts.question-message')

              <form method="post" action="{{ route('M190G')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="10">
                    
                    @include('layouts.question-post')
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 