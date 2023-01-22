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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->date('Fecha_prestamo');
            $table->unsignedBigInteger('libros_id')->nullable()->index('prestamos_libros_id_foreign');
            $table->unsignedBigInteger('elementos_id')->nullable()->index('prestamos_elementos_id_foreign');
            $table->unsignedBigInteger('usuario_id')->index('prestamos_usuario_id_foreign');
            $table->unsignedBigInteger('curso_id')->nullable()->index('prestamos_curso_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('prestador_id')->index('prestador_id');
            $table->integer('CantidadPrestada');
            $table->enum('Estado_Prestamo', ['Activo', 'Inactivo', 'Finalizado'])->default('Activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
