<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
input[type=submit]
{
	width: 200px;
    padding: 12px 20px;
    background-color: lightblue;
    margin: 8px 0;
    border-radius: 12px;
}
input[type=submit]:hover
{
	width:200px;
    padding: 12px 20px;
    background-color: lightgreen;
    margin: 8px 0;
    border-radius: 12px;
}
button{
	width: 200px;
    padding: 12px 20px;
    background-color: lightblue;
    margin: 8px 0;
    border-radius: 12px;
}
button:hover
{
	width:200px;
    padding: 12px 20px;
    background-color: lightgreen;
    margin: 8px 0;
}
</style>
</head>
<body>

<div align="center">
<h1>Login</h1>
<form action="MainPage.php" >
  Username :<br>
  <input type="text" name="Username" >
  <br>
  Password:<br>
  <input type="text" name="Password" >
  <br><br>
  <input type="submit" value="Submit">
  <button type="button" onclick="location.href='SignUp.php';">Sign Up!</button> 
</form> 

</div>



</body>
</html> 