<?php

include("connect.php");


$arg = $_POST;
if($arg['bankName'] == "629"){
            $bankName = "PUI BANK";
                    $logoPath = "192.168.1.113/logo.jpg";
}else{
            $bankName = "KASIKORN";
                    $logoPath = "192.168.1.113/kbank.jpg";
}

$sql = "INSERT INTO account (account_id, account_name, bank_code, account_type, logo_path, bank_name)
            VALUES ('".$arg["accID"]."', '".$arg["accName"]."', '".$arg['bankName']."', '1', '".$logoPath."', '".$bankName."')";
$query = $link->query($sql);

if($query){
            echo json_encode("OK NAJA");
}else{
            echo $sql;      
}


?>

