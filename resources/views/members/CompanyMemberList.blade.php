@extends('layouts.content')

@section('content')

     <main>


     <div class="Show_form member-list">
                    <h3>公 司 會 員 管 理 </h3>
                
                      @if($member->identity_perm == 1 || $member->identity_perm == 2)
                      <a class="btn control-option" href="{{route('members.updateStatusView')}}">資料修改</a>
                      @else
                      @endif

                    <label for=""><span>公司名稱：</span>{{$crmMainCustInfo->company_name}}</label>
                     </br>
                     </br>
                    <label for=""><span>統一編號：</span>{{$crmMainCustInfo->company_tax_id}}</label>
                    </br>
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
                                    @if ($member->stat_info == 'y')
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
                                            <td>{{ $identityMap[$member->identity_perm] ?? '未知身份'}}</td>
                                            <td>{{ $member->stat_info ?? '未知'}}</td>
      
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
                                    <td><p>{{ $member->name }}</p></td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $identityMap[$member->identity_perm] ?? '未知身份' }}</td>
                                    <td>{{ $member->stat_info ?? '未知' }}</td>
                                </tr>
                                @endif
                                @endforeach
                               </tbody>
                       </table>
                       
                       
                       
</div>



    </div>

        
    </main>


@endsection 