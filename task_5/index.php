<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/form_style.css">
    </head>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            setcookie("city", filter_input(INPUT_POST, 'City'), time() + 30 * 24 * 60 * 60, "/");
            setcookie("age", filter_input(INPUT_POST, 'Age')  , time() + 30 * 24 * 60 * 60, "/");
            header("Location: test.php");
            exit();
        }
    ?>
    <div class="form-container">
        <h2>User information</h2>
        <form action="." method="post">
            <label for="City">Enter your city</label>
            <input type="text" name="City" required><br>
            <label for="Age">Enter your age</label>
            <input type="number" step="1" name="Age" required><br> 
            <button type="submit">Submit</button>
        </form>
    </div>
    </body>
</html>