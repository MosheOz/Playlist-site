<?php  
    session_start();
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else{
    header("Location: /playlist/HTML/login.html");
    
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Add Row</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/playlist/CSS/styles.css">
        <link rel="stylesheet" href="/playlist/CSS/glyphIcon.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/playlist/CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/playlist/JS/index.js"></script>
    </head>
    
    <body>
        <header>
            
            <!-- the navigator bar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Playlists.com</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/playlist/php/index.php">Home</a></li>
                        <li><a href="/playlist/php/getPlaylist.php">Your Playlist</a></li>
                        <li><a href="/playlist/PHP/addRow.php">Add Play</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $username;?></a></li>
                        <li><a href="/playlist/php/API.php?command=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="container-fluid">
                <div class="offset-3 col-6 ">
                    
                    <!-- header -->
                    <div class="form-group text-center">
                        <h1 class="nice-font">Add A Video To Your List</h1>
                    </div>
                </div>
       
                <hr>
                <br>
                
                <div class="row">
                    <div class="col-md-3"></div>

                    <!-- input for title and p for display error-->
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="tile"><b>Add A Title To Your Video</b></label>
                            <input type="text" class="form-control text-center" id="addTitle" placeholder="Title">
                            <p id="addTitleError"></p>
                        </div>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-3"></div>
                    
                    <!-- select for select category and p for display error-->
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="category"><b>Select A Category To Your Video</b></label>
                            <select class="form-control" id="addCategory">
                                <option value="1">Studies</option>
                                <option value="2">fun</option>
                                <option value="3">Songs</option>
                                <option value="4">Movies</option>
                                <option value="5">action</option>
                                <option value="6">relax</option>
                                <option value="7">capital market</option>
                                <option value="8">Code</option>
                                <option value="9">Travels</option>
                                <option value="10">eCommerce</option>
                                <option value="11">Uplifting Trance</option>
                                <option value="12">Business</option>
                            </select>
                        </div>
                        <p id="addCategoryError"></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3"></div>
                
                    <!-- textarea for description and p for display error-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description"><b>Add Description To Your Video</b></label>
                            <textarea class="form-control" id="addDescription" rows="3"></textarea>
                        </div>
                        <p id="addDescriptionError"></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3"></div>
                    
                    <!-- input for video url and p for display error-->
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="videoLink"><b>Insert Your Video Link Below</b></label>
                            <input type="text" class="form-control text-center" id="addVideoLink" placeholder="Your Video Link">
                            <input type="hidden" id="usernameAddRow" name="username" value="<?php echo $_SESSION["username"];?>">
                        </div>
                        <p id="addVideoLinkError"></p>
                    </div>
                </div>
                
                <!-- p for displaying server error --> 
                <p id="successMessage" style="color: green;"></p>
                
                <div class="row">
                    <div class="col-md">
                        <button id="addRowButton" type="button" class="btn btn-success " onclick="addRow()"><b><span class="glyphicon glyphicon-plus"></span> Add To Your Playlist</b></button>
                    </div>
                </div>
            </div>
        </main>
        
        <!-- all rights reserved sign-->
        <footer>
            <div><br><br></div>
            <div>
            &copy;Playlist.com
            </div>
        </footer> 
    </body>
</html>

