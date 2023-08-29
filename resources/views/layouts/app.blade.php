<html>

<head>
    <title>OSHIMA CRM 客服關係管理系統</title>
    @include('layouts.meta')
    @include('layouts.css')
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    @include('layouts.nav')



    @if (MemberAuth::isLoggedIn())
        <p>Hi,{{ MemberAuth::member()->email }}</p>
        <form method="POST" action="{{ route('members.session.delete') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Log out</button>
        </form>
    @else
        <div class="text"><a href="{{ route('members.session.create') }}">Log in</a></div>
        <div class="text"><a href="{{ route('members.create') }}">Register</a></div>
    @endif

    <hr />



    <div class="container">
        @yield('content')
    </div>
    @include('layouts.footer')
    @include('layouts.js')

    @section('inline_js')

    @show
</body>

</html>
