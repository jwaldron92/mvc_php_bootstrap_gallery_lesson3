<?php
/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 2:17 AM
 */

/**
 * Class User for Database has 
 * @id, 
 * @username
 * @password
 * @firstname
 * @lastname
 */
class User
{


    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    /**
     * Static method
     * @return bool|mysqli_result
     */
    public static function find_all_users()
    {
        return self::find_this_query("SELECT * from users");


        /*
        global $database;
        $result_set = $database->query("SELECT * from users");
        return $result_set;
        */
    }

    /**
     * @param $id the id of the user
     * @return bool|mysqli_result
     */
    public static function find_user_by_id($user_id)
    {
        global $database;
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");

        //make sure the array has something else return false
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
//
//        if(!empty($the_result_array)){
//            $first_item = array_shift($the_result_array);
//            return $first_item;
//        } else
//
//
//            return false;
//     }
    }

    /**
     * request database, save object, and user while loop to fetch data, get the result set, and set to variable :)
     * @param $sql
     * @return bool|mysqli_result
     */
    public static function find_this_query($sql)
    {

        global $database;
        $result_set = $database->query($sql);       //request databas
        $the_object_array = array();


        while ($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = self::instantiation($row);
        }

        return $the_object_array;
    }

    /**
     * @param $found_user the user searched for by id (1-#)
     * @return User the object from mysql database
     */
    public static function instantiation($the_record)
    {

//
//
//
        $the_object = new self();
//        $the_object-> id         = $found_user['id'];
//        $the_object-> username   =  $found_user['username'];
//        $the_object-> password   = $found_user['password'];
//        $the_object-> first_name = $found_user['first_name'];
//        $the_object-> last_name  = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;

            }
        }
        return $the_object;

    }

    /**
     *
     * get all the attributes form the class
     *
     * use the next function to see if the attribute / parameter is in the array which is in object properties
     * if the varibale is there then return true, else false
     *
     * Assign the object a value in the instantiaion form object php
     *
     * @param $the_attribute get the mysql database
     * see if the key (NOT VALUE EXISTS)
     * return t/F
     */
    private function has_the_attribute($the_attribute)
    {

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    public static function verify_user($username, $password)
    {
        /**
         * If useris here, then loghim in
         */
        global $database;

        $username = $database->escape_string($username);

        $password = $database->escape_string($password);

        $sql = "SELECT * from users WHERE";
        $sql .= "username = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= "LIMIT 1";

        //next return back the actual output

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1 ";

        $the_result_array = self::find_this_query($sql);

        //make sure the array has something else return false
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    } // END OF verify_user

    /**
     * CRUD create function for new user registration
     */
    public function create() {
        global $database;

        $sql = "INSERT INTO users (username, password, first_name, last_name)";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->password) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "')";


        //check if the database successfully added the user to the mysql database
        if( $database -> query($sql)) {
            $this->id = $database->the_insert_id();

            return true;

        } else {

            return false;

        }
    } // END OF CREATE METHOD

    /**
     *  Set users with new username, or password
     *
     */
    public function update() {
        global $database;

        $sql = "UPDATE users SET ";
        $sql .= "username= '" . $database->escape_string($this->username)    . "', ";
        $sql .= "password= '" . $database->escape_string($this->password)    . "', ";
        $sql .= "first_name= '" . $database->escape_string($this->first_name). "', ";
        $sql .= "last_name= '" . $database->escape_string($this->last_name)  . "' ";
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);                 //Taken CARE OF WITH THE QUERY
        
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;           //if the rows affected are 1 then return true

    } // END OF update methods


    public function delete() {

        global $database;

        $sql = "DELETE from users";
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    } //END OF DELETE METHOD


}
