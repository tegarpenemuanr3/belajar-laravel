<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('edulevel_id')->unsigned();
            //cara pertama
            $table->foreignId('edulevel_id')->constrained('edulevels')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->integer('student_price')->nullable();
            $table->tinyInteger('student_max')->nullable();
            $table->text('info')->nullable();
            $table->timestamps();
        });

        //Cara kedua relasi db
        // Schema::table('programs', function (Blueprint $table) {
        //     $table->foreign('edulevel_id')->references('id')->on('edulevels')->onDelete('cascade')->onUpdate('cascade');
        // });

        //Penjelasan
        //  Cascade => Ketika data diupdate atau didelete maka childnya akan ikut berubah
        //  Set Null => Ketika data diupdate atau didelete maka childnya akan menjadi null
        //  No Action => ketika data diupdate atau didelete maka childnya tidak akan ada perubahan sama sekali 
        //  Restrict => ketika data diupdate atau didelete maka parent dan childnya tidak bisa dihapus karena data sudah dipakai
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
