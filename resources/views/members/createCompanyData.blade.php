@extends('layouts.content')

@section('content')

 <main>



   <!-- 公司基本資料 -->
   <!-- 編輯區塊 -->
   @php
     $companyId = $member ?? ''->id ; // 假設這裡獲取到了會員的 companyId，您需要替換為正確的值
     $years = 4;
   @endphp

    
    <div id="companyDataEdit" class="companyDataEdit">
    <h2>公司基本資料</h2>
      <form method="post" action="{{ route('companyCreate', ['companyId' => $companyId]) }}">
       @method('post') 
       @csrf
       <input type="hidden" name="company_id" value="{{ $member ?? ''->id }}" >

       @if($years > 5)
            <div class="formgroup">
                <label for="company_name">公司名稱 ：</label>
                <input type="text" name="company_name" id="company_name">
            </div>

            <div class="formgroup">
                <label for="company_address">公司地址 ：</label>
                <ul>
                    <li>
                        <span>國家</span> <input type="text" name="company_address[country]" id="country">
                        <p class="text-danger">@error('company_address[country]') {{$message}} @enderror</p>
                    </li>
                    <li><span>郵遞區號</span><input type="text" name="company_address[postal_code]" id="postal_code" value="{{ $company_address->postal_code ?? '' }}"></li>
                    <li><span>區域</span><input type="text" name="company_address[region]" id="region" value="{{ $company_address->region ?? '' }}"></li>
                    <li><span>城市</span><input type="text" name="company_address[city]" id="city" value="{{ $company_address->city ?? '' }}"></li>
                    <li><span>街/路名</span><input type="text" name="company_address[street]" id="street" value="{{ $company_address->street ?? '' }}"></li>
                </ul>
            </div>

             <div class="formgroup">
                 <label for="company_tax_id">統一編號 ：</label>
                 <input type="text" name="company_tax_id" id="company_tax_id">
             </div>


             <div class="formgroup phone_type">
                 <label for="company_phone">公司電話 ：</label>
       
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_1]" id="country_code_1" value="{{ $companyPhones[0]['country_code_1'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_1]" id="area_code_1" value="{{ $companyPhones[0]['area_code_1'] ?? '' }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_1]" id="phone_number_1" value="{{ $companyPhones[0]['phone_number_1'] ?? '' }}"></li>
                 </ul>
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_2]" id="country_code_2" value="{{ $companyPhones[1]['country_code_2'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_2]" id="area_code_2" value="{{ $companyPhones[1]['area_code_2'] ?? '' }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_2]" id="phone_number_2" value="{{ $companyPhones[1]['phone_number_2'] ?? '' }}"></li>
                 </ul>
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_3]" id="country_code_3" value="{{ $companyPhones[2]['country_code_3'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_3]" id="area_code_3" value="{{ $companyPhones[2]['area_code_3'] ?? '' }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_3]" id="phone_number_3" value="{{ $companyPhones[2]['phone_number_3'] ?? '' }}"></li>
                 </ul>
             </div>

            <div class="formgroup phone_type">
                <label for="company_fax">公司傳真 ：</label>
                <ul>
                    <li><span>國碼</span><input type="text" name="company_fax[country_code]" id="country_code" value="{{ $companyFax->country_code ?? '' }}"></li>
                    <li><span>區碼</span><input type="text" name="company_fax[area_code]" id="area_code" value="{{ $companyFax->area_code ?? '' }}"></li>
                    <li><span>電話號碼</span><input type="text" name="company_fax[fax_number]" id="fax_number" value="{{ $companyFax->fax_number ?? '' }}"></li>
                </ul>
            </div>

            <div class="formgroup">
                <label for="company_website">公司網址 ：</label>
                <span>WWW.</span>
                <input type="text" name="company_website" id="company_website" value="{{ $crmMainCustInfo ?? ''->company_website ?? '' }}">
            </div>

            <div class="formgroup">
                <label for="company_ceo">公司負責人(董事長) ：</label>
                <input type="text" name="company_ceo" id="company_ceo" value="{{ $crmMainCustInfo ?? ''->company_ceo ?? '' }}">
            </div>

            <div class="formgroup phone_type">
                <label for="company_purchase_person">採購人員 ：</label>     
                <ul>
                    <li><span>姓名</span><input type="text" name="company_purchase_person_name" id="company_purchase_person_name" value="{{ $crmMainCustInfo ?? ''->company_purchase_person_name ?? '' }}"></li>
                    <li><span>國碼</span><input type="text" name="company_purchase_person_phone[purchase_country_code]" id="purchase_country_code" value="{{ $companyPurchasePerson->country_code ?? '' }}"></li>
                    <li><span>區碼</span><input type="text" name="company_purchase_person_phone[purchase_area_code]" id="purchase_area_code" value="{{ $companyPurchasePerson->area_code ?? '' }}"></li>
                </ul>
                <ul>
                    <li><span>電話號碼</span><input type="text" name="company_purchase_person_phone[purchase_phone_number]" id="purchase_phone_number" value="{{ $companyPurchasePerson->phone_number ?? '' }}"></li>
                    <li><span>分機</span><input type="text" name="company_purchase_person_phone[purchase_extension]" id="purchase_extension" value="{{ $companyPurchasePerson->purchase_extension ?? '' }}"></li>
                </ul>
            </div>

            <div class="formgroup">
                <label for="company_email">E-mail ：</label>
                <input type="email" name="company_email" id="company_email" value="{{ $crmMainCustInfo ?? ''->company_email ?? '' }}">
            </div>

            <div class="formgroup">
                <label for="company_other_info">其他說明 ：</label>
                <input type="text" name="company_other_info" id="company_other_info" value="{{ $crmMainCustInfo ?? ''->company_other_info ?? '' }}">
            </div>

            @else
            <div class="formgroup">
                <label for="company_name">公司名稱 ：</label>
                <input type="text" name="company_name" id="company_name" value="{{ $tbm01->ba02 ?? '' }}">
            </div>

            <p>原地址：{{ $tbm01->ba05 ?? '' }}</p>

            <div class="formgroup">
                <label for="company_address">公司地址 ：</label>
                   
                   
                <ul>
                    <li>
                        <span>國家</span> <input type="text" name="company_address[country]" id="country">
                        <p class="text-danger">@error('company_address[country]') {{$message}} @enderror</p>
                    </li>
                    <li><span>郵遞區號</span><input type="text" name="company_address[postal_code]" id="postal_code" value="{{ $postalCode ?? '' }}"></li>
                    <li><span>區域</span><input type="text" name="company_address[region]" id="region" value="{{ $company_address->region ?? '' }}"></li>
                    <li><span>城市</span><input type="text" name="company_address[city]" id="city" value="{{ $cityRegionStreet ?? '' }}"></li>
                    <li><span>街/路名</span><input type="text" name="company_address[street]" id="street" value="{{ $company_address->street ?? '' }}"></li>
                </ul>
            </div>

             <div class="formgroup">
                 <label for="company_tax_id">統一編號 ：</label>
                 <input type="text" name="company_tax_id" id="company_tax_id" value="{{ $tbm01->ba19 ?? '' }}">
             </div>

             @php
                 $phoneNumber = $tbm01 -> ba09;
                 $phoneAreaCode = '';
                 $phoneDigits = '';
                 
                 if (preg_match('/^(\d{2})-(\d{4}-\d{4})$/', $phoneNumber, $matches)) {
                   $phoneAreaCode = $matches[1];
                   $phoneDigits = $matches[2];
                 } else {
                   $phoneDigits = $phoneNumber;
                 }
             @endphp

             <div class="formgroup phone_type">
                 <label for="company_phone">公司電話 ：</label>
       
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_1]" id="country_code_1" value="{{ $companyPhones[0]['country_code_1'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_1]" id="area_code_1" value="{{ $phoneAreaCode }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_1]" id="phone_number_1" value="{{ $phoneDigits }}"></li>
                 </ul>
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_2]" id="country_code_2" value="{{ $companyPhones[1]['country_code_2'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_2]" id="area_code_2" value="{{ $companyPhones[1]['area_code_2'] ?? '' }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_2]" id="phone_number_2" value="{{ $companyPhones[1]['phone_number_2'] ?? '' }}"></li>
                 </ul>
                 <ul>
                     <li><span>國碼</span><input type="text" name="company_phone[country_code_3]" id="country_code_3" value="{{ $companyPhones[2]['country_code_3'] ?? '' }}"></li>
                     <li><span>區碼</span><input type="text" name="company_phone[area_code_3]" id="area_code_3" value="{{ $companyPhones[2]['area_code_3'] ?? '' }}"></li>
                     <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_3]" id="phone_number_3" value="{{ $companyPhones[2]['phone_number_3'] ?? '' }}"></li>
                 </ul>
             </div>

             @php
                 $faxNumber = $tbm01 -> ba10;
                 $faxAreaCode = '';
                 $faxDigits = '';
                 
                 if (preg_match('/^(\d{2})-(\d{4}-\d{4})$/', $faxNumber, $matches)) {
                   $faxAreaCode = $matches[1];
                   $faxDigits = $matches[2];
                 } else {
                   $faxDigits = $faxNumber;
                 }
             @endphp

            <div class="formgroup phone_type">
                <label for="company_fax">公司傳真 ：</label>
                <ul>
                    <li><span>國碼</span><input type="text" name="company_fax[country_code]" id="country_code" value="{{ $companyFax->country_code ?? '' }}"></li>
                    <li><span>區碼</span><input type="text" name="company_fax[area_code]" id="area_code" value="{{ $faxAreaCode ?? '' }}"></li>
                    <li><span>電話號碼</span><input type="text" name="company_fax[fax_number]" id="fax_number" value="{{ $faxDigits ?? '' }}"></li>
                </ul>
            </div>

            <div class="formgroup">
                <label for="company_website">公司網址 ：</label>
                <span>WWW.</span>
                <input type="text" name="company_website" id="company_website" value="{{ $crmMainCustInfo ?? ''->company_website ?? '' }}">
            </div>

            <div class="formgroup">
                <label for="company_ceo">公司負責人(董事長) ：</label>
                <input type="text" name="company_ceo" id="company_ceo" value="{{ $crmMainCustInfo ?? ''->company_ceo ?? '' }}">
            </div>

            <div class="formgroup phone_type">
                <label for="company_purchase_person">採購人員 ：</label>     
                <ul>
                    <li><span>姓名</span><input type="text" name="company_purchase_person_name" id="company_purchase_person_name" value="{{ $crmMainCustInfo ?? ''->company_purchase_person_name ?? '' }}"></li>
                    <li><span>國碼</span><input type="text" name="company_purchase_person_phone[purchase_country_code]" id="purchase_country_code" value="{{ $companyPurchasePerson->country_code ?? '' }}"></li>
                    <li><span>區碼</span><input type="text" name="company_purchase_person_phone[purchase_area_code]" id="purchase_area_code" value="{{ $companyPurchasePerson->area_code ?? '' }}"></li>
                </ul>
                <ul>
                    <li><span>電話號碼</span><input type="text" name="company_purchase_person_phone[purchase_phone_number]" id="purchase_phone_number" value="{{ $companyPurchasePerson->phone_number ?? '' }}"></li>
                    <li><span>分機</span><input type="text" name="company_purchase_person_phone[purchase_extension]" id="purchase_extension" value="{{ $companyPurchasePerson->purchase_extension ?? '' }}"></li>
                </ul>
            </div>

            <div class="formgroup">
                <label for="company_email">E-mail ：</label>
                <input type="email" name="company_email" id="company_email" value="{{ $crmMainCustInfo ?? ''->company_email ?? '' }}">
            </div>

            <div class="formgroup">
                <label for="company_other_info">其他說明 ：</label>
                <input type="text" name="company_other_info" id="company_other_info" value="{{ $crmMainCustInfo ?? ''->company_other_info ?? '' }}">
            </div>
            @endif

             <div class="baseline"></div>
             <button id="submitButton">儲存</button>
        </form> 
     </div>

    </div>  
    
    </main>
   

    <script>
        $(document).ready(function() {
            $('#toggleEditMode').click(function() {
                $('#companyDataView').toggle();
                $('#companyDataEdit').toggle();
            });
        })
    </script>


@endsection 