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
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20); // 이름
            $table->string('email', 255); // 이메일
            $table->longText('url')->nullable(); // url null가능
            $table->boolean('gender'); // 성별
            $table->tinyInteger('age'); // 나이
            $table->string('contact', 200); // 내용
            $table->timestamps(); // 날짜
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_forms');
    }
};
