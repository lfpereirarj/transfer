<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlterTableTransfers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('transfers', function (Blueprint $table) {
            $table->dropColumn('route');
            $table->string('hour');
            $table->float('price_combo', 8, 2)->nullable();
            $table->string('departure')->nullable();
            $table->string('destination')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
