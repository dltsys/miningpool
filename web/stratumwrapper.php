<?php
header("Content-Type: text/plain");
$config = $_REQUEST["config"];
echo strftime("%c") . ": Running stratum $config (in " . getcwd() . ")\n";
passthru("/var/stratum/run-stratum $config");
?>
