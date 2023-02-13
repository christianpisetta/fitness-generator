<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<style>
    * {
        font-family: 'Roboto';
        font-size: 16px;

    }

    .container {
        margin-top: 1rem;
        display: flex;
        flex-direction: column;
        width: 80%;
        align-items: center;
        background-color: white;
    }

    .title {
        width: 60%;
    }

    .title h2,
    .title p {
        text-align: center;
    }

    form {
        width: 60%;
        border: 1px solid lightgray;
        padding: 1rem 2rem;
    }

    .select-input {
        height: 3rem;
        border: 1px solid lightgray;
        outline: none;
        width: 100%;
        padding: 0rem 0.5rem;
        border-radius: 4px;
        color: gray;

    }

    .submit-btn {
        background-color: forestgreen;
        color: white;
        border: none;
        outline: none;
        padding: 0.5rem 1rem;
        height: 3rem;
        border-radius: 16px;
        width: 100%;
    }
</style>

<body class="">

    <div class="container">
        <div class="title">
            <h2>Fitness Planner</h2>
        </div>
        <form method="POST" action="fitness_result.php" autocomplete="off">
            <label>Fitness goals?</label>
            <select class="select-input" name="option1" required>
                <option value="Lose Weight">Lose Weight</option>
                <option value="Building muscle">Building muscle</option>
                <option value="Improving cardiovascular fitness">Improving cardiovascular fitness</option>
                <option value="Increasing flexibility and balance">Increasing flexibility and balance</option>
                <option value="Improving overall health and wellness">Improving overall health and wellness</option>
            </select>
            <br><br>
            <label>Current Fitness Level</label>
            <select class="select-input" name="option2" required>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
            <br><br>
            <label>Available equipment</label>
            <select class="select-input" name="option3" required>
                <option value="Dumbbells">Dumbbells</option>
                <option value="Resistance bands">Resistance bands</option>
                <option value="Gym">Gym</option>
                <option value="Barbell">Barbell</option>
                <option value="Bench">Bench</option>
                <option value="Pull up bar">Pull up bar</option>
            </select>
            <br><br>
            <label>Training plan duration</label>
            <select class="select-input" name="option4" required>
                <option value="4 weeks">4 weeks</option>
                <option value="8 weeks">8 weeks</option>
                <option value="16 weeks">16 weeks</option>
            </select>
            <br><br>
            <label>Preferred workout frequency</label>
            <select class="select-input" name="option5" required>
                <option value="Once a week">Once a week</option>
                <option value="2-4 times a week">2-4 times a week</option>
                <option value="5 or more times a week">5 or more times a week</option>
            </select>
            <br><br>
            <label>Preferred workout duration</label>
            <select class="select-input" name="option6" required>
                <option value="15-30 minutes">15-30 minutes</option>
                <option value="30-60 minutes">30-60 minutes</option>
                <option value="More than 1 hour">More than 1 hour</option>
            </select>
            <br><br>
         
            <button class="submit-btn" type="submit" name="generate">Generate!</button>
        </form>


    </div>

</body>

</html>