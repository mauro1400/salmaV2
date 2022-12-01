<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'requerimientos';

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
            $table->unsignedBigInteger('admin_id')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->string('estado')->nullable()->default('0');
            $table->dateTime('decha de entrega')->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);
            $table->integer('nro_solicitud')->nullable()->default('0');
            $table->unsignedBigInteger('unidades_id');

            $table->index(["unidades_id"], 'fk_requerimientos_unidades1_idx');
            
            $table->timestamps();


            $table->foreign('unidades_id', 'fk_requerimientos_unidades1_idx')
                ->references('id')->on('unidades')
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
