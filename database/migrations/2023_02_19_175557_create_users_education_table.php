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
        Schema::create('users_education', function (Blueprint $table) {
            $table->id();
            $table->char('name', 200);
            $table->foreignId('institution_id')->constrained();
            $table->date('initial_date');
            $table->date('final_date');
            $table->text('details')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->float('score')->nullable();
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
        Schema::dropIfExists('users_education');
    }
};
