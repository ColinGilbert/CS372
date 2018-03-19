<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "max950724";
$dbname = "CS372";
class User {
	private $username;
	private $userID;
	private $profilePic;
	// setter
	public function setUsername($username1) {
		$this->username = $username1;
	}
	
	// Getter
	public function getUsername($username1) {
		return $this->username;
	}
	// Setter
	public function setUserID($userID) {
		$this->userID = $userID;
	}
	// getter
	public function getUserID($userID) {
		return $this->userID;
	}
	public function setUserPic($userPic) {
		$this->profilePic = $userPic;
	}
	// getter
	public function getUserPic($userPic) {
		return $this->profilePic;
	}
	
	/*
	 * default constractor
	 */
	function __construct($username1, $userID1, $profilePic1) {
		$this->username = $username1;
		$this->userID = $userID1;
		$this->profilePic = $profilePic1;
	}
	
	/*
	 * This function will take username password and profile picturte as input, it will just push data in the User database
	 * This function yet not able to find user already exist
	 */
	public function signUp($username, $password, $profilePhoto) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "INSERT INTO user (username, password, profilepic) VALUES ('$username', '$password', '$profilePhoto')";
		if ($conn->query ( $sql ) === TRUE) {
			echo "User sign up successfully";
		}
		$conn->close ();
	}
	/*
	 * Input user name will return the user ID corrsbounding to that name
	 * useful during login
	 */
	public static function getUserIDbyName($username) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "SELECT id FROM user WHERE username='$username'";
		$result = $conn->query ( $sql );
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				return $row ['id'];
			}
		} else
			echo "No such user exist ";
	}
	/*
	 * Login function will take username and password
	 * will return true if the user is exsis
	 * else the return value is false;
	 * This could used for login
	 * In function could be used with out creating class
	 * User::login($a,$b);
	 */
	public static function login($username, $password) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "SELECT * FROM user WHERE username='$username'and password='$password'";
		echo $sql;
		if (empty ( $conn->query ( $sql ) ) === TRUE) {
			echo "No such user login fail";
			return false;
		} else {
			echo "login successful";
			return true;
		}
		$conn->close ();
	}
	/*
	 * This function will get all the id of my friend
	 * return a array of my friend
	 * This function is not yet tested
	 */
	public function getMyFriend() {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "SELECT that FROM friend WHERE this=$this->userID";
		// echo $sql . "<br>";
		$result = $conn->query ( $sql ); // select all the colume number in user
		$newsql = 'SELECT * FROM user where ';
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			$newsql .= "id=";
			$newsql .= $row ['that'];
			$newsql .= " or ";
		}
		// echo $newsql . "<br>";
		$newsql = substr ( $newsql, 0, - 3 ); // this line remove the last two character "or"
		$returnvalue = $conn->query ( $newsql );
		
		$conn->close ();
		return $returnvalue;
	}
	/*
	 * Add friend function will add this user to a user in to the friend table
	 * This operation is bi-directional
	 * make sure this function will be called after the friend request have been sent
	 */
	public function addFriend($other) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "INSERT INTO friend (this,that) VALUES ('$this->userID','$other')";
		$conn->query ( $sql );
		$sql = "INSERT INTO friend (this,that) VALUES ('$other','$this->userID')";
		$conn->query ( $sql );
		$conn->close ();
	}
	
	/*
	 * This function will assume this user send to aother user
	 * will take user other user id,and the message
	 * no return value
	 */
	public function sendMessage($toOtherUser, $message) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		if ($conn->connect_error) {
			die ( "Connection failed: " . $conn->connect_error );
		}
		$message = str_replace ( "'", "''", $message ); // This line to replace' to '' then it coule be put it's in sql database
		$timestamp = date ( 'Y-m-d G:i:s' );
		$sql = "INSERT INTO message (time, sender, receiver,information,isread) VALUES ('$timestamp',$this->userID, $toOtherUser, '$message',0)";
		$conn->query ( $sql );
		$conn->close ();
	}
	/*
	 * This function will take one parameter other user ID 
	 * Will set all message other user send to me's isread flag to true which I have read the messages
	 * Will select and return top 30 message between those two users and ordered by time newer is on top
	 * This function is not yet tested
	 */
	public function readMessage($fromOtherUser) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		// Set all the unread message from other user to me to read
		$sql = "UPDATE message SET isread =1 WHERE from=$fromOtherUser to=$this->userID";
		$conn->query ( $sql );
		//Select first 30 Message between each other sorted by time
		$sql = "SELECT TOP 30 * from message where from=$fromOtherUser to=$this->userID and from=$this->userID to=$fromOtherUser ORDER BY time ASC";
		$result = $conn->query ( $sql );
		$conn->close();
		return $result;
	}
	/*
	 * This function will take other user's ID and will count how much unread message
	 * from other user to this user
	 * will take a input other user ID
	 */
	public function countUnreadMessageFrom($otheruserID) {
		$conn = new mysqli ( $GLOBALS ['dbservername'], $GLOBALS ['dbusername'], $GLOBALS ['dbpassword'], $GLOBALS ['dbname'] );
		$sql = "SELECT * FROM message where sender=$otheruserID and receiver=$this->userID and isread=0";
		$result = $conn->query ( $sql );
		$conn->close ();
		return mysqli_num_rows ( $result );
	}

	
	
}

?>