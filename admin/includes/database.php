<?php include("new_config.php");?>
<?php
/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 1:43 AM
 * Build this class Database for connection
 * Class alawyas starts with a capital letter
 * $this and variable pr function isn't included
 */


/**
 * Class Database
 *
 */
class Database
{

    public $connection;

    function __construct(){
        $this->open_db_connection();
    }

    /**
     *
     */
    public function open_db_connection()
    {


        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(mysqli_connect_errno()){

            die("Database connection failed badly" . mysqli_error());
        }

    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql){

        $result = mysqli_query($this->connection, $sql);
        if (!$result){
            die("Query Failed");
        }

        return $result;

    }

    private function confirm_query($result){
        if(!$result) {

            die ("Query Failed");

        }
    }

    /**
     * @param $string
     */
    public function escape_string($string){

        $escaped_string = mysqli_real_escape_string($this->connection, $string);

        return $escaped_string;
    }

    public function the_insert_id(){

        return mysqli_insert_id( $this->connection);

    }

}
$database = new Database();

//$database->open_db_connection();

