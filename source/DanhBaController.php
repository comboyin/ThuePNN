<?php
$Action = $_GET['Action'];
include_once "../conections/config_pnn.php";
include_once '../source/Unlity.php';
if ($Action == 'TimNNT') {
    //error_reporting(0);
    
    $MaSoThue = $_GET['MaSoThue'];
    
    
    
    
    $sql = "select * from danhba 
    where danhba.masothue = '$MaSoThue'";
    
    $queryParent = mysql_query($sql);
    $rows = array();
    // chi lay 1 phan tu dau
    while($r = mysql_fetch_assoc($queryParent)) {
        $rows[] = $r;
        break;
    }
    echo json_encode($rows);
    
    
    
    
} elseif ($Action == 'Them') {} elseif ($Action == 'Xoa') {} elseif ($Action == 'Sua') {}