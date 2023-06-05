<?php
session_start();
if($_SESSION["islogin"]==null){
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		include "connection.php";
 $uname = $_GET["userid"];
 $pass = $_GET["pwd"];
 $sql="select name,ctype,image from signup where cid='$uname' and password='$pass'";
 $result = $con->query($sql);
 $row=$result->fetch_assoc();
  if ($result->num_rows > 0) {
	$_SESSION["islogin"]=$uname;
	$_SESSION["name"]=$row["name"];
	$_SESSION["ctype"]=$row["ctype"];
	$_SESSION["iname"]=$row["image"]; 	
 ?>
 <!-- Popup Div Starts Here -->
<div id="popupContact2"  style=" border-radius: 5px;background-color: #f2f2f2;">
<!-- Contact Us Form -->
<div class="form"  style="border-radius: 5px;background-color: #f2f2f2;">
<form id="form" method="post" name="loginform">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<center>
<h2>Welcome <?php echo $row["name"]; ?></h2>
<hr>
						<table>
							<tbody  align="center">
							<tr><td style="text-align:center;"><?php
							if($_SESSION["ctype"]=="Admin"){?>
							<a href= 'admin.php' class='formsub' style="text-decoration:none">Admin Page</a>
							<?php
							}
							?></td></tr>
							<tr><td class="td"><img src="<?php echo $_SESSION["iname"]; ?>"  align="center" width="150px" height="180px"></td></tr>
							<tr><td class="td"><?php echo $row["name"]; ?></td></tr>
							<tr><td class="td"align="center"><input class="formsub" type="button" name="Logout" style="width:100px;" value="Logout" onclick="logout()"/></td></tr>  
							</tbody>
						</table>
				</center>	
				<select align="center" name="selectby" Required onchange='select(this.value)'>
				 <script>
 	function select(str){
var xmlhttp; 
  if (str == "") {
    return;
  }
if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("loo").innetHTML = this.responseText;
	  div_showlogin();
    }
  };
  xmlhttp.open("GET", "select.php?q="+str, true);
  xmlhttp.send();
 }
 </script>
<option value='0' disabled selected>Orders</option>
<option value='Pending'>Current Orders</option>
<option value='Delivered'>Delivered Orders</option>
<option value='Canceled'>Caneled Orders</option>
</select>				
<div class="left-side-bar-admin" id="loo" style="float:left;" style="overflow:auto;overflow-y: scroll;width: 50%px;height:50%;">
</div>
</div>
 <?php
  }
else{	?>
	<div id="popupContact">
<!-- Contact Us Form -->
<div class="form" style="border-radius: 5px;background-color: #f2f2f2;">
<form id="form" method="post" name="loginform" style="border-radius: 5px;background-color: #f2f2f2;">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<h2>Please Login/Sign up</h2>
<hr>
		<?php
	 $_SESSION["msg1"]="Invalid UserName or Password";
		if($_SESSION["msg1"]!=null){
			echo "<font color='blue'><b>".$_SESSION["msg1"]."</b></font>";
			$_SESSION["msg1"]=null;
		}
		?>
						<table>  
							<tr><td><h3 align="center">User Id:</h3></td><td><input type="text" class="input" id="userid" required/></td></tr>  
							<tr><td><h3 align="center">Password:</h3></td><td><input type="password" id="pwd" required/></td></tr>  
							<tr><td colspan="2" align="center"><input class="formsub" type="button" name="signin" style="width:100px;"value="Login" onclick="login()"/></td></tr>  
						</table>  
						</form>
<hr>						
<form action="Registration.php" id="form" method="post" name="registrationform">
<h2>Sign up</h2>
<hr>
<center>
<input class="formsub" type="submit" value="Signup"/>  
</center>
</form>
</div>
</div>
<?php
 }
}
else
	header('Location:/Website\index.php');
}
else{
	?>
	<div id="popupContact">
<!-- Contact Us Form -->
<div class="form">
<form id="form" method="post" name="loginform" style="border-radius: 5px;background-color: #f2f2f2;">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<h2>Please Login/Sign up</h2>
<hr>
						<table>  
							<tr><td><h3 align="center">User Id:</h3></td><td><input type="text" class="input" id="userid" required/></td></tr>  
							<tr><td><h3 align="center">Password:</h3></td><td><input type="password" id="pwd" required/></td></tr>  
							<tr><td colspan="2" align="center"><input class="formsub" type="button" name="signin" style="width:100px;"value="Login" onclick="login()"/></td></tr>  
						</table>  
						</form>
<hr>						
<form action="Registration.php" id="form" method="post" name="registrationform">
<h2>Sign up</h2>
<hr>
<center>
<input class="formsub" type="submit" value="Signup"/>  
</center>
</form>
</div>
</div>
	<?php
}
?>