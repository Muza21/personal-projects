<!DOCTYPE html>
<html>

<head>
    <title>PHP Test</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>
        body,
        h1 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%
        }

        .bgimg {
            background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-topleft w3-padding-large w3-xlarge">
            <?php echo $logo; ?>
        </div>
        <div class="w3-display-middle">
            <h1 class="w3-jumbo w3-animate-top">PHP Test</h1>
            <hr class="w3-border-grey" style="margin:auto;width:40%">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>