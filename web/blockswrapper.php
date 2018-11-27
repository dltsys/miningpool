<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob runBlocks (in " . getcwd() . ")\n";
passthru("php runconsole.php cronjob/runBlocks");
?>
