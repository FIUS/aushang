
<!DOCTYPE HTML>
<html>
<head>
 <title>FIUS Aushang</title>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
<h1> FIUS elektronischer Aushang </h1>
<p class="menu"><a class="menubutton" href="https://fius.informatik.uni-stuttgart.de">Zurück zur FIUS Website.</a></p> <br/>
<p class="menu"><a class="menubutton" href="https://www.informatik-forum.org/job-boerse">Zur Jobbörse, des Informatik-Forum Stuttagrt.</a></p> <br/>
<div class="contentbox"> <p class="content"> <b>Hinweis:</b> Alle Dokumente hier werden automatisch ein Monat nach Upload gelöscht.</p></div><br/>

<div class="contentbox">
    <h2> Ausgehängte Dokumente </h2>
    <div class="content">
    <table style="width:100%">
<?php
    $files = scandir(realpath("./data"));

    for($i; $i < count($files); $i ++) {
        $file = realpath("./data/" . $files[$i]);
        $url = "data/" . $files[$i];
        if(! is_file($file)) continue;
        echo "    <tr class=\"thover\"><td class=\"thover\"><a class=\"filelink\" href=\"" . $url . "\">" . $files[$i] . "</a></td></tr>\n";
    }

?>
    </table>
    </div>
</div>
<footer>
  <hr>
  <span class="footer-menu-outer">
    <ul class="footer-menu">
        <li class="footer-entry"><a class="footer-link" href="https://fius.informatik.uni-stuttgart.de/index.php/fius/impressum/">Impressum</a></li>
        <li class="footer-entry"><a class="footer-link" href="https://fius.informatik.uni-stuttgart.de/index.php/fius/datenschutzerklaerung/">Datenschutzerklärung</a></li>
    </ul>
  </span>
</footer>

</body>
</html>

