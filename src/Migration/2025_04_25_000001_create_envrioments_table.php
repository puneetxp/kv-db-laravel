<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviromentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enviroments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('key')->nullable();
            $table->string('type')->default('string');
            $table->string('pattern')->nullable();
            $table->boolean('multiple')->default(0);
            $table->longText('value')->nullable();
            $table->foreignId('enviroment_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enviroments');
    }
}

