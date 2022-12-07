<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticuloTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'articulo';

    /**
     * Run the migrations.
     * @table subarticulos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo')->nullable()->default(null);
            $table->string('descripcion')->nullable()->default(null);
            $table->integer('cantidad')->nullable()->default(null);
            $table->string('unidad')->nullable()->default(null);
            $table->integer('minimo')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->decimal('precio_unitario', 10, 2)->nullable()->default(null);
            $table->decimal('costo_total', 10, 2)->nullable()->default(null);
            $table->unsignedBigInteger('id_categoria')->nullable()->default(null);

            $table->timestamps();

            $table->foreign('id_categoria', 'fk_articulo_cargotiaArticulo')
                ->references('id')->on('categoria_articulo')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
