@extends('layouts.content')

@section('content')

     <main>


     <div class="Show_form Machines-list">
                    <h3>採 購 機 器 資 料 </h3>
                
                    @if($member->identity_perm == 2)
                      <a class="btn control-option" href="{{route('companyMachineAdd')}}">新增機器資料</a>
                    @else
                    @endif

                    <label for=""><span>公司名稱：</span>{{$crmMainCustInfo->company_name?? '尚未建立公司資料'}}</label>
                     </br>
                     </br>
                    <label for=""><span>統一編號：</span>{{$crmMainCustInfo->company_tax_id?? '尚未建立公司資料'}}</label>
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
                                            <td>{{ $crmMachine->machine_purchase_date??''}}</td>
                                            <td>{{ $crmMachine->installation_company_name??'' }}</td>
                                            <td>{{ $crmMachine->machine_model ?? ''}}</td>
                                            <td>{{ $crmMachine->machine_serial ?? ''}}</td>
                                            <td>{{ $crmMachine->installation_company_country ?? ''}}</td>
                                            <td>{{ $crmMachine->installation_company_region ?? ''}}</td>
                                            <td>{{ $crmMachine->installation_company_city ?? ''}}</td>
                                            <td>{{ $crmMachine->purchase_manufacturer ?? ''}}</td>
                                            <td>{{ $crmMachine->stat_info ?? ''}}</td>
                                        </tr>
                                    
                                    @endforeach
                               </tbody>
                       </table>
                                                                
                       
                       
</div>



    </div>

        
    </main>


@endsection 