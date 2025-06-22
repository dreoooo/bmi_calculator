<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dreo's BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Dreo's BMI Calculator</h2>
        <form method="post" action="">
            <label for="weight">Weight (kg):</label>
            <input type="number" name="weight" step="0.1" required>

            <label for="height">Height (m):</label>
            <input type="number" name="height" step="0.01" required>

            <input type="submit" value="Calculate BMI">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $weight = $_POST['weight'];
            $height = $_POST['height'];

            if ($weight > 0 && $height > 0) {
                $bmi = $weight / ($height * $height);
                $bmi = round($bmi, 2);

                echo "<div class='result'>";
                echo "<h3>Your BMI is: $bmi</h3>";

                if ($bmi < 18.5) {
                    echo "<p class='category under'>Category: Underweight</p>";
                    echo "<p class='note'>Note: You are under the healthy weight range. Consider consulting a nutritionist for balanced intake and routine checkups.</p>";
                } elseif ($bmi < 25) {
                    echo "<p class='category normal'>Category: Normal weight</p>";
                    echo "<p class='note'>Note: Great job! You are within the healthy range. Maintain your current lifestyle with a balanced diet and regular activity.</p>";
                } elseif ($bmi < 30) {
                    echo "<p class='category over'>Category: Overweight</p>";
                    echo "<p class='note'>Note: You're slightly above the recommended range. Consider more physical activity and mindful eating habits.</p>";
                } else {
                    echo "<p class='category obese'>Category: Obese</p>";
                    echo "<p class='note'>Note: Your BMI falls into the obese category. It's best to consult a healthcare provider for a guided health improvement plan.</p>";
                }

                echo "</div>";
            } else {
                echo "<p class='error'>Please enter valid numbers!</p>";
            }
        }
        ?>
    </div>
</body>
</html>
