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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('name', 150);
            $table->text('bio')->nullable();
            $table->char('cpf', 20)->unique();
            $table->date('birthday');
            $table->char('slug', 150);
            $table->char('phone', 20);
            $table->string('password');
            $table->char('email', 150)->unique();
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
        Schema::dropIfExists('users');
    }
};
