
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshima</title>
    <link rel="stylesheet" href="../../css/log.css">
</head>

<body>

    <main>
    <h1 class="topText">Oshima QA</h1>
        <div class="log">

            <div class="left">
                
                <div class="txtt">

                    <p>Forgot your password?</p>
                    <p>No problem.Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</p>
                </div>
                               
                <form method="post" action="{{route('members.session.store')}}">
                   @csrf
                <div>
                      <label class="input">
                          <p><input type="email" name="email" placeholder="Email"></p>
                      </label>
                </div>
                
                <div>
                <button type="submit">
                       Email Password Reset 
                </button>
                </div>
               </form>
            </div>

            <div class="right">
                <img src="../../imgs/Illustration.png">
            </div>
            
        </div>

   </main>
    
</body>    



