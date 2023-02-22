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
            $table->float('nota');
            $table->text('description');
            $table->date('initial_date');
            $table->date('final_date');
            $table->foreignId('institution_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('status');;
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
