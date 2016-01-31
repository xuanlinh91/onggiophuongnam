<?php
    //1. Nhung tap tin fckeditor vao file chay
    include("fckeditor/fckeditor_php5.php") ;
   
    //2. Khai bao duong dan URL den thu muc fckeditor
    $sBasePath = 'fckeditor/';
   
    //3. Khoi tao doi tuong FCKeditor
    $oFCKeditor = new FCKeditor('message') ;
   
    //4. Thiet lap duong den cho thuong BasePath
    $oFCKeditor->BasePath = $sBasePath;
   
    //Dua gia tri vao Editor
    $oFCKeditor->Value = 'Viết nội dung email vao đây';
   
    //Thay doi kich thuoc cua Editor
    $oFCKeditor->Width = '100%';
    $oFCKeditor->Height = 300;
    $oFCKeditor->ToolbarSet = 'Basic';
    $oFCKeditor->Config['AutoDetectLanguage'] = false;
    $oFCKeditor->Config['DefaultLanguage'] = 'en';
?>