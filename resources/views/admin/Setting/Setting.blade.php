@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_">
        <div class="Show_form setting-page">
            <h3>管 理 設 定</h3>

            <form method="POST" action="{{ route('settings.store') }}">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email_address">系統收信設定</label>


                    <input type="text" name="email_addresses" id="email_addresses" class="form-control"
                        placeholder="請輸入多個 Email 地址" value="{{ $emailAddresses ?? '' }}" required>
                    <span>(多個請用[,]逗號隔開)</span>

                    {{-- @foreach (explode(',', $emailAddresses) as $email)
                <p>{{ $email }}</p>
            @endforeach --}}
                </div>

                <button type="submit" class="btn btn-primary">儲存設定</button>

            </form>


            @stack('scripts')
        </div>
    </div>
@endsection
