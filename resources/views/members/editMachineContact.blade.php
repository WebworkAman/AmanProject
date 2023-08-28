@extends('layouts.content')

@section('content')

    <main>


        <div class="Show_form">

            <div id="companyDataEdit" class="companyDataEdit Machines-list">
                <h5>編輯機器聯絡人</h5>
                <form method="POST"
                    action="{{ route('updateMachineContact', ['machine' => $crmMachine, 'id' => $crmMachinesContact->id]) }}">
                    @csrf
                    @method('PUT')

                    <!-- 表單欄位... -->
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
                        <input type="text" name="contact_person_name" id="contact_person_name"
                            value="{{ $crmMachinesContact->contact_person_name }}">
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
                    @php
                        $ContactPersonPhone = json_decode($crmMachinesContact->contact_person_phone ?? '');
                    @endphp
                    <div class="formgroup phone_type subBlock">
                        <label for="contact_person_phone">公司電話 ：</label>
                        <ul>
                            <li><span>國碼</span><input type="text" name="contact_person_phone[country_code]"
                                    id="contact_country_code" value="{{ $ContactPersonPhone->country_code }}"></li>
                            <li><span>區碼</span><input type="text" name="contact_person_phone[postal_code]"
                                    id="contact_postal_code" value="{{ $ContactPersonPhone->postal_code }}"></li>
                        </ul>
                        <ul>
                            <li><span>電話號碼</span><input type="text" name="contact_person_phone[phone_number]"
                                    id="contact_phone_number" value="{{ $ContactPersonPhone->phone_number }}"></li>
                            <li><span>分機</span><input type="text" name="contact_person_phone[extension]"
                                    id="contact_extension" value="{{ $ContactPersonPhone->extension }}"></li>
                        </ul>
                    </div>

                    <div class="formgroup subBlock">
                        <label for="contact_person_mobile">手機 ：</label>
                        <input type="text" name="contact_person_mobile" id="contact_person_mobile"
                            value="{{ $crmMachinesContact->contact_person_mobile }}">
                        <p></p>
                    </div>

                    <div class="formgroup subBlock">
                        <label for="contact_person_email">E-mail ：</label>

                        <input type="email" name="contact_person_email" id="contact_person_email"
                            value="{{ $crmMachinesContact->contact_person_email }}" style="width:21vw;">

                    </div>
                    @php
                        $contactCommuSoftware = json_decode($crmMachinesContact->contact_commu_software ?? '');
                    @endphp
                    <div class="formgroup subBlock">
                        <label for="contact_software_data">通訊軟體 ：</label>
                        {{-- <select name="contact_software_type" id="contact_software_type">
                            <option value="1">Whats APP</option>
                            <option value="2">Line</option>
                            <option value="3">WeChat</option>
                            <option value="4">其他</option>
                        </select> --}}
                        <input type="text" name="contact_software_type" id="contact_software_type"
                            value="{{ $contactCommuSoftware->type }}">
                        <ul>
                            <li><input type="text" name="other_contact_software_type" id="other_contact_software_type"
                                    placeholder="請輸入你的通訊軟體" style="display: none;">
                            </li>
                            <li>
                                <p>ID ：</p><input type="text" name="contact_software_data[software_id]"
                                    id="contact_software_id" value="{{ $contactCommuSoftware->id }}">
                            </li>
                        </ul>

                    </div>

                    <button type="submit" id="submitButton">更新</button>
                </form>

            </div>
        </div>
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
    </main>
@endsection
