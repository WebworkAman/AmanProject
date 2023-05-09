
@extends('layouts.admin.content')

@section('content')

    <main>
    
    
        <div class="admin_block">

        @include('layouts.admin.control')

            <div class="Show_ reply">
                <div class="Show_form">
                    <div class="question_reply">
                    <div class="nav">
                          <h3>提交客戶問題回覆</h3>

                          <a class="btn" href="{{ asset('admin/index') }}">返回列表</a>
                    </div>
                    
                <div class="ans reply">
                     <div class="question-block">
                           <div class="form-group">
                                 <ul>
                                    <li>用戶 : <span class="user-content">{{ $question->member->name }}</span></li>
                                    <li>
                                        問題標題 : <span class="user-content">{{ $question->title }}</span>
                                    
                                    </li>
                                    
                                    <li>
                                        
                                        問題內容：<span class="user-content">{{ $question->content }}</span>
                                        
                                
                                        
        
                                        
                                        
                                    </li>
                                 </ul>
                        </div>
                     </div>
                     <div class="baseline"></div>
                    <form method="POST" action="{{ route('faqs.store') }}">
                         @csrf
                         
                        <div class="form-group">
                            <label for="answer">回答 :</label>
                            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                            <button type="submit" class="btn btn-primary">提交</button>

                            </div>
                        </div>
                    </form>
                    </div>
                    
                </div>
                    

                   
                </div>
                
                
            </div>
            
        </div>

   </main>
    
   @endsection 



