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
        Schema::create('users_certificates', function (Blueprint $table) {
            $table->id();
            $table->char('name', 200);
            $table->date('initial_date');
            $table->date('final_date')->nullable();
            $table->boolean('no_expired')->default(false);
            $table->char('code_certificate', 150)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('url_certificate')->nullable();
            $table->foreignId('institution_id')->constrained();
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
        Schema::dropIfExists('users_certificates');
    }
};
