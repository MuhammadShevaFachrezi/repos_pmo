<?php
    $server = "localhost";
    $user   = "root";
    $ps     = "";
    $nama_db = "pmo";

    $kon = mysqli_connect($server,$user,$ps,$nama_db);

    $hsl = mysqli_query($kon, "SELECT * FROM tbl_timesheet");

    $d = array();
    while($r = mysqli_fetch_assoc($hsl)){
        array_push($d, array("label"=>$r['nama_pegawai'],"value"=>$r['kegiatan']));
    }

    $c = array("caption"=> "Jumlah Pegawai dalam kategori pekerjaan",
            "subCaption"=>"PMO",
            "xAxisName"=>"nama_pegawai",
            "yAxisName"=>"Kegiatan",
            "theme"=>"fint"); 
    
    $gabung = array("chart"=>$c, "data"=>$d);
    //print_r($gabung);
    $j = json_encode($gabung);
    echo $j;        

?>