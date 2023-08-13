<?php // login.php

    $chaptersInBible=  100; //929;

    // echo phpinfo();

    // $host = 'localhost'; 
    // $data = 'db.sqlite'; 
    // $data ='KJVBible_Database.db';
    // $user = ''; 
    // $pass = ''; 
    // $chrs = 'utf8mb4';
    // $dsn = "sqlite:$host";
    // $options =
    // [
    // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // PDO::ATTR_EMULATE_PREPARES => false,
    // ];


    // try {
    //     $pdo = new PDO($dsn, $user, $pass, $options);
    // } catch (\PDOException $e) {
    //     throw new \PDOException($e->getMessage(), (int)$e->getCode());
    // }

//    class db {
//     function opendatabase(){
//         try{
//             if($this->pdo==null){
//               $this->pdo =new PDO("sqlite:database/database.db","","",array(
//                     PDO::ATTR_PERSISTENT => true
//                 ));
//             }
//             return $this->pdo;
//         }catch(PDOException $e){
//             logerror($e->getMessage(), "opendatabase");
//             print "Error in openhrsedb ".$e->getMessage();
//         }
//     }
//    }
    

    // $query = "SELECT * FROM Bible";

    // $result = $pdo->query($query);

    // echo $result;

    // while ($row = $result->fetch()){
    //     echo '1';
    //     break;
    // }


$database_path  ='KJVBible_Database.db';

try {
    // Connect to the SQLite database using PDO
    $pdo = new PDO('sqlite:' . $database_path);

    // Set error reporting mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully!";

} catch (PDOException $exception) {
    // Handle any connection errors
    echo "Connection failed: " . $exception->getMessage();
}

    // fopen() 

    // $pdo = new PDO('sqlite:' . $database_path);

    $query = "SELECT * FROM Bible";
    
    $query = "select Book, count( DISTINCT Chapter) as chapters from bible group by Book";

    $result = $pdo->query($query);

    $i = 0;
    $k = 0;
    $total = 4;

        while ($row = $result->fetch()){
            
            $book = $row['Book'];
            $book_number = $row['Book'];
            $chapters = $row['chapters'];

            for($n=0; $n < $chapters; $n++) {

                echo "Book: ". $book."  Chapter: ".$n+1;
                echo "<br>";
            }
            echo "<hr>";
            
        } 
?>