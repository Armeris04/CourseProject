<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel = "stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signUp" style="display:none">
    <h1 class="form-title">Register</h1>

    <form method = "post" action = "register.php">

        <div class="input-group">
            <i class = "fas fa-user"></i>
            <input type = "text" name = "name" placeholder="First Name" required>
            <label for = "name">First name</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-user"></i>
            <input type = "text" name = "surname" placeholder="Last Name" required>
            <label for = "surname">Last Name</label>
        </div>

        <div class="input-group">
            <i class = "fa-solid fa-envelope"></i>
            <input type = "email" name = "email" placeholder = "example@gmail.com" required>
            <label for = "email">Email</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-lock"></i>
            <input type = "password" name = "pass" placeholder = "Pasword" required>
            <label for = "pass">Password</label>
        </div>

            <input type = "submit" class="btn" value = "Sign Up" name = "signUp">

        </form>
        
        <div class="links">
            <p>Already Have An Accout?</p>
            <button id="signInButton">Sign in</button>
        </div>
    </div>


    <div class="container" id ="signIn">
    <h1 class="form-title">Sign in</h1>

    <form method = "post" action ="register.php">
        <div class="input-group">
            <i class = "fa-solid fa-envelope"></i>
            <input type = "email" name = "email" placeholder = "example@gmail.com" required>
            <label for = "email">Email</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-lock"></i>
            <input type = "password" name = "pass" placeholder = "Pasword" required>
            <label for = "pass">Password</label>
        </div>
        <input type = "submit" class= "btn" value = "Sign in" name = "signIn">
        </form>
        <div class="links">
            <p>Dont Have Account?</p>
            <button id="signUpButton">Sign up</button>
        </div>
    </div>
    
    <script src="script.js">

    </script>
    
</body>
</html>