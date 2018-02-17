PHP functions used today

array_key_exists($the_attribute, $object_properties);

get_object_vars($this)

mysqli_fetch_array

array_shift is something that just moves the cursor like while

!empty(object)


__autoload for the php functions file
//How to get back an object such as the username from the user object?

Instead of getting the array , just get the object, THATS THE WHOLE IDEA OF OBJECT ORIENTEC PROGRAMMING OVER FUNCTIONAL SLICE AND DICE


O and btw I thought I could be sneaky an sneak in a couple variables in the parametrs but was not able to through this way"

    public static function find_this_query(){

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = self::instantiation($row);
        }
        return $the_object_array;
    }


And then I got an error OBVIOUSLY but I thought I was just using an outdated php version so I tried

    public static function find_all_users($){

        return self::find_this_query($sql = "SELECT * FROM users");

    }



I seem to have come full circle about the init, database, and config and now functions which is now
Fatal error: Uncaught Error: Class 'User' not found in /Applications/XAMPP/htdocs2/gallery_bootstrap4/admin/includes/admin_content.php:39 Stack trace: #0 /Applications/XAMPP/htdocs2/gallery_bootstrap4/admin/index.php(43): include() #1 {main} thrown in /Applications/XAMPP/htdocs2/gallery_bootstrap4/admin/includes/admin_content.php on line 39# mvc_php_bootstrap_gallery_lesson1
# mvc_php_bootstrap_gallery_lesson3
