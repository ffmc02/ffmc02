<!--début du head-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--        <link rel="stylesheet" href="../assets/librairie/css/bootstrap.min.css">-->
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/solar/bootstrap.min.css" rel="stylesheet" integrity="sha384-8nq3OiMMgrVFAHyRMMO+DTfMEciSY+c3Awhj/5ljQ1xck1Uv2BUtMjsjLD8GT5Er" crossorigin="anonymous"/>
        <link rel="stylesheet" href="../assets/css/style.css" /> <!--pour mes css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="icon" href="assets/img/imageslocal/FFMC02.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        <!--notification onesignal-->
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "89d50f4a-a33c-4624-a8fc-e283dc94aec0",
      notifyButton: {
        enable: true,
      },
    });
  });
</script>
        <title><?= isset($title) ? $title : '' ?></title>
    </head>
    <body>
        <!--fin du head-->
