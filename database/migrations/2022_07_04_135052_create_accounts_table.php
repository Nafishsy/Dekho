<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('role')->default('Customer');  
            $table->boolean('Payement')->default(FALSE);
            $table->dateTime('PayementDate', $precision = 0);
            $table->string('status')->default('Inactive');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
