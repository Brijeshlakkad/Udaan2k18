<?php
include("a_lock.php");
include("../config.php");
unset($_SESSION['event_id']);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin_login</title>
<script src="../js/jQuery.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/brij.css" rel="stylesheet">
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
		    <li><a href="index.php" style="text-transform:uppercase;">Admin Login</a></li>
		    <li><a href="upload_event.php">Upload Event</a></li>
			<li class="active"><a href="show_all_events.php">Events</a></li>
			<li> <a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container padded">
<center>
<?php
	if(isset($_GET['q']))
	{
		$q=$_GET['q'];
		$sql="select * from events where ID='$q'";
		$result=mysqli_query($con,$sql);
		if(!$result)
				die("Something went wrong.");
		$r=mysqli_fetch_assoc($result);
?>
<h2><?php echo $r['Name'] ?> Event</h2><br>
<form action="update_event.php" name="a_form" id="a_form" method="post">
<input type="hidden" name="id" value="<?php echo $r['ID']; ?>" />
<table cellpadding="10px" cellspacing="10px">
	<tr>
		<td>Catagory</td>
		<td><select name="a_cata" onBlur="addEvent('a_cata',this.value)" value="<?php echo $r['Catagory']; ?>">
			<option value="0" >(Select a catagary)</option>
			<option value="Computer" >Computer</option>
			<option value="IT" >IT</option>
			<option value="Mechanical" >Mechanical</option>
			<option value="Civil" >Civil</option>
			<option value="EC" >Electrical/EC</option>
			<option value="Production" >Production</option>
			<option value="Non-Tech" >Non-Tech</option>
		</select></td>
		<td><p id="a_cata"></p></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><input type="text" name="a_name" value="<?php echo $r['Name']; ?>" onkeyup="addEvent('a_name',this.value)" /></td>
		<td><p id="a_name"></p></td>
	</tr>
	<tr>
		<td>Fees</td>
		<td><input type="text" name="a_fee" value="<?php echo $r['Fees']; ?>" onkeyup="addEvent('a_fee',this.value)" /></td>
		<td><p id="a_fee"></p></td>
	</tr>
	<tr>
		<td>Contact 1</td>
		<td><input type="text" name="a_con1" value="<?php echo $r['Contact1']; ?>" onkeyup="addEvent('a_con1',this.value)" /></td>
		<td><p id="a_con1"></p></td>
	</tr>
	<tr>
		<td>Contact 2</td>
		<td><input type="text" name="a_con2" value="<?php echo $r['Contact2']; ?>" onkeyup="addEvent('a_con2',this.value)" /></td>
		<td><p id="a_con2"></p></td>
	</tr>
	<tr>
		<td>Steps</td>
		<td><input type="hidden" name="num_steps" /><input type="button" name="a_step" id="add" value="click to add steps" /></td>
		<td><p id="a_step"></p></td>
	</tr>
</table>
<div id="fields_container">
	
</div><br>
	<button type="button" class="btn btn-info" onclick="check()" >Upload Details >> </button><p id="a_status"></p>
</form>
</center>
</div>
<?php
	}
?>
<script>
	var xcounter=0;
	$(document).ready(function() {
    var max_fields_limit= 5; 
    var x = 0;
	var htmlField='<p><input type="text" form="a_form" name="steps[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></p>';
    $('#add').click(function(){
		if(x>=max_fields_limit){ 
		$("#a_step").html("<p style='color:red'>max 5 steps</p>");
		}
        if(xcounter < max_fields_limit){ 
            xcounter++;
            $('#fields_container').append(htmlField); 
        }
    });  
    $('#fields_container').on("click",".remove_field", function(){ 
		$(this).parent('p').remove(); 
		xcounter--;
    });
	});
function check()
	{
		document.a_form.num_steps.value=xcounter;
		var name =	document.a_form.a_name.value;
		var cata =	document.a_form.a_cata.value;
		var fee =	document.a_form.a_fee.value;
		var con1 =	document.a_form.a_con1.value;
		var con2 =	document.a_form.a_con2.value;
		var e_name=document.getElementById('a_name').innerHTML;
		var e_cata=document.getElementById('a_cata').innerHTML;
		var e_con1=document.getElementById('a_con1').innerHTML;
		var e_con2=document.getElementById('a_con2').innerHTML;
		var e_fee=document.getElementById('a_fee').innerHTML;
		if((e_name=="Done" || name!="") &&  (e_cata=="Done"  || cata!="") && (e_fee=="Done" || fee!="") && (e_con1=="Done"  || con1!="") &&( e_con2=="Done"  || con2!="") && xcounter!=0)
			{
				document.getElementById('a_status').innerHTML="<p style='color:green;'>Event Updated</p>";
				document.getElementById('a_form').submit();
				return;
			}
		else{
			document.getElementById('a_status').innerHTML="<p style='color:red;'>please enter valid Information</p>";
		}
	}
	
function addEvent(f,str)
	{
		if(f=="a_con2")
			{
				var c=document.a_form.a_con1.value;
				if(str=="")
					{
						document.getElementById(f).innerHTML="please enter Contact";
					}
				else if(str==c)
					{
						document.getElementById(f).innerHTML="Contacts must be different";
					}
				else if(!(str.length==10))
					{
						document.getElementById(f).innerHTML="Contacts should contain 10 digits";
					}
				else{
					document.getElementById(f).innerHTML="Done";
				}
				return;
			}
		else{
		var x=new XMLHttpRequest();
		x.onreadystatechange=function()
		{
			if(this.readyState==4 && this.status==200)
				{
					document.getElementById(f).innerHTML=this.responseText;
				}
		};
		x.open("GET","check_event.php?f="+f+"&q="+str,true);
		x.send();
		}
	}
</script>
</body>
</html>