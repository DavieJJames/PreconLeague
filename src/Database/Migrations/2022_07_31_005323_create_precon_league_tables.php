<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreconLeagueTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('Name');
        });

        Schema::create('match', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->bigInteger('TournamentID');
            $table->dateTime('DateAdded');

            $table->foreign('TournamentID')->references('ID')->on('tournament');
        });

        Schema::create('player', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
        });

        Schema::create('deck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('PlayerID');
            $table->string('Name');

            $table->foreign('PlayerID')->references('ID')->on('player');
        });

        Schema::create('matchdeck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('MatchID');
            $table->bigInteger('DeckID');
            $table->json('Commander');
            $table->integer('Position');

            $table->foreign('MatchID')->references('ID')->on('match');
            $table->foreign('DeckID')->references('ID')->on('deck');
        });

        Schema::create('deckcard', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('DeckID');
            $table->bigInteger('CardID');
            $table->dateTime('DateAdded');
            $table->float('Price');

            $table->foreign('DeckID')->references('ID')->on('deck');
            $table->index('CardID', 'card_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament');
        Schema::dropIfExists('match');
        Schema::dropIfExists('matchdeck');
        Schema::dropIfExists('deck');
        Schema::dropIfExists('deckcard');
        Schema::dropIfExists('player');
    }
}
