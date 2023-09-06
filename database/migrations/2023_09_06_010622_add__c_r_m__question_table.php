<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCRMQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CRM_Questions', function (Blueprint $table) {

            //新增欄位
            $table->string('company_ERP_id',20)->after('video');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CRM_Questions', function (Blueprint $table) {
            $table->dropColumn('company_ERP_id');

        });
    }
}
