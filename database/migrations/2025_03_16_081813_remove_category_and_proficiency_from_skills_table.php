<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['category', 'proficiency']);
        });
    }

    public function down()
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->integer('proficiency')->default(100);
        });
    }
};