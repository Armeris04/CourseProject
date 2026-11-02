<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/common_elements.css">
    <link rel = "stylesheet" href="../style/submit_tickets_form.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
    <form method = "post" action = "submit_tickets.php">
        <div class="input-group">
            <textarea name="issue" class="inputs" required></textarea>
            <label for="Issue">Problema</label>
            
        </div>

        <div class="input-group">
            <textarea name="location" class="inputs" required></textarea>
            <label for="location">Lokacija</label>
            
        </div>
        <input type="submit" class="btn" value="Submit">

    </form>
    </div>
</body>
</html>