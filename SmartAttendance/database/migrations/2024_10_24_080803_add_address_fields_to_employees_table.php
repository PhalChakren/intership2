<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn(['city', 'district', 'commune', 'village']);
        });
    }
}
