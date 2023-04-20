
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OshimaAdmin</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>
    <nav>
        <div class="left">
             <img src="{{asset('imgs/1596784261.jpeg')}}">
        </div>
        <div class="right">

              <form method="POST" action="{{route('session.delete')}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Log out</button>
              </form>
        </div>
     </nav>

    <main>
    
    
        <div class="admin_block">

            <div class="control_">
                <h3>控制台</h3>
                <div class="control_list">

                    <p>Q&A</p>
                </div>
        
            </div>

            <div class="Show_">
                <div class="Show_form">
                    <h3>Question & Answer</h3>
                    
                    <ul>
                        <li>
                            <ol>類型
                                <li>驗布</li>
                                <li>鬆布、縮水</li>
                                <li>拉布</li>
                                <li>裁剪</li>
                                <li>整燙定型</li>
                                <li>轉印</li>
                                <li>黏合</li>
                                <li>無縫黏合</li>
                                <li>摺衣</li>
                                <li>包裝</li>
                                <li>金屬、重量檢測</li>
                                <li>鍋爐</li>
                                <li>其他機械</li>
                                <li>主題系列</li>

                            </ol>
                        </li>
                        <li>
                            <ol>所有問題
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                            </ol>
                        </li>
                        <li>
                            <ol>已回答
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                            </ol>
                        </li>
                        <li>
                        <ol>未回答
                        <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                                <li><a href="">0</a></li>
                            </ol>
                        </li>
                    </ul>

                   
                </div>
                
                
            </div>
            
        </div>

   </main>
    
</body>    



