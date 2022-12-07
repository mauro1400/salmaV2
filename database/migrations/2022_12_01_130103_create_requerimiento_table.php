<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'requerimiento';

    /**
     * Run the migrations.
     * @table requerimientos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nro_solicitud')->nullable()->default('0');
            $table->dateTime('fecha_solicitud')->nullable()->default(null);
            $table->dateTime('fecha_entregra')->nullable()->default(null);
            $table->string('estado')->nullable()->default('0');
            $table->unsignedBigInteger('admin_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);
            $table->unsignedBigInteger('unidad_id');
            
            $table->timestamps();


            $table->foreign('unidad_id', 'fk_requerimiento_unidad')
                ->references('id')->on('unidad')
                ->onDelete('cascade');
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
