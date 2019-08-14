<?php
include '../header.php';
?>
<div class="container">
    <h1>Initiation : affichage de l'adresse client et serveur</h1>
    <ul class="collapsible popout">
        <li class="active">
            <div class="collapsible-header">Utilisation de la superglobale <code>$_SERVER</code></div>
            <div class="collapsible-body">
                <p>
                    Une <b>superglobale</b> est une variable dont la valeur est définie par PHP. Il n'est pas possible de les modifier. Les superglobales sont reconnaissables par leur écriture : elles commencent systématiquement par "$_" et sont écrite en majuscule.
                </p>
                <p>
                    Nous devons afficher l'adresse IP du serveur ainsi que celle du client. Pour cela nous utiliserons la superglobale <a href="https://www.php.net/reserved.variables.server" title="Lien vers la définition php.net" target="_blank" ><code>$_SERVER</code></a>
                </p>
                <p>
                    Cette variable retournera un tableau contenant des informations données par le serveur.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Adresse client et adresse serveur</div>
            <div class="collapsible-body">
                <p>
                    Pour trouver l'adresse du client, nous utiliserons la variable <code>REMOTE_ADDR</code>. Associée à <code>$_SERVER</code> nous obtenons :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('$clientIp = $_SERVER["SERVER_ADDR"];') ?>
                    </code>
                </pre>
                <p>
                    Afin de faciliter son utilisation par la suite, nous stockons la valeur de retour dans une variable.
                </p>
                <p>
                    Concernant l'adresse IP du serveur, nous utiliserons <code>SERVER_ADDR</code>, ce qui nous donnera :
                </p>
                <pre>
                    <code class="php">
                        <?= htmlspecialchars('$serverIp = $_SERVER["SERVER_ADDR"];') ?>
                    </code>
                </pre>
                <p>
                    <b>NOTE :</b> l'utilisation de <code>" "</code> ici fût nécessaire pour ds besoins d'affichage. Même si cette écriture est correct, il est préférable d'utiliser <code>' '</code> en PHP.
                </p>
            </div>
        </li>
        <li>
            <div class="collapsible-header">Affichage</div>
            <div class="collapsible-body">
                <p>
                    Plusieurs options sont possible pour effectuer un affichage sur une page web :
                </p>
                <ul>
                    <li><code>var_dump($variable)</code> : est utilisé en cas de débogagen afin de contrôler le contenu d'une variable</li>
                    <li>
                        <code>echo $variable</code> : permet de faire un affichage du contenu d'une variable dans une page web. Peut également s'écrire de cette façon dans un document contenant du HTML : <code><?= htmlspecialchars('<?= $variable ?>') ?></code>
                    </li>
                </ul>
                <p>
                    Autant que possible, il est préférable de mettre du PHP dans du HTML plutôt que HTML dans du PHP.
                </p>
                <p>
                    Aussi, il est préférable de mettre le PHP "pur" (sans HTML) au début du document, au dessus du <code><!DOCTYPE></code>.
                </p>
                <p>
                    Ainsi, nous obtiendrons l'affichage suivant :
                </p>
                <pre>
                    <code class="html">
                        <?= htmlspecialchars('
?php
$serverIp = $_SERVER["SERVER_ADDR"];
$clientIp = $_SERVER["REMOTE_ADDR"];
?>

<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PHP phase 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <p>L\'adresse du serveur est <?= $serverIp ?></p>
    <p>L\'adresse du client est <?= $clientIp ?></p>
</body>
</html>
');
                        ?>
                    </code>
                </pre>
                <a href="initiationDemo.php" class="waves-effect waves-light btn" target="_blank"><i class="material-icons right">play_arrow</i>RUN CODE</a>
            </div>
        </li>
    </ul>
</div>
<?php
include '../footer.php';
?>