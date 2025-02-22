<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Print Data Surat Keterangan Usaha</title>
<body onLoad="window.print()">

<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='88px'><img src='logo.png' width='85px'></td>
</tr> 
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>PEMERINTAH KABUPATEN BLITAR<br>
         KECAMATAN SELOPURO <br> DESA JATITENGAH </h3></td>
    <td align="center" rowspan='3' width='88px'>&nbsp;</td>
</tr> 
<tr>
    <td align="center"><p>Jl. Raya Wijaya Kusuma  Nomor 38 Tlp.(081) 6575624 Kode pos 53177</p></td>
</tr> 
</table>
<hr style='border:1px solid #000'>

<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center><u>SURAT PENGANTAR KETERANGAN USAHA</u> </h3></td>
</tr>
<?php
session_start();
include "koneksi.php"; 
 

                        $sql = "select * from usaha INNER JOIN data ON usaha.id_data=data.id_data where id_usaha='$_GET[id_usaha]'";
                        $query = $conn->query($sql);
                        while ($admin = $query->fetch_array()) { ?> 
<tr>
    <td align="center"><p>Nomor : 00<?php echo "$admin[id_usaha]"; ?>-DS-IX-2019</p></td>
</tr> 
</table>

<table width='100%'>
<tr>
  <td>Yang bertanda tangan di bawah ini, Kepala Desa Jatitengah Kecamatan Selopuro Kabupaten Blitar, dengan ini
menerangkan bahwa :  </td>
</tr>

</table>
<br>


<table width='100%' >
<tr>
<td></td>
<td width="40%">Nama Lengkap</td>
<td width="95%">: <?php echo "$admin[nama]";?></td>
</tr>
<tr>
<td></td>
<td>NIK</td>
<td>: <?php echo "$admin[nik]";?></td>
</tr>
<tr>
<td></td>
<td>Jenis Kelamin</td>
<td>: <?php echo "$admin[jenis]";?></td>
</tr>
<tr>
<td></td>
<td>Kewarganegaraan</td>
<td>: <?php echo "$admin[kewarganegaraan]";?></td>
</tr>
<tr>
<td></td>
<td>Alamat</td>
<td>: <?php echo "$admin[alamat]";?></td>
</tr>
</table>
<table width='100%'>
<tr>
    <td>Sesuai dengan keterangan yang bersangkutan benar nama tersebut diatas mempunyai usaha sebagai berikut :</td>
</tr>
  </table>
<table width='100%' >
<tr>
<td></td>
<td width="40%">Nama Usaha</td>
<td width="95%">: <?php echo "$admin[usaha]";?></td>
</tr>
<tr>
<td></td>
<td>Deskripsi Usaha</td>
<td>: <?php echo ($admin['deskripsi']);?></td>
</tr>
<tr>
<td></td>
<td>Usia Usaha</td>
<td>: <?php echo "$admin[sejak]";?></td>
</tr>
<tr>
<td></td>
<td>Alamat Usaha</td>
<td>: <?php echo "$admin[al]";?></td>
</tr>
</table>
<?php
                                        }
            
                                ?>
<table width=100%>
    <tr>
<p>Demikian surat keterangan kami buat, untuk dipergunakan sebagaimana mestinya</p>
</tr>
</table>
<table width=100%>
  <tr>
    <td width="30%">
	
	
	<center>
        <br><br><br> 
		CAMAT JATITENGAH<br><br><br><br><br><br>

           <br>
         
    
        </center>
    </td>
    </td>

    <td width="30%">

    </td>

    <td >
       
        <table align = "center">
            
            <tr>
              <td>Jatitengah,</td>
              <td> <?php echo date("d M Y"); ?></td></tr>
        </table><br>
        <center>
          KEPALA DESA JATITENGAH<br><br><br><br><br><br>

          SUWARJO <br>
         
    
        </center>
    </td>
  </tr>
</table> 
</body>