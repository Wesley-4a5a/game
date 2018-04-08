<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <link  type='text/css' rel='stylesheet' href='<?= APP_BASE_URL ?>/assets/css/style.css'>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class='col-12 header'>
      <img src='<?= APP_BASE_URL ?>/assets/images/kumapantsu.png'>
      <div class="login">
    <?php if($_SESSION['login'] === false){ ?>

        <form action='<?= APP_BASE_URL ?>/accounts/login' method='POST'>
          <input type="text" name='email' placeholder="Username"/>
          <input type="password" name='pass' placeholder="Password"/>
          <input type="submit" value="Login"/>
        </form>
        <a href=<?= APP_BASE_URL ?>/accounts/registreer><button>Registreren</button></a>

    <?php }else{ ?>
      Welkom <?= $_SESSION['email'];?>
      <form action='<?= APP_BASE_URL ?>/accounts/logout' method='POST'>
        <input type='submit' value='Uitloggen' />
      </form>
    <?php } ?>
      </div>
    </div>
<div class='col-2 menu'>
  <ul>
    <li>
      <a href='<?= APP_BASE_URL ?>/home'>Home</a>
    </li>
    <li>
      <a href='<?= APP_BASE_URL ?>/about'>About</a>
    </li>
    <?php if($_SESSION['login'] === true){ ?>
    <li>
      <a href='<?= APP_BASE_URL ?>/games'>Games</a>
    </li>
    <li>
      <a href='<?= APP_BASE_URL ?>/genres'>Genres</a>
    </li>
    <li>
      <a href='<?= APP_BASE_URL ?>/developers'>Developers</a>
    </li>
    <li>
      <a href='<?= APP_BASE_URL ?>/vieze/hond'>Vieze Hond</a>
    </li>
    <?php } ?>
  </ul>
</div>
