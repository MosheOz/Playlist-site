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
        <title>Your Playlist</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/playlist/CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/playlist/JS/index.js"></script>
    </head>
    <body onload="getPlaylist()">
        <header>
            
            <!-- the navigator bar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand nice-font" href="#">Playlists.com</a>
                    </div>
                    
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/playlist/php/index.php">Home</a></li>
                        <li><a href="/playlist/php/getPlaylist.php">Your Playlist</a></li>
                        <li><a href="/playlist/PHP/addRow.php">Add Play</a></li>
                    </ul>
                    
                    <!-- search input -->
                    <div class="offset-md-3 col-md-3">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q" id="searchInput">
                            </div>
                        </form>
                    </div>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hello <?php echo $username;?></a></li>
                        <li><a href="/playlist/php/API.php?command=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="center">
                <h1 class="nice-font">My Playlist</h1>
            </div>
            <hr>
            <br>
            
            <div class="container-fluid">

            <div class="row">
                    <div class="col">

                        <!-- The Edit Modal -->
                        <div id="editModal" class="modal">
                          <!-- Modal content -->
                            <div class="modal-content">
                            <span class="close">&times;</span>
                                <div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            
                                        <!-- hidden input getting the row id -->
                                        <input type="hidden" id="idEdit" name="id">
                                        
                                        <!-- p for display errors from server-->
                                        <p id="messageFromServer"></p>
                                        
                                        <!-- input for edit title, and p for display errors -->
                                        <label>Title</label>
                                        <input id="titleEdit" class="form-control" name="title" placeholder="Title"><br><br>
                                        <p id="titleErrorMessage"></p>
                                        
                                        <!-- select for edit category, and p for display errors -->
                                        <label>category</label>
                                        <select class="form-control" id="categoryEdit" name="category">
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
                                        <p id="categoryErrorMessage"></p>
                                        <br><br>
                                        
                                        <!-- input for edit description, and p for display errors and success -->
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" id="descriptionEdit" name="description" placeholder="Description"></textarea>
                                        <p id="descriptionErrorMessage"></p>
                                        <p id="successMessage" style="color: green;"></p>
                                        <br><br>
                                        
                                        <!-- save buton -->
                                        <div id="saveButton">
                                            <button id="saveButton" type="button" class="btn btn-success btn-block" onclick="updateRow()">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            
            <!-- table for display server response-->
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-hover">
                        <thead id="theadTableMovies"></thead>
                        <tbody id="tableMovies"></tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Modal for iframe , display the youtube videos -->
        <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal2-content">
                    <div class="modal-body mb-0 p-0">
                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                            <iframe id="iframeYouTube" class="embed-responsive-item" src="" allowfullscreen></iframe>
                        </div>
                    </div>
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
