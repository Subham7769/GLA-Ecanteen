<?php
session_start();
if($_SESSION["ctype"]!=null){
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	session_unset(); 
	session_destroy();
	?>
	<div id="popupContact" >
<!-- Contact Us Form -->
<div class="form">
<form id="form" method="post" name="loginform">
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
else header('Location:/Website\index.php');
}
else{
	 ?>
 <!-- Popup Div Starts Here -->
<div id="popupContact2">
<!-- Contact Us Form -->
<div class="form">
<form id="form" method="post" name="loginform">
<img id="close" src="icons/3.png" onclick ="div_hidelogin()">
<center>
<h2>Welcome <?php echo $row["name"]; ?></h2>
<hr>
						<table>
							<tbody  align="center">
							<tr><td style="text-align:left;"><?php
							if($_SESSION["ctype"]=="Admin"){?>
							<a href= 'admin.php' target='_blank' class='formsub' style="decoration:none">Admin Page</a>
							<?php
							}
							?></td></tr>
							<tr><td class="td"><img src=""  align="center" width="150px" height="180px"></td></tr>
							<tr><td class="td"><?php echo $row["name"]; ?></td></tr>
							<tr><td class="td"align="center"><input class="formsub" type="button" name="Logout" style="width:100px;" value="Logout" onclick="logout()"/></td></tr>  
							</tbody>
						</table>
				</center>	
				<select align="center" name="selectby" Required onchange='select(this.value)'>
<option value='Pending'>Current Orders</option>
<option value='Delivered'>Delivered Orders</option>
</select>				
<div class="left-side-bar-admin" id="loo" style="float:left;">
</div>
</div>
 <?php
}
?>