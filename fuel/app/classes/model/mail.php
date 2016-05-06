<?php
class Model_Mail extends Model
{
	public function send($post)
	{
		$data = $this -> build_mail($post);
		$this-> sendmail($data);
	}

	//メールの作成
	protected function build_mail($post)
	{	
		Config::load('contact_form', true);
		$data['from'] = $post['email'];

		$data['from_name'] = $post['name'];		
		// $data['to'] = 'info@example.com';
		// $data['to_name'] = '管理者';
		// $data['subject'] = 'コンタクトフォーム';
		$data['to'] = Config::get('contact_form.admin.email');
		$data['to_name'] = Config::get('contact_form.admin.name');
		$data['subject'] = Config::get('contact_form.admin.subject');

		$ip = Input::ip();
		$agent = Input::user_agent();

		$data['body'] = <<< END

-----------------------------------------------------------------
		名前： {$post['name']}
		メールアドレス：{$post['email']}
		IPアドレス：$ip
		ブラウザ：$agent
-----------------------------------------------------------------
		コメント：
		{$post['comment']}
-----------------------------------------------------------------
END;

		return $data;


	}

	protected function sendmail($data) {
		package::load('email');
		$email = Email::forge();
		$email->from($data['from'], $data['from_name']);
		$email->to($data['to'], $data['to_name']);		
		$email->subject($data['subject']);
		$email->from($data['body']);

		$email->send();


	}






}