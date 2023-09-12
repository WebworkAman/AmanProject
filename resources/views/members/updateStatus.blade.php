@extends('layouts.content')

@section('content')
    <main>


        <div class="member_block">



            <div class="Show_">

                <div class="Show_form">
                    <div class="member-update">
                        <div class="nav">
                            <h3> 修 改 會 員 資 料</h3>

                            <a class="btn" href="{{ route('companyMemberList') }}">返回列表</a>

                            <label for=""><span>公司名稱：</span>{{ $crmMainCustInfo->company_name ?? '' }}</label>
                            </br>
                            </br>
                            <label for=""><span>統一編號：</span>{{ $crmMainCustInfo->company_tax_id ?? '' }}</label>
                            </br>

                        </div>

                        <div class="updateStatus">
                            <table>
                                <!-- CompanyMemberList.blade.php -->
                                <thead>
                                    <tr>
                                        <th>員工姓名</th>
                                        <th>員工信箱</th>
                                        <th>職位</th>
                                        <th>在職狀況</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        @if ($member->stat_info == 'y')
                                            <tr>
                                                <td>
                                                    <p>{{ $member->name }}</p>
                                                </td>
                                                <td>{{ $member->email }}</td>
                                                @php
                                                    $identityMap = [
                                                        1 => '採購',
                                                        2 => '廠長',
                                                        3 => '一般會員',
                                                    ];
                                                @endphp


                                                <form method="POST"
                                                    action="{{ route('members.updateStatus', ['id' => $member->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <td>
                                                        <select name="identity_perm" onchange="checkPosition(this)">
                                                            <option value="1"
                                                                {{ $member->identity_perm == 1 ? 'selected' : '' }}>採購
                                                            </option>
                                                            <option value="2"
                                                                {{ $member->identity_perm == 2 ? 'selected' : '' }}>廠長
                                                            </option>
                                                            <option value="3"
                                                                {{ $member->identity_perm == 3 ? 'selected' : '' }}>一般會員
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="stat_info" id="stat_info">
                                                            <option value="y"
                                                                {{ $member->stat_info == 'y' ? 'selected' : '' }}>在職
                                                            </option>
                                                            <option value="n"
                                                                {{ $member->stat_info == 'n' ? 'selected' : '' }}>離職
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td><button type="submit">儲存</button></td>
                                                </form>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>

                            <h5>已離職員工列表</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <th>員工姓名</th>
                                        <th>員工信箱</th>
                                        <th>職位</th>
                                        <th>在職狀況</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        @if ($member->stat_info == 'n')
                                            <tr>
                                                <td>
                                                    <p>{{ $member->name }}</p>
                                                </td>
                                                <td>{{ $member->email }}</td>
                                                <td>{{ $identityMap[$member->identity_perm] ?? '未知身份' }}</td>
                                                <td>離職</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>


                            <h5>註冊尚待驗證列表</h5>
                            <table>
                                <thead>
                                    <tr>
                                        <th>員工姓名</th>
                                        <th>員工信箱</th>
                                        <th>職位</th>
                                        <th>在職狀況</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        @if ($member->email_verified == 0)
                                            <tr>
                                                <td>
                                                    <p>{{ $member->name }}</p>
                                                </td>
                                                <td>{{ $member->email }}</td>
                                                <td>{{ $identityMap[$member->identity_perm] ?? '未知身份' }}</td>
                                                <td>{{ $member->stat_info ?? '未知' }}</td>
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('company.members.destroy', $member->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-button">刪除</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>


                    <span id="position-error">[ 在職狀況下，廠長和採購的身份只能各有一位 ]</span>

                    @if (session('success'))
                        <div class="alert alert-success popup">
                            {{ session('success') }}
                        </div>
                    @endif


                </div>

            </div>


        </div>

    </main>
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
