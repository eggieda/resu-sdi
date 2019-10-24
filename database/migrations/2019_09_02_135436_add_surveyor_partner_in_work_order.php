<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurveyorPartnerInWorkOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_orders', function (Blueprint $table) {
            $table->text('surveyor_partner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_orders', function (Blueprint $table) {
            $table->dropColumn('surveyor_partner');
        });
    }
}
