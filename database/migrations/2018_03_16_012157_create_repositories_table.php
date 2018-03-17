<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('git_id');
            $table->string('name');
            $table->string('language');
            $table->string('html_url');
            $table->string('subscription_url');
            $table->boolean('private');
            $table->text('description');
            $table->integer('stargazers_count');
            $table->integer('open_issues');
            $table->integer('forks_count');
            $table->integer('owner_id')->unsigned()->default(0);

//            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

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
        Schema::dropIfExists('repositories');
    }
}
