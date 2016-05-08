<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="news.php">Newsbook</a>
        </div>
        <div class="collapse navbar-collapse">
            
<?php
    if (checkAuth()) {
?>
            <ul class="nav navbar-nav">
                <li><a href="news.php">News</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="subscribes.php">Subscribe</a></li>
    <?php
        if (checkAuth() === "1") {
    ?>
                <li><a href="addCity.php">Add City</a></li>
    <?php
        }
    ?>
                <li><a href="addNews.php">Add News</a></li>
            </ul>
            <form action="login.php" method="post">
                <button type="submit" name="quit" value="exit">Quit</button>
            </form>
            <div class="user">
                <img width="80" src="images/idUsers/1.jpg" alt="">
            </div>
<?php
    } else {
?>
            <ul class="nav navbar-nav">
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Registration</a></li>
            </ul>
<?php
    }
?>
   
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">

    <div class="starter-template">
        <h1><s>The</s> Newsbook</h1>
        <p class="lead">It's our new portal. With Black Jack and cats</p>
    </div>

        
