<?php


class Comment extends DBObject {

	protected static $table = 'comments';

	public $create_time;
	public $user;
	public $comment;
	private $db;
	public $data = array();
	public $newsid;

	function __construct(DB $db = null)
	{
		$this->db = $db;
	}

	function create()
	{
		$this->data = array(
			'user' => $this->user,
			'comment'  => $this->comment,
			'news_id' => $this->newsid
		);
 		self::store($this->db,$this->data);

	}

	function getCommentByNewsId($id)
	{
		$stm = $this->db->query("select * from comments where news_id =  $id");

		$this->result = $stm;

		return $this->result;
	}

}
