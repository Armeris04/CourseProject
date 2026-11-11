<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../style/common_elements.css">
    <link rel = "stylesheet" href="../style/submit_tickets_form.css">
    <title>Naujas bilietas</title>
</head>
<body>
    <div class="main-container">
    <form method = "post" action = "submit_tickets.php">
        <div class="input-group">
            <textarea id="problema" name="problema" class="inputs" required></textarea>
            <label for="problema">Problema</label>

        </div>

        <div class="input-group">
            <textarea id="pastatas" name="pastatas" class="inputs" required></textarea>
            <label for="pastatas">Pastatas</label>
        </div>

        <div class="input-group">
            <textarea id="aukstas" name="aukstas" class="inputs" required></textarea>
            <label for="aukstas">Aukštas</label>

        </div>

        <div class="input-group">
            <textarea id="kabinetas" name="kabinetas" class="inputs" required></textarea>
            <label for="kabinetas">Kabinetas</label>
        </div>
        
        <input type="submit" class="btn" value="Pateikti">

    </form>
    </div>
</body>
</html>