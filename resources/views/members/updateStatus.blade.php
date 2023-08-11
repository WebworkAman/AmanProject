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
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td><p>{{ $member->name }}</p></td>
                                <td>{{ $member->email }}</td>
                                @php
                                                $identityMap = [
                                                    1 => '採購',
                                                    2 => '廠長',
                                                    3 => '一般會員',
                                                ];
                                @endphp
                                
                                
                                    <form method="POST" action="{{ route('members.updateStatus', ['id' => $member->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                        <select name="identity_perm" onchange="checkPosition(this)">
                                            <option value="1" {{ $member->identity_perm == 1 ? 'selected' : '' }}>採購</option>
                                            <option value="2" {{ $member->identity_perm == 2 ? 'selected' : '' }}>廠長</option>
                                            <option value="3" {{ $member->identity_perm == 3 ? 'selected' : '' }}>一般會員</option>
                                        </select>
                                        </td>
                                        <td>
                                        <select name="stat_info" id="stat_info">
                                            <option value="y" {{ $member->stat_info == 'y' ? 'selected' : '' }}>在職</option>
                                            <option value="n" {{ $member->stat_info == 'n' ? 'selected' : '' }}>離職</option>
                                        </select>
                                        <button type="submit">儲存</button>
                                        </td>
                                    </form>
                                
                            </tr>
                        @endforeach
                        </tbody>

                        </table>
                 
                           
                   </div>
                </div>  

                    
                <span id="position-error">[ 在職狀況下，廠長和採購的身份只能各有一位 ]</span>
                   
                     
            </div>

        </div>

    </div>

   </main>
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

   