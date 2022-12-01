<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'solicitudes';

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
            $table->unsignedBigInteger('subarticulos_id');
            $table->unsignedBigInteger('request_id');
            $table->decimal('monto', 10, 2)->nullable()->default(null);
            $table->decimal('monto_entregado', 10, 2)->nullable()->default(null);
            $table->decimal('total_entregado', 10, 2)->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);
            $table->decimal('minimo', 10, 2)->nullable()->default(null);

            $table->index(["request_id"], 'index_subarticle_requests_on_request_id');

            $table->index(["subarticulos_id"], 'fk_solicitudes_subarticulos_subarticulos1_idx');


            $table->foreign('request_id', 'index_subarticle_requests_on_request_id')
                ->references('id')->on('requerimientos')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('subarticulos_id', 'fk_solicitudes_subarticulos_subarticulos1_idx')
                ->references('id')->on('subarticulos')
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
