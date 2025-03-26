<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('sub_id'); // Auto-increment primary key
            $table->string('sub_name'); // Subject name
            $table->timestamps(); // Created_at & Updated_at columns
        });
    }

    public function down() {
        Schema::dropIfExists('subjects');
    }
};
