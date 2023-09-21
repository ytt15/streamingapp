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
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id');
            $table->string('website')->nullable();
            $table->string('company_name');
            $table->string('product_name');
            $table->string('product_url')->nullable();
            $table->string('image_path')->nullable();
            $table->string('callback_url');
            $table->string('qrcode_path')->nullable();
            $table->float('amount', 10, 4);
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
        Schema::drop('qrcodes');
    }
};
