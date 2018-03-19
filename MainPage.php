<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;
}
div.FriendList{
background-color:lightblue;
padding:20px 30px;
}
.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    clear:right;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.container::after {
    content: "";
    clear: both;
    display: table;
}

.container img {
	
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
.senderName{
   float: left;
    color: Black;
} 
.UserInfo{
	clear:right;
    margin: 10px;
    border: 3px solid #73AD21;
    float:right;
}
.FriendRequest{
	clear:right;
    margin: 10px;
    border: 3px solid #73AD21;
    color: red;
    float:right;
    
}
.NoFriendRequest{
 display:none;
    
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


<h2>Main Page</h2>

<div class="UserInfo">
Username:Colin<br>
UserID:123

</div>


<div id=FriendRequest class="FriendRequest">
You have Friend Request From: <br>
Accrpt?<br>
<button type="button" onclick="location.href='SignUp.php';">Yes</button>
<button type="button" onclick="location.href='SignUp.php';">NO</button>
</div>

<script>
$( "#FriendRequest" ).click(function() {
  $( this ).toggleClass( "NoFriendRequest" );
});
</script>


<div class="FriendList">
<div class="container" onclick="location.href='MailingAPP.php';">
  <img src="images2.png" alt="Avatar" style="width:100%;">
  <p>Number Of messages</p>
  <span class="time-right">11:00</span>
  <span class="senderName">Max</span>
</div>
<div class="container">
  <img src="images2.png" alt="Avatar" style="width:100%;">
  <p>Number Of messages</p>
  <span class="time-right">11:00</span>
  <span class="senderName">Christ</span>
</div>


<button type="button" onclick="location.href='AddFriend.php'">Add Friend</button>


</div>

</body>
</html>
