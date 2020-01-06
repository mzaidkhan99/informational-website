<!doctype html>
<html lang="en">
<head>
	 
	<meta charset="utf-8">
	<title>website name</title>
	<link rel="stylesheet" type="text/css" href="scr2.css">
	<meta name="description" content="">
	
</head>
<body>
<center>
<div class="container">
	<div class="banner">
		<!-- 
		<div class="image">
			<img src = "landing_page2.jpeg">
		</div> 
      -->
      

      <div class="user">
      <?php
         session_start();
         if(isset($_SESSION['username'])){
            ?><h3><?php echo("hello ".$_SESSION['username']."!"); ?></h3>
            <a href="user.php"><button>Dashboard</button></a><?php
         }
      ?>
      </div>
      


		<div class = "search_bar">
         <h1>website name</h1>
			<form action = "search.php" method = "POST">
				<input type = "text" name = "search" placeholder = "search...">
				<button type = "submit" name = "btn_4" >search</button>
			</form>
		</div>
		
	</div>


	<div class = "grid_2_col">

      <div class="signin">
         <form action="lgn.php" method = "POST">
            <input type="text" name = "uname" placeholder = "Username">
            <input type="password" name = "pass" placeholder = "Password"><br>
            <button type = "submit" name = "lgn">Sign upp</button>
         </form>
      </div>

      <div class="signup">
         <form action="snin.php" method = "POST">
            <input type="text" name = "uname" placeholder = "Username">
            <input type="password" name = "pass" placeholder = "Password"><br>
            <button type = "submit" name = "sinin">Sign in</button>
         </form>
         <!----<a href = "lgt.php"><button> logg</button></a>--->
      </div>

		<div class = "upload">
			<form name = "upload" action = "upload.php" onsubmit = "return validation()" method = "POST" enctype = "multipart/form-data">
			<div>
				<input type  = "text" name = "u_name" placeholder = "U Name"><br>
				<div id = "u_name_error" class = "error-txt"></div>
			</div>
			<div>
				<input type  = "text" name = "sub_name" placeholder = "Sub/course Name"><br>
				<div id = "sub_name_error" class = "error-txt"></div>	
			</div>
				<input type  = "text" name = "sub_code" placeholder = "Sub Code"><br>
			<div>
				<input type  = "text" name = "year" placeholder = "Paper year"><br>
				<div id = "year_error" class = "error-txt"></div>	
			</div>
				<input type  = "text" name = "authors_name" placeholder = "Autor's Name"><br>
				<input type = "file" name = "file_upload" id = "file_error" class = "error-txt"><br>
            
				<button type ="submit" name ="btn_3">upload</button>
			</form>
		</div>

	</div>

							<!--footer starts-->

	<div class="footer">	
		<p><br>&copy</p>
      <p><h2>footer</h2></p>
	</div>


</div>
</center>
</body>

</html>

<script>

//getting input objects
	var u_name = document.forms["upload"]['u_name'];
	var sub_name = document.forms["upload"]['sub_name'];
	var year = document.forms["upload"]['year'];

//getting error objects
	var u_name_error = document.getElementById("u_name_error");
	var sub_name_error = document.getElementById("sub_name_error");
	var year_error = document.getElementById("year_error");

//validation functions
	function validation() {
		if (u_name.value == "") {
			u_name.style.border = "1px red solid";
			u_name_error.innerHTML = "this field is required";
			//u_name.focus();
			return false;
		}

		if (sub_name.value == "") {
			sub_name.style.border = "1px red solid";
			sub_name_error.innerHTML = "this field is required";
			sub_name.focus();
			return false;
		}

		if (year.value == "") {
			year.style.border = "1px red solid";
			year_error.innerHTML = "this field is required";
			year.focus();
			return false;
		}
		
		var fileError = document.getElementById('file_error').files.length;
		//console.log(fileError);
		if (fileError == 0){
			console.log('no file selected');
			alert("You have not selected any file.");
		}
	}
</script>
