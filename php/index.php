<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas ir registracija</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel = "stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container" id="signUp" style="display:none">
    <h1 class="form-title">Registracija</h1>

    <form method = "post" action = "register.php">

        <div class="input-group">
            <i class = "fas fa-user"></i>
            <input type = "text" name = "vardas" placeholder="Vardas" required>
            <label for = "vardas">Vardas</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-user"></i>
            <input type = "text" name = "pavarde" placeholder="Pavardė" required>
            <label for = "pavarde">Pavardė</label>
        </div>

        <div class="input-group">
            <i class = "fa-solid fa-envelope"></i>
            <input type = "email" name = "el_pastas" placeholder = "pavyzdys@gmail.com" required>
            <label for = "el_pastas">El. paštas</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-lock"></i>
            <input type = "password" name = "slaptazodis" placeholder = "Slaptažodis" required>
            <label for = "slaptazodis">Slaptažodis</label>
        </div>

            <input type = "submit" class="btn" value = "Registruotis" name = "signUp">

        </form>
        
        <div class="links">
            <p>Jau turite paskyrą?</p>
            <button id="signInButton">Prisijungti</button>
        </div>
    </div>


    <div class="container" id ="signIn">
    <h1 class="form-title">Prisijungimas</h1>

    <form method = "post" action ="login.php">
        <div class="input-group">
            <i class = "fa-solid fa-envelope"></i>
            <input type = "email" name = "el_pastas" placeholder = "pavyzdys@gmail.com" required>
            <label for = "el_pastas">El. paštas</label>
        </div>

        <div class="input-group">
            <i class = "fas fa-lock"></i>
            <input type = "password" name = "slaptazodis" placeholder = "Slaptažodis" required>
            <label for = "slaptazodis">Slaptažodis</label>
        </div>
        <input type = "submit" class= "btn" value = "Prisijungti" name = "signIn">
        </form>
        <div class="links">
            <p>Neturite paskyros?</p>
            <button id="signUpButton">Registruotis</button>
        </div>
    </div>
    
    <script src="../js/script.js">

    </script>
    
</body>
</html>