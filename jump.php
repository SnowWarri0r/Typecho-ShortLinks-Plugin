<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jump</title>
    <style type="text/css">*{margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline}body {background: #3498db;}#loader-container {width: 188px;height: 188px;color: white;margin: 0 auto;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);border: 5px solid #3498db;border-radius: 50%;-webkit-animation: borderScale 1s infinite ease-in-out;animation: borderScale 1s infinite ease-in-out;}#loadingText {font-family: 'Raleway', sans-serif;font-size: 1.4em;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);}@-webkit-keyframes borderScale {0% {border: 5px solid white;}50% {border: 25px solid #3498db;}100% {border: 5px solid white;}}@keyframes borderScale {0% {border: 5px solid white;}50% {border: 25px solid #3498db;}100% {border: 5px solid white;}}</style>
</head>
<body>
<div id="loader-container"><p id="loadingText">页面加载中...</p></div>
<script>
    <?php include 'function.php'?>
    window.open("<?php echo zip(dense(urldecode($_GET['link']),'de'),'de')?>","_self");
</script>
</body>
</html>
