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
    $kq = [];
    $kq['TenGoi'] = '';
    $kq['DiaChi'] = '';
    $iddanhba = 0;
    if (mysql_num_rows($rs_danhba) == 1) {
        $teamp = mysql_fetch_array($rs_danhba);
        $iddanhba = $teamp['iddanhba'];
        $kq['TenGoi'] = $teamp['tengoi'];
        $kq['DiaChi'] = $teamp['sonha']." ".$teamp['tenduong'];
        
    }
    // nếu tìm thấy MaSoThue
    if ($iddanhba != 0) {
        
        $sql = "select * from hoso inner join danhba
        on hoso.iddanhba = danhba.iddanhba
        inner join loaihoso on loaihoso.idloai = hoso.idloai

        where danhba.iddanhba = '$iddanhba'";
        
        $rs_sql = mysql_query($sql);
        
        while ($r = mysql_fetch_assoc($rs_sql)) {
            $Rows[] = $r;
        }
        
        foreach ($Rows as $key => $val) {
            $Content .= '<li><a href="' . $val['img'] . '"idhoso="' . $val['idhoso'].'" masothue="'.$val['masothue'].'" ghichu="'.$val['ghichu'].'" idloai="'.$val['idloai'].'"' ;
        $Content .= 'title=""> <strong>' . $val['tenloaihs'] . '</strong> <img ';
        $Content .= 'style="width: 129px; height: 162px;" ';
        $Content .= 'src="' . $val['img'] . '" alt="' . $val['tengoi'] . '"> <span>' . $val['masothue'] . '-' . $val['tengoi'] . '</span> (' . $val['ghichu'] . ') ';
        $Content .= '</a></li> ';
        }
    }
    $kq['count'] = count($Rows);
    if (count($Rows) > 0) {
        $kq['Content'] = $Content;
    }
    
    echo json_encode($kq);
} else 
    if ($Action == 'LoadDSLoaiHS') {
        $sql = "select * from loaihoso";
        $Rows = [];
        $sr_sql = mysql_query($sql);
        while ($r = mysql_fetch_array($sr_sql)) {
            $Rows[] = $r;
        }
        $Content = '';
        
        foreach ($Rows as $key => $val) {
            
            $Content .= '<option selected="selected" value="' . $val['idloai'] . '">' . $val['tenloaihs'] . '</option>';
        }
        echo $Content;
    } else 
        if ($Action == 'ThemHoSo') {
            error_reporting(0);
            $MaSoThue = $_POST['MaSoThue'];
            $GhiChu = $_POST['GhiChu'];
            $idLoai = $_POST['idLoai'];
            $img = $_POST['img'];
            
            $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
            $rs_danhba = mysql_query($sql_danhba);
            $iddanhba = 0;
            $cout = 0;
            if (mysql_num_rows($rs_danhba) == 1) {
                $iddanhba = mysql_fetch_array($rs_danhba)['iddanhba'];
            }
            // nếu tìm thấy MaSoThue
            if ($iddanhba != 0) {
            
                $sql = "insert into hoso(iddanhba,img,idloai,ghichu) 
                                values($iddanhba,'$img',$idLoai,'$GhiChu')";
            
                mysql_query($sql);
            
                $cout = mysql_affected_rows();
               
            }
            $kq = [];
            // check mst
            if($iddanhba==0){
                $kq['kq'] = false;
                $kq['mess'] = "Không tìm thấy mã số thuế !";
            }
            // check insert
            else if($cout <= 0){
                $kq['kq'] = false;
                $kq['mess'] = "Thêm KHÔNG thành công !";
            }else if($cout==1){
                $kq['kq'] = true;
                $kq['mess'] = "Thêm thành công !";
            }
            
            echo json_encode($kq);
        }
   
   
   else if ($Action == 'LoadHS_ALL') {
    error_reporting(0);
    $Content = "";
    $Rows = [];
       
    $sql = "select * from hoso inner join danhba
    on hoso.iddanhba = danhba.iddanhba
    inner join loaihoso on loaihoso.idloai = hoso.idloai";
    
    $rs_sql = mysql_query($sql);
    
    while ($r = mysql_fetch_assoc($rs_sql)) {
        $Rows[] = $r;
    }
    
    foreach ($Rows as $key => $val) {
        $Content .= '<li><a href="' . $val['img'] . '"idhoso="' . $val['idhoso'].'" masothue="'.$val['masothue'].'" ghichu="'.$val['ghichu'].'" idloai="'.$val['idloai'].'"' ;
        $Content .= 'title=""> <strong>' . $val['tenloaihs'] . '</strong> <img ';
        $Content .= 'style="width: 129px; height: 162px;" ';
        $Content .= 'src="' . $val['img'] . '" alt="' . $val['tengoi'] . '"> <span>' . $val['masothue'] . '-' . $val['tengoi'] . '</span> (' . $val['ghichu'] . ') ';
        $Content .= '</a></li> ';
    }
    
    $kq = [];
    $kq['count'] = count($Rows);
    if (count($Rows) > 0) {
        
        $kq['Content'] = $Content;
    }
    
    echo json_encode($kq);
}else if($Action == "Xoa"){
    $idhoso = $_POST['idhoso'];
    $sql = "delete from hoso where hoso.idhoso = $idhoso";
    mysql_query($sql);
    $cout = mysql_affected_rows();
    $kq = [];
    if($cout == 1){
        $kq['kq']= true;
    }
    else if($cout<=0){
        $kq['kq']= false;
    }
    echo json_encode($kq);
}


else
    if ($Action == 'SuaHoSo') {
        error_reporting(0);
        $MaSoThue = $_POST['MaSoThue'];
        $GhiChu = $_POST['GhiChu'];
        $idLoai = $_POST['idLoai'];
        $idhoso = $_POST['idhoso'];

        $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
        $rs_danhba = mysql_query($sql_danhba);
        $iddanhba = 0;
        $cout = 0;
        if (mysql_num_rows($rs_danhba) == 1) {
            $iddanhba = mysql_fetch_array($rs_danhba)['iddanhba'];
        }
        // nếu tìm thấy MaSoThue
        if ($iddanhba != 0) {

            $sql = "update hoso set hoso.iddanhba=$iddanhba,hoso.idloai=$idLoai,hoso.ghichu='$GhiChu'  
            where hoso.idhoso = $idhoso";

            mysql_query($sql);

            $cout = mysql_affected_rows();
             
        }
        
        
        $kq = [];
        // check mst
        if($iddanhba==0){
        $kq['kq'] = false;
        $kq['mess'] = "Không tìm thấy mã số thuế !";
        }else{
        $kq['kq'] = true;
        $kq['mess'] = "Sửa thành công !";
    }

    echo json_encode($kq);
    }



else
    if ($Action == 'SuaImg') {
        error_reporting(0);
        $img = $_POST['img'];
        $idhoso = $_POST['idhoso'];
        //tim hoso
        $sql_idhoso = "select * from hoso where hoso.idhoso = $idhoso";
        $sr = mysql_query($sql_idhoso);
        $Rows =[];
        while ($r=mysql_fetch_array($sr)){
            $Rows[] =$r;
        }
        // tim dc
        $kq = [];
        if(count($Rows)==1){
            $link = "../".$Rows[0]['img'];
            unlink($link);
            
            $update_sql = "update hoso set hoso.img = '$img' where hoso.idhoso = $idhoso";
            $sr_update = mysql_query($update_sql);
            $kq['kq'] = true;
            
        }else{
            $kq['kq']= false;
        }
        echo json_encode($kq);
        
        
    }