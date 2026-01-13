<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $servername="localhost";
    $username="root";
    $password="password";
    //create the connection
    $connect=mysqli_connect($servername,$username,$password);
    
    //verify the connection
    if(!$connect){
        die("The connection failed".mysqli_connect_error());
    }

    //create the database

    $createDatabase="CREATE DATABASE Animals";
    if(mysqli_query($connect,$createDatabase)){
        echo "database connnected succesfully!";
    }
    {
    die("creation of database failed".mysqli_error($connect));
    }
    //create the table
    $createTable="CREATE TABLE Class(
    id INT(1),
    name VARCHAR(19),
    Kingdom VARCHAR(11),
    class VARCHAR(19),
    prey VARCHAR(23)
    )";
    //verify the table creation
    if(mysqli_query($connect,$createDatabase)){
        echo"the table created succcefully";
    }
    {

        die("the table creation failed!".mysqli_error($connect));
    }
    //Insert data
    $insertData="INSERT INTO Class(id,name,kingdom,class,prey)
     VALUES(1,'lion','Animalia','carnivore','herbivores')";
     //verify the insertation

     if(mysqli_query($connect,$insertData)){
        echo "Data inserted successfully";
     }
     {

        die("THE data entry failed!".mysqli_error($connect));
     }
     mysqli_close($connect);

    
    

    
    
    ?>
    
</body>
</html>