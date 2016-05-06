<?php

class Controller_Tweet extends Controller_Template
{
	public function before()
	{
		parent::before();
		//未ログインの場合、ログインページへリダイレクト
		if(!Auth::check()){
			Response::redirect('/login');
		}
	}
	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = '洒落';
		$this->template->content = View::forge('tweet/index', $data);
	}

	public function action_about()
	{
		$this->template->title = '洒落';
		$data["title"] = $this->template->title;
		$this->template->content = View::forge('tweet/about',$data);
	}

	public function action_study()
	{
		$this->template->title = '学習履歴';
		$data["title"] = $this->template->title;
		$this->template->content = View::forge('tweet/study',$data);
	}


}
