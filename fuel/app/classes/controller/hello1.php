<?php 

class Controller_Hello1 extends Controller {

	public function action_index() {


		//Viewオブジェクトを返す
			return 'Hello world';
	}


	public function action_about() {


		//Viewオブジェクトを返す
			return 'Hello world2';
	}

	public function action_test() {


		//Viewオブジェクトを返す
			return View::forge('hello');
	}

}