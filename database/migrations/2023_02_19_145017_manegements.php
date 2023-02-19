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
        Schema::create('manegements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('month_id')->constrained('months')->comment('ファイルID');
            $table->integer('categoly_id')->comment('カテゴリーID');
            $table->string('merchandise',100)->nullable()->default(null);
            $table->integer('amont')->nullable()->default(null);
            $table->integer('all_weight')->nullable()->default(null);
            $table->softDeletes();
            $table->integer('stock_weight')->nullable()->default(null);
            $table->integer('stock_amont')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manegements');
    }
};
