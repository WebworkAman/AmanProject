
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OshimaAdmin</title>
    <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>
    <nav>
        <div class="left">
             <img src="../../imgs/1596784261.jpeg">
        </div>
        <div class="right">
              <a href="">Log out</a>
        </div>
     </nav>

    <main>
    
    
        <div class="admin_block">

            <div class="control_">
                <h3>控制台</h3>
                <div class="control_list">

                    <a href="#">常見問題區管理</a>
                </div>
        
            </div>

            <div class="Show_ edit">
                <div class="Show_form">
                    <div class="question_edit">
                    <div class="nav">
                          <h3>新增常見問題</h3>
                    </div>
                    
                <div class="ans">
                    <form method="POST" action="{{ route('faqs.store') }}">
                         @csrf
                         <div class="form-group">
                             <label for="product_id">請選族產品ID</label>
                             <select name="product_id" id="product_id" class="form-control">
                                  @for ($i = 1; $i <= 10; $i++)
                             <option value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="question">問題</label>
                            <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="answer">回覆</label>
                            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                    </form>
                    </div>
                    
                </div>
                    

                   
                </div>
                
                
            </div>
            
        </div>

   </main>
    
</body>    



