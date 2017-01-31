{
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePoleMailUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('Users', function(Blueprint $table) {

            $table->dropColumn('e_mail');
            $table->string('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('Users', function(Blueprint $table) {

            $table->dropColumn('email');
            $table->string('e_mail')->nullable();

        });
    }
}
