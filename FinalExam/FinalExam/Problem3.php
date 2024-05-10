<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Baseball Wins of five oldest teams</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <?php

    /*
     *Write a program that does the follow:
     * 1. Connects to the localhost MySQL database server and selects the baseball_stats database schema
	 *    used in the chapter 07 assignment.
     * 2. Displays an error message if the DBConnect fails or the select_db fails.
     * 3. If no errors, query the teamstats table for the five oldest teams
	 *    and return the team name, the first year they played and the total number of wins.
     * 4. Display the name of the teams, the first year they played and the number of wins in a statement like
	 *    "The <team name> first played in <firstyear> and has won <w> games".
	 *    for each team name queried from the database on a separate line.
     */

    $DBName = "baseball_stats";
    $DBConnect=mysql_connect("localhost","root","");
    if($DBConnect===FALSE)
        echo "<p>Connection error: ".mysql_error()."</p>\n";
    else{
        if(@mysql_select_db($DBName,$DBConnect)===FALSE){
            echo "<p>Could not create the \"$DBName\" " . "database: ".mysql_error($DBConnect)."</p>\n";
            mysql_close($DBConnect);
            $DBConnect=FALSE;
        }

    }
    if($DBConnect !== FALSE){
        $TableName="teamstats";
        $SQLstring="select team , firstyear, w from $TableName
                    order by firstyear asc limit 5;";
        $QueryResult=@mysql_query($SQLstring,$DBConnect);

         while (($Row=mysql_fetch_assoc($QueryResult))!=FALSE){
             echo "The {$Row['team']} first played in {$Row['firstyear']} and has won {$Row['w']} games.<br>";
         }
      
        mysql_close($DBConnect);
    }


    ?>

</body>
</html>
