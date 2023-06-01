@extends('layouts.content')

@section('content')
     


     <main>

        <h1>Customer Question & Answer</h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-800SDS-600.png">
            <h2>隧道式蒸氣整燙 OP-800SDS</h2>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')
              <form method="post" action="{{ route('OP-800SDS')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="24">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 