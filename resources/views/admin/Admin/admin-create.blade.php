@extends('layouts.admin.content')

@section('content')
    <div class="Show_ reply">

        <div class="Show_form">
            <div class="member-create">
                <div class="nav">
                    <h3> 新 增 管 理 者 </h3>

                    <a class="btn" href="{{ route('adminList') }}">返回列表</a>
                </div>

                <div class="create-member">


                    <form method="post" action="{{ route('admin.store') }}">

                        @csrf

                        <div class="formgroup selectType">
                            <select name="identity_perm" id="identity_perm">
                                <option value="1">售後</option>
                                <option value="2">技術</option>
                                <option value="3">客服</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="input">
                                <input type="text" placeholder=" 輸 入 管 理 者 名 稱" name=name value="{{ old('name') }}">
                                <br />
                                <p class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="input">
                                <input type="email" name="email" placeholder="輸 入 電 子 郵 件" value="{{ old('email') }}">
                                <p class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="input">
                                <input type="password" name="password" placeholder="輸 入 密 碼" value="{{ old('password') }}"
                                    autocomplete="current-password">

                                <p class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </label>

                            <div class="form-group">
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit">
                                        新 增
                                    </button>
                                </div>
                            </div>

                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                    </form>
                </div>
            </div>





        </div>

    </div>
@endsection
