<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCRMMainCustInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CRM_MainCust_Info', function (Blueprint $table) {
            $table->id();
            $table->string('company_ERP_id', 10)->index();
            $table->string('company_tax_id', 20)->nullable()->index();
            $table->string('company_name',40)->nullable();
            $table->json('company_address')->nullable();
            $table->json('company_phone')->nullable();
            $table->json('company_fax')->nullable();
            $table->string('company_website',100)->nullable();
            $table->string('company_ceo',40)->nullable();
            $table->string('company_purchase_person_name',40)->nullable();
            $table->json('company_purchase_person_phone')->nullable();
            $table->string('company_email',40)->nullable();
            $table->string('company_other_info',100)->nullable();
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
        Schema::dropIfExists('CRM_MainCust_Info');

        
    }
}
