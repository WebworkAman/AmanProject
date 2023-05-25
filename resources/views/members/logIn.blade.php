
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log</title>
    <link rel="stylesheet" href="{{asset('css/log.css')}}">
</head>

<body class="UserLogin" style="background-image: url('{{ asset('/imgs/photo/logbg.jpg') }}')">

    <main>
    <h1 class="topText"><img src="{{asset('imgs/photo/logo.png')}}"></h1>
    
        <div class="log">
            <h1>登 入</h1>
            <div class="left">
                
                <!-- <div class="txt">

                    <p>新用戶? </p><a href="{{route('members.create')}}"> 註 冊 </a>
                </div> -->
                               
                <form method="post" action="{{route('members.session.store')}}">
                   @csrf
                <div class='formgroup'>
                      <label class="input">
                          <p>請輸入帳號</p>
                          <p><input type="email" name="email" placeholder=""
                          value="{{Session::get('verifiedEmail')?Session::get('verifiedEmail'):old('email')}}"
                          ></p>
                          <p class="text-danger">@error('email') {{$message}} @enderror</p>
                      </label>
                </div>
                <div class='formgroup'>
                    <label class="input">
                        <p>請輸入密碼</p>
                        <p><input type="password" name="password" placeholder="" value="{{old('password')}}"></p>
                        <p class="text-danger">@error('password') {{$message}} @enderror</p>
                    </label>
                </div> 

                <div>
                <div class="button-style">
                    <button type="submit">
                       登 入
                    </button>
                </div>


                <div class="check">
                       <label> <input type="checkbox"> 保 持 登 入</label>
                       
                       <span>忘 記 密 碼？<a href="{{asset('forgot')}}"> 協 助 </a></span>                     
                       
                       
                </div>
                @if(Session::has('fail'))
                 <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <!-- <div class="baseline"></div> -->
                @if(Session::get('info'))
                    <div class="alert alert-info">{{Session::get('info')}}</div>
                    @else
                    <!-- <div class="admin-text"> 管 理 者 ? <a href="{{asset('admin')}}"> 請 點 此 進 入</a></div> -->

                    @endif
                </div>

                    
               </form>
            </div>

            <div class="right">
                <img src="{{asset('imgs/Illustration.png')}}">
            </div>
            
        </div>

   </main>
    
</body>    



