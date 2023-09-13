@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_">
        <div class="Show_form member-list">
            <h3> 使 用 者 列 表 </h3>
            <a class="btn control-option" href="{{ route('admin.create') }}">新增</a>
            <a class="btn control-option" href="{{ route('admin.Status') }}">修改</a>
            <table>
                <thead>
                    <tr>
                        <th>單位</th>
                        <th>姓名</th>
                        <th>信箱</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>
                                @php
                                    $identityrMap = [
                                        1 => '售後',
                                        2 => '技術',
                                        3 => '客服',
                                        4 => '無',
                                    ];
                                @endphp
                                <p>{{ $identityrMap[$admin->identity_perm] ?? '' }}</p>
                            </td>
                            <td>
                                <p>{{ $admin->name }}</p>
                            </td>
                            <td>{{ $admin->email }}</td>

                            <td>
                                <form method="POST" action="{{ route('admin.destroy', $admin->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @stack('scripts')
        </div>
    </div>
@endsection
