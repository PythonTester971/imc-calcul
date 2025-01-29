<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>IMC Calcul</title>
</head>
<body class="bg-primary text-white">

<!--FORMULAIRE -->
<div id="form-container" class="container text-center">
    <h1 class="p-2 mt-3 mb-3">Calculez votre IMC</h1>

    <form id="imc-form" action="index.php" method="POST">

    <div class="input-group mb-3"> <!--Déclarer son âge (pas requis, n'entre pas dans le calcul-->
        <span class="input-group-text" id="basic-addon1">âge</span>
        <input id="age" type="number" name="age" min="1" max="120" class="form-control" placeholder="ans">
    </div>
    
    <div class="input-group mb-3"> <!--Déclarer son poids : requis-->
        <span class="input-group-text" id="basic-addon1">poids</span>
        <input id="weight" type="number" name="weight" min="1" max="200" step="0.01" required class="form-control" placeholder="kilogrammes">
    </div>

    <div class="input-group mb-3"> <!--Déclarer sa taille : requis-->
        <span class="input-group-text" id="basic-addon1">taille</span>
        <input id="height" type="number" name="height" min="1" max="3" step="0.01" required class="form-control" placeholder="mètres">
    </div>

        <input id="submit" type="submit" value="Submit" class="btn btn-light">
    </form>
    <br><br>

    <?php 
    //RECUPERATION DES DONNEES DU FORMULAIRE
    if(isset($_POST['age']) && isset($_POST['weight']) && isset($_POST['height']) ):
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height']; 
    ?>
    

    <!--CONTROLE L'AFFICHAGE DE L'IMC ET DU MESSAGE CORRESPONDANT-->
    <div id="imc-result" class="p-2 form-control">
        <p>Votre IMC est de :
            <div id="imc-display" class="mb-2 form-control text-center">
                <?php $imc = $weight/pow($height,2);?>
                <?php echo round($imc,2);?>
            </div>

            <?php 
            $phrase = 'Vous êtes en état de ';
            $obesite_severe = 'obésité sévère !';
            $obesite_moderee = 'obésité modérée !';
            $surpoids = 'surpoids !';
            $normale = 'corpulence normale !';
            $sous_poids = 'insuffisance pondérale !';

                if($imc > 35):
            ?>
            <div id="imc-category" class="form-control border-danger">
                    <p class="text-danger-emphasis text-center"><?php echo $phrase.$obesite_severe ?></p>
            </div>
            <?php
                elseif ($imc > 30):
            ?>
            <div id="imc-category" class="form-control border-danger-subtle">
                    <p class="text-danger text-center"><?php echo $phrase.$obesite_moderee ?></p>
            </div>
            <?php
                elseif ($imc > 25):
            ?>
            <div id="imc-category" class="form-control border-warning">
                   <p class="text-warning-emphasis text-center"><?php echo $phrase.$surpoids ?></p>
            </div>
            <?php
                   elseif ($imc > 18.5):
            ?>
            <div id="imc-category" class="form-control border-info-subtle">
                    <p class="text-primary text-center"><?php echo $phrase.$normale ?></p>
            </div>
            <?php
                elseif ($imc <= 18.5) :
            ?>
            <div id="imc-category" class="form-control border-danger">
                    <p class="text-danger-emphasis text-center"><?php echo $phrase.$sous_poids ?></p>
            </div>
            <?php endif; ?> 
    </div>
    <?php endif; ?>
    

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>