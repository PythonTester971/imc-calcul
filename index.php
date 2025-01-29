<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>IMC Calcul</title>
</head>
<body class="container bg-primary text-white">

<!--FORMULAIRE -->
    <h1 class="text-center">Calculez votre IMC</h1>

<div id="form-container" class="container">
    <form id="imc-form" action="index.php" method="POST">

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">âge</span>
        <input id="age" type="number" name="age" min="1" max="120" class="form-control" placeholder="ans">
    </div>

        <!-- <label for="age">Âge : </label><br>
        <input id="age" type="number" name="age" min="1" max="120">
        <span>ans<span><br><br> -->
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">poids</span>
        <input id="weight" type="number" name="weight" min="1" max="200" step="0.01" required class="form-control" placeholder="kilogrammes">
    </div>

        <!-- <label for="weight">Poids : </label><br>
        <input id="weight" type="number" name="weight" min="1" max="200" step="0.01" required>
        <span>kg<span><br><br> -->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">poids</span>
        <input id="height" type="number" name="height" min="1" max="3" step="0.01" required class="form-control" placeholder="mètres">
    </div>

        <!-- <label for="height">Taille : </label><br>
        <input id="height" type="number" name="height" min="1" max="3" step="0.01" required>
        <span>m<span><br><br> -->

        <input id="submit" type="submit" value="Submit" class="btn btn-light">
    </form>
    <br><br>

    <?php 
    if(isset($_POST['age']) && isset($_POST['weight']) && isset($_POST['height']) ):
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height']; 
    endif;
    ?>
    
    <div id="imc-result" class="p-2 form-control">
        <p>Votre IMC est de :
            <div id="imc-display" class="mb-2 form-control">
                <?php $imc = $weight/pow($height,2);?>
                <?php echo round($imc,2);?>
            </div>

            <?php 
                if($imc > 35):
            ?>
            <div id="imc-category" class="form-control border-danger">
                    <p class="text-danger-emphasis">Vous êtes en état d'obésité sévère!</p>
            </div>
            <?php
                elseif ($imc > 30):
            ?>
            <div id="imc-category" class="form-control border-danger-subtle">
                    <p class="text-danger">Vous êtes en état d'obésité modérée!</p>
            </div>
            <?php
                elseif ($imc > 25):
            ?>
            <div id="imc-category" class="form-control border-warning">
                   <p class="text-warning-emphasis">Vous êtes en état de surpoids!</p>
            </div>
            <?php
                   elseif ($imc > 18.5):
            ?>
            <div id="imc-category" class="form-control border-info-subtle">
                    <p class="text-primary">Vous avez une corpulence normale!</p>
            </div>
            <?php
                elseif ($imc <= 18.5) :
            ?>
            <div id="imc-category" class="form-control border-danger">
                    <p class="text-danger-emphasis">Vous êtes en insuffisance pondérale!</p>
            </div>
    <?php endif; ?> 
    </div>
    

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>