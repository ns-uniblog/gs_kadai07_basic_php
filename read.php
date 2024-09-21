<?php
function readOrders() {
    $orders = [];
    if (($handle = fopen("write.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $orders[] = $data;
        }
        fclose($handle);
    }
    return $orders;
}
?>