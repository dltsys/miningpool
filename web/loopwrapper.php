<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob runLoop2 (in " . getcwd() . ")\n";
passthru("php runconsole.php cronjob/runLoop2");
?>
