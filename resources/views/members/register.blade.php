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
<h1 class="topText"><img src="../../imgs/logo-01.png"></h1>

<div class="log">
<div class="right">
    <img src="../imgs/Illustration1.png">
</div>
<div class="left">
    <h1>Create An Account</h1>
    <div class="txt">

        <p>Already an user?</p><a href="{{route('members.session.create')}}">Login an account</a>
    </div>   
    <form
     method="post"
     action="{{ route('members.store') }}"
    >
       @csrf
    <div class="first-block">
        <label class="input">
        <input type="text" placeholder="Enter Full Name" name=name value="{{old('name')}}">
        <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </label>
    </div>
    <div>
       <label class="input">
          <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
          
          <p class="text-danger">@error('email') {{$message}} @enderror</p>
       </label>
    </div>
    <div>
       <label class="input">       
          <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
          <br/>
          <p class="text-danger">@error('password') {{$message}} @enderror</p>
       </label>
    </div>
    <div>
       <label class="input">       
           <input type="password" name="password_confirmation" placeholder="Repeat-Password" value="{{old('password_confirmation')}}">
           <br/>
          <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>

       </label>
    </div>
<div class="check">
        <input type="checkbox"> Keep me signed in
    </div>
<div>
    <button type="submit">
         Submit
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
   

