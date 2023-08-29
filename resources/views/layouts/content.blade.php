<html>

<head>
    <title>OSHIMA CRM 客服關係管理系統</title>
    @include('layouts.meta')
    @include('layouts.css')

</head>

<body>

    @include('layouts.nav')
    <div id="app"></div>
    <div class="container">

        @yield('content')

    </div>
    @include('layouts.footer')

    @section('inline_js')

    @show

    @include('layouts.js')
</body>

</html>
