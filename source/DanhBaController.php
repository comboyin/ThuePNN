<?php
$Action = '';
if (isset($_GET['Action'])) {
    $Action = $_GET['Action'];
}
if (isset($_POST['Action'])) {
    $Action = $_POST['Action'];
}
include_once "../conections/config_pnn.php";
include_once '../source/Unlity.php';
if ($Action == 'TimNNT') {
    // error_reporting(0);
    
    $MaSoThue = $_GET['MaSoThue'];
    
    $sql = "select * from danhba 
    where danhba.masothue = '$MaSoThue'";
    
    $queryParent = mysql_query($sql);
    $rows = array();
    // chi lay 1 phan tu dau
    while ($r = mysql_fetch_assoc($queryParent)) {
        $rows[] = $r;
        break;
    }
    echo json_encode($rows);
} elseif ($Action == 'LoadDanhBa') {
    $Rows = [];
    
    $sql = "select * from danhba";
    $rs_sql = mysql_query($sql);
    while ($r = mysql_fetch_array($rs_sql)) {
        $Rows[] = $r;
    }
    echo json_encode($Rows);
} elseif ($Action == 'Them') {
    error_reporting(0);
    $MaSoThue = $_POST['MaSoThue'];
    $TenGoi = $_POST['TenGoi'];
    $SoNha = $_POST['SoNha'];
    $TenDuong = $_POST['TenDuong'];
    $Todp = $_POST['Todp'];
    $sql = '';
    // tim danhba
    $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
    $result = mysql_query($sql_danhba);
    $rows = mysql_num_rows($result);
    
    $sql_SuaDanhBa = '';
    $kq = [];
    // Neu tim thay MaSoThue ở danh bạ
    if ($rows > 0) {
        $kq['kq'] = false;
        $kq['mess'] = 'Mã số thuế này đã tồn tại !';
    }     // Nếu không tìm thấy => Them vao csdl
    else 
        if ($rows == 0) {
            $iddanhba = $rows[0]['iddanhba'];
            $sql_SuaDanhBa = "insert into 
                    danhba(masothue,tengoi,sonha,tenduong,todp) 
                values('$MaSoThue','$TenGoi','$SoNha','$TenDuong','$Todp')";
            $queryParent = mysql_query($sql_SuaDanhBa);
            
            if ($queryParent == true) {
                $kq['kq'] = true;
            } else {
                $kq['kq'] = false;
                $kq['mess'] = mysql_error();
            }
        }
    
    echo json_encode($kq);
} 

elseif ($Action == 'Sua') {
    error_reporting(0);
    $MaSoThue = $_POST['MaSoThue'];
    $TenGoi = $_POST['TenGoi'];
    $SoNha = $_POST['SoNha'];
    $TenDuong = $_POST['TenDuong'];
    $Todp = $_POST['Todp'];
    $iddanhba = $_POST['iddanhba'];
    $sql = '';
    
    $sql_SuaDanhBa = "update  
        danhba set danhba.masothue='$MaSoThue',danhba.tengoi='$TenGoi',danhba.sonha='$SoNha',danhba.tenduong='$TenDuong',danhba.todp='$Todp' 
         where danhba.iddanhba = $iddanhba";
    $queryParent = mysql_query($sql_SuaDanhBa);
    
    if ($queryParent == true) {
        $kq['kq'] = true;
    } else {
        $kq['kq'] = false;
        $kq['mess'] = mysql_error();
    }
    
    echo json_encode($kq);
}

elseif ($Action == 'Xoa') {
    
    //error_reporting(0);
    
    $iddanhba = $_POST['iddanhba'];
    $sql = '';
    // tim danhba
    $sql_danhba = "select * from danhba where danhba.iddanhba = '$iddanhba'";
    $result = mysql_query($sql_danhba);
    $rows = mysql_num_rows($result);
    $sql_XoaDanhBa = '';
    $kq = [];
    // Tim thay 
    if ($rows > 0) {
       $sql_XoaDanhBa = "delete from danhba where danhba.iddanhba = $iddanhba";
       $sr =  mysql_query($sql_XoaDanhBa);
       
       if($sr==true){
           $kq['kq'] = true;
       }else {
           $kq['kq'] = false;
           $kq['mess'] = mysql_error();
       }
    }
    // khong tim thay     
    else if ($rows == 0) {
        $kq['kq'] = false;
        $kq['mess'] = 'Không tìm thấy iddanhba này !';
    }

    echo json_encode($kq);
}