// Validating Empty Field
var i=0;
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}

//Function To Display Popup
function div_showlogin() {
if(i==0){
document.getElementById('abc').style.display = "block";
document.getElementById('container').style.display = "none";
i=1;
}
}
function div_showcart() {
if(i==0){
document.getElementById('abc1').style.display = "block";
document.getElementById('container').style.display = "none";
i=1;
}
}
//Function to Hide Popup
function div_hidelogin(){
document.getElementById('abc').style.display = "none";
document.getElementById('container').style.display = "block";
i=0;
}
function div_hidecart(){
document.getElementById('abc1').style.display = "none";
document.getElementById('container').style.display = "block";
i=0;
}
