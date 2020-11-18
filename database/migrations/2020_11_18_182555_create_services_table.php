<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->text("detail");
            $table->integer("pricing")->nullable();
            $table->text("image");
            $table->text("condition")->nullable();
            $table->bigInteger("contact");
            $table->text("location");
            $table->boolean("status")->default(true);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
