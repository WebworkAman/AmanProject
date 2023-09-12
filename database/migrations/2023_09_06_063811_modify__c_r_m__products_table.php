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
