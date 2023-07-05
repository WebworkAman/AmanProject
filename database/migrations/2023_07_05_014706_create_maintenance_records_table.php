<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('factory');
            $table->string('equipment_model');
            $table->date('purchase_date');
            $table->string('serial_number');
            $table->date('installation_date');
            $table->date('maintenance_date');
            $table->text('description');
            $table->text('maintenance_content');
            $table->integer('quantity');
            $table->string('maintenance_personnel');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
    
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_records');
    }
}
