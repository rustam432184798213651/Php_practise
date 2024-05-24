<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <form class="UserInfoForm" action="./test.php" method="post">
        <label for="City">Enter your city</label>
        <input type="text" name="City" required><br>
        <label for="Age">Enter your age</label>
        <input type="number" step="1" name="Age" required><br> 
        <input type="submit" value="Send" name="UserData">
    </form>
    </body>
</html>