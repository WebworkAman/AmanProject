<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCRMAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('CRM_Answers', function (Blueprint $table) {

            //新增欄位
            $table->foreignId('admin_id')->after('videos')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CRM_Answers', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
    }
}
