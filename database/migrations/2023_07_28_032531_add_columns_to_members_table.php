<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            //新增欄位
            $table->string('company_ERP_id', 10)->index()->after('id');
            $table->string('company_tax_id', 20)->nullable()->index()->after('company_ERP_id');
            $table->string('identity_perm', 1)->nullable();
            $table->string('stat_info', 1)->nullable();


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
            $table->dropColumn('company_ERP_id');
            $table->dropColumn('company_tax_id');
            $table->dropColumn('identity_perm');
            $table->dropColumn('stat_info');
        });
    }
}
