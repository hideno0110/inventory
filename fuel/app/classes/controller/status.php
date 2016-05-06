<?php 

class Controller_Status extends Controller {

	public function action_index() {


		//Statusモデルから結果を取得する
		profiler::mark('アクションの開始');
		$results = Model_Status::find_body_by_username('foo');

		//$resultsをダンプして確認する
		Debug::dump($results);
		log::info('ログのテスト', __METHOD__);
		profiler::mark('アクションの終了');
	}


}