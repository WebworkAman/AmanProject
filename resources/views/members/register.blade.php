 <html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<main>
<h1 class="topText"><img src="{{asset('imgs/logo-01.png')}}"></h1>

<div class="log">
<div class="right">
    <img src="../imgs/Illustration1.png">
</div>
<div class="left">
    <h1>創 建 售 後 會 員</h1>
    <div class="txt">

        <p>已經是會員?</p><a href="{{route('members.session.create')}}">  點 此 登 入 吧</a>
    </div>   
    <form
     method="post"
     action="{{ route('members.store') }}"
    >
       @csrf
    <div class="formgroup first-block ">
        <label class="input">
        <input type="text" placeholder="請 輸 入 名 稱" name=name value="{{old('name')}}">
        <br/>
        <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </label>
    </div>
    <div class="formgroup">
       <label class="input">
          <input type="email" name="email" placeholder="請 輸 入 電 子 郵 件" value="{{old('email')}}">
          <p class="text-danger">@error('email') {{$message}} @enderror</p>
       </label>
    </div>
    <div class="formgroup">
       <label class="input">       
          <input type="password" name="password" placeholder="請 輸 入 密 碼" value="{{old('password')}}">
          
          <p class="text-danger">@error('password') {{$message}} @enderror</p>
       </label>
    </div>
    <div class="formgroup">
       <label class="input">       
           <input type="password" name="password_confirmation" placeholder="再 次 輸 入 密 碼" value="{{old('password_confirmation')}}">
          <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
       </label>
    </div>
<div>
    <button type="submit">
         註 冊 提 交
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






</div>


</main>      

</body>
 
 </html>  
   

