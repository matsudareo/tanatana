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
        Schema::table('manegements', function (Blueprint $table) {
            $table->foreignId('month_id')->comment('ファイルID')->nullable()->default(null)->change();
            $table->integer('categoly_id')->comment('カテゴリーID')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manegements', function (Blueprint $table) {
            //
        });
    }
};
