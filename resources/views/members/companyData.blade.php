@extends('layouts.content')

@section('content')

    <main>
        <!-- 公司基本資料 -->
        <!-- 檢視區塊 -->
        @php
            $identityPerm = $member->identity_perm;
        @endphp


        <div id="companyDataView" class="CompanyData-nav companyData"
            @if (session('editMode')) style="display:none;" @else style="display:block;" @endif>

            <h2>公司基本資料</h2>

            @if ($identityPerm == 1 || $identityPerm == 2)
                <button id="toggleEditMode" class="btn control-option">編輯</button>
            @endif


            <div id="companyDataForm">
                <div class="formgroup">
                    <label for="company_name">公司名稱 ：</label>
                    <p>{{ $crmMainCustInfo->company_name ?? '' }}</p>
                </div>

                @php
                    $company_address = json_decode($crmMainCustInfo->company_address ?? '');
                @endphp

                @if ($company_address)
                    <div class="formgroup">
                        <label for="company_address">公司地址 ：</label>
                        <ul>
                            <li><span>國家 :</span>
                                <p>{{ json_decode($crmMainCustInfo->company_address)->country }}</p>

                            </li>
                            <li><span>郵遞區號 : </span>
                                {{ json_decode($crmMainCustInfo->company_address)->postal_code ?? '' }}
                            </li>
                            <li><span>區域 :</span>
                                {{ json_decode($crmMainCustInfo->company_address)->region }}
                            </li>
                            <li>
                                <span>城市 : </span>{{ json_decode($crmMainCustInfo->company_address)->city }}
                            </li>
                            <li><span>街/路名 :</span>
                                {{ json_decode($crmMainCustInfo->company_address)->street }}</li>
                        </ul>
                    </div>
                @else
                    <p>無公司地址資料</p>
                @endif

                <div class="formgroup">
                    <label for="company_tax_id">統一編號 ：</label>
                    <p>{{ $crmMainCustInfo->company_tax_id ?? '' }}</p>
                </div>


                @php
                    $companyPhones = json_decode($crmMainCustInfo->company_phone ?? '', true);
                @endphp

                @if (is_array($companyPhones) && count($companyPhones) > 0)
                    <div class="formgroup phone_type">
                        <label for="company_phone">公司電話 ：</label>

                        <div class="phoneType">
                            @foreach ($companyPhones as $phone)
                                @if (!empty($phone['country_code_1']) || !empty($phone['area_code_1']) || !empty($phone['phone_number_1']))
                                    <ul>
                                        <li><span>國碼：</span>{{ $phone['country_code_1'] ?? '' }}</li>
                                        <li><span>區碼：</span>{{ $phone['area_code_1'] ?? '' }}</li>
                                        <li><span>電話號碼：</span>{{ $phone['phone_number_1'] ?? '' }}</li>
                                    </ul>
                                @endif
                                @if (!empty($phone['country_code_2']) || !empty($phone['area_code_2']) || !empty($phone['phone_number_2']))
                                    <ul>
                                        <li><span>國碼：</span>{{ $phone['country_code_2'] ?? '' }}</li>
                                        <li><span>區碼：</span>{{ $phone['area_code_2'] ?? '' }}</li>
                                        <li><span>電話號碼：</span>{{ $phone['phone_number_2'] ?? '' }}</li>
                                    </ul>
                                @endif
                                @if (!empty($phone['country_code_3']) || !empty($phone['area_code_3']) || !empty($phone['phone_number_3']))
                                    <ul>
                                        <li><span>國碼：</span>{{ $phone['country_code_3'] ?? '' }}</li>
                                        <li><span>區碼：</span>{{ $phone['area_code_3'] ?? '' }}</li>
                                        <li><span>電話號碼：</span>{{ $phone['phone_number_3'] ?? '' }}</li>
                                    </ul>
                                @endif
                            @endforeach
                        </div>



                    </div>
                @endif

                @php
                    $companyFax = json_decode($crmMainCustInfo->company_fax ?? '');
                @endphp

                <div class="formgroup phone_type">
                    <label for="company_fax">公司傳真 ：</label>
                    @if ($companyFax)
                        <ul>
                            <li><span>國碼：</span>{{ $companyFax->country_code }}</li>
                            <li><span>區碼：</span>{{ $companyFax->area_code }}</li>
                            <li><span>電話號碼：</span>{{ $companyFax->fax_number }}</li>
                        </ul>
                    @else
                        <p>無公司傳真資料</p>
                    @endif
                </div>

                <div class="formgroup">
                    <label for="company_website">公司網址 ：</label>
                    <p>{{ $crmMainCustInfo->company_website ?? '' }}</p>
                </div>

                <div class="formgroup">
                    <label for="company_ceo">公司負責人(董事長) ：</label>
                    <p>{{ $crmMainCustInfo->company_ceo ?? '' }}</p>
                </div>

                @php
                    $companyPurchasePerson = json_decode($crmMainCustInfo->company_purchase_person_phone ?? '');
                @endphp

                <div class="formgroup phone_type">
                    <label for="company_purchase_person">採購人員 ：</label>

                    @if ($companyPurchasePerson)
                        <ul>
                            <li><span>姓名：</span>
                                <p>{{ $crmMainCustInfo->company_purchase_person_name }}</p>
                            </li>
                            <li><span>國碼 ：
                                </span>{{ json_decode($crmMainCustInfo->company_purchase_person_phone)->country_code }}
                            </li>
                            <li><span>區碼 ：
                                </span>{{ json_decode($crmMainCustInfo->company_purchase_person_phone)->area_code }}
                            </li>
                            <li><span>電話號碼：</span>{{ json_decode($crmMainCustInfo->company_purchase_person_phone)->phone_number }}
                            </li>
                            <li><span>分機 ：
                                </span>{{ json_decode($crmMainCustInfo->company_purchase_person_phone)->purchase_extension }}
                            </li>
                        </ul>
                    @else
                        <p>無資料</p>
                    @endif
                </div>

                <div class="formgroup">
                    <label for="company_email">E-mail ：</label>
                    <p>{{ $crmMainCustInfo->company_email ?? '' }}</p>
                </div>

                <div class="formgroup">
                    <label for="company_other_info">其他說明 ：</label>
                    <p>{{ $crmMainCustInfo->company_other_info ?? '' }}</p>
                </div>
                <div class="baseline"></div>
            </div>
        </div>


        <!-- 公司基本資料 -->
        <!-- 編輯區塊 -->
        @php
            $companyId = $crmMainCustInfo->company_ERP_id; // 假設這裡獲取到了會員的 companyId，您需要替換為正確的值
        @endphp


        <div id="companyDataEdit" class="companyDataEdit"
            @if (session('editMode')) style="display:block;" @else style="display:none;" @endif>

            <h2>公司基本資料</h2>

            <form action="{{ route('company', ['companyId' => $companyId]) }}" method="get">
                <button type="submit" id="ReturnButton">返回</button>
            </form>


            <form class="formBlock" method="post" action="{{ route('companyUpdate', ['companyId' => $companyId]) }}">

                @method('PUT')
                @csrf
                <input type="hidden" name="company_id" value="{{ $crmMainCustInfo->id }}">

                <div class="formgroup">
                    <label for="company_name">公司名稱 ：</label>
                    <input type="text" name="company_name" id="company_name"
                        value="{{ $crmMainCustInfo->company_name }}">
                </div>

                <div class="formgroup">
                    <label for="company_address">公司地址 ：</label>
                    <ul>
                        <li>
                            <span>國家*</span> <input type="text" name="company_address[country]" id="country"
                                value="{{ old('company_address.country', $company_address->country ?? '') }}">
                            @error('company_address.country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </li>
                        <li><span>郵遞區號</span><input type="text" name="company_address[postal_code]" id="postal_code"
                                value="{{ $company_address->postal_code ?? '' }}"></li>
                        <li>
                            <span>區域*</span><input type="text" name="company_address[region]" id="region"
                                value="{{ old('company_address.region', $company_address->region ?? '') }}">
                            @error('company_address.region')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </li>
                        <li>
                            <span>城市*</span><input type="text" name="company_address[city]" id="city"
                                value="{{ old('company_address.city', $company_address->city ?? '') }}">
                            @error('company_address.city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </li>
                        <li>
                            <span>街/路名*</span><input type="text" name="company_address[street]" id="street"
                                value="{{ old('company_address.street', $company_address->street ?? '') }}">
                            @error('company_address.street')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </li>
                    </ul>
                </div>

                <div class="formgroup">
                    <label for="company_tax_id">統一編號 ：</label>
                    <input type="text" name="company_tax_id" id="company_tax_id"
                        value="{{ $crmMainCustInfo->company_tax_id }}">
                </div>

                <div class="formgroup phone_type">
                    <label for="company_phone">公司電話 ：</label>

                    <ul>
                        <li><span>國碼</span><input type="text" name="company_phone[country_code_1]" id="country_code_1"
                                value="{{ $companyPhones[0]['country_code_1'] ?? '' }}"></li>
                        <li><span>區碼</span><input type="text" name="company_phone[area_code_1]" id="area_code_1"
                                value="{{ $companyPhones[0]['area_code_1'] ?? '' }}"></li>
                        <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_1]" id="phone_number_1"
                                value="{{ $companyPhones[0]['phone_number_1'] ?? '' }}"></li>
                    </ul>
                    <ul>
                        <li><span>國碼</span><input type="text" name="company_phone[country_code_2]" id="country_code_2"
                                value="{{ $companyPhones[1]['country_code_2'] ?? '' }}"></li>
                        <li><span>區碼</span><input type="text" name="company_phone[area_code_2]" id="area_code_2"
                                value="{{ $companyPhones[1]['area_code_2'] ?? '' }}"></li>
                        <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_2]"
                                id="phone_number_2" value="{{ $companyPhones[1]['phone_number_2'] ?? '' }}"></li>
                    </ul>
                    <ul>
                        <li><span>國碼</span><input type="text" name="company_phone[country_code_3]" id="country_code_3"
                                value="{{ $companyPhones[2]['country_code_3'] ?? '' }}"></li>
                        <li><span>區碼</span><input type="text" name="company_phone[area_code_3]" id="area_code_3"
                                value="{{ $companyPhones[2]['area_code_3'] ?? '' }}"></li>
                        <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_3]"
                                id="phone_number_3" value="{{ $companyPhones[2]['phone_number_3'] ?? '' }}"></li>
                    </ul>
                </div>

                <div class="formgroup phone_type">
                    <label for="company_fax">公司傳真 ：</label>
                    <ul>
                        <li><span>國碼</span><input type="text" name="company_fax[country_code]" id="country_code"
                                value="{{ $companyFax->country_code ?? '' }}"></li>
                        <li><span>區碼</span><input type="text" name="company_fax[area_code]" id="area_code"
                                value="{{ $companyFax->area_code ?? '' }}"></li>
                        <li><span>電話號碼</span><input type="text" name="company_fax[fax_number]" id="fax_number"
                                value="{{ $companyFax->fax_number ?? '' }}"></li>
                    </ul>
                </div>

                <div class="formgroup">
                    <label for="company_website">公司網址 ：</label>
                    <input type="text" name="company_website" id="company_website"
                        value="{{ $crmMainCustInfo->company_website ?? '' }}">
                </div>

                <div class="formgroup">
                    <label for="company_ceo">公司負責人(董事長) ：</label>
                    <input type="text" name="company_ceo" id="company_ceo"
                        value="{{ $crmMainCustInfo->company_ceo ?? '' }}">
                </div>

                <div class="formgroup phone_type">
                    <label for="company_purchase_person">採購人員 ：</label>
                    <ul>
                        <li><span>姓名</span><input type="text" name="company_purchase_person_name"
                                id="company_purchase_person_name"
                                value="{{ $crmMainCustInfo->company_purchase_person_name ?? '' }}"> </li>
                    </ul>

                    <ul>
                        <li><span>國碼</span><input type="text"
                                name="company_purchase_person_phone[purchase_country_code]" id="purchase_country_code"
                                value="{{ $companyPurchasePerson->country_code ?? '' }}"></li>
                        <li><span>區碼</span><input type="text" name="company_purchase_person_phone[purchase_area_code]"
                                id="purchase_area_code" value="{{ $companyPurchasePerson->area_code ?? '' }}"></li>
                        <li><span>電話號碼</span><input type="text"
                                name="company_purchase_person_phone[purchase_phone_number]" id="purchase_phone_number"
                                value="{{ $companyPurchasePerson->phone_number ?? '' }}"></li>
                        <li><span>分機</span><input type="text" name="company_purchase_person_phone[purchase_extension]"
                                id="purchase_extension" value="{{ $companyPurchasePerson->purchase_extension ?? '' }}">
                        </li>
                    </ul>
                </div>

                <div class="formgroup">
                    <label for="company_email">E-mail ：</label>
                    <input type="email" name="company_email" id="company_email"
                        value="{{ $crmMainCustInfo->company_email ?? '' }}">
                </div>

                <div class="formgroup">
                    <label for="company_other_info">其他說明 ：</label>
                    <input type="text" name="company_other_info" id="company_other_info"
                        value="{{ $crmMainCustInfo->company_other_info ?? '' }}">
                </div>
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
