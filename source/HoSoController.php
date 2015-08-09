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
if ($Action == 'LoadHS_MST') {
    error_reporting(0);
    $Content = "";
    $Rows = [];
    $MaSoThue = $_GET['MaSoThue'];
    $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
    $rs_danhba = mysql_query($sql_danhba);
    $iddanhba = 0;
    if(mysql_num_rows($rs_danhba)==1){
        $iddanhba = mysql_fetch_array($rs_danhba)['iddanhba'];
    }
    // nếu tìm thấy MaSoThue
    if($iddanhba!=0){

        $sql = "select * from hoso inner join danhba
        on hoso.iddanhba = danhba.iddanhba
        inner join loaihoso on loaihoso.idloai = hoso.idhoso

        where danhba.iddanhba = '$iddanhba'";
        
        $rs_sql = mysql_query($sql);
        
        while ($r = mysql_fetch_assoc($rs_sql)) {
            $Rows[] = $r;
        }
       
        foreach ($Rows as $key => $val) {
            $Content .= '<li><a ref="lightBox" href="' . $val['img'] . '"idhoso="' . $val['idhoso'] . '" alt="" ';
            $Content .= 'title=""> <strong>' . $val['tenloaihs'] . '</strong> <img ';
            $Content .= 'style="width: 129px; height: 162px;" ';
            $Content .= 'src="' . $val['img'] . '" alt="' . $val['tengoi'] . '"> <span>' . $val['masothue'] . '-' . $val['tengoi'] . '</span> (' . $val['ghichu'] . ') ';
            $Content .= '</a></li> ';
        }
    }
    $kq = [];
    $kq['count'] = count($Rows);
    if (count($Rows) > 0) {
        
        $kq['TenGoi'] = $Rows[0]['tengoi'];
        $kq['Content'] = $Content;
    }
    
    echo json_encode($kq);
}