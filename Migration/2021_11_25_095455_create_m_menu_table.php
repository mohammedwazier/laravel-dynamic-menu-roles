<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_parent');
            $table->string('menu_title');
            $table->string('menu_url');
            $table->integer('menu_new_tab');
            $table->text('menu_desc');
            $table->string('menu_icon');
            $table->integer('menu_sort');
            $table->integer('menu_sort_header');
            $table->integer('menu_visible')->default(1);
            $table->integer('menu_status')->default(1);
            $table->integer('menu_exclude')->default(0);
            $table->integer('created_by');
            $table->integer('update_by');
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
        Schema::dropIfExists('m_menu');
    }
}
