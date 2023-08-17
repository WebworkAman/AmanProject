<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCRMMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CRM_Machines', function (Blueprint $table) {
            $table->id();

            $table->string('company_ERP_id', 10)->index();
            $table->string('company_tax_id', 20)->nullable()->index();

            // 將原本的機器基本資料欄位移至新的區塊
            $table->date('machine_purchase_date');
            $table->string('machine_model',40);
            $table->string('machine_serial',40)->index();
            
            $table->json('installation_company_address')->nullable();

            $table->string('installation_company_country',40)->nullable();
            $table->string('installation_company_postal_code',40)->nullable();
            $table->string('installation_company_region',40)->nullable();
            $table->string('installation_company_city',40)->nullable();
            $table->string('installation_company_street',40)->nullable();

            $table->string('installation_company_name',40);
            $table->string('installation_vat_number',10)->nullable();
            $table->json('installation_company_phone');
            $table->json('installation_company_fax')->nullable();

            $table->string('purchase_manufacturer',40)->nullable();
            $table->string('purchase_manufacturer_person',40)->nullable();
            $table->string('purchase_manufacturer_phone',40)->nullable();

            // 將原本的聯絡人欄位移至新的區塊
            $table->string('other_purchase_source',40)->nullable();
            $table->string('other_purchase_company_name',40)->nullable();
            $table->json('other_purchase_company_address')->nullable();
            $table->string('other_purchase_tax_id',10)->nullable();
            $table->json('other_purchase_company_phone')->nullable();
            $table->string('other_purchase_name',40)->nullable();
            $table->string('other_purchase_phone',30)->nullable();
            $table->string('other_purchase_description',100)->nullable();

            // 新增其他說明欄位
            $table->string('stat_info',1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CRM_Machines');
    }
}
