<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Skincare;
use App\Models\Perusahaan;
use App\Models\Toko;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skincares', function (Blueprint $table) {
            $table->id('id_skincare');
            $table->string('nama_skincare');
            $table->integer('harga');
            $table->integer('stock');
            $table->foreignIdFor(Perusahaan::class,'id_perusahaan');
            $table->foreignIdFor(Toko::class,'id_toko');
            $table->softDeletes();
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
        Schema::dropIfExists('skincares');
    }
};
