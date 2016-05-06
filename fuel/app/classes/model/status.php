<?php

class Model_Status extends Model
{
	public static function find_body_by_username($username) {

		//本来は、データベースを検索して結果を返す
		$data = array(
			array(
				'data' => '201/2/2',
				'body' => 'イースターなう',
			),
			array(
				'data' => '201/2/5',
				'body' => 'ううううーなう',
			),
		);

		return $data;

	}

}
