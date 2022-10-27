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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=non-aktif, 1=aktif');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
};
