<?php 

    // mysql
    $dbname="if0_34813373_Bible";
    $userName = "if0_34813373";
    $ps = "eQuIdbLHePiK9O";

    $database_path  ='KJVBible_Database.db';

    try {
        // Connect to the SQLite database using PDO
        $pdo = new PDO('sqlite:' . $database_path);

        // Set error reporting mode
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "Connected successfully!";

    } catch (PDOException $exception) {
        // Handle any connection errors
        echo "Connection failed: " . $exception->getMessage();
    }

    echo "<hr>";

    $query = "SELECT * FROM Bible";
    
    $query = "select Book, count( DISTINCT Chapter) as chapters from bible group by Book";

    $result = $pdo->query($query);

    $BibleChapters = [];

    $BibleBooks = [
            'Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth',
            '1 Samuel', '2 Samuel', '1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah',
            'Esther', 'Job', 'Psalms', 'Proverbs', 'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah',
            'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel', 'Amos', 'Obadiah', 'Jonah', 'Micah',
            'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi',

            'Matthew', 'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians',
            'Galatians', 'Ephesians', 'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians',
            '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews', 'James', '1 Peter', '2 Peter',
            '1 John', '2 John', '3 John', 'Jude', 'Revelation'
        
    ];

    while ($row = $result->fetch()){
        
        $book = $row['Book'];
        $book_number = $row['Book'];
        $chapters = $row['chapters'];

        for($n=0; $n < $chapters; $n++) {
            $bookAndChapter = $BibleBooks[$book]. " chapter ".$n+1;
            array_push($BibleChapters, $bookAndChapter);
        }
    
    } 

    $startingChapter="Song of Solomon chapter 8";
    $positionOfStartingChapter = array_search($startingChapter, $BibleChapters);
    $orderedBibleChapters= array_slice($BibleChapters, $positionOfStartingChapter+1);

    $groupCount = 4;

    $groups = array_chunk($orderedBibleChapters, $groupCount);

     // date 
    //  $i=0;
    //  $date = new DateTime('2023-08-07');

     // end of date

    function shareMessageOnWhatsApp($date, $chapters){
        $messageToShare = "

        *$date*

        Hey Brother!. Hey Sister!.
                    
        Be Grounded in Christ through the reading of the Bible.
                    
        Please these are the chapters we will read for the day.👇🏻👇🏻👇🏻
                    
        $chapters
                    
        Remember when you finish you show by this emoji✋
                    
        God bless you as you read.🙏🏽
        ";

        $WhatsAppLine ="https://api.whatsapp.com/send?text=$messageToShare";

        return $WhatsAppLine;
    }
    

    // foreach ($groups as $index => $group) {
    //     $date = new DateTime('2023-08-12');
    //     $date->modify("+".$index." day");
    //     $date = $date->format('l, d F Y');
    //     echo $date;
    //     echo " Group " . ($index + 1) . ": " . implode(',  ', $group) ." ". shareMessageOnWhatsApp( $date,implode(',  ', $group) )."<hr>";
    // }

?>