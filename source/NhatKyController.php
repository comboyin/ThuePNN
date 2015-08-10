<?php
$Action = isset($_GET['Action'])?$_GET['Action']:'';
include_once "../conections/config_pnn.php";
include_once '../source/Unlity.php';
if ($Action == 'LoadDanhSach') {
    error_reporting(0);
    
    
    
    $sql = '';
   
    if(strlen($_GET['NgayBD']) == 0 && strlen($_GET['NgayKT']) == 0){
        $sql = "select * from nhatky left join danhba
        on nhatky.iddanhba = danhba.iddanhba";
    }
    else{
        $NgayDB = Unlity::ConverDate('d-m-Y', $_GET['NgayBD'], 'Y-m-d') ;
        $NgayKT = Unlity::ConverDate('d-m-Y', $_GET['NgayKT'], 'Y-m-d') ;
        $sql = "select * from nhatky left join danhba
        on nhatky.iddanhba = danhba.iddanhba
        where nhatky.ngay<='$NgayKT' and nhatky.ngay>='$NgayDB'";
    }
    
    
    $queryParent = mysql_query($sql);
    $rows = array();
    while($r = mysql_fetch_assoc($queryParent)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    
    
    
    
} elseif ($_POST['Action'] == 'Them' ) {
    error_reporting(0);
    $MaSoThue =$_POST['MaSoThue'] ;
    $Ngay = Unlity::ConverDate('d-m-Y', $_POST['Ngay'], 'Y-m-d') ;
    $NoiDung=$_POST['NoiDung'];
    $TrangThai =$_POST['TrangThai'];
    
    
    $sql = '';
    
    // tim danhba
    $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
    $rs_danhba = mysql_query($sql_danhba);
    $rows = array();
    while ($r = mysql_fetch_assoc($rs_danhba)){
        $rows[] = $r;
    }

    $sql_SuaDanhBa='';
    
    // Neu tim thay MaSoThue ở danh bạ
    if(count($rows)==0){
        $sql_SuaDanhBa = "insert into nhatky(iddanhba,ngay,noidung,trangthai) values(null,'$Ngay','$NoiDung',$TrangThai)";
    }
    // Nếu không tìm thấy => set Null field iddanhba
    else {
        $iddanhba = $rows[0]['iddanhba'];
        $sql_SuaDanhBa = "insert into nhatky(iddanhba,ngay,noidung,trangthai) values('$iddanhba','$Ngay','$NoiDung',$TrangThai)";
    }
    
    
    $queryParent = mysql_query($sql_SuaDanhBa);
    $rows = [];
    $rows[] = $queryParent;
    echo json_encode($rows);
} elseif ($_POST['Action'] == 'Xoa') {
    $id = $_POST['id'];
    $mess = '';
    $sql = "delete from nhatky where nhatky.id = $id";
    mysql_query($sql);
    if(mysql_affected_rows() == 1){
        $mess = 'Xóa thành công  !';
    }
    else{
        $mess = "Không có dòng nào được xóa !";
    }
    $rows = [];
    $rows[] = $mess;
    echo json_encode($rows);
    
} elseif ($_POST['Action'] == 'Sua') {
    $mess = "";
    $MaSoThue = $_POST['MaSoThue'];
    $Ngay = Unlity::ConverDate('d-m-Y', $_POST['Ngay'], 'Y-m-d');
    $NoiDung = $_POST['NoiDung'];
    $id = $_POST['id'];
    $TrangThai = $_POST['TrangThai'];
    
    // tim danhba
    $sql_danhba = "select * from danhba where danhba.masothue = '$MaSoThue'";
    $rs_danhba = mysql_query($sql_danhba);
    $rows = array();
    while ($r = mysql_fetch_assoc($rs_danhba)){
        $rows[] = $r;
    }
    
    $sql_SuaDanhBa='';
    
    // Neu tim thay MaSoThue ở danh bạ
    if(count($rows)==0){
        $sql_SuaNhatKy = "update nhatky set nhatky.iddanhba = null,nhatky.noidung = '$NoiDung',nhatky.ngay = '$Ngay',nhatky.trangthai='$TrangThai'
                    where nhatky.id = $id";
    }
    // Nếu không tìm thấy => set Null field iddanhba
    else {
        $iddanhba = $rows[0]['iddanhba'];
        $sql_SuaNhatKy = "update nhatky set nhatky.iddanhba = '$iddanhba',nhatky.noidung = '$NoiDung',nhatky.ngay = '$Ngay',nhatky.trangthai='$TrangThai'
                        where nhatky.id = $id";
    }
    
    
    $queryParent = mysql_query($sql_SuaNhatKy);
    $rows = [];
    $rows[] = $queryParent;
    echo json_encode($rows);
    
    
}