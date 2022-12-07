<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudArticuloTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'solicitud_articulo';

    /**
     * Run the migrations.
     * @table solicitudes_subarticulos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_requerimiento');
            $table->unsignedBigInteger('id_articulo');
            $table->decimal('cantidad_sol', 10, 2)->nullable()->default(null);
            $table->decimal('cantidad_ent', 10, 2)->nullable()->default(null);
            $table->decimal('total_ent', 10, 2)->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);
            $table->decimal('cantidad_min', 10, 2)->nullable()->default(null);

            $table->foreign('id_requerimiento', 'fk_solicitudArticulo_requerimiento')
                ->references('id')->on('requerimiento')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_articulo', 'fk_solicitudArticulo_articulo')
                ->references('id')->on('articulo')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
