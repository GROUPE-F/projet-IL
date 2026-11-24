<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('participations', function ($table) {
            $table->id();

            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('salon_id');

            $table->string('role');
            $table->boolean('muet')->default(false);
            $table->boolean('banni')->default(false);
            $table->timestamp('date_arrivee')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participations');
    }
};
