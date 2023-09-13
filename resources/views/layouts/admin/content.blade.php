<!DOCTYPE html>
<html>

<head>
    <title>OSHIMA-CRM後台管理系統</title>
    @include('layouts.meta')
    @include('layouts.admin.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    @include('layouts.admin.nav')
    <div class="container">
        <main>


            <div class="admin_block">
                {{-- <div class="admin_block"> --}}
                @include('layouts.admin.control')
                {{-- @livewire('contropanel') --}}

                {{-- @livewire('admin-content-component', ['subblockContent' => $subblockContent, 'page' => $page]) --}}

                @yield('content')

                @if (session('success'))
                    <div class="alert alert-success popup">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- </div> --}}
            </div>


        </main>

    </div>



@show

<!-- @show -->
@include('layouts.admin.js')
@push('scripts')
<script>
    function truncatedText(elementId, maxLength) {
        var element = document.getElementById(elementId);
        var text = element.innerHTML;
        if (text.length > maxLength) {
            element.innerHTML = text.substring(0, maxLength) + "<span style='color: red;'>...</span>";
        }
    }

    truncatedText("truncated-text", 10);
</script>
@endpush

</body>

</html>
