<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTESTINGCREATEDTABLEsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_e_s_t_i_n_g__c_r_e_a_t_e_d__t_a_b_l_es', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_e_s_t_i_n_g__c_r_e_a_t_e_d__t_a_b_l_es');
	}

}
