
<!--début du headindex-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      
        <link rel="stylesheet" href="assets/librairie/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/librairie/css/bootstrap.css">
        <link href="assets/librairie/js/bootstrap.js"/>
        <link href="assets/librairie/js/jqurey-3.3.0.min.js"/>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/solar/bootstrap.min.css" rel="stylesheet" integrity="sha384-8nq3OiMMgrVFAHyRMMO+DTfMEciSY+c3Awhj/5ljQ1xck1Uv2BUtMjsjLD8GT5Er" crossorigin="anonymous"/>
        <link rel="stylesheet" href="assets/css/style.css" /> <!--pour mes css -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
         <link rel="icon" href="assets/img/imageslocal/FFMC02.ico" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        <script type="text/javascript" src="../tarteaucitron/tarteaucitron.js"></script>
         <script type="text/javascript">
        tarteaucitron.init({
    	  "privacyUrl": "", /* Privacy policy url */

    	  "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    	  "cookieName": "tarteaucitron", /* Cookie name */
    
    	  "orientation": "top", /* Banner position (top - bottom) */
    	  "showAlertSmall": true, /* Show the small banner on bottom right */
    	  "cookieslist": true, /* Show the cookie list */

    	  "adblocker": false, /* Show a Warning if an adblocker is detected */
    	  "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
    	  "highPrivacy": false, /* Disable auto consent */
    	  "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    	  "removeCredit": false, /* Remove credit link */
    	  "moreInfoLink": true, /* Show more info link */
    	  "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */

    	  //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
                          
    	  "readmoreLink": "/cookiespolicy" /* Change the default readmore link */
        });
        </script>
              <script type="text/javascript">
        tarteaucitron.user.analyticsUa = 'UA-XXXXXXXX-X';
        tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
        (tarteaucitron.job = tarteaucitron.job || []).push('analytics');
        </script>
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
            <!--fin du headIndex-->
    </head>
    <body>