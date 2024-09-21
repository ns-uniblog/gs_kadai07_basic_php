<?php
if (file_exists("write.csv")) {
    file_put_contents("write.csv", ""); // CSVファイルの内容を空にする
}
header("Location: index.php");
exit;
?>
