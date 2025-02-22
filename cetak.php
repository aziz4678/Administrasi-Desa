<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Print Data SKCK</title>
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
    <td align="center"><h3 style='margin-bottom:-5px' align=center><u>SURAT PENGANTAR KETERANGAN CATATAN KEPOLISIAN</u> </h3></td>
</tr>
<?php
session_start();
include "koneksi.php"; 
 

                        $sql = "select * from skck INNER JOIN data ON skck.id_data=data.id_data where id_skck='$_GET[id_skck]'";
                        $query = $conn->query($sql);
                        while ($admin = $query->fetch_array()) { ?> 
<tr>
    <td align="center"><p>Nomor : 00<?php echo "$admin[id_skck]"; ?>-DS-IX-2019</p></td>
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
<td>Tempat Lahir</td>
<td>: <?php echo "$admin[temp]";?>
</tr>
<tr>
<td></td>
<td>Tanggal Lahir</td>
<td>: <?php echo "$admin[tgl]";?>
</tr>
<tr>
<td></td>
<td>Status Perkawinan</td>
<td>: <?php echo "$admin[status]";?></td>
</tr>
<tr>
<td></td>
<td>Kewarganegaraan</td>
<td>: <?php echo "$admin[kewarganegaraan]";?></td>
</tr>
<tr>
<td></td>
<td>Agama</td>
<td>: <?php echo "$admin[agama]";?></td>
</tr>
<tr>
<td></td>
<td>Pekerjaan</td>
<td>: <?php echo "$admin[pekerjaan]";?></td>
</tr>
<tr>
<td></td>
<td>Alamat</td>
<td>: <?php echo "$admin[alamat]";?></td>
</tr>
</table>
<?php
                                        }
            
                                ?>
<p>Nama tersebut diatas adalah benar warga penduduk Desa Kami yang berdomisili di alamat diatas serta
kami menerangkan bahwa orang tersebut berkelakukan serta berkepribadian &quot;BAIK&quot; Surat Keterangan ini kami berikan untuk memenuhi salah satu persyaratan Surat Keterangan Catatan Kepolisian (SKCK).</p>
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