<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Biolo Online</title>
  <style type="text/css">

  * {
    margin:0;
    padding:0;
    font-family: Helvetica, Arial, sans-serif;
  }

  img {
    max-width: 100%;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  .image-fix {
    display:block;
  }

  .collapse {
    margin:0;
    padding:0;
  }

  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%!important;
    height: 100%;
    text-align: center;
    color: #747474;
    background-color: #ffffff;
  }

  h1,h2,h3,h4,h5,h6 {
    font-family: Helvetica, Arial, sans-serif;
    line-height: 1.1;
  }

  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    line-height: 0;
    text-transform: none;
  }

  h1 {
    font-weight:200;
    font-size: 44px;
  }

  h2 {
    font-weight:200;
    font-size: 32px;
    margin-bottom: 14px;
  }

  h3 {
    font-weight:500;
    font-size: 27px;
  }

  h4 {
    font-weight:500;
    font-size: 23px;
  }

  h5 {
    font-weight:900;
    font-size: 17px;
  }

  h6 {
    font-weight:900;
    font-size: 14px;
    text-transform: uppercase;
  }

  .collapse {
    margin:0!important;
  }

  td, div {
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
  }

  p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size:14px;
    line-height:1.6;
  }

  p.lead {
    font-size:17px;
  }

  p.last {
    margin-bottom:0px;
  }

  ul li {
    margin-left:5px;
    list-style-position: inside;
  }

  a {
    color: #747474;
    text-decoration: none;
  }

  a img {
    border: none;
  }

  .head-wrap {
    width: 100%;
    margin: 0 auto;
    background-color: #f9f8f8;
    border-bottom: 1px solid #d8d8d8;
  }

  .head-wrap * {
    margin: 0;
    padding: 0;
  }

  .header-background {
    background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
  }

  .header {
    height: 42px;
  }

  .header .content {
    padding: 0;
  }

  .header .brand {
    font-size: 16px;
    line-height: 42px;
    font-weight: bold;
  }

  .header .brand a {
    color: #464646;
  }

  .body-wrap {
    width: 505px;
    margin: 0 auto;
    background-color: #ffffff;
  }

  .soapbox .soapbox-title {
    font-size: 21px;
    color: #eb1484;
    padding-top: 15px;
  }

  .content .status-container.single .status-padding {
    width: 80px;
  }

  .content .status {
    width: 90%;
  }

  .content .status-container.single .status {
    width: 300px;
  }

  .status {
    border-collapse: collapse;
    margin-left: 15px;
    color: #656565;
  }

  .status .status-cell {
    border: 1px solid #b3b3b3;
    height: 50px;
  }

  .status .status-cell.success,
  .status .status-cell.active {
    height: 65px;
  }

  .status .status-cell.success {
    background: #f2ffeb;
    color: #51da42;
  }

  .status .status-cell.success .status-title {
    font-size: 15px;
  }

  .status .status-cell.active {
    background: #fffde0;
    width: 135px;
  }

  .status .status-title {
    font-size: 16px;
    font-weight: bold;
    line-height: 23px;
  }

  .status .status-image {
    vertical-align: text-bottom;
  }

  .body .body-padded,
  .body .body-padding {
    padding-top: 34px;
  }

  .body .body-padding {
    width: 41px;
  }

  .body-padded,
  .body-title {
    text-align: left;
  }

  .body .body-title {
    font-weight: bold;
    font-size: 17px;
    color: #464646;
  }

  .body .body-text .body-text-cell {
    text-align: left;
    font-size: 14px;
    line-height: 1.6;
    padding: 9px 0 17px;
  }

  .body .body-text-cell a {
    color: #464646;
    text-decoration: underline;
  }

  .body .body-signature-block .body-signature-cell {
    padding: 25px 0 30px;
    text-align: left;
  }

  .body .body-signature {
    font-family: "Comic Sans MS", Textile, cursive;
    font-weight: bold;
  }

  .footer-wrap {
    width: 100%;
    margin: 0 auto;
    clear: both !important;
    background-color: #e5e5e5;
    border-top: 1px solid #b3b3b3;
    font-size: 12px;
    color: #656565;
    line-height: 30px;
  }

  .footer-wrap .container {
    padding: 14px 0;
  }

  .footer-wrap .container .content {
    padding: 0;
  }

  .footer-wrap .container .footer-lead {
    font-size: 14px;
  }

  .footer-wrap .container .footer-lead a {
    font-size: 14px;
    font-weight: bold;
    color: #535353;
  }

  .footer-wrap .container a {
    font-size: 12px;
    color: #656565;
  }

  .footer-wrap .container a.last {
    margin-right: 0;
  }

  .footer-wrap .footer-group {
    display: inline-block;
  }

  .container {
    display: block !important;
    max-width: 505px !important;
    clear: both !important;
  }

  .content {
    padding: 0;
    max-width: 505px;
    margin: 0 auto;
    display: block;
  }

  .content table {
    width: 100%;
  }


  .clear {
    display: block;
    clear: both;
  }

  .body .content-message {
    display: flex;
    gap: 10px;

    
    margin-bottom: 2px;
  }

  .body .content-message img {
    width: 100px;
    height: 100px;
    border-radius: 4px;    
  }

  .body .content-message .content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-left: 0;
  }

  .body .content-message .content h3 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 2px;
  }

  .body .content-message .content .desc-inline {
    display: flex;    
    justify-content: space-between;
    margin-bottom: 2px;
  }

  .body .content-message .content .desc-inline span {
    font-size: 13px;
    margin-right: 8px;
  }

  .body .content-message .content span {
    font-size: 13px;
    margin-right: 8px;

    margin-bottom: 4px;
  }

  table.full-width-gmail-android {
    width: 100% !important;
  }

  </style>

  <style type="text/css" media="only screen">

  @media only screen {

    table[class*="head-wrap"],
    table[class*="body-wrap"],
    table[class*="footer-wrap"] {
      width: 100% !important;
    }

    td[class*="container"] {
      margin: 0 auto !important;
    }

  }

  @media only screen and (max-width: 505px) {

    *[class*="w320"] {
      width: 320px !important;
    }

    table[class="soapbox"] td[class*="soapbox-title"],
    table[class="body"] td[class*="body-padded"] {
      padding-top: 24px;
    }
  }
  </style>
</head>

<body bgcolor="#ffffff">

  <div align="center">
    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
          <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
          <div height="8">
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr class="header-background">
        <td class="header container" align="center">
          <div class="content">
            <span class="brand">
              <a href="#">
                Biolo Online Store
              </a>
            </span>
          </div>
        </td>
      </tr>
    </table>

    <table class="body-wrap w320">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <table cellspacing="0">
              <tr>
                <td>
                  <table class="soapbox">
                    <tr style="display: flex; flex-direction: column">
                      <img src="/bioloOnline/src/assets/images/logo-44x44.png" alt="bioloOnline logo" style="margin-top: 1rem">
                      <td class="soapbox-title">Lista dos produtos solicitados</td>
                    </tr>
                  </table>
                  <table class="body">
                    <tr>
                      <td class="body-padding"></td>
                      <td class="body-padded">
                        <div class="body-title">Olá António Gabriel, 9898787776</div>
                        <table class="body-text">                            
                          <tr>                            
                            <td class="body-text-cell">
                              Estes são os produtos reservados para compra.
                            </td>
                          </tr>
                        </table>

                        <table class="product-table">
                            <tr>
                                <td class="content-message">
                                    <img src="/bioloOnline/src/resources/IMG_16415221476149107.jpg" alt="">
                                    <div class="content">
                                        <h3>Camisa Polo</h3>
                                        <div class="desc-inline">
                                            <span>Preço: <strong>123344</strong>kz</span>
                                            <span>Quantidade: 1</span>
                                        </div>
                                        <span>total: <strong>12300</strong>kz</span>
                                        <span>Fornecedor: aaa</span>
                                        <span>Fornecedor Contacto: aaa</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-message">
                                    <img src="/bioloOnline/src/resources/IMG_16415221476149107.jpg" alt="">
                                    <div class="content">
                                        <h3>Camisa Polo</h3>
                                        <div class="desc-inline">
                                            <span>Preço: <strong>123344</strong>kz</span>
                                            <span>Quantidade: 1</span>
                                        </div>
                                        <span>total: <strong>12300</strong>kz</span>
                                        <span>Fornecedor: aaa</span>
                                        <span>Fornecedor Contacto: aaa</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div><!--[if mso]>
                          <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:230px;" arcsize="11%" strokecolor="#407429" fill="t">
                            <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                            <w:anchorlock/>
                            <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Review Account Settings</center>
                          </v:roundrect>
                        <![endif]-->
                        <table class="body-signature-block">
                          <tr>
                            <td class="body-signature-cell">
                              <p>Obrigado!</p>
                              <p class="body-signature"><img src="https://www.filepicker.io/api/file/2R9HpqboTPaB4NyF35xt" alt="Company Name"></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="body-padding"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td></td>
      </tr>
    </table>

    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td></td>
        <td class="container">
          <div class="content footer-lead">
            <a href="http://localhost/bioloOnline/"><b>Ir para os site</b></a> Verificar mais produtos
          </div>
        </td>
        <td></td>
      </tr>
    </table>
    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <a href="#">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <span class="footer-group">
              <a href="#">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              <a href="#">Support</a>
            </span>
          </div>
        </td>
        <td></td>
      </tr>
    </table>
  </div>

</body>
</html>
