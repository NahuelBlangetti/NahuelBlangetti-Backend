<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('type')->after('life')->nullable();
            $table->unsignedBigInteger('item')->after('life')->nullable();

            $table->foreign('type')->references('id')->on('user_types')->cascadeOnDelete();
            $table->foreign('item')->references('id')->on('items')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users', 'item','type');
    }
}
