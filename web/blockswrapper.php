<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob runBlocks\n";
passthru("cd /var/web && php runconsole.php cronjob/runBlocks");
?>
