<?php
header("Content-Type: text/plain");
$config = $_REQUEST["config"];
echo strftime("%c") . ": Running stratum $config";
passthru("cd /var/stratum && ulimit -n 10240 && ulimit -u 10240 && ./stratum $config.conf");
?>
