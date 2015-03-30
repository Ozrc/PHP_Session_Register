<?php

session_start();

header("Content-type: application/json; charset=utf-8");
$data = array();
$data["aciklama"] = "datalar gelmedi";
if(isset($_POST["adi"]) && isset($_POST["soyadi"]) && isset($_POST["mail"]) && isset($_POST["sifre"]) && !empty($_POST["adi"])
 && !empty($_POST["soyadi"]) && !empty($_POST["mail"]) && !empty($_POST["sifre"])) {
    $data["aciklama"] = "datalar geldi";
    // Değişkenler yazılıyor
    $adi = trim($_POST["adi"]);
    $soyadi = trim($_POST["soyadi"]);
    $mail = trim($_POST["mail"]);
    $sifre = md5(trim($_POST["sifre"]));


    $dns = 'mysql:host=localhost;dbname=kisiler';
    $kullaniciAdi = "root";
    $sifreP = "";
    // veritabanı açılıyor
    try
    {
         $db = new PDO($dns, $kullaniciAdi, $sifreP);
         $db->exec("SET CHARACTER SET utf8");      
         $ekle = $db->exec("insert into kisi VALUES (null, '".$adi."', '".$soyadi."', '".$mail."', '".$sifre."')");
         if($ekle)
         {
                    $data["durum"] = true;
                    $id = $db->lastInsertId();
                    $_SESSION["kullanici_id"] = $id;
                    $_SESSION["kullanici_adi"] = $adi." ".$soyadi;
                    

        }
           else
        {
            $data["durum"] = false;
             $data["aciklama"] = "vt yazılamadı";
        }
        
    }
    catch (Exception $ex)
     {
       $data["aciklama"]=$ex->getMessage();
         
    }


}else{
    
}


echo json_encode($data);
?>