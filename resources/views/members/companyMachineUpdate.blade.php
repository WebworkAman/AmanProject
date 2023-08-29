@extends('layouts.content')

@section('content')


    <main>


        <div class="Show_form">

            <div id="companyDataEdit" class="companyDataEdit Machines-list">

                <a class="btn control-option" href="{{ route('companyMachineData', $crmMachine) }}">返回</a>

                <div class="CompanyData-nav">
                    <h2>機器基本資料</h2>
                </div>

                <div id="machineData" style="display: block;margin-top:40px;">

                    <form method="POST" action="{{ route('companyMachineUpdate', $crmMachine) }}">
                        @csrf
                        @method('PUT')

                        <div class="formgroup">
                            <label for="machine_purchase_date">購買日期</label>
                            <input type="date" name="machine_purchase_date" id="machine_purchase_date"
                                value="{{ $crmMachine->machine_purchase_date }}">
                        </div>

                        <div class="formgroup">
                            <label for="machine_model">機器型號</label>
                            <input type="text" name="machine_model" id="machine_model" Placeholder="字元最長15碼"
                                value="{{ $crmMachine->machine_model }}">
                        </div>

                        <div class="formgroup">
                            <label for="machine_serial">機器序號</label>
                            <input type="text" name="machine_serial" id="machine_serial" Placeholder="字元最長15碼"
                                value="{{ $crmMachine->machine_serial }}">
                        </div>
                        <div class="formgroup">
                            <label for="machine_installation">機器安裝地址</label>
                        </div>
                        <div class="formgroup installation_type">

                            <ul>
                                <li>
                                    <span>公司名稱 ：</span>
                                    <input type="text" name="installation_company_name" id="installation_company_name"
                                        value="{{ $crmMachine->installation_company_name }}">

                                </li>




                                <ol>
                                    <li><span id="installation_company_address">公司地址 ：</span></li>
                                    <li><span>國家</span>
                                        <input type="text" name="installation_company_address[installation_country]"
                                            id="installation_country"
                                            value="{{ $crmMachine->installation_company_country }}">
                                    </li>
                                    <li><span>郵遞區號</span>
                                        <input type="text" name="installation_company_address[installation_postal_code]"
                                            id="installation_postal_code"
                                            value="{{ $crmMachine->installation_company_postal_code }}">
                                    </li>
                                    <li><span>區域</span>
                                        <input type="text" name="installation_company_address[installation_region]"
                                            id="installation_region" value="{{ $crmMachine->installation_company_region }}">
                                    </li>
                                    <li><span>城市</span>
                                        <input type="text" name="installation_company_address[installation_city]"
                                            id="installation_city" value="{{ $crmMachine->installation_company_city }}">
                                    </li>
                                    <li><span>街/路名</span>
                                        <input type="text" name="installation_company_address[installation_street]"
                                            id="installation_street"
                                            value="{{ $crmMachine->installation_company_street }}">
                                    </li>
                                </ol>




                                <li><span>統一編號 ：</span>
                                    <input type="text" name="installation_vat_number" id="installation_vat_number"
                                        value="{{ $crmMachine->installation_vat_number }}">
                                </li>


                                @php
                                    $companyPhones = json_decode($crmMachine->installation_company_phone ?? '', true);
                                @endphp
                                @if (is_array($companyPhones) && count($companyPhones) > 0)
                                    <li><span id="installation_company_phone">公司電話 ：</span></li>
                                    <ol>
                                        @foreach ($companyPhones as $phone)
                                            @if (!empty($phone['country_code_1']) || !empty($phone['area_code_1']) || !empty($phone['phone_number_1']))
                                                <li><span>國碼</span>
                                                    <input type="text" name="installation_company_phone[country_code_1]"
                                                        id="installation_phone_country_code_1"
                                                        value="{{ $phone['country_code_1'] ?? '' }}">
                                                </li>
                                                <li><span>區碼</span>
                                                    <input type="text" name="installation_company_phone[area_code_1]"
                                                        id="installation_phone_area_code_1"
                                                        value="{{ $phone['area_code_1'] ?? '' }}">
                                                </li>
                                                <li><span>電話號碼</span>
                                                    <input type="text" name="installation_company_phone[phone_number_1]"
                                                        id="installation_phone_number_1"
                                                        value="{{ $phone['phone_number_1'] ?? '' }}">
                                                </li>
                                            @endif

                                    </ol>
                                    <ol>
                                        @if (!empty($phone['country_code_2']) || !empty($phone['area_code_2']) || !empty($phone['phone_number_2']))
                                            <li><span>國碼</span>
                                                <input type="text" name="installation_company_phone[country_code_2]"
                                                    id="installation_phone_country_code_2"
                                                    value="{{ $phone['country_code_2'] ?? '' }}">
                                            </li>
                                            <li><span>區碼</span>
                                                <input type="text" name="installation_company_phone[area_code_2]"
                                                    id="installation_phone_area_code_2"
                                                    value="{{ $phone['area_code_2'] ?? '' }}">
                                            </li>
                                            <li><span>電話號碼</span>
                                                <input type="text" name="installation_company_phone[phone_number_2]"
                                                    id="installation_phone_number_2"
                                                    value="{{ $phone['phone_number_2'] ?? '' }}">
                                            </li>
                                        @endif
                                    </ol>
                                    <ol>
                                        @if (!empty($phone['country_code_3']) || !empty($phone['area_code_3']) || !empty($phone['phone_number_3']))
                                            <li><span>國碼</span>
                                                <input type="text" name="installation_company_phone[country_code_3]"
                                                    id="installation_phone_country_code_3"
                                                    value="{{ $phone['country_code_3'] ?? '' }}">
                                            </li>
                                            <li><span>區碼</span>
                                                <input type="text" name="installation_company_phone[area_code_3]"
                                                    id="installation_phone_area_code_3"
                                                    value="{{ $phone['area_code_3'] ?? '' }}">
                                            </li>
                                            <li><span>電話號碼</span>
                                                <input type="text" name="installation_company_phone[phone_number_3]"
                                                    id="installation_phone_number_3"
                                                    value="{{ $phone['phone_number_3'] ?? '' }}">
                                            </li>
                                        @endif
                                    </ol>
                                @endforeach
                                @endif
                                <li>

                                    @php
                                        $companyFax = json_decode($crmMachine->installation_company_fax ?? '');
                                    @endphp

                                <li><span id="installation_company_fax">公司傳真 ：</span></li>
                                @if ($companyFax)
                                    <ol>
                                        <li><span>國碼</span>
                                            <input type="text" name="installation_company_fax[country_code]"
                                                id="installation_fax_country_code"
                                                value="{{ $companyFax->country_code }}">
                                        </li>
                                        <li><span>區碼</span>
                                            <input type="text" name="installation_company_fax[area_code]"
                                                id="installation_fax_area_code" value="{{ $companyFax->area_code }}">
                                        </li>
                                        <li><span>電話號碼</span>
                                            <input type="text" name="installation_company_fax[fax_number]"
                                                id="installation_fax_number" value="{{ $companyFax->fax_number }}">
                                        </li>
                                    </ol>
                                @endif
                                </li>
                            </ul>

                        </div>


                        @if ($crmMachine->purchase_manufacturer == 4)
                            <div class="formgroup">
                                <span for="purchase_manufacturer">購入來源 </span>
                                <input type="text" name="installation_company_fax[fax_number]"
                                    id="installation_fax_number" value="{{ $crmMachine->other_purchase_source }}">
                            </div>

                            <div class="formgroup subBlock">
                                <span>公司名稱</span>
                                <input type="text" name="other_purchase_company_name" id="other_purchase_company_name"
                                    value="{{ $crmMachine->other_purchase_company_name }}">
                            </div>


                            @php
                                $otherPurchaseCompanyAddress = json_decode($crmMachine->other_purchase_company_address ?? '');
                            @endphp

                            <div class="formgroup subBlock">
                                <span id="other_purchase_company_address">公司地址</span>
                            </div>
                            <div class="formgroup phone_type subBlock">
                                @if ($otherPurchaseCompanyAddress)
                                    <ul>
                                        <li>
                                            <span>國家</span>
                                            <p>{{ $otherPurchaseCompanyAddress->country }}</p>
                                        </li>
                                        <li>
                                            <span>郵遞區號</span>
                                            <p>{{ $otherPurchaseCompanyAddress->postal_code }}</p>
                                        </li>
                                        <li>
                                            <span>區域</span>
                                            <p>{{ $otherPurchaseCompanyAddress->region }}</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span>城市</span>
                                            <p>{{ $otherPurchaseCompanyAddress->city }}</p>
                                        </li>
                                        <li>
                                            <span>街/路名</span>
                                            <p>{{ $otherPurchaseCompanyAddress->street }}</p>
                                        </li>
                                    </ul>
                                @endif
                            </div>

                            <div class="formgroup subBlock">
                                <span>統一編號 </span>
                                <p>{{ $crmMachine->other_purchase_tax_id }}</p>
                            </div>

                            @php
                                
                                $otherPurchaseCompanyPhone = json_decode($crmMachine->other_purchase_company_phone ?? '');
                                
                            @endphp
                            <div class="formgroup subBlock">
                                <span id="other_purchase_company_phone">公司電話</span>
                            </div>
                            <div class="formgroup phone_type subBlock">
                                @if ($otherPurchaseCompanyPhone)
                                    <ul>
                                        <li>
                                            <span>國碼</span>
                                            <p>{{ $otherPurchaseCompanyPhone->country_code }}</p>
                                        </li>
                                        <li>
                                            <span>區碼</span>
                                            <p>{{ $otherPurchaseCompanyPhone->area_code }}</p>
                                        </li>
                                        <li>
                                            <span>電話號碼</span>
                                            <p>{{ $otherPurchaseCompanyPhone->phone_number }}</p>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <div class="formgroup subBlock">
                                <span>聯絡人</span>
                            </div>
                            <div class="formgroup phone_type subBlock">
                                <ul>
                                    <li>
                                        <span>姓名</span>
                                        <p>{{ $crmMachine->other_purchase_name }}</p>
                                    </li>
                                    <li>
                                        <span>手機</span>
                                        <p>{{ $crmMachine->other_purchase_phone }}</p>
                                    </li>
                                </ul>
                            </div>

                            <!-- 其他說明 -->
                            <div class="formgroup">
                                <label for="other_purchase_description">其他說明</label>
                                <p>{{ $crmMachine->other_purchase_description }}</p>
                            </div>
                        @else
                            <div class="formgroup">
                                <label for="purchase_manufacturer">購入來源｜製造商</label>

                                <select name="purchase_manufacturer" id="purchase_manufacturer">
                                    <option value="1">
                                        台灣歐西瑪股份有限公司
                                    </option>
                                    <option value="2">速飛得(中國)
                                    </option>
                                    <option value="3">廣州貴鵬
                                    </option>
                                    <option value="4">其他
                                    </option>
                                </select>
                            </div>
                            <div class="purchase_manufacturer_block">
                                <div class="formgroup subBlock">
                                    <span>業務姓名 </span>

                                    <input type="text" name="purchase_manufacturer_person"
                                        id="purchase_manufacturer_person"
                                        value="{{ $crmMachine->purchase_manufacturer_person }}">
                                </div>
                                <div class="formgroup subBlock">
                                    <span>手機號碼 </span>
                                    <input type="text" name="purchase_manufacturer_phone"
                                        id="purchase_manufacturer_phone"
                                        value="{{ $crmMachine->purchase_manufacturer_phone }}">
                                </div>
                            </div>

                            <div class="other_purchase_source_block" style="display:none;">

                                <div class="formgroup">
                                    <select name="other_purchase_source" id="other_purchase_source">
                                        <option value="1">1. 製造商同業</option>
                                        <option value="2">2. 代理商</option>
                                        <option value="3">3. 貿易商</option>
                                        <option value="4">4. 成衣廠</option>
                                        <option value="5">5. 針車行</option>
                                        <option value="6">6. 其他</option>
                                    </select>
                                    <ul>
                                        <li><input type="text" name="other_other_purchase_source"
                                                id="other_other_purchase_source" placeholder="請輸入其他購入來源"
                                                style="display: none;"></li>
                                    </ul>
                                </div>
                                <div class="formgroup subBlock">
                                    <span>1.公司名稱</span><input type="text" name="other_purchase_company_name"
                                        id="other_purchase_company_name">
                                </div>
                                <div class="formgroup subBlock">
                                    <span id="other_purchase_company_address">2.公司地址</span>
                                </div>
                                <div class="formgroup phone_type subBlock">
                                    <ul>
                                        <li><span>國家</span><input type="text"
                                                name="other_purchase_company_address[country]"
                                                id="other_purchase_country">
                                        </li>
                                        <li><span>郵遞區號</span><input type="text"
                                                name="other_purchase_company_address[postal_code]"
                                                id="other_purchase_postal_code"></li>
                                        <li><span>區域</span><input type="text"
                                                name="other_purchase_company_address[region]" id="other_purchase_region">
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><span>城市</span><input type="text"
                                                name="other_purchase_company_address[city]" id="other_purchase_city"></li>
                                        <li><span>街/路名</span><input type="text"
                                                name="other_purchase_company_address[street]" id="other_purchase_street">
                                        </li>
                                    </ul>
                                </div>
                                <div class="formgroup subBlock">
                                    <span>3.統一編號 </span><input type="text" name="other_purchase_tax_id"
                                        id="other_purchase_tax_id">
                                </div>
                                <div class="formgroup subBlock">
                                    <span id="other_purchase_company_phone">4. 公司電話</span>
                                </div>
                                <div class="formgroup phone_type subBlock">
                                    <ul>
                                        <li><span>國碼</span><input type="text"
                                                name="other_purchase_company_phone[country_code]"
                                                id="other_purchase_phone_country_code"></li>
                                        <li><span>區碼</span><input type="text"
                                                name="other_purchase_company_phone[area_code]"
                                                id="other_purchase_phone_area_code"></li>
                                        <li><span>電話號碼</span><input type="text"
                                                name="other_purchase_company_phone[phone_number]"
                                                id="other_purchase_phone_number"></li>
                                    </ul>

                                </div>
                                <div class="formgroup subBlock">
                                    <span>5. 聯絡人</span>
                                </div>
                                <div class="formgroup phone_type subBlock">

                                    <ul>
                                        <li><span>姓名</span><input type="text" name="other_purchase_name"
                                                id="other_purchase_name"></li>
                                        <li><span>手機</span><input type="text" name="other_purchase_phone"
                                                id="other_purchase_phone"></li>
                                    </ul>
                                </div>

                                <!-- 其他說明 -->
                                <div class="formgroup">
                                    <label for="other_purchase_description">其他說明</label>
                                    <!-- <input name="other_purchase_description" id="other_purchase_description" cols="30" rows="10"></input> -->
                                    <textarea name="other_purchase_description" id="other_purchase_description" cols="30" rows="10"></textarea>
                                </div>



                            </div>
                        @endif

                        <button id="submitButton">儲存</button>
                    </form>

                </div>

            </div>
        </div>
        </div>


    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openFormBtn = document.getElementById('openFormBtn');
            const modal = document.getElementById('modal');
            const closeModal = document.getElementById('closeModal');
            const contactForm = document.getElementById('contactForm');

            // 打開懸浮視窗
            openFormBtn.addEventListener('click', function() {
                modal.style.display = 'block';
            });

            // 關閉懸浮視窗
            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            contactForm.addEventListener('submit', function(event) {

                // event.preventDefault();

                //驗證姓名欄位是否為空
                if (contactPersonName.trim() === '') {
                    errorMessage.textContent = '姓名欄位不能為空';
                    errorMessage.style.color = 'red';
                    const modalContent = document.querySelector('.modal-content');
                    modalContent.appendChild(errorMessage);

                    return;
                }

                // contactForm.submit();
            });


        });
    </script>
    <script>
        // 假設您的 crmMachine.purchase_manufacturer 取得的是一個數字值
        // 在 JavaScript 中設定選中的選項
        var purchaseManufacturer = {{ $crmMachine->purchase_manufacturer ?? 0 }}; // 取得選中值，預設為 0

        // 找到 select 元素
        var selectElement = document.getElementById('purchase_manufacturer');

        // 迭代所有選項，尋找匹配的值並設定 selected 屬性
        for (var i = 0; i < selectElement.options.length; i++) {
            if (parseInt(selectElement.options[i].value) === purchaseManufacturer) {
                selectElement.options[i].selected = true;
                break;
            }
        }
    </script>

    <script>
        // 當頁面載入完成時
        $(document).ready(function() {
            // 監聽選擇聯絡人的 select 元素
            $("#contact_person_position").change(function() {
                //獲取選擇的值
                var selectedValue = $(this).val();

                //如果選擇的值為 "5" (其他)
                if (selectedValue == "5") {
                    //顯示輸入框
                    $("#other_contact_person_position").show();
                } else {
                    //隱藏輸入匡
                    $("#other_contact_person_position").hide();
                }
            })
        });
        // 當頁面載入完成時
        $(document).ready(function() {
            // 監聽選擇聯絡人的 select 元素
            $("#contact_software_type").change(function() {
                //獲取選擇的值
                var selectedValue = $(this).val();

                //如果選擇的值為 "5" (其他)
                if (selectedValue == "4") {
                    //顯示輸入框
                    $("#other_contact_software_type").show();
                } else {
                    //隱藏輸入匡
                    $("#other_contact_software_type").hide();
                }
            })
        })

        // 當頁面載入完成時
        $(document).ready(function() {
            // 監聽選擇聯絡人的 select 元素
            $("#purchase_manufacturer").change(function() {
                //獲取選擇的值
                var selectedValue = $(this).val();

                //如果選擇的值為 "4" (其他)
                if (selectedValue == "4") {
                    //顯示輸入框
                    $(".other_purchase_source_block").show();
                    $(".purchase_manufacturer_block").hide();
                } else {
                    //隱藏輸入匡
                    $(".other_purchase_source_block").hide();
                    $(".purchase_manufacturer_block").show();
                }
            })
        })

        // 當頁面載入完成時
        $(document).ready(function() {
            // 監聽選擇聯絡人的 select 元素
            $("#other_purchase_source").change(function() {
                //獲取選擇的值
                var selectedValue = $(this).val();

                //如果選擇的值為 "6" (其他)
                if (selectedValue == "6") {
                    //顯示輸入框
                    $("#other_other_purchase_source").show();
                } else {
                    //隱藏輸入匡
                    $("#other_other_purchase_source").hide();
                }
            })
        })
    </script>
@endsection
