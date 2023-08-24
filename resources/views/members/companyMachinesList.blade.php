@extends('layouts.content')

@section('content')
    <main>


        <div class="Show_form Machines-list">
            <h3>採 購 機 器 資 料 </h3>

            @if ($member->identity_perm == 1)
                <a class="btn control-option" href="{{ route('companyMachineAdd') }}">新增機器資料</a>
            @else
            @endif

            <label for=""><span>公司名稱：</span>{{ $crmMainCustInfo->company_name ?? '尚未建立公司資料' }}</label>
            </br>
            </br>
            <label for=""><span>統一編號：</span>{{ $crmMainCustInfo->company_tax_id ?? '尚未建立公司資料' }}</label>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crmMachines as $crmMachine)
                        <tr>
                            <td>{{ $crmMachine->machine_purchase_date ?? '' }}</td>
                            <td>{{ $crmMachine->installation_company_name ?? '' }}</td>
                            <td>{{ $crmMachine->machine_model ?? '' }}</td>
                            <td>{{ $crmMachine->machine_serial ?? '' }}</td>
                            <td>{{ $crmMachine->installation_company_country ?? '' }}</td>
                            <td>{{ $crmMachine->installation_company_region ?? '' }}</td>
                            <td>{{ $crmMachine->installation_company_city ?? '' }}</td>
                            @if ($crmMachine->purchase_manufacturer == 4)
                                <td>其他:{{ $crmMachine->other_purchase_source }}</td>
                            @else
                                @php
                                    $manufacturerMap = [
                                        1 => '台灣歐西馬股份有限公司',
                                        2 => '速飛得(中國)',
                                        3 => '廣州貴鵬',
                                        4 => '其他管道',
                                    ];
                                @endphp
                                <td>{{ $manufacturerMap[$crmMachine->purchase_manufacturer] ?? '未知身份' }}</td>
                            @endif

                            @if ($crmMachine->stat_info == 'y')
                                <td>使用中</td>
                            @elseif($crmMachine->stat_info == 'n')
                                <td>停用</td>
                            @else
                                <td></td>
                            @endif
                            <td><a href="{{ route('companyMachineData', $crmMachine) }}">檢視</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        </div>


    </main>
@endsection
