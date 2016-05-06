<?php 

class Controller_Blog extends Controller {

	public function action_category($cat, $page) {


		//Viewオブジェクトを返す
			return __FILE__ . '<br>' . $cat . '<br>' . $page;
	}


}