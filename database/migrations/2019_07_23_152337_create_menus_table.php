<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lang_id')->unsigned();
            $table->string('name');
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('lang_id')->references('id')->on('langs')
                ->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('submenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->integer('parent')->default(0);
            $table->integer('menu_group_id')->unsigned();
            $table->timestamps();


            $table->foreign('menu_group_id')->references('id')->on('menu_groups')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenus');
        Schema::dropIfExists('menu_groups');
    }
}
