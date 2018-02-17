<?php
/**
 * Created by PhpStorm.
 * User: jjwInNY
 * Date: 2/13/18
 * Time: 8:02 PM
 */

/**
 * Class Session
 * @signed in T/F
 * @user_id
 *
 * Session will just log people in and out and take care of admin page
 */
class Session {

    private $signed_in = false;

    public $user_id;

    function __construct() {
        session_start();
        $this->check_the_login();

    }

    /**
     * @return mixed boolean T/F if user has signed in
     */
    public function is_signed_in(){
        return $this->signed_in;
    }

    /**
     * @param $user object user that is browsing the session
     */
    public function login($user){
        if ($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }

    }

    public function logout() {

        unset($_SESSION['user_id']);
        unset($this->user->user_id);
        $this->signed_in = false;

    }
    private function check_the_login(){

        if(isset($_SESSION['user_id'])){

            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;

        } else{

            unset($this->user_id);
            $this->signed_in = false;

        }
    }
}






$session = new Session();




?>