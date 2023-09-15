<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oshima CRM 後台管理系統</title>
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
</head>

<body class="admin">

    <main>
        <h1 class="topText"><img src="{{ asset('imgs/logo-01.png') }}"></h1>

        <div class="log">

            <div class="left">
                <img src="{{ asset('imgs/Group5.png') }}">

            </div>

            <div class="right">
                <h1> 管 理 者 登 入 </h1>
                <!-- <div class="txt">

                    <p> 不 是 管 理 者 ? </p><a href="{{ route('members.session.create') }}"> 回 到 會 員 登 入 </a>
                </div> -->

                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="formgroup">
                        <label class="input">
                            <p><input type="email" name="email" placeholder="請 輸 入 管 理 者 帳 號" required></p>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>
                    <div class="formgroup">
                        <label class="input">
                            <p><input type="password" name="password" placeholder="請 輸 入 管 理 者 密 碼" required></p>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>
                    <div class="check">
                        <input type="checkbox"> 記 住 我 </br>
                        <a href="{{ asset('forgot') }}">忘 記 密 碼？</a>
                    </div>
                    <div>
                        <button type="submit">
                            登 入
                        </button>
                    </div>
                    @if (Session::has('fail'))
                        <div class="alert alert-dange">{{ Session::get('fail') }}</div>
                    @endif
                </form>

            </div>

        </div>

    </main>

</body>
