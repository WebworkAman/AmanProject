<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
                        // 新增欄位
                        //基本資料
                        $table->string('identity')->nullable();

                     
                        // 將原本的公司基本資料欄位移至新的區塊
                        $table->string('company_name')->nullable();
                        $table->json('company_address')->nullable();
                        $table->string('company_tax_id')->nullable();
                        $table->json('company_phone')->nullable();
                        $table->json('company_fax')->nullable();
                        $table->string('company_website')->nullable();
                        $table->string('company_ceo')->nullable();
                        $table->string('company_purchase_person_name')->nullable();
                        $table->json('company_purchase_person_phone')->nullable();
                        $table->string('company_email')->nullable();
                        $table->string('company_other_info')->nullable();
            
                        // 將原本的機器基本資料欄位移至新的區塊
                        $table->date('machine_purchase_date')->nullable();
                        $table->string('machine_model')->nullable();
                        $table->string('machine_serial')->nullable();
                        // 機器安裝地址
                        $table->string('installation_company_name')->nullable();
                        $table->json('installation_company_address')->nullable();
                        $table->string('installation_vat_number')->nullable();
                        $table->json('installation_company_phone')->nullable();
                        $table->string('installation_company_fax')->nullable();

                        // 將原本的聯絡人欄位移至新的區塊
                        $table->string('contact_person_position')->nullable();
                        $table->string('contact_person_name')->nullable();
                        $table->json('contact_person_phone')->nullable();
                        $table->string('contact_person_mobile')->nullable();
                        $table->string('contact_person_email')->nullable();
                        $table->json('contact_software_data')->nullable();


                        //購入來源
                        //製造商
                        $table->string('purchase_manufacturer')->nullable();
                        $table->string('purchase_manufacturer_person')->nullable();
                        $table->string('purchase_manufacturer_phone')->nullable();

                        //其他管道 
                        $table->string('other_purchase_source')->nullable();
                        $table->string('other_purchase_company_name')->nullable();
                        $table->json('other_purchase_company_address')->nullable();
                        $table->string('other_purchase_tax_id')->nullable();
                        $table->json('other_purchase_company_phone')->nullable();
                        $table->string('other_purchase_name')->nullable();
                        $table->string('other_purchase_phone')->nullable();
                        $table->text('other_purchase_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('members', function (Blueprint $table) {
        // 刪除欄位
        $table->dropColumn('identity');

        // 將原本的公司基本資料欄位移回舊的區塊
        $table->dropColumn('company_name');
        $table->dropColumn('company_address');
        $table->dropColumn('company_tax_id');
        $table->dropColumn('company_phone');
        $table->dropColumn('company_fax');
        $table->dropColumn('company_website');
        $table->dropColumn('company_ceo');
        $table->dropColumn('company_purchase_person_name');
        $table->dropColumn('company_purchase_person_phone');
        $table->dropColumn('company_email');
        $table->dropColumn('company_other_info');

        // 將原本的機器基本資料欄位移回舊的區塊
        $table->dropColumn('machine_purchase_date');
        $table->dropColumn('machine_model');
        $table->dropColumn('machine_serial');

        // 機器安裝地址
        $table->dropColumn('installation_company_name');
        $table->dropColumn('installation_company_address');
        $table->dropColumn('installation_vat_number');
        $table->dropColumn('installation_company_phone');
        $table->dropColumn('installation_company_fax');

        // 將原本的聯絡人欄位移回舊的區塊
        $table->dropColumn('contact_person_position');
        $table->dropColumn('contact_person_name');
        $table->dropColumn('contact_person_phone');
        $table->dropColumn('contact_person_mobile');
        $table->dropColumn('contact_person_email');
        $table->dropColumn('contact_software_data');

        // 購入來源
        // 製造商
        $table->dropColumn('purchase_manufacturer');
        $table->dropColumn('purchase_manufacturer_person');
        $table->dropColumn('purchase_manufacturer_phone');

        // 其他管道
        $table->dropColumn('other_purchase_source');
        $table->dropColumn('other_purchase_company_name');
        $table->dropColumn('other_purchase_company_address');
        $table->dropColumn('other_purchase_tax_id');
        $table->dropColumn('other_purchase_company_phone');
        $table->dropColumn('other_purchase_name');
        $table->dropColumn('other_purchase_phone');
        $table->dropColumn('other_purchase_description');
    });
}

}
