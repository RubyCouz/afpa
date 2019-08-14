<?php
// déclaration d'un tableau d'erreur
$mailError = [];
// déclaration des regexs
$mailPattern = '/^[a-zA-Z\d äâêîôûëïöüéèàù%!:;,?.@\"\'&\(\)]+$/';
// vérification si click sur le bouton d'envoie
if (isset($_POST['send'])) {
    /**
     * vérification du champ destinataire
     */
    if(!empty($_POST['from'])) {
        if(preg_match($mailPattern, $_POST['from'])) {
            $from = $_POST['from'];
        } else {
            $mailError['from'] = 'Caractère non valide dans le champs "de"!'; 
        }
    } else {
        $mailError['from'] = 'Champs non rempli!';
    }
    /**
     * vérifiaction ddu champ provenance
     */
    if(!empty($_POST['for'])) {
        if(preg_match($mailPattern, $_POST['for'])) {
            $for = $_POST['for'];
        } else {
            $mailError['for'] = 'Caractère non valide dans le champs "destinataire"!'; 
        }
    } else {
        $mailError['for'] = 'Champs non rempli!';
    }
    /**
     * Vérificaiton du champs objet
     */
    if(!empty($_POST['object'])) {
        if(preg_match($mailPattern, $_POST['object'])) {
            $object = $_POST['object'];
        } else {
            $mailError['object'] = 'Caractère non valide dans le champs "objet"!'; 
        }
    } else {
        $mailError['from'] = 'Champs non rempli!';
    }
    /**
     * vérification du champs message
     */
    if(!empty($_POST['content'])) {
        if(preg_match($mailPattern, $_POST['content'])) {
            $content = $_POST['content'];
        } else {
            $mailError['content'] = 'Caractère non valide dans le champs "message"!'; 
        }
    } else {
        $mailError['content'] = 'Champs non rempli!';
    }
    
    //S'il n'y a pas d'erreur
    if (count($mailError) == 0)
    {
        // définition de l'entête du mail
        $header = array (
            'From' => $from,
            'Reply-To' => $for,
            'X-Mailer' => 'PHP/' . phpversion()
        );
        // envoie du mail à l'aide de la fonction php mail()
        mail($for, $object, $content, $header);
    }
}
