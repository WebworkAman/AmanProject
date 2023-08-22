@extends('layouts.content')

@section('content')

     <main>


     <div class="Show_form">
                    
     <!-- <h3>新 增 機 器 資 料 </h3> -->
                
                    
     <a class="btn control-option" href="{{route('companyMachineList')}}" style="width:112px;">返回</a>
                    

                    

  

    
     <div id="companyDataEdit" class="companyDataEdit Machines-list">
      
      <form method="post" action="{{ route('companyMachineAddPost') }}">
          @method('post') 
           @csrf
          
        <div class="CompanyData-nav">
               <h2>機器基本資料建檔 (採購註冊)</h2>
        </div>
    
    <div id="machineData" style="display: block;">
    <label for=""><span>公司名稱：</span>{{$crmMainCustInfo->company_name?? '尚未建立公司資料'}}</label>                     
     </br></br>
     <label for=""><span>統一編號：</span>{{$crmMainCustInfo->company_tax_id?? '尚未建立公司資料'}}</label>
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
    </div>
    <div class="formgroup installation_type">
        
        <ul>
            <li><span>公司名稱 ：</span><input type="text" name="installation_company_name" id="installation_company_name"></li>
            
            
                
            <li><span id="installation_company_address">公司地址 ：</span></li>
            <ol>
               <li><span>國家</span><input type="text" name="installation_company_address[installation_country]" id="installation_country"></li>
               <li><span>郵遞區號</span><input type="text" name="installation_company_address[installation_postal_code]" id="installation_postal_code"></li>
               <li><span>區域</span><input type="text" name="installation_company_address[installation_region]" id="installation_region"></li>
            </ol>
            <ol>
            <li><span>城市</span><input type="text" name="installation_company_address[installation_city]" id="installation_city"></li>
               <li><span>街/路名</span><input type="text" name="installation_company_address[installation_street]" id="installation_street"></li>
            </ol>

                
           
            <li><span>統一編號 ：</span><input type="text" name="installation_vat_number" id="installation_vat_number"></li>
            
             
            <li><span id="installation_company_phone">公司電話 ：</span></li>
                <ol>
                     <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_1]" id="installation_phone_country_code_1"></li>
                     <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_1]" id="installation_phone_area_code_1"></li>
                     <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_1]" id="installation_phone_number_1"></li>
                </ol>
                <ol>
                     <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_2]" id="installation_phone_country_code_2"></li>
                     <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_2]" id="installation_phone_area_code_2"></li>
                     <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_2]" id="installation_phone_number_2"></li>
                </ol>
                <ol>
                     <li><span>國碼</span><input type="text" name="installation_company_phone[country_code_3]" id="installation_phone_country_code_3"></li>
                     <li><span>區碼</span><input type="text" name="installation_company_phone[area_code_3]" id="installation_phone_area_code_3"></li>
                     <li><span>電話號碼</span><input type="text" name="installation_company_phone[phone_number_3]" id="installation_phone_number_3"></li>
                </ol>

                
            <li>
            <li><span id="installation_company_fax">公司傳真 ：</span></li>
            <ol>
                
                <li><span>國碼</span><input type="text" name="installation_company_fax[country_code]" id="installation_fax_country_code"></li>
                <li><span>區碼</span><input type="text" name="installation_company_fax[area_code]" id="installation_fax_area_code"></li>
                <li><span>電話號碼</span><input type="text" name="installation_company_fax[fax_number]" id="installation_fax_number"></li>
             </ol>
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
            <li><input type="text" name="other_contact_software_type" id="other_contact_software_type" placeholder="請輸入你的通訊軟體" style="display: none;"></li>
            <li><p>ID ：</p><input type="text" name="contact_software_data[software_id]" id="contact_software_id"></li>
         </ul>        
    </div> -->

    <div class="formgroup">
        <label for="purchase_manufacturer">5. 購入來源｜製造商</label>
        <select name="purchase_manufacturer" id="purchase_manufacturer">
            <option value="1">台灣歐西瑪股份有限公司</option>
            <option value="2">速飛得(中國)</option>
            <option value="3">廣州貴鵬</option>
            <option value="4">其他</option>
        </select>
    </div>

    <div class="purchase_manufacturer_block">
         <div class="formgroup subBlock">
             <span>業務姓名 </span><input type="text" name="purchase_manufacturer_person" id="purchase_manufacturer_person">
         </div>
         <div class="formgroup subBlock">
             <span>手機號碼 </span><input type="text" name="purchase_manufacturer_phone" id="purchase_manufacturer_phone">
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
            <li><input type="text" name="other_other_purchase_source" id="other_other_purchase_source" placeholder="請輸入其他購入來源" style="display: none;"></li>
        </ul>
    </div>
    <div class="formgroup subBlock">
        <span>1.公司名稱</span><input type="text" name="other_purchase_company_name" id="other_purchase_company_name">
    </div> 
    <div class="formgroup subBlock">
        <span id="other_purchase_company_address">2.公司地址</span>
    </div>
    <div class="formgroup phone_type subBlock">
        <ul>
            <li><span>國家</span><input type="text" name="other_purchase_company_address[country]" id="other_purchase_country"></li>
            <li><span>郵遞區號</span><input type="text" name="other_purchase_company_address[postal_code]" id="other_purchase_postal_code"></li>
            <li><span>區域</span><input type="text" name="other_purchase_company_address[region]" id="other_purchase_region"></li>
        </ul>
        <ul>
        <li><span>城市</span><input type="text" name="other_purchase_company_address[city]" id="other_purchase_city"></li>
            <li><span>街/路名</span><input type="text" name="other_purchase_company_address[street]" id="other_purchase_street"></li>
        </ul>
    </div> 
    <div class="formgroup subBlock">
        <span>3.統一編號 </span><input type="text" name="other_purchase_tax_id" id="other_purchase_tax_id">
    </div> 
    <div class="formgroup subBlock">
        <span id="other_purchase_company_phone">4. 公司電話</span>
    </div>
    <div class="formgroup phone_type subBlock">
        <ul>
            <li><span>國碼</span><input type="text" name="other_purchase_company_phone[country_code]" id="other_purchase_phone_country_code"></li>
            <li><span>區碼</span><input type="text" name="other_purchase_company_phone[area_code]" id="other_purchase_phone_area_code"></li>
            <li><span>電話號碼</span><input type="text" name="other_purchase_company_phone[phone_number]" id="other_purchase_phone_number"></li>
        </ul>

    </div>
    <div class="formgroup subBlock">
       <span>5. 聯絡人</span>
    </div>
    <div class="formgroup phone_type subBlock">
        
        <ul>
            <li><span>姓名</span><input type="text" name="other_purchase_name" id="other_purchase_name"></li>
            <li><span>手機</span><input type="text" name="other_purchase_phone" id="other_purchase_phone"></li>
        </ul>
    </div>

    <!-- 其他說明 -->
    <div class="formgroup">
        <label for="other_purchase_description">其他說明</label>
        <!-- <input name="other_purchase_description" id="other_purchase_description" cols="30" rows="10"></input> -->
        <textarea name="other_purchase_description" id="other_purchase_description" cols="30" rows="10"></textarea>
    </div>

    </div>
    </div>


             <div class="baseline"></div>
             <button id="submitButton">儲存</button>
        </form> 
                                                                
    </div>            
                       
</div>



    </div>

        
    </main>

    <script>
    // 當頁面載入完成時
    $(document).ready(function(){
        // 監聽選擇聯絡人的 select 元素
        $("#contact_person_position").change(function(){
            //獲取選擇的值
            var selectedValue = $(this).val();

            //如果選擇的值為 "5" (其他)
            if(selectedValue == "5"){
                //顯示輸入框
                $("#other_contact_person_position").show();
            }else{
                //隱藏輸入匡
                $("#other_contact_person_position").hide();
            }
        }
        )
    });
        // 當頁面載入完成時
        $(document).ready(function(){
        // 監聽選擇聯絡人的 select 元素
        $("#contact_software_type").change(function(){
            //獲取選擇的值
            var selectedValue = $(this).val();

            //如果選擇的值為 "5" (其他)
            if(selectedValue == "4"){
                //顯示輸入框
                $("#other_contact_software_type").show();
            }else{
                //隱藏輸入匡
                $("#other_contact_software_type").hide();
            }
        }
        )
    })

      // 當頁面載入完成時
            $(document).ready(function(){
        // 監聽選擇聯絡人的 select 元素
        $("#purchase_manufacturer").change(function(){
            //獲取選擇的值
            var selectedValue = $(this).val();

            //如果選擇的值為 "4" (其他)
            if(selectedValue == "4"){
                //顯示輸入框
                $(".other_purchase_source_block").show();
                $(".purchase_manufacturer_block").hide();
            }else{
                //隱藏輸入匡
                $(".other_purchase_source_block").hide();
                $(".purchase_manufacturer_block").show();
            }
        }
        )
    })

            // 當頁面載入完成時
    $(document).ready(function(){
        // 監聽選擇聯絡人的 select 元素
        $("#other_purchase_source").change(function(){
            //獲取選擇的值
            var selectedValue = $(this).val();

            //如果選擇的值為 "6" (其他)
            if(selectedValue == "6"){
                //顯示輸入框
                $("#other_other_purchase_source").show();
            }else{
                //隱藏輸入匡
                $("#other_other_purchase_source").hide();
            }
        }
        )
    })

</script>
@endsection 