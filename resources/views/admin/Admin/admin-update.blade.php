@extends('layouts.admin.content')

@section('content')
    <div class="Show_ reply">

        <div class="Show_form">

            <div class="nav">
                <h3> 修 改 管 理 者</h3>

                <a class="btn" href="{{ route('adminList') }}">返回列表</a>


            </div>

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
                        <form method="POST" action="{{ route('admin.updateStatus', ['id' => $admin->id]) }}">
                            @csrf
                            @method('PUT')
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
                                    <select name="identity_perm" onchange="checkPosition(this)">
                                        <option value="1" {{ $admin->identity_perm == 1 ? 'selected' : '' }}>
                                            售後
                                        </option>
                                        <option value="2" {{ $admin->identity_perm == 2 ? 'selected' : '' }}>
                                            技術
                                        </option>
                                        <option value="3" {{ $admin->identity_perm == 3 ? 'selected' : '' }}>
                                            客服
                                        </option>
                                        <option value="4" {{ $admin->identity_perm == 4 ? 'selected' : '' }}>
                                            無
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <p>{{ $admin->name }}</p>
                                </td>
                                <td>{{ $admin->email }}</td>

                                <td>
                                    <button type="submit">儲存</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>





            @if (session('success'))
                <div class="alert alert-success popup">
                    {{ session('success') }}
                </div>
            @endif


        </div>

    </div>



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
    <script>
        $(document).ready(function() {
            // 監聽職位和在職狀況選擇框的變化事件
            $('select[name="identity_perm"], select[name="stat_info"]').change(function() {
                // 獲取選擇的職位和在職狀況值
                var selectedIdentity = $('select[name="identity_perm"]').val();
                var selectedStatus = $('select[name="stat_info"]').val();

                // 如果在職狀況是 "在職" 且選擇的職位是 "廠長" 或 "採購"
                if (selectedStatus == 'y' && (selectedIdentity == 1 || selectedIdentity == 2)) {
                    // 計算在職狀況為 "在職" 且職位為 "廠長" 或 "採購"的數量
                    var countSameIdentity = $('select[name="identity_perm"]').filter(function() {
                        return $(this).val() == selectedIdentity;
                    }).length;

                    // 如果數量大於 1，顯示提示訊息
                    if (countSameIdentity > 1) {
                        alert('在職狀況為 "在職" 時，廠長或採購只能有一位');
                        // 重置選擇框為之前選擇的值
                        $(this).val($(this).data('previousValue'));
                        return false;
                    }
                }

                // 將當前選擇的值保存為上一次的值，以便下一次檢查
                $(this).data('previousValue', $(this).val());
            });
        });
    </script>
@endsection
