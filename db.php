<?php 

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



    //  because sqlite was not working on the free-hosting site, I used the array directly
    $BibleChapters_array = [
            'Genesis chapter 1',
            'Genesis chapter 2',
            'Genesis chapter 3',
            'Genesis chapter 4',
            'Genesis chapter 5',
            'Genesis chapter 6',
            'Genesis chapter 7',
            'Genesis chapter 8',
            'Genesis chapter 9',
            'Genesis chapter 10',
            'Genesis chapter 11',
            'Genesis chapter 12',
            'Genesis chapter 13',
         ]; 

    
    $startingChapter="Song of Solomon chapter 8";

    $positionOfStartingChapter = array_search($startingChapter, $BibleChapters_array);

    $orderedBibleChapters= array_slice($BibleChapters_array, $positionOfStartingChapter+1);

    $groupCount = 4;

    $groups = array_chunk($orderedBibleChapters, $groupCount);


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

?>