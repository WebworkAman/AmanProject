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
                        $table->string('identity')->nullable();
                        $table->string('phone')->nullable();
            
                        // 將原本的公司基本資料欄位移至新的區塊
                        $table->string('company_name')->nullable();
                        $table->string('company_address')->nullable();
                        $table->string('tax_id')->nullable();
                        $table->string('company_phone')->nullable();
                        $table->string('company_fax')->nullable();
                        $table->string('company_website')->nullable();
                        $table->string('company_ceo')->nullable();
                        $table->string('purchase_person')->nullable();
                        $table->string('purchase_person_phone')->nullable();
                        $table->string('purchase_person_ext')->nullable();
                        $table->string('purchase_person_email')->nullable();
                        $table->string('other_info')->nullable();
            
                        // 將原本的機器基本資料欄位移至新的區塊
                        $table->string('purchase_date')->nullable();
                        $table->string('machine_model')->nullable();
                        $table->string('machine_serial')->nullable();
                        $table->string('machine_installation')->nullable();
            
                        // 將原本的聯絡人欄位移至新的區塊
                        $table->string('contact_person')->nullable();
                        $table->string('contact_person_name')->nullable();
                        $table->string('contact_person_phone')->nullable();
                        $table->string('contact_person_ext')->nullable();
                        $table->string('contact_person_mobile')->nullable();
                        $table->string('contact_person_email')->nullable();
                        $table->string('contact_software')->nullable();
                        $table->string('purchase_source')->nullable();
            
                        // 新增其他說明欄位
                        $table->text('other_description')->nullable();
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
                        $table->dropColumn('phone');
            
                        // 將原本的公司基本資料欄位移回舊的區塊
                        $table->dropColumn('company_name');
                        $table->dropColumn('company_address');
                        $table->dropColumn('tax_id');
                        $table->dropColumn('company_phone');
                        $table->dropColumn('company_fax');
                        $table->dropColumn('company_website');
                        $table->dropColumn('company_ceo');
                        $table->dropColumn('purchase_person');
                        $table->dropColumn('purchase_person_phone');
                        $table->dropColumn('purchase_person_ext');
                        $table->dropColumn('purchase_person_email');
                        $table->dropColumn('other_info');
            
                        // 將原本的機器基本資料欄位移回舊的區塊
                        $table->dropColumn('purchase_date');
                        $table->dropColumn('machine_model');
                        $table->dropColumn('machine_serial');
                        $table->dropColumn('machine_installation');
            
                        // 將原本的聯絡人欄位移回舊的區塊
                        $table->dropColumn('contact_person');
                        $table->dropColumn('contact_person_name');
                        $table->dropColumn('contact_person_phone');
                        $table->dropColumn('contact_person_ext');
                        $table->dropColumn('contact_person_mobile');
                        $table->dropColumn('contact_person_email');
                        $table->dropColumn('contact_software');
                        $table->dropColumn('purchase_source');
            
                        // 刪除其他說明欄位
                        $table->dropColumn('other_description');
        });
    }
}
