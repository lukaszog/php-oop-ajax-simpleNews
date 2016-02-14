<?php
/**
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */
class Controller {

	protected $page;
	protected $db;
	protected $result = array();


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

	public function page()
	{
		$data = array(
				'title' => 'Tu będą komentarze',
				'info' => 'Komentarze te będzie można edytować.'
		);

		$news = new News($this->db);
		$this->result = $news->getNews();

		$view = new View('News', $this->result);
		$this->page->addView($view);
	}

	public function register()
	{
		$view = new View('Register');
		$this->page->addView($view);
	}

	public function login()
	{
		$view = new View('Login');
		$this->page->addView($view);
	}

	public function show()
	{

		$id = htmlspecialchars($_GET['id']);

		$news = new News($this->db);
		$this->result = $news->getNewsById($id);

		$view = new View('Show', $this->result);
		$this->page->addView($view);

	}

	public function showComment()
	{
		$id = htmlspecialchars($_GET['id']);

		$comm = new Comment($this->db);
		$this->result = $comm->getCommentByNewsId($id);

		$view = new View('Comments', $this->result);
		$this->page->addView($view);
	}

	public function edit()
	{
		$id = htmlspecialchars($_GET['id']);
		$comm = new Comment($this->db);
		$this->result = $comm->getCommentById($id);
		$view = new View('Edit', $this->result);
		$this->page->addView($view);
	}

	public function logout()
	{
		session_destroy();
		header("Location: index.php");

	}
}
