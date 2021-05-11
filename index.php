<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    
    <?php 
    $goodSite = false;
    
    if(isset($_POST['mdp'])){
        if($goodSite){
            error_reporting(E_ALL);
            /* Lit le port du service WWW. */
            $service_port = '12345';
            /* Lit l'adresse IP du serveur de destination */
            $address = '192.168.64.192';
            /* Crée un socket TCP/IP. */
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if ($socket === false) {
                echo "socket_create() a échoué : raison :  " . socket_strerror(socket_last_error()) . "\n";
            } 
            $result = socket_connect($socket, $address, $service_port);
            if ($socket === false) {
                echo "Essai de connexion à '$address' sur le port '$service_port'...";
                echo "socket_connect() a échoué : raison : ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
            } 
            $in = $_POST['mdp'];
            $out = '';
            if(empty($in)){
                $in = "Il faut saisir un mot de pass";
            }
            socket_write($socket, $in, strlen($in));
            $out = socket_read($socket, 255);
            echo $out;
            socket_close($socket);
        }else{
            if(empty($_POST['mdp'])){
                echo  "Il faut saisir un mot de pass";
            }else{
                echo $_POST['mdp'];
            }
           ;
        }
        
    }?>

    <div class="container">
    <div class="left">
        <div class="header">
        <h2 class="animation a1">SNescape Game</h2>
        <h4 class="animation a2">Vous êtes sur un site d'ouverture de la gâche Electrique. Mais est-ce le bon site :D</h4>
        </div>
        <div class="form">
            <form method="post">
                <input type="text" name="mdp"class="form-field animation a3" placeholder="Mot de Passe (Culture G) ?">
                <button class="animation a6">OUVERTURE DE LA GACHE</button>
            </form>
        </div>
    </div>
    <div class="right"></div>
    </div>

</body>
</html>