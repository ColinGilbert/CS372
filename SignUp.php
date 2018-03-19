<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
input[type=submit] {
	width: 200px;
	padding: 12px 20px;
	background-color: lightblue;
	margin: 8px 0;
	border-radius: 12px;
}

input[type=submit]:hover {
	width: 200px;
	padding: 12px 20px;
	background-color: lightgreen;
	margin: 8px 0;
	border-radius: 12px;
}

button {
	width: 200px;
	padding: 12px 20px;
	background-color: lightblue;
	margin: 8px 0;
}

button:hover {
	width: 200px;
	padding: 12px 20px;
	background-color: lightgreen;
	margin: 8px 0;
}

label>input { /* HIDE RADIO */
	visibility: hidden; /* Makes input not-clickable */
	position: absolute; /* Remove input from document flow */
}

label>input+img { /* IMAGE STYLES */
	cursor: pointer;
	border: 2px solid transparent;
}

label>input:checked+img { /* (RADIO CHECKED) IMAGE STYLES */
	border: 2px solid #f00;
}

img {
	length: 50px;
	width: 50px;
}
</style>
</head>
<body>

	<div align="center">
		<h1>Sign Up</h1>
		<form action="Login.php">
			Select a Profile Photo<br> 
			<label>
			<input type="radio" name="fb1" value="f1" />
			<img src="Female-Side-comb-O-neck-512.png">
			</label>
				
			<label>
			 <input type="radio" name="fb1" value="m1" />
				 <img src="images2.png"> 
			</label> 
			<label>
				 <input type="radio" name="fb1" value="f2" />
				 <img src="Human_resource_strategy-01-512.png"> 
			</label>		
				
				<label>
				 
				 <input type="radio" name="fb1" value="m2" /> <img src="images.png"> 
				 
				 
	</label>			 
				  <br>

			Username :<br> <input type="text" name="Username"> <br> Password:<br>
			<input type="text" name="Password1"><br> Confirm Password:<br> <input
				type="text" name="Password2"> <br> <br> <input type="submit"
				value="Submit">
		</form>

	</div>



</body>
</html>
