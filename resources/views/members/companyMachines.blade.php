@extends('layouts.content')

@section('content')

     <main>


     <div class="Show_form member-list">
                    <h3>採 購 機 器 資 料 </h3>
                
                      @if($member->identity_perm == 1 || $member->identity_perm == 2)
                      <a class="btn control-option" href="{{route('members.updateStatusView')}}">資料修改</a>
                      @else
                      @endif

                    <label for=""><span>公司名稱：</span>{{$crmMachines->installation_company_name?? '尚未建立公司資料'}}</label>
                     </br>
                     </br>
                    <label for=""><span>統一編號：</span>{{$crmMachines->company_tax_id?? '尚未建立公司資料'}}</label>
                    </br>
                      <table>
                              <thead>
                                  <tr>
                                      <th>購買日期</th>
                                      <th>機器安裝公司名稱</th>
                                      <th>機器型號</th>
                                      <th>序號</th>
                                      <th>國家</th>
                                      <th>地區</th>
                                      <th>城市</th>
                                      <th>購入來源</th>
                                      <th>使用狀況</th>
                                  </tr>
                              </thead>
                               <tbody>
                               @foreach ($crmMachines as $crmMachine)
                                    
                                        <tr>
                                            <td><p>{{ $crmMachine->machine_purchase_date}}</p></td>
                                            <td>{{ $crmMachine->email }}</td>
                                        
                                            <td>{{ $identityMap[$member->identity_perm] ?? '未知身份'}}</td>
                                            <td></td>
      
                                        </tr>
                                    
                                    @endforeach
                               </tbody>
                       </table>
                                                                
                       
                       
</div>



    </div>

        
    </main>


@endsection 