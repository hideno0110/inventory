<?php
class Controller_Formlist extends Controller_Template
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
		$data['formlists'] = Model_Formlist::find('all');
		$this->template->title = "Formlists";
		$this->template->content = View::forge('formlist/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('formlist');

		if ( ! $data['formlist'] = Model_Formlist::find($id))
		{
			Session::set_flash('error', 'Could not find formlist #'.$id);
			Response::redirect('formlist');
		}

		$this->template->title = "Formlist";
		$this->template->content = View::forge('formlist/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Formlist::validate('create');

			if ($val->run())
			{
				$formlist = Model_Formlist::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'comment' => Input::post('comment'),
					'ip_address' => Input::post('ip_address'),
					'user_agent' => Input::post('user_agent'),
				));

				if ($formlist and $formlist->save())
				{
					Session::set_flash('success', 'Added formlist #'.$formlist->id.'.');

					Response::redirect('formlist');
				}

				else
				{
					Session::set_flash('error', 'Could not save formlist.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Formlists";
		$this->template->content = View::forge('formlist/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('formlist');

		if ( ! $formlist = Model_Formlist::find($id))
		{
			Session::set_flash('error', 'Could not find formlist #'.$id);
			Response::redirect('formlist');
		}

		$val = Model_Formlist::validate('edit');

		if ($val->run())
		{
			$formlist->name = Input::post('name');
			$formlist->email = Input::post('email');
			$formlist->comment = Input::post('comment');
			$formlist->ip_address = Input::post('ip_address');
			$formlist->user_agent = Input::post('user_agent');

			if ($formlist->save())
			{
				Session::set_flash('success', 'Updated formlist #' . $id);

				Response::redirect('formlist');
			}

			else
			{
				Session::set_flash('error', 'Could not update formlist #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$formlist->name = $val->validated('name');
				$formlist->email = $val->validated('email');
				$formlist->comment = $val->validated('comment');
				$formlist->ip_address = $val->validated('ip_address');
				$formlist->user_agent = $val->validated('user_agent');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('formlist', $formlist, false);
		}

		$this->template->title = "Formlists";
		$this->template->content = View::forge('formlist/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('formlist');

		if ($formlist = Model_Formlist::find($id))
		{
			$formlist->delete();

			Session::set_flash('success', 'Deleted formlist #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete formlist #'.$id);
		}

		Response::redirect('formlist');

	}

}
