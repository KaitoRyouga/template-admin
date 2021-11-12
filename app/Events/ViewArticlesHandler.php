<?php

namespace App\Events;

use Illuminate\Session\Store;

class ViewArticlesHandler
{
	private $session;

	public function __construct(Store $session)
	{
		$this->session = $session;
	}
	public function handle($articles)
	{

		if (!$this->view($articles)) {
			$articles->increment('view');
			$this->storeArticles($articles);
		}
	}
	private function view($articles)
	{
		$viewed = $this->session->get('view', []);

		return array_key_exists($articles->id, $viewed);
	}

	private function storeArticles($articles)
	{
		$key = 'view.' . $articles->id;
		$this->session->put($key, time());
	}
}
