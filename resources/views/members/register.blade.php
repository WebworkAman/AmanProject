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
    <div class="formgroup">
        <label class="input" for="phone">手機</label>
        
        <input type="text" name="phone" id="phone">
        
    </div>

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
        <input type="text" name="company_address" id="company_address">
    </div>

    <div class="formgroup">
        <label for="tax_id">統一編號</label>
        <input type="text" name="tax_id" id="tax_id">
    </div>

    <div class="formgroup">
        <label for="company_phone">公司電話</label>
        <input type="text" name="company_phone" id="company_phone">
    </div>

    <div class="formgroup">
        <label for="company_fax">公司傳真</label>
        <input type="text" name="company_fax" id="company_fax">
    </div>

    <div class="formgroup">
        <label for="company_website">公司網址</label>
        <input type="text" name="company_website" id="company_website">
    </div>

    <div class="formgroup">
        <label for="company_ceo">公司負責人(董事長)</label>
        <input type="text" name="company_ceo" id="company_ceo">
    </div>

    <div class="formgroup">
        <label for="purchase_person">採購人員</label>
        <input type="text" name="purchase_person" id="purchase_person">
    </div>

    <div class="formgroup">
        <label for="purchase_person_phone">採購人員電話</label>
        <input type="text" name="purchase_person_phone" id="purchase_person_phone">
    </div>

    <div class="formgroup">
        <label for="purchase_person_ext">採購人員分機</label>
        <input type="text" name="purchase_person_ext" id="purchase_person_ext">
    </div>

    <div class="formgroup">
        <label for="purchase_person_email">E-mail</label>
        <input type="email" name="purchase_person_email" id="purchase_person_email">
    </div>

    <div class="formgroup">
        <label for="other_info">其他說明</label>
        <input type="text" name="other_info" id="other_info">
    </div>

    <!-- 機器基本資料建檔 -->
    <h2>二、機器基本資料建檔 (採購註冊)</h2>

    <div class="formgroup">
        <label for="purchase_date">購買日期</label>
        <input type="date" name="purchase_date" id="purchase_date">
    </div>

    <div class="formgroup">
        <label for="machine_model">機器型號</label>
        <input type="text" name="machine_model" id="machine_model">
    </div>

    <div class="formgroup">
        <label for="machine_serial">機器序號</label>
        <input type="text" name="machine_serial" id="machine_serial">
    </div>

    <div class="formgroup">
        <label for="machine_installation">機器安裝地址</label>
        <input type="text" name="machine_installation" id="machine_installation">
    </div>

    <!-- 聯絡人 -->
    <h2>三、聯絡人</h2>

    <div class="formgroup">
        <label for="contact_person">聯絡人</label>
        <select name="contact_person" id="contact_person">
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
        <input type="text" name="contact_person_phone" id="contact_person_phone">
    </div>

    <div class="formgroup">
        <label for="contact_person_ext">分機</label>
        <input type="text" name="contact_person_ext" id="contact_person_ext">
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
        <label for="contact_software">通訊軟體</label>
        <select name="contact_software" id="contact_software">
            <option value="1">Whats APP</option>
            <option value="2">Line</option>
            <option value="3">WeChat</option>
            <option value="4">其他</option>
        </select>
    </div>

    <div class="formgroup">
        <label for="purchase_source">購入來源</label>
        <select name="purchase_source" id="purchase_source">
            <option value="1">製造商</option>
            <option value="2">台灣歐西瑪股份有限公司</option>
            <option value="3">速飛得(中國)</option>
            <option value="4">廣州貴鵬</option>
            <option value="5">其他</option>
        </select>
    </div>

    <!-- 其他說明 -->
    <div class="formgroup">
        <label for="other_description">其他說明</label>
        <input name="other_description" id="other_description" cols="30" rows="10"></input>
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
   

