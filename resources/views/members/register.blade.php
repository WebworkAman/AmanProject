 <html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<main>
<h1 class="topText"><img src="{{asset('imgs/logo-01.png')}}"></h1>

<div class="log">
<!-- <div class="right">
    <img src="../imgs/Illustration1.png">
</div> -->
<div class="left">
    <h1>新 會 員 註 冊</h1>
    <div class="fontline"></div>
    <div class="txt">

        <!-- <p>已經是會員?</p><a href="{{route('members.session.create')}}">  點 此 登 入 吧</a> -->
    </div>   
    <form
     method="post"
     action="{{ route('members.store') }}"
    >
       @csrf


    
    
    <div class="formgroup">
        <label for="identity">註冊人身份</label>
        <select name="identity" id="identity">
            <option value="1">採購</option>
            <option value="2">廠長</option>
        </select>
    </div>
     

    <div class="formgroup">
        <label for="name">姓名</label>
        <input type="text" name=name value="{{old('name')}}">
        <br/>
        <p class="text-danger">@error('name') {{$message}} @enderror</p>
        
    </div>
    <!-- <div class="formgroup">
        <label class="input" for="phone">手機</label>
        
        <input type="text" name="phone" id="phone">
        
    </div> -->

    <div class="formgroup">
       <label class="input">電子郵件</label>
          <input type="email" name="email" value="{{old('email')}}">
          <p class="text-danger">@error('email') {{$message}} @enderror</p>
       
    </div>
    <div class="formgroup">
       <label class="input"> 密碼 </label>        
          <input type="password" name="password" value="{{old('password')}}">
          <p class="text-danger">@error('password') {{$message}} @enderror</p>
       
    </div>

    <div class="formgroup">
       <label class="input">再次輸入密碼 </label>
                 
           <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
          <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
       
    </div>


    <div class="baseline"></div>
    <!-- <div>
        <label for="password">修改密碼</label>
        <input type="password" name="password" id="password">
    </div> -->

    <!-- <div>
        <label for="second_password">第二次登入或以後登入，目的是為(新增)或(修改)必需取得驗證碼</label>
        <input type="password" name="second_password" id="second_password">
    </div> -->

    <!-- 公司基本資料 -->
    <h2>一、公司基本資料</h2>

    <div class="formgroup">
        <label for="company_name">公司名稱</label>
        <input type="text" name="company_name" id="company_name">
    </div>

    <div class="formgroup">
        <label for="company_address">公司地址</label>
        <!-- <input type="hidden" name="company_address" id="company_address"> -->
        <ul>
            <li><span>國家</span> <input type="text" name="company_address[country]" id="country"></li>
            <li><span>郵遞區號</span><input type="text" name="company_address[postal_code]" id="postal_code"></li>
            <li><span>區域</span><input type="text" name="company_address[region]" id="region"></li>
            <li><span>城市</span><input type="text" name="company_address[city]" id="city"></li>
            <li><span>街/路名</span><input type="text" name="company_address[street]" id="street"></li>
        </ul>
    </div>

    <div class="formgroup">
        <label for="company_tax_id">統一編號</label>
        <input type="text" name="company_tax_id" id="company_tax_id">
    </div>

    <div class="formgroup">
        <label for="company_phone">公司電話</label>
       
        <ul>
            <li><span>國碼</span><input type="text" name="company_phone[country_code_1]" id="country_code_1"></li>
            <li><span>區碼</span><input type="text" name="company_phone[area_code_1]" id="area_code_1"></li>
            <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_1]" id="phone_number_1"></li>
            <div class="fontline"></div>
            <li><span>國碼</span><input type="text" name="company_phone[country_code_2]" id="country_code_2"></li>
            <li><span>區碼</span><input type="text" name="company_phone[area_code_2]" id="area_code_2"></li>
            <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_2]" id="phone_number_2"></li>
            <div class="fontline"></div>
            <li><span>國碼</span><input type="text" name="company_phone[country_code_3]" id="country_code_3"></li>
            <li><span>區碼</span><input type="text" name="company_phone[area_code_3]" id="area_code_3"></li>
            <li><span>電話號碼</span><input type="text" name="company_phone[phone_number_3]" id="phone_number_3"></li>
            <div class="fontline"></div>
        </ul>
    </div>

    <div class="formgroup">
        <label for="company_fax">公司傳真</label>
        <!-- <input type="text" name="company_fax" id="company_fax"> -->
        <ul>
            <li><span>國碼</span><input type="text" name="company_fax[country_code]" id="country_code"></li>
            <li><span>區碼</span><input type="text" name="company_fax[area_code]" id="area_code"></li>
            <li><span>電話號碼</span><input type="text" name="company_fax[phone_number]" id="phone_number"></li>
        </ul>
    </div>

    <div class="formgroup">
        <label for="company_website">公司網址</label>
        <span>WWW.</span>
        <input type="text" name="company_website" id="company_website">
    </div>

    <div class="formgroup">
        <label for="company_ceo">公司負責人(董事長)</label>
        <input type="text" name="company_ceo" id="company_ceo">
    </div>

    <div class="formgroup">
        <label for="company_purchase_person">採購人員</label>
        <ul>
            <li><span>姓名</span><input type="text" name="company_purchase_person_name" id="company_purchase_person_name"></li>
            <li><span>國碼</span><input type="text" name="company_purchase_person_phone[purchase_country_code]" id="purchase_country_code"></li>
            <li><span>區碼</span><input type="text" name="company_purchase_person_phone[purchase_area_code]" id="purchase_area_code"></li>
            <li><span>電話號碼</span><input type="text" name="company_purchase_person_phone[purchase_phone_number]" id="purchase_phone_number"></li>
            <li><span>分機</span><input type="text" name="company_purchase_person_phone[purchase_extension]" id="purchase_extension"></li>
        </ul>
    </div>

    <div class="formgroup">
        <label for="company_email">E-mail</label>
        <input type="email" name="company_email" id="company_email">
    </div>

    <div class="formgroup">
        <label for="company_other_info">其他說明</label>
        <input type="text" name="company_other_info" id="company_other_info">
    </div>
    <div class="baseline"></div>
    <!-- 機器基本資料建檔 -->
    <h2>二、機器基本資料建檔 (採購註冊)</h2>

    <div class="formgroup">
        <label for="machine_purchase_date">1. 購買日期</label>
        <input type="date" name="machine_purchase_date" id="machine_purchase_date">
    </div>

    <div class="formgroup">
        <label for="machine_model">2. 機器型號</label>
        <input type="text" name="machine_model" id="machine_model" Placeholder="字元最長15碼">
    </div>

    <div class="formgroup">
        <label for="machine_serial">3. 機器序號</label>
        <input type="text" name="machine_serial" id="machine_serial" Placeholder="字元最長15碼">
    </div>

    <div class="formgroup">
        <label for="machine_installation">4. 機器安裝地址</label>
        <ul>
            <li><span>公司名稱</span><input type="text" name="installation_company_name" id="installation_company_name"></li>
            
            <li>
                <ol>
                    <span id="installation_company_address">公司地址</span>
                    <li><span>國家</span><input type="text" name="installation_company_address[installation_country]" id="installation_country"></li>
                    <li><span>郵遞區號</span><input type="text" name="installation_company_address[installation_postal_code]" id="installation_postal_code"></li>
                    <li><span>區域</span><input type="text" name="installation_company_address[installation_region]" id="installation_region"></li>
                    <li><span>城市</span><input type="text" name="installation_company_address[installation_city]" id="installation_city"></li>
                    <li><span>街/路名</span><input type="text" name="installation_company_address[installation_street]" id="installation_street"></li>
                </ol>
            </li>
            <li>統一編號<input type="text" name="installation_vat_number" id="installation_vat_number"></li>
            <li>
             <ol>
                <li><span id="installation_company_phone">公司電話</span></li>
                <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_1]" id="installation_phone_country_code_1"></li>
                <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_1]" id="installation_phone_area_code_1"></li>
                <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_1]" id="installation_phone_number_1"></li>
                <div class="fontline"></div>
                <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_2]" id="installation_phone_country_code_2"></li>
                <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_2]" id="installation_phone_area_code_2"></li>
                <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_2]" id="installation_phone_number_2"></li>
                <div class="fontline"></div>
                <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_3]" id="installation_phone_country_code_3"></li>
                <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_3]" id="installation_phone_area_code_3"></li>
                <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_3]" id="installation_phone_number_3"></li>
                <div class="fontline"></div>
             </ol>
            </li>
            <li>
            <ol>
                <li><span id="installation_company_fax">公司傳真</span></li>
                <li><span>國碼</span><input type="text" name="installation_company_fax[country_code]" id="installation_fax_country_code"></li>
                <li><span>區碼</span><input type="text" name="installation_company_fax[area_code]" id="installation_fax_area_code"></li>
                <li><span>電話號碼</span><input type="text" name="installation_company_fax[fax_number]" id="installation_fax_number"></li>
             </ol>
            </li>
        </ul>

    </div>

    <div class="formgroup">
        <label for="contact_person_position">5. 聯絡人</label>
        <select name="contact_person_position" id="contact_person_position">
            <option value="1">廠長</option>
            <option value="2">組長</option>
            <option value="3">機修保養人</option>
            <option value="4">操作員</option>
            <option value="5">其他</option>
        </select>
    </div>

    <div class="formgroup">
        <label for="contact_person_name">姓名</label>
        <input type="text" name="contact_person_name" id="contact_person_name">
    </div>

    <div class="formgroup">
        <label for="contact_person_phone">公司電話</label>
        <ul>
            <li><span>國碼</span><input type="text" name="contact_person_phone[country_code]" id="contact_country_code"></li>
            <li><span>區碼</span><input type="text" name="contact_person_phone[area_code]" id="contact_area_code"></li>
            <li><span>電話號碼</span><input type="text" name="contact_person_phone[phone_number]" id="contact_phone_number"></li>
            <li><span>分機</span><input type="text" name="contact_person_phone[extension]" id="contact_extension"></li>
        </ul>
    </div>

    <div class="formgroup">
        <label for="contact_person_mobile">手機</label>
        <input type="text" name="contact_person_mobile" id="contact_person_mobile">
    </div>

    <div class="formgroup">
        <label for="contact_person_email">E-mail</label>
        <input type="email" name="contact_person_email" id="contact_person_email">
    </div>

    <div class="formgroup">
        <label for="contact_software_data">通訊軟體</label>
        <select name="contact_software_type" id="contact_software_type">
            <option value="1">Whats APP</option>
            <option value="2">Line</option>
            <option value="3">WeChat</option>
            <option value="4">其他</option>
        </select>

        <input type="text" name="contact_software_data[software_id]" id="contact_software_id">
    </div>

    <div class="formgroup">
        <label for="purchase_manufacturer">6. 購入來源</label>
        <select name="purchase_manufacturer" id="purchase_manufacturer">
            <option value="1">製造商</option>
            <option value="2">台灣歐西瑪股份有限公司</option>
            <option value="3">速飛得(中國)</option>
            <option value="4">廣州貴鵬</option>
            <option value="5">其他</option>
        </select>
    </div>

    <div class="formgroup">
        <span>業務姓名</span><input type="text" name="purchase_manufacturer_person" id="purchase_manufacturer_person">
    </div>
    <div class="formgroup">
        <span>手機號碼</span><input type="text" name="purchase_manufacturer_phone" id="purchase_manufacturer_phone">
    </div>

    <div class="formgroup">
        <label for="other_purchase_source">其他管道</label>
        <select name="other_purchase_source" id="other_purchase_source">
            <option value="1">1. 製造商同業</option>
            <option value="2">2. 代理商</option>
            <option value="3">3. 貿易商</option>
            <option value="4">4. 成衣廠</option>
            <option value="5">5. 針車行</option>
            <option value="6">6. 其他</option>
        </select>
        <ul>
            <li><span>1.公司名稱</span><input type="text" name="other_purchase_company_name" id="other_purchase_company_name"></li>
            
            <li>
                <ol>
                <span id="other_purchase_company_address">2.公司地址</span>
                    <li><span>國家</span><input type="text" name="other_purchase_company_address[country]" id="other_purchase_country"></li>
                    <li><span>郵遞區號</span><input type="text" name="other_purchase_company_address[postal_code]" id="other_purchase_postal_code"></li>
                    <li><span>區域</span><input type="text" name="other_purchase_company_address[region]" id="other_purchase_region"></li>
                    <li><span>城市</span><input type="text" name="other_purchase_company_address[city]" id="other_purchase_city"></li>
                    <li><span>街/路名</span><input type="text" name="other_purchase_company_address[street]" id="other_purchase_street"></li>
                </ol>
            </li>
            <li>3.統一編號<input type="text" name="other_purchase_tax_id" id="other_purchase_tax_id"></li>

            <li><span id="other_purchase_company_phone">4.公司電話</span></li>
            <li><span>國碼</span><input type="text" name="other_purchase_company_phone[country_code]" id="other_purchase_phone_country_code"></li>
            <li><span>區碼</span><input type="text" name="other_purchase_company_phone[area_code]" id="other_purchase_phone_area_code"></li>
            <li><span>電話號碼</span><input type="text" name="other_purchase_company_phone[phone_number]" id="other_purchase_phone_number"></li>

            <li><span>5.聯絡人</span></li>
            <li><span>姓名</span><input type="text" name="other_purchase_name" id="other_purchase_name"></li>
            <li><span>手機</span><input type="text" name="other_purchase_phone" id="other_purchase_phone"></li>
        </ul>
    </div>

    <!-- 其他說明 -->
    <div class="formgroup">
        <label for="other_purchase_description">其他說明</label>
        <input name="other_purchase_description" id="other_purchase_description" cols="30" rows="10"></input>
    </div>

<div>
    <button type="submit">
         註 冊 提 交
    </button>
</div>

@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
</form>
</div>






</div>


</main>      

</body>

 </html>  
   

