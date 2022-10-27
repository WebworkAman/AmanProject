@extends('layouts.app')

@section('content')

<h1>Member Register</h1>
<form
     method="post"
     action="{{ route('members.store') }}"
>
@csrf
<div>
    <label>
        Email:
        <p><input type="email" name="email"></p>
    </label>
</div>
<div>
    <label>
        PASSWORD
        <p><input type="password" name="password"></p>
    </label>
</div>
<div>
    <label>
        PASSWORD confirmation
        <p><input type="password" name="password_confirmation"></p>
    </label>
</div>
<div>
    <button type="submit">
         Submit
    </button>
</div>
</form>
@endsection