<?php
/**
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */
class Controller {

	protected $page;
	protected $db;

	public function __construct(PageView $page, DB $db = null) {
		$this->page = $page;
		$this->db = $db;
	}

	public function comments() {

		$data = array(
			'title' => 'Tu będą komentarze',
			'info' => 'Komentarze te będzie można edytować.'
		);

		$view = new View('Comments', $data);
		$this->page->addView($view);
	}
}
