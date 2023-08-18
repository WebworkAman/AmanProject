@extends('layouts.content')

@section('content')

     <main>

    <div class="memberBasicDate">
    
    
    <div class="baseArea">

        <h3>基本資料</h3>

         <div class="formgroup">
             <label for="name">姓名 :</label>
             <p>{{$member->name}} </p> 
         </div>

         <div class="formgroup">
            <label class="input">電子郵件 :</label>
            <p>{{$member->email}} </p>
       
         </div>
        @php
        $identityMap = [
            1 => '採購',
            2 => '廠長',
            3 => '一般會員',
        ];
        @endphp
         <div class="formgroup">
             <label for="identity_perm">身份 ：</label>
             <p>{{ $identityMap[$member->identity_perm] ?? '未知身份' }}</p>
         </div>

         <div class="formgroup">
             <label for="company_tax_id">統一編號 ：</label>
             <p>{{$member->company_tax_id}}</p>
         </div>
         <div class="formgroup">
             <label for="company_tax_id">是否在職 ：</label>
             @if ($member->stat_info == 'y')
                <p>在職</p>
             @else
                <p>離職</p>
             @endif
         </div>

    
    </div>


       
           @if($crmMainCustInfo)
             <button><a href="{{ route('company', ['companyId' => $member->company_ERP_id]) }}">公司資料</a></button>
            @else
             @if($member->identity_perm == 1 || $member->identity_perm == 2)
             <button><a href="{{ route('companyCreateShow',['companyId' => $member->company_ERP_id]) }}">建立</a></button>
             @else
             @endif
           @endif
    </div>

        
    </main>


@endsection 