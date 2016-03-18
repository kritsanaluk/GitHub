<?php

include './connect.php';


$accountNumberForm = $_GET['accountNumberForm'];
$accountNumberTo = $_GET['accountNumberTo'];

$moneyTranfer = $_GET['moneyTranfer'];

$bankCode = '';
$remainingAmount = 0;
$fee = '';
$calAmount = 0;




$result = mysqli_query($link, "SELECT bank_code FROM account WHERE account_id = '$accountNumberTo'");
//print_r($result);
while ($arr = mysqli_fetch_assoc($result)) {
    $bankCode = $arr['bank_code'];
}

$result = mysqli_query($link, "SELECT  remaining_amount FROM account WHERE account_id = '$accountNumberForm'");
//print_r($result);
while ($arr = mysqli_fetch_assoc($result)) {
    $remainingAmount = $arr['remaining_amount'];
}

//echo $bankCode;

if ($bankCode == '629') {
    $fee = 0;

    $calAmount = $remainingAmount - $fee - $moneyTranfer;
    $sql = "UPDATE account SET remaining_amount = $calAmount WHERE account_id = '" . $accountNumberForm . "'";
//  echo $sql;

    mysqli_query($link, $sql);


    $sql = "INSERT INTO transaction VALUES(null,'$accountNumberForm','$accountNumberTo',$fee,$moneyTranfer,sysdate())";
    mysqli_query($link, $sql);


//    $sql = 'SELECT max(trancation_id) as id FROM transaction';
//    echo $sql;
    $result = mysqli_query($link, "SELECT MAX(transaction_id) as id FROM transaction");



    while ($arr = mysqli_fetch_assoc($result)) {
        $id = $arr['id'];
    }


    echo json_encode($id);
} else {
    $fee = 15;

    $calAmount = $remainingAmount - $fee - $moneyTranfer;
    $sql = "UPDATE account SET remaining_amount = $calAmount WHERE account_id = '" . $accountNumberForm . "'";
//  echo $sql;

    mysqli_query($link, $sql);


    $sql = "INSERT INTO transaction VALUES(null,'$accountNumberForm','$accountNumberTo',$fee,$moneyTranfer,sysdate())";
    mysqli_query($link, $sql);


//    $sql = 'SELECT max(trancation_id) as id FROM transaction';
//    echo $sql;
    $result = mysqli_query($link, "SELECT MAX(transaction_id) as id FROM transaction");



    while ($arr = mysqli_fetch_assoc($result)) {
        $id = $arr['id'];
    }


    echo json_encode($id);
}
?>