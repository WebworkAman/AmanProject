<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCRMMachinesContactlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CRM_Machines_Contactlist', function (Blueprint $table) {
            $table->id();

            // 定義外鍵關聯
            $table->unsignedBigInteger('crm_machine_id'); // 對應到 CRM_Machines 資料表的 id
            $table->foreign('crm_machine_id')->references('id')->on('crm_machines')->onDelete('cascade');

            $table->string('contact_person_position',1);
            $table->string('other_contact_person_position',30)->nullable();

            $table->string('contact_person_name',40);
            $table->Json('contact_person_phone')->nullable();
            $table->string('contact_person_mobile',30)->nullable();;
            $table->string('contact_person_email',40)->nullable();;
            $table->Json('contact_commu_software')->nullable();;

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
        Schema::dropIfExists('CRM_Machines_Contactlist');
    }
}
