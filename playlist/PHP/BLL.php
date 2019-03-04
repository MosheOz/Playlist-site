<?php

require_once 'DAL.php';
require_once 'Playlist.php';

// function for send request of adding row to the movies table
function addMovie($username,$title,$category,$description, $videoLink) {
    
    //validation for security data and prevent sql injection
    $username = strip_tags($username);
    $title = strip_tags($title);
    $category = strip_tags($category);
    $description = strip_tags($description);
    $videoLink = strip_tags($videoLink);
    
    $sql = "insert into movies(username,title, category, description, videoLink) "
            . "values('$username','$title', '$category', '$description', '$videoLink')";
    
    insert($sql);
}

// function for send request of adding user to the users table
function addUser($firstName, $lastName, $username, $password){
    
    //validation for security data and prevent sql injection
    $firstName = strip_tags($firstName);
    $lastName = strip_tags($lastName);
    $username = strip_tags($username);
    $password = strip_tags($password);
    $password = sha1($password);
    
    $sql = "insert into users(firstName, lastName, username, password) "
                . "values('$firstName', '$lastName', '$username', '$password')";

    insert($sql);    
}

// function for send request of display the movies table by username and with the category name
function getPlaylist($username) {
    $sql = "SELECT movies.id, categoryName, title, username, description, videoLink 
        FROM movies 
        JOIN moviescategories 
        ON moviescategories.id = movies.category 
        WHERE movies.username = '$username' 
        ORDER BY movies.id

";
    $playlist = select($sql);
    
    foreach ($playlist as $p) {
        $playlists[] = new Playlist($p->id, $p->categoryName,$p->title,$p->username, $p->description, $p->videoLink);
    }
    return $playlists;
}

// function for getting the current movies categories from the server, using for select element in html
function getCategories() {
    $sql = "SELECT categoryName
            FROM moviescategories 
            ";
    $category = select($sql);
    
    foreach ($category as $c) {
        $categories[] = ($c->categoryName);
    }
    return $categories;
}

// function for update row by id in the movies table
function updatePlaylist($id,$title,$category,$description){
    
    //validation for security data and prevent sql injection
    $title = strip_tags($title);
    $category = strip_tags($category);
    $description = strip_tags($description);
    
    $sql = "update movies SET title = '$title', category = '$category', description = '$description' where movies.id = '$id'";

    update($sql);
}

// function for delete row by id from the movies table
function deleteRow($id) {
    $sql = "delete from movies where id = $id";
    delete($sql);
}

// function for validate if user exist in the users table 
function isUserExist($username, $password) {
    
    //validation for security data and prevent sql injection
    $username = addslashes($username);
    $password = addslashes($password);
    $password = sha1($password);
    
    $sql = "select count(*) as total_rows from users where username = '$username' and password = '$password'";

    $count = get_object($sql)->total_rows;

    return $count > 0;	
}

// function for validate if username is already in use in the users table 
function isUserNameExist($username) {
    
    $username = addslashes($username);
    
    $sql = "select count(*) as total_rows from users where username = '$username'";

    $count = get_object($sql)->total_rows;

    return $count > 0;	
}