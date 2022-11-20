<?php 

    class DB{

        public $host = '127.0.0.1';
        private $user = 'root';
        private $password='';
        private $database='dbrestoran';

        public function _construct()
        {
            echo "construct";
        }

        // method
        public function selectdata()
        {
            echo 'select data';
        }

        public function getdatabase()
        {
            echo $this->database;
        }

        public function tampil()
        {
            $this->selectdata();
        }

        public static function insertdata()
        {
            echo "static function";
        }

    }

    DB::insertdata();

    // $db = new DB;

    // $db->selectdata();

    // echo '<br>';

    // echo $db->host;

    // echo '<br>';

    // echo $db->getdatabase();

    // echo '<br>';

    // echo $db->tampil();

    // echo '<br>';

    // echo $db->_construct();

?>
