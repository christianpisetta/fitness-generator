<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
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

<body>


    <?php

    $finalOutput = '';
    $apiKey = '';


    if (isset($_POST['generate'])) {
        $fitness_goal =   $_POST["option1"];
        $fitness_level =   $_POST["option2"];
        $available_equipment =   $_POST["option3"];
        $plan_duration =   $_POST["option4"];
        $workout_frequency =   $_POST["option5"];
        $workout_duration =   $_POST["option6"];

        $prompt = "
        Develop a training plan following carefully the instructions below.
● The fitness goal(s) are $fitness_goal
● The current fitness level is $fitness_level
● The equipment that is available are $available_equipment
● The program must last for $plan_duration
● The preferred workout frequency is: $workout_frequency
● The preferred duration of every workout must be: $workout_duration
Explain all details (e.g. exercises, reps, sets, etc.) week by week in pre-formatted form.
";

        $model = 'text-davinci-003';

        $curl = curl_init();

        $request_body = [
            "prompt" => $prompt,
            "max_tokens" => 2048,
            "temperature" => 0.7,
            "top_p" => 1,
            "presence_penalty" => 0,
            "frequency_penalty" => 0,
            "model" => $model,
        ];

        $postfields = json_encode($request_body);

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => "https://api.openai.com/v1/completions",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $postfields,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer $apiKey"
                ),
            )
        );

        $response = curl_exec($curl);

        $response1 = json_decode($response, true);
        $finalOutput = $response1["choices"][0]["text"];
        curl_close($curl);
    }

    ?>
    <div class="container">
        <div class="title">
            <h2>AI-Generated Meal Plans</h2>
            <p>Generate a meal plan tailored to you in minutes! Try Prepperly.ai now and start achieving your health and fitness goals today!</p>
        </div>
        <!-- <textarea class="form-control rounded-0" rows="20"> -->

<pre>
<?php
$finalOutput=$finalOutput ."\n\n" . "Note: This is just one example of a
training plan and can be adjusted based on the individual's needs and progress.
Remember to always listen to your body and make adjustments as needed. And also
you should consult with a doctor or any other professional before starting any new
fitness program.";
print_r($finalOutput);
?>
</pre>
<!-- </textarea> -->
    </div>

</body>

</html>