<?

class News{

    protected $db;
    private $result = array();

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    function getNews()
    {

        $stm =  $this->db->query("select * from news");

        $this->result = $stm;

        return $this->result;
    }

    function getNewsById($id)
    {
        $stm = $this->db->query("select * from news where id =  $id");

        $this->result = $stm;

        return $this->result;
    }
}