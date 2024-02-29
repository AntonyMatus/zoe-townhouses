<?php
if( ! empty( $_POST['email'] && ! empty( $_POST['name'] && ! empty( $_POST['phone'])) ) ) {

	
	$host = $_SERVER['HTTP_HOST'];
	
	// Enable / Disable SMTP
	$enable_smtp = 'no'; // yes OR no

	// Email Receiver Address
	$receiver_email = 'tony_rebo@hotmail.com';
	

	// Email Receiver Name for SMTP Email
	$receiver_name 	= 'Zoe Townhouses';

	// Email Subject
	$subject = 'Nuevo Lead desde mi página web';

	// Google reCaptcha V3 Key
	$grecaptchav3_secret_key = '6LeQyoMpAAAAAGjs2zAvye64Y8aMKqAAx_YTMjgG';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$property_type = $_POST['property_type'];
		
	
	if( ! empty( $grecaptchav3_secret_key ) && ! empty( $_POST['g-recaptcha-response'] ) ) {

		$token = $_POST['g-recaptcha-response'];

		// call curl to POST request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( 'secret' => $grecaptchav3_secret_key, 'response' => $token ) ) );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$arrResponse = json_decode($response, true);

		// verify the response
		if( isset( $_POST['action'] ) && ! ( isset( $arrResponse['success'] ) && $arrResponse['success'] == '1' && $arrResponse['action'] == $_POST['action'] && $arrResponse['score'] >= 0.5 ) ) {

			echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
			die;

		} else if( ! isset( $_POST['action'] ) && ! ( isset( $arrResponse['success'] ) && $arrResponse['success'] == '1' ) ) {

			echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
			die;
		}
	}

	$message = '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
	<!--[if gte mso 9]>
	<xml>
	  <o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
	  </o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="x-apple-disable-message-reformatting">
	  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
	  <title></title>
	  
		<style type="text/css">
		  @media only screen and (min-width: 520px) {
	  .u-row {
		width: 500px !important;
	  }
	  .u-row .u-col {
		vertical-align: top;
	  }

	  .u-row .u-col-100 {
		width: 500px !important;
	  }

	}

	@media (max-width: 520px) {
	  .u-row-container {
		max-width: 100% !important;
		padding-left: 0px !important;
		padding-right: 0px !important;
	  }
	  .u-row .u-col {
		min-width: 320px !important;
		max-width: 100% !important;
		display: block !important;
	  }
	  .u-row {
		width: 100% !important;
	  }
	  .u-col {
		width: 100% !important;
	  }
	  .u-col > div {
		margin: 0 auto;
	  }
	}
	body {
	  margin: 0;
	  padding: 0;
	}

	table,
	tr,
	td {
	  vertical-align: top;
	  border-collapse: collapse;
	}

	p {
	  margin: 0;
	}

	.ie-container table,
	.mso-container table {
	  table-layout: fixed;
	}

	* {
	  line-height: inherit;
	}

	a[x-apple-data-detectors="true"] {
	  color: inherit !important;
	  text-decoration: none !important;
	}

	table, td { color: #000000; } #u_body a { color: #0000ee; text-decoration: underline; } @media (max-width: 480px) { #u_content_image_1 .v-src-width { width: auto !important; } #u_content_image_1 .v-src-max-width { max-width: 25% !important; } }
		</style>
	  
	  

	</head>

	<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #e7e7e7;color: #000000">
	  <!--[if IE]><div class="ie-container"><![endif]-->
	  <!--[if mso]><div class="mso-container"><![endif]-->
	  <table id="u_body" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #e7e7e7;width:100%" cellpadding="0" cellspacing="0">
	  <tbody>
	  <tr style="vertical-align: top">
		<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
		<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #e7e7e7;"><![endif]-->
		
	  
	  
	<div class="u-row-container" style="padding: 20px 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 20px 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #ffffff;width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #ffffff;height: 100%;width: 100% !important;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->
	  
	<table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<td style="padding-right: 0px;padding-left: 0px;" align="center">
		  
		  <img align="center" border="0" src="https://' . $host . '/assets/images/logos/zoe-logo.svg" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 29%;max-width: 139.2px;" width="139.2" class="v-src-width v-src-max-width"/>
		  
		</td>
	  </tr>
	</table>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


	  
	  
	<div class="u-row-container" style="padding: 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #1D4E46;width: 500px;padding: 20px 0px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #1D4E46;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 20px 0px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
	  
	<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	  <h1 style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-size: 22px; font-weight: 400;"><strong>Lead interesado en el complejo </strong><br><strong>Zoe Townhouses</strong></h1>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


	  
	  
	<div class="u-row-container" style="padding: 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #1D4E46;width: 500px;padding: 20px 30px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #1D4E46;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 20px 30px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
	  
	<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	  <div style="font-size: 14px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word;">
		<p style="line-height: 140%;">Nuevo lead desde mi página web, a continuación los datos</p>
	<p style="line-height: 140%;">de contacto: </p>
	<p style="line-height: 140%;">&nbsp;</p>
	<p style="line-height: 140%;"><strong>Nombre: </strong>' . $name . '<br><strong>Email: </strong>' . $email . '<br><strong>Teléfono de contacto: </strong> ' . $phone . '<br><strong>Tipo de propiedad de interés: </strong>'. $property_type .'</p>
	<p style="line-height: 140%;">&nbsp;</p>
	  </div>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


	  
	  
	<div class="u-row-container" style="padding: 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #1D4E46;width: 500px;padding: 0px 30px 50px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #1D4E46;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px 30px 50px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
	  
	<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<td style="padding-right: 0px;padding-left: 0px;" align="center">
		  
		  <img align="center" border="0" src="https://' . $host . '/assets/images/logos/zoe-logo.svg" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 480px;" width="480" class="v-src-width v-src-max-width"/>
		  
		</td>
	  </tr>
	</table>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


	  
	  
	<div class="u-row-container" style="padding: 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #f8f8f8;width: 500px;padding: 30px 30px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #f8f8f8;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 30px 30px 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
	  
	<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	  <div style="font-size: 14px; color: #000000; line-height: 140%; text-align: left; word-wrap: break-word;">
		<p style="line-height: 140%;">Este correo tiene el propósito de informar al administrador de ZOE TOWNHOUSES acerca de nuevos leads provenientes de su página web.</p>
	  </div>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


	  
	  
	<div class="u-row-container" style="padding: 0px;background-color: #ffffff">
	  <div class="u-row" style="margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
		<div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
		  <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
		  
	<!--[if (mso)|(IE)]><td align="center" width="500" style="background-color: #f8f8f8;width: 500px;padding: 0px 0px 50px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
	<div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
	  <div style="background-color: #f8f8f8;height: 100%;width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
	  <!--[if (!mso)&(!IE)]><!--><div style="box-sizing: border-box; height: 100%; padding: 0px 0px 50px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"><!--<![endif]-->
	  
	<table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
	  <tbody>
		<tr>
		  <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;" align="left">
			
	  <!--[if mso]><style>.v-button {background: transparent !important;}</style><![endif]-->
	<div align="center">
	  <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:37px; v-text-anchor:middle; width:154px;" arcsize="54%"  stroke="f" fillcolor="#1D4E46"><w:anchorlock/><center style="color:#FFFFFF;"><![endif]-->
		<a href="https://azana-apartments.com" target="_blank" class="v-button" style="box-sizing: border-box;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #1D4E46; border-radius: 20px;-webkit-border-radius: 20px; -moz-border-radius: 20px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;font-size: 14px;">
		  <span style="display:block;padding:10px 20px;line-height:120%;">Visitar página web</span>
		</a>
		<!--[if mso]></center></v:roundrect><![endif]-->
	</div>

		  </td>
		</tr>
	  </tbody>
	</table>

	  <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
	  </div>
	</div>
	<!--[if (mso)|(IE)]></td><![endif]-->
		  <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
		</div>
	  </div>
	  </div>
	  


		<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
	  </tr>
	  </tbody>
	  </table>
	  <!--[if mso]></div><![endif]-->
	  <!--[if IE]></div><![endif]-->
	</body>

	</html>
	';

	if( $enable_smtp == 'no' ) { // Simple Email

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
		if( mail( $receiver_email, $subject, $message, $headers ) ) {

			header('Content-Type: application/json');
			echo json_encode('exito');
			
		} else {
			//Fail Message
			header('Content-Type: application/json');
			echo json_encode('error');
		}
		
	} else { // SMTP

		// Email Receiver Addresses
		$toemailaddresses = array();
		$toemailaddresses[] = array(
			'email' => $receiver_email, // Your Email Address
			'name' 	=> $receiver_name // Your Name
		);

		require 'phpmailer/Exception.php';
		require 'phpmailer/PHPMailer.php';
		require 'phpmailer/SMTP.php';

		$mail = new PHPMailer\PHPMailer\PHPMailer();

		$mail->isSMTP();
		$mail->Host     = 'YOUR_SMTP_HOST'; // Your SMTP Host
		$mail->SMTPAuth = true;
		$mail->Username = 'YOUR_SMTP_USERNAME'; // Your Username
		$mail->Password = 'YOUR_SMTP_PASSWORD'; // Your Password
		$mail->SMTPSecure = 'ssl'; // Your Secure Connection
		$mail->Port     = 465; // Your Port
		$mail->setFrom( $email, $name );
		
		foreach( $toemailaddresses as $toemailaddress ) {
			$mail->AddAddress( $toemailaddress['email'], $toemailaddress['name'] );
		}

		$mail->Subject = $subject;
		$mail->isHTML( true );

		$mail->Body = $message;

		if( $mail->send() ) {
			
			// Redirect to success page
			$redirect_page_url = ! empty( $_POST['redirect'] ) ? $_POST['redirect'] : '';
			if( ! empty( $redirect_page_url ) ) {
				header( "Location: " . $redirect_page_url );
				exit();
			}

		   	//Success Message
		  	echo '{ "alert": "alert-success", "message": "Your message has been sent successfully!" }';
		} else {
			//Fail Message
		  	echo '{ "alert": "alert-danger", "message": "Your message could not been sent!" }';
		}
	}
} else {
	//Empty Email Message
	echo '{ "alert": "alert-danger", "message": "Please add an email address!" }';
}
