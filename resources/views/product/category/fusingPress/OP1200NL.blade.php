@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-1800NL-600.png">
            <h2>大型連續式粘合機 OP-1200NL/1600NL/1800NL</h2>
            <h3>高端成衣業首選</h3>
        </div>
        <div class="right-content">
              
           @include('layouts.question-message')
           
           <form method="post" action="{{ route('OP-1200NL')}}" enctype="multipart/form-data">
                  <input type="hidden" name="product_id" value="31">
                  @include('layouts.question-post')
            </form>
            </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 