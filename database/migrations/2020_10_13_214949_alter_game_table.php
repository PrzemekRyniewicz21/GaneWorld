<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('title', 50)->change();
            $table->dropColumn(['score']);
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            if(Schema::hasColumn('games', 'title')){

                $table->string('title', 100)->change();
                $table->dropIndex('games_title_index');
            }

            if(Schema::hasColumn('games', 'score')){
                $table->float('score')->nullable();
            }

        });
    }
}
