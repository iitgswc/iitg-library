
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>Lakshminath Bezbaroa Central Library</title>
<link rel="icon" type="image/ico" href="favicon.ico"></link>
<link rel="shortcut icon" href="favicon.ico"></link>
<link rel="stylesheet" href="<?= base_url('resources/css/3col_leftNav.css')?>" type="text/css" />
<link href="<?= base_url('resources/css/ddmenu.css')?>" rel="stylesheet" type="text/css" />

<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript" src="<?= base_url('resources/js/jquery5.js')?>"></script>
<script src="<?= base_url('resources/js/ddmenu.js')?>" type="text/javascript"></script>
<!-- START EBSCO LOCAL BOX JS ETC -->
<link rel="stylesheet" type="text/css" href="<?= base_url('resources/css/custom.css')?>" media="all" />
<link type="text/css" href="<?= base_url('resources/css/smart_tab_vertical.css')?>" rel="stylesheet" />
<link type="text/css" href="<?= base_url('resources/css/font-awesome.min.css')?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('resources/js/FormProcessing.js')?>"></script>
<script type="text/javascript" src="<?= base_url('resources/js/jquery-1.8.0.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('resources/js/jquery.smartTab.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
      // Smart Tab
      $('#tabs').smartTab({autoProgress: false,stopOnFocus:true,transitionEffect:'vSlide'});
  });
</script>
<!-- END EBSCO LOCAL BOX JS ETC -->


<style type="text/css">
<!--
.style1 {font-family: "Courier New", Courier, monospace}
.style6 {font-size: 9px}
.style14 {
  font-size: 16px;
  font-weight: bold;
  font-family: Arial, Helvetica, sans-serif;
  color: #434343;
}
.style18 {font-size: 14px}
.style20 {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  font-weight: bold;
}
.style21 {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}
.style23 {color: #434343}
-->
</style>
</head>

<body>
<style type="text/css">
* { margin:0;
    padding:0;
}
html { background:#E5E5E5; }
body {
    
    width:1240px;
    margin:2px auto;
  background:#FAFAFA;
</style>

<div style="text-align: center"><IMG width="1242" height=170 align="middle" src="<?= base_url('resources/img/headertest5.gif')?>" ></div>
  <a id="ddmenuLink" href="<?=site_url('library/menusource')?>">Menu</a>  


<!-- CENTRAL CONTENT -->
<div>
            <font size="2" color="#000000" face="arial">
</font>


<div class="WordSection1">
<br>
<?php if(isset($lac_archive_ranges)){ ?>
  <h2 align="center" class="rteindent3"><strong><u>Library Advisory Committee<br>Archive</u></strong></h2>
<?php } else if(isset($range)){ ?>
  <h2 align="center" class="rteindent3"><strong><u>Library Advisory Committee Archive<br><?=$range?></u></strong></h2>
<?php } else { ?>
  <h2 align="center" class="rteindent3"><strong><u>Library Advisory Committee</u></strong></h2>
<?php } ?>

<p align="center" class="MsoNormal"><b style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;line-height:115%;font-family:&quot;Arial Black&quot;,&quot;sans-serif&quot;">
  <o:p></o:p>
</span></b></p>
</div>

<div align="center">
  <table width="880" border="0" align="center" cellpadding="5" cellspacing="0">
    <tbody>
    <?php
      if(isset($lac_archive_ranges)){
        foreach($lac_archive_ranges as $range){
          ?>
          <tr style="float:left;padding:10px 0px 10px 0;;"></tr>
          <tr bgcolor="#CCFFCC">
              <td colspan="3" valign="top" bgcolor="#CCFFCC">
                <span class="style2" style="font-size: 1em; line-height: 1.5;"><strong><em>
                  <a href="<?=site_url('library/lac/archive/'.$range['lac_archive_period'])?>"><?=$range['lac_archive_period']?></a>                    
                </em> </strong></span>
              </td>
          </tr>
          <?php
        }
      } else{
          // var_dump($staff['2']);
          foreach($lac_data as $lac_group_name => $lacs){
            ?>
            <tr style="float:left;padding:10px 0px 10px 0;;"></tr>
            <tr bgcolor="#CCFFCC">
                <td colspan="3" valign="top" bgcolor="#CCFFCC"><span class="style2" style="font-size: 1em; line-height: 1.5;"><strong><em><?=$lac_group_name?></em> </strong></span></td>
              </tr>
            <?php
            foreach ($lacs as $lac) {
              if(empty($staff['staff_image'])) $staff['staff_image'] = 'unknownUser.png';
              ?>
              <tr bgcolor="#EBFCEB">
                <td height="33" width="236" valign="top" bgcolor="#EBFCEB"><strong><a href="<?=$lac['lac_url']?>" target="_blank" style="color:#000000"><?=$lac['lac_name']?></a></strong></td>
                <td width="352" valign="top"><span class="rteindent3 rtejustify"><?=$lac['lac_department']?></span></td>
                
              </tr>
              <?php
            }
          }
        }
?>
<tr style="float:left;margin-top:10px;"></tr>
</tbody>
</table>
            <hr>
</div>
<!-- END CENTRAL CONTENT -->
  

<!-- <marquee scrollamount="5" onMouseOver="stop();"  onmouseout="start();"> 
<p align="center"><strong><font size=3 color=#9a1c1f face="arial"><a href="http://intranet.iitg.ernet.in/lib/acc_guide.pdf">SYSTEMATIC DOWNLOADING OF E-RESOURCES IS STRICTLY PROHIBITED</a></font></strong></p> 
</marquee> -->

</div>    



<marquee><p align="center"><font size=3 color=red face="arial"></font></p></marquee>


<center><TABLE cellSpacing=0 cellPadding=0 width=1240 height=6 bgColor=#9a1c1f border=0>
<TBODY><tr><td width="" align=center>

<p align="center"><b>
<a href="http://202.141.80.14/" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">| &nbsp; IITG Intranet &nbsp; |</a> 
<a href="https://webmail.iitg.ernet.in/src/login.php" target="_blank" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">&nbsp;Webmail &nbsp; |</a> 
<a href="http://intranet.iitg.ernet.in/news/" target="_blank" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">&nbsp;IITG Newsgroup &nbsp; |</a> 
<a href="http://intranet.iitg.ernet.in/nb/admin/Holiday2016.pdf" target="_blank" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">&nbsp;Holiday 2016 &nbsp; |</a> 
<a HREF="http://local.iitg.ernet.in/phones/" target="_blank" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">&nbsp;Telephone Directory &nbsp; |<a> 
<a href="http://intranet.iitg.ernet.in/noticeboard/" target="_blank" style="text-decoration:none"><font size=2 color=#F4F2EA face="arial">&nbsp;Notice Board &nbsp; |</a> 
<a href="http://www.iitg.ernet.in/aa/campusmap/" target="_blank" style="text-decoration: none"><font size=2 color=#F4F2EA face="arial">&nbsp;Campus Map &nbsp; |</a>
</b></font></p></td></tr></TBODY></TABLE></center>
<br>


<p align="right"><font size=2 color=#707070 face="arial">&copy; Lakshminath Bezbaroa Central Library, Indian Institute of Technology Guwahati </font></p>
<p align="right"><font size=2 color=#707070 face="arial">Site last updated on 7th November 2016 </font></p>
<br />
</body>
</html>
