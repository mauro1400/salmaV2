<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubarticulosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'subarticulos';

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
            $table->string('unidad')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->unsignedBigInteger('id_articulo')->nullable()->default(null);
            $table->integer('monto')->nullable()->default(null);
            $table->integer('minimo')->nullable()->default(null);
            $table->string('codigo_barras')->nullable()->default(null);
            $table->string('codigo_anterior')->nullable()->default(null);
            $table->unsignedBigInteger('material_id')->nullable()->default(null);

            $table->index(["id_articulo"], 'index_subarticles_on_article_id');

            $table->index(["material_id"], 'index_subarticles_on_material_id');
            $table->timestamps();


            $table->foreign('material_id', 'index_subarticles_on_material_id')
                ->references('id')->on('materiales')
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
