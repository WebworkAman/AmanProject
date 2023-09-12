<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCRMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CRM_Products', function (Blueprint $table) {

            //新增欄位
            $table->foreignId('CRM_Product_Series_id')->constrained('CRM_Product_Series')->after('id');
            $table->string('relatedLink')->after('img_url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CRM_Products', function (Blueprint $table) {
            $table->dropColumn('CRM_Product_Series_id');
            $table->dropColumn('relatedLink');
            $table->dropColumn('status');
        });
    }
}
