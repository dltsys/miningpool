<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob run (in " . getcwd() . ")\n";
passthru("php runconsole.php cronjob/run");
?>
