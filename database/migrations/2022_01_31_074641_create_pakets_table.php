<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paket', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('outlet_id');
            $table->enum('jenis', [
                'kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'
            ]);
            $table->string('nama_paket', 100);
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('outlet_id')->references('id')->on('tb_outlet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_paket');
    }
}
