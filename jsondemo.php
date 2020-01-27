<?php
$jsonjoke = file_get_contents('https://sv443.net/jokeapi/category/Programming');
$jsonqoutes = file_get_contents('https://programming-quotes-api.herokuapp.com/quotes');

$jokedata = json_decode($jsonjoke,true);
$qoutesdata = json_decode($jsonqoutes,true);

//include a name for the qoutes decoded result for easy access
$qoutes = array('qoutes'=> $qoutesdata);
//create result list
$list = $qoutes['qoutes'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Programmer's Corner</title>
        <style>
        body {
            font: 600 14px/24px "Open Sans", 
               "HelveticaNeue-Light", 
               "Helvetica Neue Light", 
               "Helvetica Neue", 
               Helvetica, Arial, 
               "Lucida Grande", 
               Sans-Serif;
         }
         h1 {
            color: #9799a7;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 4px;
            margin-left: 10px;
         }
         .container:before, .container:after {
            content: "";
            display: table;
         }
         .container:after {
            clear: both;
         }
         .container {
            background: #eaeaed;
            margin-bottom: 24px;
            *zoom: 1;
         }
         .container-75 {
            width: 75%;
         }
         .container-50 {
            margin-bottom: 0;
            width: 50%;
         }
         .container, section, aside {
            border-radius: 6px;
         }
         section, aside {
            background: #2db34a;
            color: #fff;
            margin: 1.858736059%;
            padding: 20px 0;
            text-align: left;
         }
         section {
            float: left;
            width: 63.197026%;
         }
         aside {
            float: right;
            width: 29.3680297%;
         }
        </style>
    </head>
    <body>
    <h1>Programmer's Corner</h1>
        <div class="container">
            <section>
            <h2>Programming Quotes</h2>
            <ul>
            <?php
            $count = 0;
            // display results based on json names 
            foreach($list as $value){
                
            ?>
                <li><?php echo $value['en'];?>
                    <ul>
                        <li><?php echo $value['author'];?></li>
                    </ul>
                </li>

            <?php
                $count++;
                if($count == 20) //limit output to 20
                    break;

            }
            ?>
            </ul>
            </section>
            <aside>
            <h2>Joke of the Day</h2>
            <?php echo $jokedata['joke'];?>
            </aside>
        </div>
    </body>
</html>
