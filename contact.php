<?php



if(!empty($_POST))
{
    $errors = array();

    if(empty($_POST['name']))
    {
        $errors['name'] = "Le champ du nom ne peut pas-être vide";
    }

    if(empty($_POST['email']))
    {
        $errors['email'] = "Le champ du prénom ne peut pas-être vide";
    }

    if(empty($_POST['subject']))
    {
        $errors['subject'] = "Le champ du téléphone ne peut pas-être vide";
    }

    if(empty($_POST['message']))
    {
        $errors['message'] = "Le champ de l'email ne peut pas-être vide";
    }


    if(count($errors) == 0)
    {
        header ("Location: contact.php");
        exit();
    }

}

$courriel = 'webdesign@chloecollinet.com';
$courriel2 = 'e-mail valide';

if (filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse email '$courriel' est considérée comme valide.";
}
if (filter_var($courriel2, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse email '$courriel2' est considérée comme valide.";
} else {
    echo "L'adresse email '$courriel2' est considérée comme invalide.";
}

?>
