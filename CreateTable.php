 <?php
 
$servername = "localhost";
$username = "root";
$password = "max950724";
$dbname = "CS372";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create user information table
$sql = "CREATE TABLE user (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
profilepic VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create message table
$sql = "CREATE TABLE message (
time TIMESTAMP NOT NULL,
sender INT NOT NULL,
receiver INT NOT NULL,
information TEXT(255) NOT NULL,
isread int
)";

if ($conn->query($sql) === TRUE) {
	echo "Table message created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE request (
senderid INT NOT NULL,
reveiverid INT NOT NULL,
publickey BIGINT NOT NULL,
n BIGINT,
cipher BIGINT
)";

if ($conn->query($sql) === TRUE) {
	echo "Table request created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE friend (
this INT NOT NULL,
that INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
	echo "Table friend created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 