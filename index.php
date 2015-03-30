<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>

	<title> Kullanıcı Kayıt </title>
	<script src="jquery-1.11.2.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(e){
            //ajax başlatılıyor
       
        $('#gonder').click(function(){        	
        	var adi=$('[name=adi]').val().trim();
        	var soyadi=$('[name=soyadi]').val().trim();
            var mail=$('[name=mail]').val().trim();
            var sifre=$('[name=sifre]').val().trim();

            if(adi==""){
                alert("Lütfen Adınızı Adresi Giriniz");
                $('[name=adi]').focus();
            }
            else if(soyadi ==""){
                alert("Lütfen Soyadınızı Giriniz");
                $('[name=soyadi]').focus();
            
            }else if(mail ==""){
            	alert("Lütfen Şifrenizi Giriniz");
                $('[name=mail]').focus();

            }else if(sifre ==""){
            	alert("Lütfen Şifrenizi Giriniz");
                $('[name=sifre]').focus();
				}
            else{
                //data bilgileri var ajax başlayabilir
                $.ajax({
                    url:"ajaxD.php",
                    type:'POST',                    
                    data:$('#form').serialize(),
                    success: function(cevap){                   
                       
                      if(cevap.durum==true){
                      	window.location.href="giris.php";
                      }                    
                      
                    }
                });
            }

        });
    });

</script>



</head>
<body>





<style type="text/css">
	
input {

  padding: 10px;
  background-color: darkslategrey;
  color: white;
    border-radius: 15%;

 
}




</style>



<form id="form" >

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-radius: 10%;  margin-top: 68px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:18px 16px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:18px 16px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
</style>



<table class="tg" align="center" style="undefined:table-layout:fixed; background: lightsteelblue; " border="0">
  <tr>
    <th class="tg-031e"><img src="adi.png" width="20"></th>
    <th class="tg-031e"><input type="text" placeholder="Adınız"  name="adi" id="adi"></th>
  </tr>
  <tr>
    <td class="tg-031e"><img src="soyadi.png" width="20"></td>
    <td class="tg-031e"><input type="text" placeholder="Soyadınız" required name="soyadi" id="soyadi"></td>
  </tr>
  <tr>
    <td class="tg-031e"><img src="email.png" width="20"></td>
    <td class="tg-031e"><input type="email" placeholder="Email Adresiniz" required name="mail" id="mail" autocomplete="off"/></td>
  </tr>
  <tr>
    <td class="tg-031e"><img src="sifre.png" width="20"></td>
    <td class="tg-031e"><input type="password" placeholder="Şifreniz" required name="sifre" id="sifre" autocomplete="off"/></td>
  </tr>
  <tr>
    <td class="tg-031e"><img src="sm.png" width="20"></td>
    <td class="tg-031e">

	<input type="reset" value="Sıfırla"/>
    <input type="button" value="Gönder" name="yaz" id="gonder"/></td>
  </tr>
</table>

</form>





</body>
</html>