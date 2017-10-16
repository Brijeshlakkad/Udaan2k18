<?php
include "lock.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Udaan2k18</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/css.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div> 
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
		    <li ><a href="profile.php" style="text-transform:uppercase;"><?php echo $login_name; ?></a></li>
          	<li class="active"><a href="All_event.php">Events</a></li>
			<li> <a href="Contact_us.php">Contact us</a></li>
			<li> <a href="about_us.html">About us</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Social <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://www.facebook.com">Facebook</a></li>
                    <li><a href="http://www.twitter.com">Twitter</a></li>
                    <li><a href="https://plus.google.com">Google+</a></li>
                    <li><a href="http://www.linkedin.com">LinkedIn</a></li>
                </ul>
            </li>
	<li> <a  href="logout.php">Logout</a></li>
        </ul>
    </div>
    
</nav>
<form name="event" action="getevent.php" method="post">

<div class="container padded">
    <div class="row">
        <div class="col-sm-8 blog">
            <section><div>
                <h1>IT &raquo; Events</h1><hr>
                <p class="lead" id="head_of_event">League Of Coders</a></p>
                <hr>
                <p id="time_of_event"><span class="glyphicon glyphicon-time"></span> Posted on Oct 28, 2018 at 11:00 AM</p>
                <hr>
                <img id="img_of_event" src="images/blog1.png" class="img-responsive">
                <hr>
                <div id="div_of_event">
                <p>If you are good in coding then this event is best for you.</p><br><p>By participating in this event you can know more about coding.There are 3 rounds in this event.</p><br><p>1. In the first round there will be a paper test of coding. In this there will time limit, for test, is 1 hour. If you will select for next round then you will get message or email from us.
</p><br><p>2. This is buzzer round. In this,you have to be quick ,this round will between four selected team.</p><br><p>If you know the answer  then push buzzer.</p><br><p> There will also minus system in score.If you beat the four teams then you will select for final round.</p><br><p>
3. In the final round, there will some programs, those assign to you and you have solve this program in minimum time.Whose time is minimum, he/she will winner of league of coders.</p><br><p>
			 <hr>            <br>
			</div>
			 <input type="hidden" value="0" name="event_name" />
			 <input type="submit" value="Select" class="btn btn-primary" />
			</section>
       
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="it1.php">2</a></li>
                <li><a href="it2.php">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
        <div class="col-sm-4 sidebar">
            <section>
                <h3 class="tpad">Search</h3>
                <div class="input-group input-group-lg tpad">
                    <span class="input-group-addon glyphicon glyphicon-search"></span>
                    <input type="text" class="form-control input-lg" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
                <hr>
            </section>
            <section>
                <h3 class="tpad">Tags</h3>
                <div class="list-group tpad">
                    <a href="All_event.php" class="list-group-item active"><span class="badge">3</span>Information Technology</a>
                    <a href="Computer.php" class="list-group-item"><span class="badge">3</span>Compuer Science</a>
                    <a href="Civil.php" class="list-group-item"><span class="badge">2</span>Civil Engineering</a>
                    <a href="Mechanical.php" class="list-group-item"><span class="badge">1</span>Mechanical Engineering</a>
                    <a href="Production.php" class="list-group-item"><span class="badge">1</span>Production Engineering</a>
					<a href="Electrical.php" class="list-group-item"><span class="badge">2</span>Electrical/Electronics Engineering</a>
					<a href="Nontech.php" class="list-group-item"><span class="badge">2</span>Non-Tech Events</a>                </div>
                <hr>
            </section>
            <section>
                <h3 class="tpad">Latest from Twitter</h3>
                <div class="media tpad">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="images/user.jpg" alt="user">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">@Vishal_Virani</h4>
                        <p class="bpad">Can't believe how good this Udaan 2k17 was,i m so exicited about Udaan 2k18!!!</p>
                    </div>
                </div>
            
            </section>
			<section>
                <h3 class="tpad">Latest from Twitter</h3>
                <div class="media tpad">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="images/user2.jpg" alt="user">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">@Parth_desai</h4>
                        <p class="bpad">I m dreaming everyday about Udaan.that is so amazing days of college life.</p>
                    </div>
                </div>
            
            </section>
        </div>
    </div>    
</div>    
</form>
    
</body>
</html>