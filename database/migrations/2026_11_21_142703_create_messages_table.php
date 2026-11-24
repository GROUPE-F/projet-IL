<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function ($table) {
            $table->id();
            $table->string('contenu');
            $table->timestamp('date_envoi')->useCurrent();
            $table->boolean('supprime')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
