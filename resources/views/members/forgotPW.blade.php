
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshima</title>
    <link rel="stylesheet" href="{{asset('css/log.css')}}">
</head>

<body class="UserLogin forgotPW" style="background-image: url('{{ asset('/imgs/photo/logbg.jpg') }}')">

    <main>
    <h1 class="topText"><img src="{{asset('imgs/photo/logo.png')}}"></h1>
        <div class="log forgot">

            <div class="left">
            <h2>忘記密碼？</h2>
            <div class="baseline"></div>
            <p >沒問題！只需告訴我們您的電子郵件地址，我們將通過電子郵件向您發送一個密碼重置連結，您可以通過該連結重置密碼</p>
                               
                <form method="post" action="{{route('forgot-password')}}">
                   @csrf
                <div>
                      <label class="input">
                          <p><input type="email" name="email" placeholder="請輸入電子信箱"
                              value="{{old('email')}}"
                          ></p>
                          <br/>
                          <span class="text-danger" style="color:#f5c8c8;">@error('email') {{$message}} @enderror</span>
                      </label>
                </div>
                
                <div>
                <div class="button-style">
                    <button type="submit">
                       提 交
                    </button>
                </div>
                </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
               </form>
            </div>

            <div class="right">
                <img src="{{asset('imgs/Illustration.png')}}">
            </div>
            
        </div>

   </main>
    
</body>    



