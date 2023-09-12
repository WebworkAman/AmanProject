@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_"></div>
    @if (session('success'))
        <div class="alert alert-success popup">
            {{ session('success') }}
        </div>
    @endif
@endsection
