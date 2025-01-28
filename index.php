<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>IMC Calcul</title>
</head>
<body>

<!--FORMULAIRE -->
    <h1 class="text-center">Calculez votre IMC</h1>

<div id="form-container" class="container">
    <form id="imc-form" action="index.php" method="POST">

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">âge</span>
        <input id="age" type="number" name="age" min="1" max="120" class="form-control" placeholder="ans" aria-label="Username" aria-describedby="basic-addon1">
    </div>

        <!-- <label for="age">Âge : </label><br>
        <input id="age" type="number" name="age" min="1" max="120">
        <span>ans<span><br><br> -->
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">poids</span>
        <input id="weight" type="number" name="weight" min="1" max="200" step="0.01" required class="form-control" placeholder="kilogrammes" aria-label="Username" aria-describedby="basic-addon1">
    </div>

        <!-- <label for="weight">Poids : </label><br>
        <input id="weight" type="number" name="weight" min="1" max="200" step="0.01" required>
        <span>kg<span><br><br> -->
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">poids</span>
        <input id="height" type="number" name="height" min="1" max="3" step="0.01" required class="form-control" placeholder="mètres" aria-label="Username" aria-describedby="basic-addon1">
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
    ?>
    
    <div id="imc-result">
        <p>Votre IMC est de :
            <div id="imc-display">
                <?php $imc = $weight/pow($height,2);?>
                <?php echo $imc;?>
            </div>
            <?php endif; ?>

            
            <div id="imc-category">
            <?php 
                if($imc > 35){
                    echo "Vous êtes en état d'obésité sévère!";
                } elseif ($imc > 30) {
                    echo "Vous êtes en état d'obésité modérée !";
                } elseif ($imc > 25) {
                    echo "Vous êtes en surpoids !";
                } elseif ($imc > 18.5) {
                    echo "Vous avez une corpulence normale!";
                } elseif ($imc <= 18.5) {
                    echo "Vous êtes en insufisance pondérale !";
                };
            ?>
            </div>
    </div>
    

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>