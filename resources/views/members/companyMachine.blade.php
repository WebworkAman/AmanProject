@extends('layouts.content')

@section('content')


    <main>


        <div class="Show_form">

            <div id="companyDataEdit" class="companyDataEdit Machines-list">


                <div class="CompanyData-nav">
                    <h2>機器基本資料</h2>
                    <label for=""><span>公司名稱：</span>{{ $crmMainCustInfo->company_name ?? '' }}</label>
                    </br></br>
                    <label for=""><span>統一編號：</span>{{ $crmMainCustInfo->company_tax_id ?? '' }}</label>
                </div>
                <a class="btn control-option" href="{{ route('companyMachineList') }}">返回</a>

                <div id="machineData" style="display: block;">

                    <div class="formgroup">
                        <label for="machine_purchase_date">購買日期</label>
                        {{ $crmMachine->machine_purchase_date }}
                    </div>

                    <div class="formgroup">
                        <label for="machine_model">機器型號</label>
                        {{ $crmMachine->machine_model }}
                    </div>

                    <div class="formgroup">
                        <label for="machine_serial">機器序號</label>
                        {{ $crmMachine->machine_serial }}
                    </div>
                    <div class="formgroup">
                        <label for="machine_installation">機器安裝地址</label>
                    </div>
                    <div class="formgroup installation_type">

                        <ul>
                            <li>
                                <span>公司名稱 ：</span>
                                <p>{{ $crmMachine->installation_company_name }}</p>

                            </li>



                            <li><span id="installation_company_address">公司地址 ：</span></li>
                            <ol>
                                <li><span>國家</span>
                                    <p>{{ $crmMachine->installation_company_country }}</p>
                                </li>
                                <li><span>郵遞區號</span>
                                    <p>{{ $crmMachine->installation_company_postal_code }}</p>
                                </li>
                                <li><span>區域</span>
                                    <p>{{ $crmMachine->installation_company_region }}</p>
                                </li>
                            </ol>
                            <ol>
                                <li><span>城市</span>
                                    <p>{{ $crmMachine->installation_company_city }}</p>
                                </li>
                                <li><span>街/路名</span>
                                    <p>{{ $crmMachine->installation_company_street }}</p>
                                </li>
                            </ol>



                            <li><span>統一編號 ：</span>
                                <p>{{ $crmMachine->installation_vat_number }}</p>
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
                                                <p>{{ $phone['country_code_1'] ?? '' }}</p>
                                            </li>
                                            <li><span>區碼</span>
                                                <p>{{ $phone['area_code_1'] ?? '' }}</p>
                                            </li>
                                            <li><span>電話號碼</span>
                                                <p>{{ $phone['phone_number_1'] ?? '' }}</p>
                                            </li>
                                        @endif

                                </ol>
                                <ol>
                                    @if (!empty($phone['country_code_2']) || !empty($phone['area_code_2']) || !empty($phone['phone_number_2']))
                                        <li><span>國碼</span>
                                            <p>{{ $phone['country_code_2'] ?? '' }}</p>
                                        </li>
                                        <li><span>區碼</span>
                                            <p>{{ $phone['area_code_2'] ?? '' }}
                                        </li>
                                        <li><span>電話號碼</span>
                                            <p>{{ $phone['phone_number_2'] ?? '' }}</p>
                                        </li>
                                    @endif
                                </ol>
                                <ol>
                                    @if (!empty($phone['country_code_3']) || !empty($phone['area_code_3']) || !empty($phone['phone_number_3']))
                                        <li><span>國碼</span>
                                            <p>{{ $phone['country_code_3'] ?? '' }}</p>
                                        </li>
                                        <li><span>區碼</span>
                                            <p>{{ $phone['area_code_3'] ?? '' }}</p>
                                        </li>
                                        <li><span>電話號碼</span>
                                            <p>{{ $phone['phone_number_3'] ?? '' }}</p>
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
                                        <p>{{ $companyFax->country_code }}</p>
                                    </li>
                                    <li><span>區碼</span>
                                        <p>{{ $companyFax->area_code }}</p>
                                    </li>
                                    <li><span>電話號碼</span>
                                        <p>{{ $companyFax->fax_number }}</p>
                                    </li>
                                </ol>
                            @endif
                            </li>
                        </ul>

                    </div>

                    <!-- <div class="formgroup">
                                                                                                                                                        <label for="contact_person_position">5. 聯絡人</label>
                                                                                                                                                        <select name="contact_person_position" id="contact_person_position">
                                                                                                                                                            <option value="1">廠長</option>
                                                                                                                                                            <option value="2">組長</option>
                                                                                                                                                            <option value="3">機修保養人</option>
                                                                                                                                                            <option value="4">操作員</option>
                                                                                                                                                            <option value="5">其他</option>
                                                                                                                                                        </select>
                                                                                                                                                        <ul>
                                                                                                                                                            <li><input type="text" name="other_contact_person_position" id="other_contact_person_position" placeholder="請輸入職位" style="display: none;"></li>
                                                                                                                                                        </ul>

                                                                                                                                                     </div>


                                                                                                                                                     <div class="formgroup subBlock">
                                                                                                                                                        <label for="contact_person_name">姓名 ：</label>
                                                                                                                                                        <p></p>
                                                                                                                                                        <input type="text" name="contact_person_name" id="contact_person_name">
                                                                                                                                                     </div>




                                                                                                                                                     <div class="formgroup phone_type subBlock">
                                                                                                                                                        <label for="contact_person_phone">公司電話 ：</label>
                                                                                                                                                        <ul>
                                                                                                                                                            <li><span>國碼</span><input type="text" name="contact_person_phone[country_code]" id="contact_country_code"></li>
                                                                                                                                                            <li><span>區碼</span><input type="text" name="contact_person_phone[area_code]" id="contact_area_code"></li>
                                                                                                                                                        </ul>
                                                                                                                                                        <ul>
                                                                                                                                                            <li><span>電話號碼</span><input type="text" name="contact_person_phone[phone_number]" id="contact_phone_number"></li>
                                                                                                                                                            <li><span>分機</span><input type="text" name="contact_person_phone[extension]" id="contact_extension"></li>
                                                                                                                                                        </ul>
                                                                                                                                                     </div>

                                                                                                                                                     <div class="formgroup subBlock">
                                                                                                                                                        <label for="contact_person_mobile">手機 ：</label>
                                                                                                                                                        <input type="text" name="contact_person_mobile" id="contact_person_mobile">
                                                                                                                                                        <p></p>
                                                                                                                                                     </div>

                                                                                                                                                     <div class="formgroup subBlock">
                                                                                                                                                        <label for="contact_person_email">E-mail ：</label>

                                                                                                                                                        <input type="email" name="contact_person_email" id="contact_person_email">
                                                                                                                                                        <p>{{ $crmMachine->contact_person_email }}</p>

                                                                                                                                                     </div>

                                                                                                                                                     <div class="formgroup subBlock">
                                                                                                                                                        <label for="contact_software_data">通訊軟體 ：</label>
                                                                                                                                                        <select name="contact_software_type" id="contact_software_type">
                                                                                                                                                            <option value="1">Whats APP</option>
                                                                                                                                                            <option value="2">Line</option>
                                                                                                                                                            <option value="3">WeChat</option>
                                                                                                                                                            <option value="4">其他</option>
                                                                                                                                                        </select>


                                                                                                                                                        <ul>
                                                                                                                                                            <li><input type="text" name="other_contact_software_type" id="other_contact_software_type" placeholder="請輸入你的通訊軟體" style="display: none;"></li>
                                                                                                                                                            <li><p>ID ：{{ $crmMachine->contact_software_id }}</p><input type="text" name="contact_software_data[software_id]" id="contact_software_id"></li>
                                                                                                                                                        </ul>

                                                                                                                                                     </div> -->

                    @if ($crmMachine->purchase_manufacturer == 4)
                        <div class="formgroup">
                            <span for="purchase_manufacturer">購入來源 </span>
                            <p>{{ $crmMachine->other_purchase_source }}</p>
                        </div>

                        <div class="formgroup subBlock">
                            <span>公司名稱</span>
                            <p>{{ $crmMachine->other_purchase_company_name }}</p>
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
                            @php
                                $manufacturerMap = [
                                    1 => '台灣歐西馬股份有限公司',
                                    2 => '速飛得(中國)',
                                    3 => '廣州貴鵬',
                                    4 => '其他管道',
                                ];
                            @endphp
                            <p>{{ $manufacturerMap[$crmMachine->purchase_manufacturer] ?? '' }}</p>
                        </div>
                        <div class="purchase_manufacturer_block">
                            <div class="formgroup subBlock">
                                <span>業務姓名 </span>
                                <p>{{ $crmMachine->purchase_manufacturer_person }}</p>
                            </div>
                            <div class="formgroup subBlock">
                                <span>手機號碼 </span>
                                <p>{{ $crmMachine->purchase_manufacturer_phone }}</p>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
            <button id="openFormBtn">新增聯絡人</button>
            <h5>機器聯絡人列表</h5>
            <table>
                <thead>
                    <tr>
                        <th>職稱</th>
                        <th>姓名</th>
                        <th>手機</th>
                        <th>電郵</th>
                        <th>通訊軟體</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crmMachinesContactlist as $crmMachinesContact)
                        <tr>
                            <td>{{ $crmMachinesContact->contact_person_position ?? '' }}</td>
                            <td>{{ $crmMachinesContact->contact_person_name ?? '' }}</td>
                            <td>{{ $crmMachinesContact->contact_person_mobile ?? '' }}</td>
                            <td>{{ $crmMachinesContact->contact_person_email ?? '' }}</td>
                            <td>{{ json_decode($crmMachinesContact->contact_commu_software)->type }}:{{ json_decode($crmMachinesContact->contact_commu_software)->id }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- <button id="openFormBtn">打開表單</button> -->

            <div id="modal" class="modal" style="{{ $errors->any() ? 'display: block;' : 'display: none;' }}">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <form method="post" id="contactForm"
                        action="{{ route('MachineContactAdd', ['machine' => $crmMachine]) }}">
                        @method('post')
                        @csrf

                        <!-- 表單內容... -->

                        <div class="formgroup">
                            <label for="contact_person_position">聯絡人</label>
                            <select name="contact_person_position" id="contact_person_position">
                                <option value="1">廠長</option>
                                <option value="2">組長</option>
                                <option value="3">機修保養人</option>
                                <option value="4">操作員</option>
                                <option value="5">其他</option>
                            </select>
                            <ul>
                                <li><input type="text" name="other_contact_person_position"
                                        id="other_contact_person_position" placeholder="請輸入職位" style="display: none;">
                                </li>
                            </ul>
                        </div>

                        <div class="formgroup subBlock">
                            <label for="contact_person_name">姓名 ：</label>
                            <p></p>
                            <input type="text" name="contact_person_name" id="contact_person_name">
                            @if ($errors->any())
                                <div class="alert alert-danger" style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="formgroup phone_type subBlock">
                            <label for="contact_person_phone">公司電話 ：</label>
                            <ul>
                                <li><span>國碼</span><input type="text" name="contact_person_phone[country_code]"
                                        id="contact_country_code"></li>
                                <li><span>區碼</span><input type="text" name="contact_person_phone[area_code]"
                                        id="contact_area_code"></li>
                            </ul>
                            <ul>
                                <li><span>電話號碼</span><input type="text" name="contact_person_phone[phone_number]"
                                        id="contact_phone_number"></li>
                                <li><span>分機</span><input type="text" name="contact_person_phone[extension]"
                                        id="contact_extension"></li>
                            </ul>
                        </div>

                        <div class="formgroup subBlock">
                            <label for="contact_person_mobile">手機 ：</label>
                            <input type="text" name="contact_person_mobile" id="contact_person_mobile">
                            <p></p>
                        </div>

                        <div class="formgroup subBlock">
                            <label for="contact_person_email">E-mail ：</label>

                            <input type="email" name="contact_person_email" id="contact_person_email">

                        </div>

                        <div class="formgroup subBlock">
                            <label for="contact_software_data">通訊軟體 ：</label>
                            <select name="contact_software_type" id="contact_software_type">
                                <option value="1">Whats APP</option>
                                <option value="2">Line</option>
                                <option value="3">WeChat</option>
                                <option value="4">其他</option>
                            </select>

                            <ul>
                                <li><input type="text" name="other_contact_software_type"
                                        id="other_contact_software_type" placeholder="請輸入你的通訊軟體" style="display: none;">
                                </li>
                                <li>
                                    <p>ID ：{{ $crmMachine->contact_software_id }}</p><input type="text"
                                        name="contact_software_data[software_id]" id="contact_software_id">
                                </li>
                            </ul>

                        </div>



                        <button type="submit">提交</button>
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
