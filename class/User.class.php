<?php
class User  extends DBObject{

    public $user_name;
    public $user_email;
    public $user_password;
    public $joining_date;
    public $userid;
    public $result = array();


    protected static $table = 'users';

    function __construct(DB $db = null)
    {
        $this->db = $db;
    }

    function create()
    {
        $this->data = array(
            'user_name' => $this->user_name,
            'user_email'  => $this->user_email,
            'user_password' => $this->user_password
        );
        if(self::store($this->db,$this->data))
        {
            echo "registered";
        }

    }

    function login()
    {
        $pass = md5($this->user_password);

        $stm2 = $this->db->query("select * from users where
        user_name = '$this->user_name' and user_password = '$pass'");

        $stm = $this->db->count("select * from users where
        user_name = '$this->user_name' and user_password = '$pass'");

        $this->result = $stm;


        foreach ($stm2 as $item) {
            $userid = $item['id'];
        }

        if($stm == 1)
        {
            $_SESSION['login_user']=$this->user_name;
            $_SESSION['login']='yes';
            $_SESSION['login_id']=$userid;
            echo "1";
        }
        else{
            echo 'nie ma';
        }

    }



}