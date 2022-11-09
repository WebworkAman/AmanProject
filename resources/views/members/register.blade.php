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
<h1 class="topText">Member Register</h1>

<div class="log">

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
    <div>
       <label class="input">
          <p><input type="email" name="email" placeholder="Email"></p>
       </label>
    </div>
    <div>
       <label class="input">       
          <p><input type="password" name="password" placeholder="Password"></p>
       </label>
    </div>
<div>
    <label class="input">       
        <p><input type="password" name="password_confirmation" placeholder="Repeat-Password"></p>
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
</form>
</div>

<div class="right">
    <img src="../imgs/Illustration.png">
</div>




</div>


</main>      

</body>
 
 </html>  
   

