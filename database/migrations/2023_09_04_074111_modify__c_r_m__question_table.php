<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCRMQuestionTable extends Migration
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
            $table->string('machine_model',15)->after('video');
            $table->string('machine_serial',15)->after('machine_model');
            $table->string('answer_stat',1)->nullable();



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
            $table->dropColumn('machine_model');
            $table->dropColumn('machine_serial');
            $table->dropColumn('answer_stat');
        });
    }
}
