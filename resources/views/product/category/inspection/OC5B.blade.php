@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="./imgs/photo/OC-5KB-600-2.png">
            <h2>自動對邊驗布機 OC-5B/5K/5KB</h2>
            <h3>低配版</h3>
        </div> -->
        <div class="right-content">
              
           @include('layouts.question-message')
           
             <form method="post" action="{{ route('OC-5B')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="3">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 