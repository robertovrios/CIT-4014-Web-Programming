<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Odd Number Display and Count</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <?php

    /*
	 * Write PHP code to display all the odd numbers between 5 and 25 on a single line separated by a space.
	 * The program must use a for loop with an increment option.  During the loop, use a variable to keep track of the sum
	 * of odd numbers being displayed. After the loop ends and all the numbers have been displayed, use the variable to
	 * print out a message showing the sum of odd numbers displayed with the following message : "The sum of odd numbers displayed is: "
	*/
    
    for($i=5; $i<=25;$i++){
        if($i%2!=0){
            echo " ".$i."<br>";
            $sum+=$sum+$i;
        }

    }
    echo "The sum of odd numbers displayed is: ".$sum;

    ?>
</body>
</html>