<?php
header("Content-Type: text/plain");
echo strftime("%c") . ": Running cronjob run\n";
passthru("cd /var/web && php runconsole.php cronjob/run");
?>
