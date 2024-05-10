<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>First and Last Name and Initials</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
    <h2 style="text-align:center">Process First and Last Name</h2>
    <?php

    /*
	 * Write a PHP program that will check to ensure that the name and age POST values have been passed
	 * and the age value is a postive numeric value.
	 * Display an error if the name and/or age values are empty or the age value is not a number or is a negative number.
	 * If no errors are found, display a message stating the person's name and the year
	 * they were born calculated from the age that was provided.
	 * For example: "Hello <name>.  It looks like you were born in <calculated year from age>".
	 */



    // this function display the error messages
    function displayError($fieldName,$typeError){
        switch ($typeError){
            case 1:
                echo "The field \"{$fieldName}\" is required.<br />\n";
                break;
            case 2:
                echo "The field \"{$fieldName}\" must be numeric.<br />\n";
                break;

            case 3:
                echo "The field \"{$fieldName}\" cannot be less than zero.<br />\n";
                break;
            default:
                echo "Everything is OK.<br />\n";
                break;
        }


    }

    // validate data: no null values and numeric values for "Wage" and "Hours" input
    function validateInput($data, $fieldName){
        global $errorCount;
        if (empty($data)){
            displayError($fieldName,1);
            ++$errorCount;
            $retval="";

        }elseif(!is_numeric($data)){
            displayError($fieldName,2);
            ++$errorCount;
            $retval="";
        }
        else{ // Only clean up the input if it isn't empty and numeric
            $retval = trim($data);
            $retval = stripcslashes($retval);
        }
        return $retval;
    }
    // this function shows the form again with the valid data previously entered
    function redisplayForm($Name,$Age){
    ?>

    <h2 style="text-align:center">Enter your name and age</h2>
    <form name="nameage" action="Problem2-2.php" method="post">
        <p>
            Name:
            <input type="text" name="name" />
        </p>
        <p>
            Age:
            <input type="text" name="age" />
        </p>
        <p>
            <input type="reset" value="Clear Form" />&nbsp;&nbsp;
            <input type="submit" name="Submit" value="Send Form" />
        </p>
    </form>
    <?php
      // create a counter
    $errorCount=0;

    // create 2 variables and assign the input from the form
    $Name = validateInput($_POST['name'], "name");
    $Age = validateInput($_POST['age'], "age");

    // redisplay the form if you have errors
    if ($errorCount>0){
    ?>
    <p>
        <a href="Problem2-1.html">Enter another name and age</a>
    </p>
    <?php
        redisplayForm($Name,$Age);
    }else{
       //Print out results if no errors found
    ?>


    <h2 style="text-align:center">Scholarship Form</h2>
    <p style="line-height:200%">
        Hello
        <?php if(!empty($Name))
    echo ", $Name"
        ?>
        .It looks like you were born in
        <?php
        $date()-$age;
    }
        ?>
</body>
</html>

