<?php
function get_likescomment()
{
   
   
   try
   {
        // define('server', 'localhost');
        // define('username', 'root');
        // define('password', 'password');
        // define('dbname', 'camagru');

        $DB_DSN = "localhost";
        $DB_USER = "root";
        $DB_PASSWORD = "password";

        $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ="SELECT like_count FROM comments ORDER BY cid DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if($row = $stmt->fetchAll(PDO::FETCH_COLUMN))
        {
            $conn = null;
            return ($row);
        }
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }
}
?>