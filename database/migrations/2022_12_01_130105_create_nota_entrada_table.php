<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaEntradaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nota_entrada';

    /**
     * Run the migrations.
     * @table nota_entrada
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nro_nota_ingreso')->nullable()->default('0');
            $table->date('fecha_nota_ingreso')->nullable()->default(null);
            $table->string('numero_factura')->nullable()->default(null);
            $table->date('fecha_factura')->nullable()->default(null);
            $table->unsignedBigInteger('id_proveedor')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('id_articulo')->nullable()->default(null);
            $table->decimal('subtotal', 10, 2)->nullable()->default('0.00');
            $table->decimal('total', 10, 2)->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);

            $table->timestamps();

            $table->foreign('id_proveedor', 'fk_notaEntrada_proveedor')
                ->references('id')->on('proveedor')
                ->onDelete('restrict')
                ->onUpdate('restrict');
                
            $table->foreign('id_articulo', 'fk_notaEntrada_articulo')
            ->references('id')->on('articulo')
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
