@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="./imgs/photo/OC-83-600-6.png">
            <h2>自動對邊驗布機 OC-83</h2>
            <h3>新一代的選擇</h3>
        </div> -->
        <div class="right-content">
             
             @include('layouts.question-message')
             
             <form method="post" action="{{ route('OC-83')}}" enctype="multipart/form-data">
                    
                    <input type="hidden" name="product_id" value="4">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 