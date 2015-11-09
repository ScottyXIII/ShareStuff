<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTESTINGANOTHERMODELsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_e_s_t_i_n_g_a_n_o_t_h_e_r_m_o_d_e_ls', function(Blueprint $table)
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
		Schema::drop('t_e_s_t_i_n_g_a_n_o_t_h_e_r_m_o_d_e_ls');
	}

}
