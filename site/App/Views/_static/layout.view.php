<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Map in PHP MVC Custom Framework by Eduardo Esteves</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' rel='stylesheet'>
    
    <link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/themes/default/css/global.min.css">
  	<link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/themes/default/css/header.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $site['baseURL'] ?>assets/themes/default/css/footer.min.css">
    
  </head>
  <body>
    
    <?php require_once $siteInfo['root'].'/site/App/Views/_static/header.php';?>
    <?php require_once $siteInfo['root'].'/site/App/Views/'.$page.'.view.php'; ?>
    
    <?php require_once $siteInfo['root'].'/site/App/Views/_static/footer.php';?>
    
  </body>
</html>