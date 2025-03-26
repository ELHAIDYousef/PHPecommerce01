<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter utilisatuer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">
</head>
<body class=" min-vh-100">

<?php include 'includes/nav.php' ?>

<!-- Centered Form Container -->
<div class="container mt-5 d-flex justify-content-center ">


        <div class="card shadow p-4 mt-5">
            <?php
            if (isset($_POST['ajouter'])) {
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);

                if (!empty($login) && !empty($password)) {
                    require_once 'includes/db.php';
                    $date = date("Y-m-d");

                    $sql_state = $pdo->prepare("INSERT INTO utilisateur VALUES (null,?,?,?)");
                    if ($sql_state->execute([$login, $password, $date])) {
                        $_SESSION['message'] = "<div class='alert alert-success text-center'>Utilisateur '" . htmlspecialchars($login) . "' ajouté avec succès!</div>";
                    } else {
                        $_SESSION['message'] = "<div class='alert alert-danger text-center'>Erreur lors de l'ajout.</div>";
                    }

                    // Redirection après insertion
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }else{
                    $_SESSION['message'] = "<div class='alert alert-danger text-center'>Veuillez remplir tous les champs.</div>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            }

            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']); // Supprime le message après l'affichage
            }
            ?>
            <h3 class="text-center mb-4" >Ajouter utilisateur </h3>
            <form method="post">
                <!-- Login Field -->
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="login" placeholder="Login " >
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                </div>

                <!-- Submit Button -->
                <input type="submit" class="btn btn-success w-100" name="ajouter" value="Ajouter">
            </form>

</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>