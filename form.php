<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="validation formulaire avec affichafe des errors ">
    <title>validation formulaire </title>

    <style>
        .error {color: #FF0000;}
    </style>

</head>
<body>
<?php

// define variables and set to empty values
$firstnameErr ="";
$lastnameErr ="";
$emailErr = "";
$phoneErr = "";
$sujetErr = "";
$messageErr ="";
$firstnameErr1 ="";
$lastnameErr1 ="";
$emailErr1 = "";
$phoneErr1 = "";
$sujetErr1 = "";
$messageErr1 ="";

$nbErr = 0 ;
$redirect = 'index.php';

$firstname ="";
$lastname ="";
$email = "";
$phone = "";
$sujet = "";
$message ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["firstname"])) {
        $nbErr++;
        $firstnameErr = "Your first name is required";
    } else {
        $firstname = securisation($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
            $nbErr++;
            $firstameErr1 = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["lastname"])) {
        $nbErr++;
        $lastnameErr = " Your last name is required";
    } else {
        $lastname = securisation($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            $nbErr++;
            $lastnameErr1= "Only letters and white space allowed";
        }
    }


    if (empty($_POST["email"])) {
        $nbErr++;
        $emailErr = "Email is required";
    } else {
        $email = securisation($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $nbErr++;
            $emailErr1 = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $nbErr++;
        $phoneErr = "Your phone number is required";
    } else {
        $phone = securisation($_POST["phone"]);
        // check if phone number  is well-formed and valid !
        if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
            $nbErr++;
            $phoneErr1 = "Invalid phone number format";
        }
    }


    if (empty($_POST["sujet"])) {
        $nbErr++;
        $sujetErr = "Veuillez choisir votre sujet ";
    } else {
        $sujet = securisation($_POST["sujet"]);
    }

    if (empty($_POST["message"])) {
        $nbErr++;
        $messageErr = "please write your message";
    } else {
        $message = securisation($_POST["message"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$message)) {
            $nbErr++;
            $messageErr1 = "Only letters and white space allowed";
        }
    }


    if($nbErr === 0 ) {
        header('Location:thanks.php?lastname=' . $_POST['lastname'] .' '. '&firstname=' . $_POST['firstname'] .' '. '&subject=' . $_POST['subject'] .' '. '&mail=' . $_POST['mail'] .' '. '&phone=' . $_POST['phone'] .' '. '&message=' . $_POST['message']);

    }

}


function securisation($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>
<h2>securisation et validation </h2>

<p>formulaire dynamique </p>

<form method= "post" action="form.php">
    <fieldset>
        <legend>contact:</legend>
        <div>
            <label for="firstname">Prénom:</label><br>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname;?>">
            <?php echo $firstnameErr;?>  <?php echo $firstnameErr1;?>
        </div>

        <div>
            <label for="lastname">Nom :</label><br>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname;?>" >
            <?php echo $lastnameErr;?> <?php echo $lastnameErr1;?>
        </div>

        <div>
            <label for="email"> e-mail:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email;?>" >
            <?php echo $emailErr;?> <?php echo $emailErr1;?>
        </div>

        <div>
            <label for="phone">Téléphone:</label><br>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>" >
            <?php echo $phoneErr;?> <?php echo $phoneErr1;?>
        </div>

        <div>
            <label for="sujet">Sujet:</label><br>
            <select id="sujet" name="sujet">
                <optgroup label="sujet">
                    <option <?php if (isset($sujet) && $sujet=="modifier la commande en cours") echo "selected";?>  value="modifier la commande en cours">modifier la commande en cours </option>
                    <option <?php if (isset($sujet) && $sujet=="remboursement") echo "selected";?>value="remboursement">Remnousement et annulation </option>
                    <option <?php if (isset($sujet) && $sujet=="poursuite") echo "selected";?>value="poursuite">poursuite</option>
                    <option <?php if (isset($sujet) && $sujet=="nouvelle commande") echo "selected";?>value="nouvelle commande">Nouvelle commande </option>
                </optgroup>
            </select>
            <?php echo $sujetErr;?>  <?php echo $sujetErr1;?>
        </div><br>

        <div>
            <textarea name="message" placeholder="votre message!" value="<?php echo $message;?>"></textarea>
            <?php echo $messageErr;?> <?php echo $messageErr1;?>
        </div>

        <div>
            <input type="submit" value="envoyer">
        </div>
    </fieldset>
</form>
<div>

</div>
</body>
</html>