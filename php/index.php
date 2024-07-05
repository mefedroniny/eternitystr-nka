<?php
    require __DIR__ . "/scripts/dis.php";
    require __DIR__ . "/config.php";

    function is_animated($image) {
	    $ext = substr($image, 0, 2);
	    if ($ext == "a_")
	    {
	    	return ".gif";
	    }
	    else
	    {
	    	return ".png";
	    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord test login</title>
</head>
<body>
    <?php
        if(isset($_SESSION['user'])) {
            // User is logged in
            $avatar_url = "https://cdn.discordapp.com/avatars/".$_SESSION['user_id']."/".$_SESSION['user_avatar'].is_animated($_SESSION['user_avatar']);
            if(isset($_SESSION['user_banner'])) $banner_url = "https://cdn.discordapp.com/banners/".$_SESSION['user_id']."/".$_SESSION['user_banner'].is_animated($_SESSION['user_banner']);
            ?>
    
            <div class="user-card">
    
                
    
                <div class="header-top">
                    <div class="header-avatar">
                        <img src="<?=$avatar_url?>" height="94" />
                    </div>
                    <div class="header-text">
                        <span class="header-username">
                            <?php echo $_SESSION['username']?>
                        </span>
                    </div>
                    <div class="header-badges">
                        <?php
                            // Show the users profile badges
                            for ($i = 0; $i < 20; $i++){
                                if ($_SESSION['user_flags'] & (1 << $i))
                                    echo '<img src="assets/img/badges/' . $i . '.svg" height="22"/>';
                            }
                            if($_SESSION['user_premium'] > 0) echo '<img src="assets/img/badges/nitro.svg" height="22"/>';
                            if($_SESSION['user_premium'] > 1) echo '<img src="assets/img/badges/boost.svg" height="22"/>';
                        ?>
                    </div>
                </div>
                <div class="body-wrapper">
                    <button>
                        <a href="userInfo.php">Můj profil</a>
                    </button>
                    <br>
                    <button>
                        <a href="scripts/logout.php">logout</a>
                    </button>
                </div>
    
            </div>
        <?php
        } else {
            // User is not logged in
            ?>
            <button>
                <a href="<?=$auth_url = url($client_id, $redirect_url, $scopes)?>">log in</a>
            </button>
            <?php
        }
    
        // Check if we have an invite link and server ID set
        if (defined('DISCORD_SERVER_ID') && defined('DISCORD_SERVER_INVITE')) {
            ?>
            <a href="<?=DISCORD_SERVER_INVITE?>">
                <img class="mt-4 mb-2" height="28px" alt="Join our Discord!" src="https://img.shields.io/discord/<?=DISCORD_SERVER_ID?>?color=7289DA&label=discord%20server&logo=discord&logoColor=7289DA&style=for-the-badge"/>
            </a>
            <?php
        }
        ?>


    
</body>
</html>