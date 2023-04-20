
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log</title>
    <link rel="stylesheet" href="../../css/log.css">
</head>

<body>

    <main>
    <h1 class="topText"><img src="{{asset('imgs/logo-01.png')}}"></h1>
    
        <div class="log">

            <div class="left">
                <h1>Sign in</h1>
                <div class="txt">

                    <p>New user ? </p><a href="{{route('members.create')}}">Create an account</a>
                </div>
                               
                <form method="post" action="{{route('members.session.store')}}">
                   @csrf
                <div class='formgroup'>
                      <label class="input">
                          <p><input type="email" name="email" placeholder="Enter Email"
                          value="{{Session::get('verifiedEmail')?Session::get('verifiedEmail'):old('email')}}"
                          ></p>
                          <p class="text-danger">@error('email') {{$message}} @enderror</p>
                      </label>
                </div>
                <div class='formgroup'>
                    <label class="input">
                        <p><input type="password" name="password" placeholder="Enter Password" value="{{old('password')}}"></p>
                        <p class="text-danger">@error('password') {{$message}} @enderror</p>
                    </label>
                </div> 
                <div class="check">
                       <input type="checkbox"> Remember Me </br>
                       <a href="{{asset('forgot')}}">Forgot your password?</a>
                </div>
                <div>
                <button type="submit">
                       Submit
                </button>
                @if(Session::has('fail'))
                 <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <div class="baseline"></div>
                @if(Session::get('info'))
                    <div class="alert alert-info">{{Session::get('info')}}</div>
                    @else
                    <div class="admin-text">Are you a admin ? <a href="{{asset('admin')}}">Click here to login</a></div>

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



