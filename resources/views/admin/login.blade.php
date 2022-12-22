<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log</title>
    <link rel="stylesheet" href="../../css/log.css">
</head>

<body class="admin">

    <main >
    <h1 class="topText"><img src="../../imgs/logo-01.png"></h1>
    
        <div class="log">

            <div class="left">
                <img src="../../imgs/Group5.png">
                
            </div>

            <div class="right">
            <h1>Admin Sign In</h1>
                <div class="txt">

                    <p>Member user ? </p><a href="{{route('members.session.create')}}">Click here to login</a>
                </div>
                               
                <form method="post" action="{{route('login')}}">
                   @csrf
                <div>
                      <label class="input">
                          <p><input type="email" name="email" placeholder="Email"></p>
                          <span class="text-danger">@error('email') {{$message}} @enderror</span>
                      </label>
                </div>
                <div>
                    <label class="input">
                        <p><input type="password" name="password" placeholder="Password"></p>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </label>
                </div> 
                <div class="check">
                       <input type="checkbox"> Remember Me </br>
                       <a href="/forgot">Forgot your password?</a>
                </div>
                <div>
                <button type="submit">
                       Submit
                </button>
                </div>
                @if(Session::has('fail'))
                 <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
               </form>
            </div>
            
        </div>

   </main>
    
</body>    