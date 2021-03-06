<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationGroupUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_group_unit', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('unitId')->unsigned();
            $table->bigInteger('investigationGroupId')->unsigned();

            $table->foreign('unitId')->references('id')->on('units')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('investigationGroupId')->references('id')->on('investigation_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
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
        Schema::dropIfExists('investigation_group_unit');
    }
}
