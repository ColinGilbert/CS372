
<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;
}
div.chatbox {
width: 100%;
border-style: solid;
 border-color: lightgreen;
}

.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
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
    margin-left: 50px;
}

.time-left {
    float: left;
    color: #999;
    margin-left: 20px;
}

input[type="text"] {
    width: 80%;
    length:100px;
    
}
input[type=submit]
{
	width: 61.8%;
    padding: 20px 20px;
    background-color: #008000;
    margin: 8px 0;
    border-radius: 12px;
}
input[type=submit]:hover
{
	width: 61.8%;
    padding: 20px 20px;
    background-color: #fce94f;
    margin: 8px 0;
    border-radius: 12px;
    
}
</style>
<title>Chatting APP</title>
</head>
<body>

<h2>Chat Messages</h2>
<div class="chatbox">
<div class="container">
  <img src="download.jpeg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <img src="nqTGipe.jpg" alt="Avatar" class="right" style="width:100%;">
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

<div class="container">
  <img src="download.jpeg" alt="Avatar" style="width:100%;">
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div>

<div class="container darker">
  <img src="nqTGipe.jpg" alt="Avatar" style="width:100%;" class="right">
  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
  <span class="time-right">11:05</span>
</div>
</div>
<center>
<form action="Chat.php" method="get">
  Message:<br>
  <input type="text" name="message"><br>
  <input type="submit" value="Send" >
</form>
</center>
</body>
</html>