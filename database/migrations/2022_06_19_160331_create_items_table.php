<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kelamin');
            $table->string('jarak_tempat_tinggal_ke_kampus');
            $table->integer('sks');
            $table->string('ikut_organisasi');
            $table->string('ikut_ukm');
            $table->decimal('ipk', $precision = 3, $scale = 2);
            $table->string('pekerjaan_orang_tua');
            $table->string('penghasilan_orang_tua');
            $table->integer('tanggungan');
            $table->boolean('beasiswa');
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
        Schema::dropIfExists('items');
    }
};
