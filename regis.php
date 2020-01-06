<html>
<head></head>
<body>
<form method="POST" action="regis?index.php" onsubmit="return validate()" name="vform">
    <div>
        <input type="text" name="username" class="textInput">
        <div id="name_error" class="val_error"> </div>
    </div>
    <div>
        <input type="text" name="email" class="textInput">
        <div id="email_error" class="val_error"> </div>
    </div>
    <div>
        <input type="text" name="password" class="textInput">
    </div>
    <div>
        <input type="text" name="password_confirmation" class="textInput">
        <div id="password_error" class="val_error"> </div>
    </div>
    <div>
        <input type="submit" value="regi" class="textInput">
    </div>
</form>
</body>
</html>
<!--addding javasscript-->
<script type="text/javascript">
    //getting input objects

    
    var username=document.forms["vform"]["username"];
    var email=document.forms["vform"]["email"];
    var password=document.forms["vform"]["password"];
    var password_confirmation=document.forms["vform"]["password_confirmation"];
    //getting error objects
    var name_error=document.getElementById("name_error");
    var email_error=document.getElementById("email_error");
    var passeord_error=document.getElementById("password_error");
    //setting event listeners
    username.addEventListener("click", nameVerify, true);
    email.addEventListener("blur", emailVerify, true);
    password.addEventListener("blur", passwordVerify, true);
    //validation fun
    function validate(){
        if (username.value == ""){
            username.style.border= "1px solid red";
            name_error.textContent= "username is required";
            //username.focus;
            return false;
        }
        if (email.value =="") {
            email.style.border="3px blue solid";
            email_error.innerHTML="email is required";
            return false;
        }
    }
    function emailVerify(){
        if (email.value !="") {
            email.style.border="1.8px yellow solid";
            email_error.innerHTML="";
            return true;
        }
    }

    //event handler fnt
    function nameVerify(){
        if (username.value !="") {
            username.style.border="1px blue dotted";
            name_error.innerHTML= "";
            return true;
            
        }
    }

</script>
