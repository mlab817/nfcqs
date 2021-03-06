<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonCropDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_crop_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crop_id')->constrained();
            $table->unsignedBigInteger('year');
            $table->decimal('production_mt',25,15)->default(0);
            $table->decimal('converted_production',25,15)->default(0);
            $table->decimal('per_capita_consumption_kg_year',25,15)->default(0);
            $table->decimal('ln_production',25,15)->default(0);
            $table->decimal('ln_consumption',25,15)->default(0);
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
        Schema::dropIfExists('non_crop_data');
    }
}
