<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('OAUTH2_CLIENT_ID', '0000000000');
define('OAUTH2_CLIENT_SECRET', 'clientcode');

$authorizeURL = 'https://discord.com/api/oauth2/authorize';
$tokenURL = 'https://discord.com/api/oauth2/token';
$apiURLBase = 'https://discord.com/api/users/@me';
$user_bdd= "root";
$pwd_bdd= "";

session_start();

// Start the login process by sending the user to Discord's authorization page
if(get('action') == 'login') {

    $params = array(
        'client_id' => 860953664793083925,
        'redirect_uri' => 'https://pearl.local/wlip.php',
        'response_type' => 'code',
        'scope' => 'identify guilds'
    );

    // Redirect the user to Discord's authorization page
    header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
    die();
}


// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if(get('code')) {

    // Exchange the auth code for a token
    $token = apiRequest($tokenURL, array(
        "grant_type" => "authorization_code",
        'client_id' => 860953664793083925,
        'client_secret' => 'hMnb64OME1O6nKI-HMAUORrKnnIPXA-W',
        'redirect_uri' => 'https://pearl.local/wlip.php',
        'code' => get('code')
    ));
    $logout_token = $token->access_token;
    $_SESSION['access_token'] = $token->access_token;


    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
    $DiscordUser = apiRequest($apiURLBase);?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>PearlFive - WhitelistIP</title>
            
    <meta name="keywords"
          content="Règlement RP, termes rp,Règles RP,Règlement PearlFive, GTA RP, GTAV RP, FIVEM, Fivem FR">
    <meta name="description" content="Règlement du serveur PearlFive, Règlement DISCORD, Règlement RP.">
    <meta name="author" content="PearlFive">

    <link rel="shortcut icon" type="image/png" href="img/Logo.png">

    <link rel="stylesheet" href="css/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        </head>
        <body class="text-center bg-black">
            <section class="py-24 2xl:py-44 font-medium bg-darkBlueGray-500 text-white rounded-t-10xl">
                <div class="container px-4 mx-auto">
                  <div class="max-w-5xl mx-auto text-center">
                    <img src="img/Logo.png" class="mx-auto w-52" alt="">
                    <h3 class="text-2xl mt-5">Bienvenue <span class="text-red"> <?php echo $DiscordUser->username ?> </span></h3>
                    <h3 class="text-xl">Votre compte Discord, votre adresse IP, votre groupe sanguin ainsi que votre parfum de glace préféré viennent d'être associés au serveur PearlFiveRP</h3>
                    <h3 class="text-xl">Le moindre faux pas sera sanctionné par une descente</h3>
                <a href="https://PearlFive.net/"  class="inline-block mt-5 px-6 py-2 font-medium leading-7 text-center text-red-700 uppercase transition bg-transparent border-2 border-red-700 rounded shadow-lg ripple hover:shadow-lg hover:bg-blue-100 focus:outline-none shadow-red-500/50 hover:shadow-white z-50">Accueil du site</a>
                    
                </div>
                </div>
              </section>
        </body>
        
    </html>
    <?php
   /* echo '<h3>Logged In</h3>';
    echo '<h4>Welcome, ' . $DiscordUser->username . '</h4>';
    echo '<pre>';
    print_r($DiscordUser);
    echo '</pre>';*/
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;port=3306;dbname=pearl;', $user_bdd, $pwd_bdd);
        $discord_id = $DiscordUser->id;
        $stmt = $dbh->prepare('SELECT * from discord_whitelist WHERE discord_id=?');
        $stmt->execute(array($discord_id));
        $user = $stmt->fetch();
        if($user){
            $sql = "UPDATE discord_whitelist SET discord_username=?,discord_avatar=?,discord_discriminator=?,discord_public_flags=?,discord_flags=?,discord_locale=?,discord_mfa_enabled=?,adresse_ip=?,bot_check=?,nb_connexion=?,updated_at=? WHERE discord_id=?";
            $stmtup= $dbh->prepare($sql);
            $nb_co = $user['nb_connexion']+1;
            $bot_check = 0;
            $updated_at = date('Y-m-d H:i:s');
            $stmtup->execute([$DiscordUser->username,$DiscordUser->avatar,$DiscordUser->discriminator,$DiscordUser->public_flags,$DiscordUser->flags,$DiscordUser->locale,$DiscordUser->mfa_enabled,$_SERVER['REMOTE_ADDR'],$bot_check,$nb_co,$updated_at,$DiscordUser->id]);
        }else{
            $stmtins = $dbh->prepare("INSERT INTO discord_whitelist (discord_id, discord_username, discord_avatar, discord_discriminator, discord_public_flags, discord_flags, discord_locale, discord_mfa_enabled, adresse_ip, nb_connexion, created_at, updated_at) VALUES (:discord_id, :discord_username, :discord_avatar, :discord_discriminator, :discord_public_flags, :discord_flags, :discord_locale, :discord_mfa_enabled, :adresse_ip, :nb_connexion, :created_at, :updated_at)");
            $stmtins->bindParam(':discord_id', $discord_id);
            $stmtins->bindParam(':discord_username', $discord_username);
            $stmtins->bindParam(':discord_avatar', $discord_avatar);
            $stmtins->bindParam(':discord_discriminator', $discord_discriminator);
            $stmtins->bindParam(':discord_public_flags', $discord_public_flags);
            $stmtins->bindParam(':discord_flags', $discord_flags);
            $stmtins->bindParam(':discord_locale', $discord_locale);
            $stmtins->bindParam(':discord_mfa_enabled', $discord_mfa_enabled);
            $stmtins->bindParam(':adresse_ip', $adresse_ip);
            $stmtins->bindParam(':nb_connexion', $nb_connexion);
            $stmtins->bindParam(':created_at', $created_at);
            $stmtins->bindParam(':updated_at', $updated_at);
            // insertion d'une ligne
            $discord_id = $DiscordUser->id;
            $discord_username = $DiscordUser->username;
            $discord_avatar = $DiscordUser->avatar;
            $discord_discriminator = $DiscordUser->discriminator;
            $discord_public_flags = $DiscordUser->public_flags;
            $discord_flags = $DiscordUser->flags;
            $discord_locale = $DiscordUser->locale;
            $discord_mfa_enabled = $DiscordUser->mfa_enabled;
            $nb_connexion = 1;
            $adresse_ip = $_SERVER['REMOTE_ADDR'];
            $created_at = date('Y-m-d H:i:s');
            $updated_at = date('Y-m-d H:i:s');
            $stmtins->execute();
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
} else {?>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Connexion par discord</title>
                     
    <meta name="keywords"
          content="Règlement RP, termes rp,Règles RP,Règlement PearlFive, GTA RP, GTAV RP, FIVEM, Fivem FR">
    <meta name="description" content="Règlement du serveur PearlFive, Règlement DISCORD, Règlement RP.">
    <meta name="author" content="PearlFive">

    <link rel="shortcut icon" type="image/png" href="img/Logo.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        </head>
        <body class="text-center bg-black">
            <section class="py-24 2xl:py-44 font-medium bg-darkBlueGray-500 text-white rounded-t-10xl">
                <div class="container px-4 mx-auto">
                  <div class="max-w-5xl mx-auto text-center">
                    <span class="inline-block py-3 px-7 mb-10 font-medium text-xl leading-5 text-red-500 border border-red-500 rounded-full">Rejoinez Nous !</span>
                    <h2 class="mb-14 xl:mb-16 font-heading text-5xl md:text-10xl xl:text-5xl leading-tight">Connectez votre discord</h2>
                    <p class="mb-14 xl:mb-16 font-normal text-base text-gray-300 leading-6">Vous pouvez associer votre compte au serveur PearlFive en cliquant sur le bouton ci-dessous</p>
                    <a href="?action=login"
                    class="inline-block px-6 py-2 font-medium leading-7 text-center text-red-700 uppercase transition bg-transparent border-2 border-red-700 rounded shadow-lg ripple hover:shadow-lg hover:bg-blue-100 focus:outline-none shadow-red-500/50 hover:shadow-white">
                    Rejoinez Nous ! 
                  </a>
                </div>
                </div>
              </section>
        </body>
    </html>            

    <?php
}


if(get('action') == 'logout') {
    // This must to logout you, but it didn't worked(

    $params = array(
        'access_token' => $logout_token
    );

    // Redirect the user to Discord's revoke page
    header('Location: https://discordapp.com/api/oauth2/token/revoke' . '?' . http_build_query($params));
    die();
}

function apiRequest($url, $post=FALSE, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $response = curl_exec($ch);


    if($post)
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

    $headers[] = 'Accept: application/json';

    if(session('access_token'))
        $headers[] = 'Authorization: Bearer ' . session('access_token');

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    return json_decode($response);
}

function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
