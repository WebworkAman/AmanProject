@extends('layouts.admin.content')

@section('content')
    <main>


        <div class="admin_block">
            @include('layouts.admin.control')


            <div id="show" class="Show_"></div>
            @if (session('success'))
                <div class="alert alert-success popup">
                    {{ session('success') }}
                </div>
            @endif
        </div>


    </main>
@endsection
