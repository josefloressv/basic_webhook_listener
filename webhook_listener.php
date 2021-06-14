<?php
$headers = getallheaders();

// obtener data
$data = file_get_contents('php://input');
try {

/*
create file before
sudo touch /var/log/webhook.log
sudo chown root:www-data /var/log/webhook.log
sudo chmod 774 /var/log/webhook.log
*/
    $log_file = fopen("/var/log/webhook.log", "a");
    fwrite($log_file, date('Y-m-d H:i:s'));
    fwrite($log_file, $data);
    fclose($log_file);
} catch (\Throwable $th) {
    echo "Error / " . $th->getMessage();
}
echo "OKOK!";
// sudo tail -f /var/log/webhook.log