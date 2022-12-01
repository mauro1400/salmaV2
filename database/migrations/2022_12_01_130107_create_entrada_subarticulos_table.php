<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaSubarticulosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'entrada_subarticulos';

    /**
     * Run the migrations.
     * @table entrada_subarticulos
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 10, 4)->nullable()->default(null);
            $table->decimal('costo_unitario', 10, 4)->nullable()->default(null);
            $table->decimal('costo_total', 10, 2)->nullable()->default(null);
            $table->string('factura')->nullable()->default('');
            $table->date('fecha')->nullable()->default(null);
            $table->unsignedBigInteger('id_subarticulo')->nullable()->default(null);
            $table->integer('stock')->default('0');
            $table->unsignedBigInteger('id_nota_entrada')->nullable()->default(null);

            $table->index(["id_subarticulo"], 'index_entry_subarticles_on_subarticle_id');

            $table->index(["id_nota_entrada"], 'fk_rails_ee711e9361');
            $table->timestamps();


            $table->foreign('id_subarticulo', 'index_entry_subarticles_on_subarticle_id')
                ->references('id')->on('subarticulos')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_nota_entrada', 'fk_rails_ee711e9361')
                ->references('id')->on('nota_entrada')
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
