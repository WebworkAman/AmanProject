@extends('layouts.admin.content')

@section('content')

    <main>
    
    
        <div class="admin_block">

        @include('layouts.admin.control')

            <div class="Show_ reply">
                <div class="Show_form">
                    <div class="question_reply">
                    <div class="nav">
                          <h3>新增常見問題</h3>

                          <a class="btn" href="{{ asset('admin/index') }}">返回列表</a>
                    </div>
                    
                <div class="ans">
                    <form method="POST" action="{{ route('faqs.store') }}">
                         @csrf
                         <div class="form-group">
                             <label for="product_id">請選擇產品</label>
                             <select name="product_id" id="product_id" class="form-control">
                                  @foreach ($products as $product)
                             <option value="{{ $product -> id }}">{{ $product ->title }}</option>
                                  @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="question">問題 :</label>
                            <textarea name="question" id="question" class="form-control" required>{{ old('question') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="answer">回答 :</label>
                            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                            <button type="submit" class="btn btn-primary">新增</button>

                            </div>
                        </div>
                    </form>
                    </div>
                    
                </div>
                    

                   
                </div>
                
                
            </div>
            </div>
        </div>

   </main>
    
   @endsection 



