<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('faculty_mapping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('faculty_id');
           // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculty_mapping');
    }
};
