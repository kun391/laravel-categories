<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('alias')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
            NestedSet::columns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        NestedSet::dropColumns($table);
    }
}
