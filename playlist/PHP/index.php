<?php    
 session_start();
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];  
    }
    else{
        $username = null;
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/playlist/CSS/stylesIndex.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/playlist/JS/index.js"></script>
        <title></title>
    </head>
    <body>
        
        <header>
        <!--the navegation bar-->
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand brand-font" href="#">Playlists.com</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/playlist/php/index.php">Home</a></li>
                        <li><a href="/playlist/php/getPlaylist.php">Your Playlist</a></li>
                        <li><a href="/playlist/PHP/addRow.php">Add Play</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php 
                        if ($username == null){
                            echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Hello Guest</a></li>";
                            echo "<li><a href='/playlist/html/login.html?command=logout'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        }
                        else {
                            echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Hello $username</a></li>";
                            echo "<li><a href='/playlist/php/API.php?command=logout'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </nav> 
        </header>
        
        <main>
            <section>
                <div class="container-fluid">
                    <div class="section">    
                        <h2>Welcome To Playlist.com</h2>
                        <p>Here you can create your favorite playlist and enjoy it wherever you are.
                            Simply hit the <a href="/playlist/PHP/addRow.php">"Add Play"</a> button and start enjoying..

                        <div class="video-container">
                            <div class="color-overlay"></div>
                            <video autoplay loop muted id="myVideo">
                                <source src="http://localhost/playlist/videos/indexBackground.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
        <footer>
            <div><br><br></div>
            <div>
            &copy;Playlist.com
            </div>
        </footer>        

    </body>
</html>
