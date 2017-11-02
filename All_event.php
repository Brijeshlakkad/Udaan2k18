<?php
include "lock.php";
include "config.php";
$catb="IT";
if(isset($_GET['q']))
{
	$catb=$_GET['q'];
}
$it=0;
$cp=0;
$me=0;
$ci=0;
$pro=0;
$ec=0;
$non=0;

$sql="select * from events where Catagory='IT'";
$result=mysqli_query($con,$sql);
$it=mysqli_num_rows($result);

$sql="select * from events where Catagory='Computer'";
$result=mysqli_query($con,$sql);
$cp=mysqli_num_rows($result);

$sql="select * from events where Catagory='Mechanical'";
$result=mysqli_query($con,$sql);
$me=mysqli_num_rows($result);

$sql="select * from events where Catagory='Civil'";
$result=mysqli_query($con,$sql);
$ci=mysqli_num_rows($result);

$sql="select * from events where Catagory='Production'";
$result=mysqli_query($con,$sql);
$pro=mysqli_num_rows($result);

$sql="select * from events where Catagory='EC'";
$result=mysqli_query($con,$sql);
$ec=mysqli_num_rows($result);

$sql="select * from events where Catagory='Non-Tech'";
$result=mysqli_query($con,$sql);
$non=mysqli_num_rows($result);

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
		    <li ><a href="profile.php" style="text-transform:uppercase;"><?php echo $login_session; ?></a></li>
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

<div class="container padded">
    <div class="row">
        <div class="col-sm-8 blog">
            <section>
            <?php
			$sql="select * from events where Catagory='$catb'";
			$result=mysqli_query($con,$sql);
			if(!$result)
				die("Something went wrong.");
			while($r=mysqli_fetch_assoc($result))
			{
			?>
            
             <div id="content_of_event">
                <h1><?php echo $r['Catagory'] ?> &raquo; <?php echo strtoupper($r['Name']); ?></h1><hr>
                <p id="time_of_event"><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $r['Created']; ?></p>
                <hr>
                <img id="img_of_event" src="images/blog1.png" class="img-responsive">
                <hr>
                <div id="div_of_event">
                <?php echo $r['Description']; ?>
				</div><br>
				<div id="fees_of_event">Fees : <?php echo $r['Fees']; ?></div><br>
				<div id="contacts" >
					<b>For More Information, Call to :</b><br />
					1. <b><?php echo $r['Contact1']; ?></b><br/>
					2. <b><?php echo $r['Contact2']; ?></b>
				</div><br>
				<button class="btn" id="add_to_cart"><a href="add_cart.php?add=<?php echo $r['ID']; ?>">Add to cart</a></button>
			</div>
			<?php
			}
			mysqli_close($con);
			?>
			</section>
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
                    <a href="All_event.php?q=IT" class="list-group-item active"><span class="badge"><?php echo $it; ?></span>Information Technology</a>
                    <a href="All_event.php?q=Computer" class="list-group-item"><span class="badge"><?php echo $cp; ?></span>Compuer Science</a>
                    <a href="All_event.php?q=Civil" class="list-group-item"><span class="badge"><?php echo $ci; ?></span>Civil Engineering</a>
                    <a href="All_event.php?q=Mechanical" class="list-group-item"><span class="badge"><?php echo $me; ?></span>Mechanical Engineering</a>
                    <a href="All_event.php?q=Producation" class="list-group-item"><span class="badge"><?php echo $pro; ?></span>Production Engineering</a>
					<a href="All_event.php?q=EC" class="list-group-item"><span class="badge"><?php echo $ec; ?></span>Electrical/Electronics Engineering</a>
					<a href="All_event.php?q=Non-Tech" class="list-group-item"><span class="badge"><?php echo $non; ?></span>Non-Tech Events</a>                </div>
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

</body>
</html>