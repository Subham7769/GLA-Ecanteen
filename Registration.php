<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	    <link rel="stylesheet" href="css/Registrationstyle.css">
		<title>
			Registration
		</title>
		<script type="text/javascript">
			var lab=document.getElementById("lab");
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------			 
			 //Customer type and respective textbox enabling
			function findselected1(){																
					var	c=confirm("You Have Chosen Student.");
					if (c==true){
					document.getElementById("CT0").disabled=false;
					document.getElementById("CT0").placeholder="University Roll No.";
					}
					else{
					alert("Please enter your right choice");
					}
					
					}
			function findselected2(){
					var		c=confirm("You Have Chosen Staff.");
					if (c==true){
					document.getElementById("CT0").disabled=false;
					document.getElementById("CT0").placeholder="Staff_id";
					}
					else{
					alert("Please Enter Your Right Choice");
					}
					
					}
			function findselected3(){
					var		c=confirm("You Have Chosen Faculty.");
					if (c==true){
					document.getElementById("CT0").disabled=false;
					document.getElementById("CT0").placeholder="Faculty_id";
					}
					else{
					alert("Please Enter Your Right Choice");
					}
					} 
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			//Password Validation
			function validatePassword(){						
								var lab=document.getElementById("lab");
								lab.innerHTML="";
			if(Form.Pwd.value != "" && Form.Pwd.value == Form.Cpwd.value) {
					
					if(Form.Pwd.value.length < 6) {
						alert("Error: Password must contain at least six characters!");
						Givenull();
						return false;
						}
					
					if(Form.Pwd.value == Form.Name.value) {
						alert("Error: Password must be different from Name!");
						Givenull();
						return false;
						}
						
				re = /[0-9]/;
					if(!re.test(Form.Pwd.value)) {
						alert("Error: password must contain at least one number (0-9)!");
						Givenull();
						return false;
					}
					
				re = /[a-z]/;
					if(!re.test(Form.Pwd.value)) {
						alert("Error: password must contain at least one lowercase letter (a-z)!");
						Givenull();
						return false;
					}
					
				re = /[A-Z]/;
					if(!re.test(Form.Pwd.value)) {
						alert("Error: password must contain at least one uppercase letter (A-Z)!");
						Givenull();
						return false;
					}		
			}
				else {
						lab.innerHTML="<br>Passwords Do Not Match";
						Givenull();
						return false;
					}

	//		alert("You entered a valid password: " + Form.Pwd.value);
			return true;
  }
  function Givenull(){
  						document.Form.Pwd.value=null;
						document.Form.Cpwd.value=null;
						Form.Pwd.focus();
  }
  function  Passfocus(){ 
   alert("Password Lenght Must Be Of Six Characters & Contains Atleast One Uppercase Letter [A-Z],One Lowercase Letter [a-z] & One Number [0-9] ");
   document.Form.Pwd.focus();
   
  }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		//Name Validation
		function allLetter(inputtxt) {   			
      var letters = /^[A-Za-z\s-, ]+$/;  
      if(inputtxt.value.match(letters))  
      {  
    //  alert('Accepted ! Go to Home Page');  
      return true;  
      }  
      else  
      {  
      alert('Please Input Only Alphabets');  
      return false;  
      }  
      }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	  

		//Mobile validation
		function ValidateMob()					
        {
            var y = document.Form.Mob.value;
           if(isNaN(y)||y.indexOf(" ")!=-1)
           {
              alert("Enter Only Numeric Values")
              return false; 
           }
           if (y.length<10)
           {
                alert("Enter 10 Numeric Values");
                return false;
           }var c=y.charAt(0);
           if (c=="9"||c=="8"||c=="7"||c=="6")
           {
		   return true;
		   }
		   else{
			alert("Invalid Mobile Number");
			document.Form.Mob.value=null;
			return false;
           }
        }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 


		</script>
	</head>
	<body onload='document.Form.Name.focus()'>
	<header>
		<div align="center"><a href="index.php">
					<img src="icons/glalogo.png" alt="GLA LOGO"height="50px" width="50px">
						<font>GLA CANTEEN REGISTRATION</font></a>
		</div>
	</header>
		<form action="successfully.php" method="post" name="Form" enctype="multipart/form-data">
			<table align="center">
				<tr><td colspan="4"><center>
						Registration Form
				</center></td></tr>
				<tr>
					<td>Name</td><td colspan="3"><input type="text" size="37" name="Name" onchange="allLetter(document.Form.Name)" Required /></td>
				</tr>
			<tr>
					<td>Gender</td><td colspan="3"><input type="radio" name="Gen"value="Male" Required> Male
														<input type="radio" name="Gen" value="Female" Required>Female</td>
				</tr>
				<tr>
					<td>Password</td><td colspan="3"><input type="password" size="37" name="Pwd" palceholder="Atleast 6 Characters"id="Pass1"Required/><img src="icons/tourch.png"align="center"onMouseover="Passfocus()"></td>
				</tr>
				<tr>
					<td>Confirm Password</td><td colspan="3"><input type="password" size="37" onchange="validatePassword()" name="Cpwd"  id="Pass2"Required/><label id="lab" style="color: red; font-style: italic;"></label></td>
				</tr>
				<tr><td>Customer Type</td>
												<td><input type="radio" name="CT" id="CT1" value="Student"  onchange="findselected1()"/>Student</td>
											  <td><input type="radio" name="CT" id="CT2" value="Staff" onchange="findselected2()"/>
															Staff</td>
											  <td><input type="radio" name="CT" id="CT3" value="Faculty" onchange="findselected3()"/>
															Faculty</td></tr>
				<tr><td>College Id</td><td><input type="text" size="37" maxlength= "9"  name="Roll" placeholder="" id="CT0" style="width:125px" Required disabled /></td>
				</tr>
				<tr ><td>Upload Image</td><td  colspan="3"><input type="file" name="upload" id="upload" Required/><td></tr>
				<tr>
					<td>Mobile</td><td colspan="3"><input type="" size="37" maxlength="10" name="Mob" onchange="ValidateMob()"Required/></td>
				</tr>
				<tr>
					<td>E-mail</td><td colspan="3"><input type="email" size="37"  name="Email" Required/></td>
				</tr>
			<tr>
					<td>Address</td>
					<td colspan="3">
					<select align="center"name="Addr" Required>
<option selected="selected"  disabled >Please Select The Address...</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option value="DayScholar">Day Scholar</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option value="A Block">A Block</option>
<option value="B Block">B Block</option>
<option value="C Block">C Block</option>
<option  value="D Block">D Block</option>
<option  value="E Block">E Block</option>
<option  value="F Block">F Block</option>
<option  value="G Block">G Block</option>
<option  value="H Block">H Block</option>
<option  value="I Block">I Block</option>
<option  value="J Block">J Block</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option  value="Wing1">Wing 1</option>
<option  value="Wing2">Wing 2</option>
<option  value="Wing3">Wing 3</option>
<option  value="Wing4">Wing 4</option>
<option  value="Wing5">Wing 5</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option  value="Ganga">Ganga</option>
<option  value="Yamuna">Yamuna</option>
<option  value="Kalpna Chawla">Kalpna Chawla</option>
<option  value="Godavari">Godavari</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option  value="Academic Block1">Academic Block 1</option>
<option  value="Academic Block2">Academic Block 2</option>
<option  value="Academic Block3">Academic Block 3</option>
<option  value="Academic Block4">Academic Block 4</option>
<option  value="Academic Block5">Academic Block 5</option>
<option  value="Academic Block6">Academic Block 6</option>
<option  value="Academic Block7">Academic Block 7</option>
<option  value="Academic Block8">Academic Block 8</option>
<option  value="Academic Block9">Academic Block 9</option>
<option  value="Academic Block10">Academic Block 10</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
<option  value="Residential Block1">Residential Block 1</option>
<option  value="Residential Block2">Residential Block 2</option>
<option  value="Residential Block3">Residential Block 3</option>
<option  value="Residential Block4">Residential Block 4</option>
<option  value="Residential Block5">Residential Block 5</option>
<option  value="Residential Block6">Residential Block 6</option>
<option  value="Residential Block7">Residential Block 7</option>
<option  value="Residential Block8">Residential Block 8</option>
<option  value="Residential Block9">Residential Block 9</option>
<option  value="Residential Block10">Residential Block 10</option>
<option disabled>~~~~~~~~~~~~~~~~~~~~~~</option>
</select></td>
				</tr>
				<tr>
					<td align="center"colspan="2"><input type="submit" class="formsub"  Value="Submit" name="Submit" ></td>
					<td align="center"colspan="2"><input class="formsub" type="reset" Value="Reset" name="Reset"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
