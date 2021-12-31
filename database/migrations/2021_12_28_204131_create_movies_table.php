<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Category::class);
            $table->string('title');
            $table->string('image');
            $table->text('storyline');
            $table->float('rating');
            $table->string('language');
            $table->date('release_date');
            $table->string('director');
            $table->string('maturity_rating');
            $table->time('running_time');
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
        Schema::dropIfExists('movies');
    }
}
