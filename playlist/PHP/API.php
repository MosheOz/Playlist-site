<?php
session_start();

require_once "BLL.php";
require_once 'Error.php';

$command = $_REQUEST["command"];

switch ($command){
        case "getMovies":
            $username = $_SESSION["username"];
            $oopMovies = getPlaylist($username);
            echo json_encode($oopMovies);
            break;
        
        case "getCategories":
            $oopMovies = getCategories($offset, $count);
            echo json_encode($oopMovies);
            break;
        
        case "updateMovies":
            $id = $_REQUEST["id"];
            $title = $_REQUEST["title"];
            $category = $_REQUEST["category"];
            $description = $_REQUEST["description"];
            
            //validation for edit movie
            if ((($title) == null) || (!isset($title))) {
                $error = new Error("Missing Title!", 400);
                echo json_encode($error);
            break;
            }
            if ((($category) == null) || (!isset($category))) {
                $error = new Error("Missing Category!", 400);
                echo json_encode($error);
            break;
            }
            if ((($description) == null) || (!isset($description))) {
                $error = new Error("Missing Description!", 400);
                echo json_encode($error);
            break;
            }
            
            updatePlaylist($id,$title,$category,$description);
            break;
        
        case "deleteRow":
            $id = $_REQUEST["id"];
            deleteRow($id);
            break;
        
        case "addMovie":
            $username = $_SESSION["username"];
            $title = $_REQUEST["title"];
            $category = $_REQUEST["category"];
            $description = $_REQUEST["description"];
            $videoLink = $_REQUEST["videoLink"];
            
            //validation for adding play to the playlist
            if ((($username) == null) || (!isset($username))) {
                $error = new Error("Missing Username!", 400);
                echo json_encode($error);
            break;
            }
            if ((($title) == null) || (!isset($title))) {
                $error = new Error("Missing Title!", 400);
                echo json_encode($error);
            break;
            }
            if ((($category) == null) || (!isset($category))) {
                $error = new Error("Missing Category!", 400);
                echo json_encode($error);
            break;
            }
            if ((($description) == null) || (!isset($description))) {
                $error = new Error("Missing Description!", 400);
                echo json_encode($error);
            break;
            }
            if ((($videoLink) == null) || (!isset($videoLink))) {
                $error = new Error("Missing Video Link!", 400);
                echo json_encode($error);
            break;
            }
            if (!filter_var($videoLink, FILTER_VALIDATE_URL)) {
                $error = new Error("$videoLink is not a valid URL", 400);
                echo json_encode($error);
            break;
            }
            
            addMovie($username,$title,$category,$description, $videoLink);
            break;
        
        case "addUser":
            $firstName = $_REQUEST["firstName"];
            $lastName = $_REQUEST["lastName"];
            $username = $_REQUEST["username"];
            $password = $_REQUEST["password"];
            $confirmPassword = $_REQUEST["confirmPassword"];
            
            //validation for adding user to the users table
            if ((($firstName) == null) || (!isset($firstName))) {
                header("Location: /playlist/HTML/login.html?error=Missing First Name!");
            break;
            }
            elseif ((($lastName) == null) || (!isset($lastName))) {
                header("Location: /playlist/HTML/login.html?error=Missing Last Name!");
            break;
            }
            elseif ((($username) == null) || (!isset($username))) {
                header("Location: /playlist/HTML/login.html?error=Missing Username!");
            break;
            }
            elseif ((($password) == null) || (!isset($password))) {
                header("Location: /playlist/HTML/login.html?error=Missing Password!");
            break;
            }
            elseif (strlen(trim($password)) < 6) {
                header("Location: /playlist/HTML/login.html?error=Password must contain at least 6 characters");
            break;
            }
            elseif ((($confirmPassword) == null) || (!isset($confirmPassword)) || ($confirmPassword != $password)) {
                header("Location: /playlist/HTML/login.html?error=No Matching Password!");
            break;
            }
            elseif(isUserNameExist($username)){
                header("Location: /playlist/HTML/login.html?error=username is already in use!");
                break;
            }
            else{
                addUser($firstName, $lastName, $username, $password);
            header("Location: /playlist/HTML/thanks.html");
            }
            break;
            
        
        case "login":   
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //validation for login
        if ((($username) == null) || (!isset($username))) {
            header("Location: /playlist/HTML/login.html?error=Missing Username!");
        break;
        }
        elseif ((($password) == null) || (!isset($password))) {
             header("Location: /playlist/HTML/login.html?error=Missing Password!");
        break;
        }
        elseif(!isUserExist($username, $password)) {
            header("Location: /playlist/html/login.html?error=Incorrect username or password");
        break;    
        }
        else{
            $_SESSION["username"] = $username;
            header("Location: ../PHP/index.php");
        }
        break;
        
        case "logout": 
		session_destroy();
		header("Location: ../html/Login.html");
		break;
}