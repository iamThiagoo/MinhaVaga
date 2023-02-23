<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->char('name', 200);
            $table->string('email');
            $table->string('password');
            $table->char('phone', 20);
            $table->char('slug', 150);
            $table->char('cnpj_cpf', 25);
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
