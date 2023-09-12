@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_">
        <div class="Show_form member-list">
            <h3> 管 理 員 列 表 </h3>
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
            <script>
                // 選取所有的刪除按鈕
                var deleteButtons = document.querySelectorAll('.delete-button');

                // 對每個刪除按鈕添加點擊事件處理程序
                deleteButtons.forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        // 彈出確認視窗，讓使用者確定是否刪除
                        var shouldDelete = confirm('確定要刪除這個項目嗎？');

                        // 如果使用者點擊確認，則提交表單；否則取消
                        if (!shouldDelete) {
                            event.preventDefault();
                        }
                    });
                });
            </script>
            @stack('scripts')
        </div>
    </div>
@endsection
