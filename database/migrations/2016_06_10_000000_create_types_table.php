<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name')->unique();
        });

        DB::table('types')->insert([
            'id' => intval(trans('model.type.admin.id')),
            'name' => trans('model.type.admin.name'),
        ]);

        DB::table('types')->insert([
            'id' => intval(trans('model.type.basic.id')),
            'name' => trans('model.type.basic.name'),
        ]);

        DB::table('types')->insert([
            'id' => intval(trans('model.type.premium.id')),
            'name' => trans('model.type.premium.name'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('types');
    }
}
