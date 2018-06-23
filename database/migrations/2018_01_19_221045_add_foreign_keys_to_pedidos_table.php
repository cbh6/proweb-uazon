<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pedidos', function(Blueprint $table)
		{
			$table->foreign('fk_usuarios', 'FK_Pedidos_1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pedidos', function(Blueprint $table)
		{
			$table->dropForeign('FK_Pedidos_1');
		});
	}

}
