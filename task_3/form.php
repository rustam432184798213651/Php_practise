<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахождение площади пересечения двух прямоугольников</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('form').on('submit', function(event){
                event.preventDefault(); // Prevent the form from submitting via the browser

                $.ajax({
                    url: 'task_3.php',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        $('#result').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        $('#result').html('Error: ' + textStatus + ' - ' + errorThrown);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Введите данные о двух прямоугольниках.</h1>
    <form>
        <label for="x_1">x координата левой нижней точки первого прямоугольника:</label>
        <input type="text" id="number1" name="x_1" required><br>

        <label for="y_1">y координата левой нижней точки первого прямоугольника:</label>
        <input type="text" id="number2" name="y_1" required><br>

        <label for="x_2">x координата правой верхней точки первого прямоугольника:</label>
        <input type="text" id="number3" name="x_2" required><br>

        <label for="y_2">y координата правой верхней точки первого прямоугольника:</label>
        <input type="text" id="number4" name="y_2" required><br>


        <label for="x_3">x координата левой нижней точки второго прямоугольника:</label>
        <input type="text" id="number5" name="x_3" required><br>

        <label for="y_3">y координата левой нижней точки второго прямоугольника:</label>
        <input type="text" id="number6" name="y_3" required><br>

        <label for="x_4">x координата правой верхней точки второго прямоугольника:</label>
        <input type="text" id="number7" name="x_4" required><br>

        <label for="y_4">y координата правой верхней точки второго прямоугольника:</label>
        <input type="text" id="number8" name="y_4" required><br>

        <input type="submit" value="Submit">
    </form>
    <div id="result"></div>
</body>
</html>
