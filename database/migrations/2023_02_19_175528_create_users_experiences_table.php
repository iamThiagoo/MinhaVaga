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
        Schema::create('users_experiences', function (Blueprint $table) {
            $table->id();
            $table->char('name', 200);
            $table->date('initial_date');
            $table->date('final_date')->nullable();
            $table->text('details')->nullable();
            $table->char('company', 200);
            $table->boolean('current_work')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('opportunities_type_id')->constrained();
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
        Schema::dropIfExists('users_experiences');
    }
};
