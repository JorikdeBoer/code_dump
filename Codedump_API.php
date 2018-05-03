<?php
    // API Page to provide all POST and GET requests to database
    // Give permission for used request methods
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    $verb = $_SERVER['REQUEST_METHOD'];
    //Global variables
    $blogs_numbers = array();
    $GLOBALS['servername'] = "localhost";
    $GLOBALS['password'] = "";
    $GLOBALS['dbname'] = "codedump";
    $GLOBALS['username'] = "root";

    // All POST requests
    if ($verb == 'POST'){
        if (isset( $_POST["code_post"] )){
            $postname = $_POST["name"];
            $postcode = $_POST["code"];
            // Translation to make blogs with ' in the text possible
            $name = str_replace("'", "''", "$postname");
            $code = str_replace("'", "''", "$postcode");
            // Create connection
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);}
            // Insert code into database
            $sql = "INSERT INTO codeposts (code, name)".
            "VALUES ('$code', '$name')";
            // Check of a new entry in database has been created
            if ($conn->query($sql) === TRUE) {
            echo "De code staat in de database!";}
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;}
            $conn->close();
        }

    // All GET requests
    if ($verb == 'GET'){
        if (isset( $_GET["search"] )){
            // Create connection
            $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);}
            $search_value = $_GET["search"];
            // Get search results
            $sql = "SELECT * FROM codeposts WHERE name LIKE '%$search_value%'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "" . $row["naam"]. "\r\n";
                    echo "" . $row["code"]. "\r\n\r\n";
                }
            }
            else {
            echo "0 results";
            }
            $conn->close();
        }
