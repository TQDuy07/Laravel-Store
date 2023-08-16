<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Store extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->integer('user_id');
            $table->string('store_name');
            $table->string('address');
            $table->string('phone');
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
