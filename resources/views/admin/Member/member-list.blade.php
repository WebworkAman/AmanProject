@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_">
        <div class="Show_form member-list">
            <h3> 會 員 管 理 </h3>
            <a class="btn control-option" href="{{ route('members.adminCreate') }}">新增會員</a>
            <table>
                <thead>
                    <tr>
                        <th>會員姓名</th>
                        <th>會員信箱</th>
                        <th>問題權限</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>
                                <p>{{ $member->name }}</p>
                            </td>
                            <td>{{ $member->email }}</td>
                            <td><a href="{{ route('members.adminSetPermissions', $member->id) }}">設定權限</a></td>
                            <td>
                                <form method="POST" action="{{ route('members.destroy', $member->id) }}">
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
