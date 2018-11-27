<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob runLoop2\n";
passthru("cd /var/web && php runconsole.php cronjob/runLoop2");
?>
