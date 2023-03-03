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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('namapelanggan');
            $table->enum('jenislaundry', ['pakaian', 'jaket', 'bedcover']);
            $table->enum('paket', ['bronze', 'silver', 'gold']);
            $table->bigInteger('berat');
            $table->enum('status', ['proses', 'selesai']);
            $table->bigInteger('harga');
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
        Schema::dropIfExists('pelanggans');
    }
};
