<?php require('db.php'); ?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body style="background-color:#0369a1">

    <main class="container mx-auto" >

            <!-- page heading -->
            <section class="rounded-b-md flex flex-col items-center drop-shadow-xl py-3" style="background-color:#DBF2FF">
                <h2 class="max-sm:text-xl text-3xl font-bold uppercase text-center">2023 Bible Reading Plan</h2>
                <h3 class="text-sm text-center">2023 Reading Plan: 4 chapters a day</h3>
                <h4 class="text-xs max-sm:mx-4 text-center">Based on this current Bible reading plan for the year 2023, <span class="font-medium"> you would complete reading the Bible by <span class="underline">Sunday, 17 December 2023</span>.</span> </h4>
            </section>

            <section class="flex gap-4 flex-wrap justify-center my-4  max-md:mx-4">
                <?php
            
                    foreach ($groups as $index => $group) {
                        $date = new DateTime('2023-08-12');
                        $date->modify("+".$index." day");
                        $date = $date->format('l, d F Y');
                        $groupNumber = $index+1;
                        echo <<<_END
                                <div class="drop-shadow-xl lg:w-1/4 md:w-1/2 max-sm:w-full rounded-xl relative"  style="background-color:#F1FBB3">
                                <h1 class="bg-rose-950 text-center text-white sticky top-0 py-1 ">$date</h1>
                                <article class="flex flex-col h-36 overflow-auto items-center">
                                    <p class='text-sm font-light  border-b-solid border-b-2 border-rose-900 hover:bg-rose-900 hover:text-white transition-all'>Group $groupNumber</p> 
                        _END;

                        foreach($group as $chapter){
                            echo "<p class='text-lg'>$chapter</p>";
                        }

                        echo <<<_end
                                </article>
                                <div class="text-center">
                                <a href="
                            _end;  
                        echo  shareMessageOnWhatsApp($date, implode(',  ', $group));
                        echo <<<_end
                                ">
                                <svg style="stroke-width:2; stroke: white; fill:#25d366" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                </a>
                                </div>
                            </div>
                        _end;  
                        
                    }                
                ?>
            </section>

    </main>

    <footer>
        <hr>
        <div class="container mx-auto flex-row justify-center">
            <p class="py-8 text-center text-slate-100">
            I did not come to call the [self-proclaimed] righteous [who see no need to repent], but sinners to repentance [to change their old way of thinking, to turn from sin and to seek God and His righteousness].” <span class=" italic block">Luke 5:32 (Amplified Bible)</span>
            </p>
        </div>
        <hr>
        <p class="text-center"> <a href="https://github.com/calebnanigah">Made with Love from Ghana 🇬🇭.</a></p>
    </footer>


</body>
</html>