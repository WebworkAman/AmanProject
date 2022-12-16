
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshima</title>
    <link rel="stylesheet" href="../../css/log.css">
</head>

<body>

    <main>
    <h1 class="topText"><img src="../../imgs/logo-01.png"></h1>
        <div class="log forgot">

            <div class="left">
            <h1>Forgot your password?</h1>
            <div class="baseline"></div>
            <p>No problem.Just let us know your email address and we will email you a password reset link that will allow you to reset</p>
                               
                <form method="post" action="{{route('forgot-password')}}">
                   @csrf
                <div>
                      <label class="input">
                          <p><input type="email" name="email" placeholder="Enter Email"
                              value="{{old('email')}}"
                          ></p>
                          <br/>
                          <span class="text-danger" style="color:#f5c8c8;">@error('email') {{$message}} @enderror</span>
                      </label>
                </div>
                
                <div>
                <button type="submit">
                       Send Reset Password Link
                </button>
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
                <img src="../../imgs/Illustration.png">
            </div>
            
        </div>

   </main>
    
</body>    



