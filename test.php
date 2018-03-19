<?php

require_once('UserClass.php');
$username='AB';
$passkey='I am Max';
$profilepic="11111";
//$user =new User("Jiayu",1,'myphoto.png');
//echo "Find askjdhbuwqehf id <br>";











//This code is test the countUnreadMessageFrom function 
$colin=new User("colin",2,"a.png");

echo "Colin has " . $colin->countUnreadMessageFrom(1) . "Unread messages";





/*This test getMyFriend function work or not 
$returnvalue=$user->getMyFriend();
echo "Max Friend are <br>";
if ($returnvalue->num_rows > 0) {
	// output data of each row
	while($row = $returnvalue->fetch_assoc()) {
		echo "id: " . $row["id"]. " - username: " . $row["username"] .  "<br>";
	}
} else {
	echo "0 results";
}
*/
//echo User::getUserIDbyName('askjdhbuwqehf');
?>