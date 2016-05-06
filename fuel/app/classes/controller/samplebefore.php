<?php 

class Controller_SampleBefore extends Controller {

	public function before() {


		//例えば認証済でなかったらログインページヘ飛ばす
		//認証済なら、ユーザー名をプロパティにセット
			$this->current_user ='Yui';
	}


	public function action_index() {
		$output = $this->current_user . 'さん' . __METHOD__ . 'が実行されました <br> ';
		return $output;


	}

	public function action_test() {

		$output = $this->current_user . 'さん' . __METHOD__ . 'が実行されました <br> ';
		return $output;
	}

}