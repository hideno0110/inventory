<?php 

class Controller_Viewsample extends Controller {

	public function action_index() {
		//View オブジェクトを生成する
		$view = View::forge('viewsample');

		//Viewに変数をセットする
		$view -> set('title','タイトル');
		$view -> set('content','コンテンツ');

		//オブジェクトをreturnする
		return $view;


	}
	//indexと同じだがやり方が違う
	public function action_index2() {
		//View オブジェクトを生成する
		$data = array();

		//Viewに変数をセットする
		$data['title'] = 'タイトル2';
		$data['content'] = 'コンテンツ2';

		//オブジェクトをreturnする
		return View::forge('viewsample',$data);
	}


}