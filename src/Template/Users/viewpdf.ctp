<?php

require_once('/var/www/easifyy.com/html/easifyy/vendor/tcpdf/examples/tcpdf_include.php');


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	// $pdf->SetAuthor('Nicola Asuni');
	// $pdf->SetTitle('TCPDF Example 001');
	// $pdf->SetSubject('TCPDF Tutorial');
	// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// remove default header/footer
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	// set default header data
	$pdf->SetHeaderData('https://easifyy.com/img/logo.png', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	$pdf->setFooterData(array(0,64,0), array(0,64,128));

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	    require_once(dirname(__FILE__).'/lang/eng.php');
	    $pdf->setLanguageArray($l);
	}

	// ---------------------------------------------------------

	// set default font subsetting mode
	$pdf->setFontSubsetting(true);

	// Set font
	// dejavusans is a UTF-8 Unicode font, if you only need to
	// print standard ASCII chars, you can use core fonts like
	// helvetica or times to reduce file size.
	$pdf->SetFont('helvetica', '', 11, '', true);

	// Add a page
	// This method has several options, check the source code documentation for more information.
	$pdf->AddPage();

	// set text shadow effect
	$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

	// Set some content to print
	$date= date_format($order->created, "d/m/Y");
	$pendingAmt=$order->gross_total-$order->total;
	$session= date("Y",strtotime("-1 year"))."-".$curYear = date("y");
	$invoiceId=$order->id."/".$session."/EASIFYY";
	$html = <<<EOD
	<table width="100%"><tbody><tr><th></th><th></th><th></th><th></th><th></th><th></th></tr><tr><td></td><td colspan="4" style="text-align: center;"> <img style="text-align:center;" src="https://easifyy.com/img/logo.png" width="200"></td><td></td></tr></tbody></table><table width="100%"><tbody><tr><th></th><th></th><th></th><th></th><th></th><th></th></tr><tr><td colspan="3"><table width="100%"> <br><tbody><tr><th></th><th></th><th></th><th></th><th></th><th></th></tr><tr><td colspan="3" style="padding-bottom: 22px; font-weight: bold;">Powered By:</td><td colspan="3">Easifyy.com</td></tr> <br><tr><td colspan="3"> <b>Bill to:</b></td><td colspan="3">{$order->user->first_name} {$order->user->last_name} <br>{$order->user->addresses[0]->address_line_1} , {$userCity}, {$userState} <br>{$order->user->username} <br>{$order->user->phone}  <br></td></tr></tbody></table></td><td colspan="3"><h5 style="background-color: #ccc;padding: 10px;text-align: center; border-radius: 6px; font-size: 18px;"> INFORMATION</h5><table width="100%"><tr><td>Order No.</td><td align="right">#{$order->id}</td></tr><tr><td>DATE</td><td align="right">{$date}</td></tr><tr><td>TOTAL AMOUNT</td><td align="right">Rs. {$order->total}</td></tr><tr><td style="font-weight: bold;">TOTAL DUE</td><td align="right" style="font-weight: bold;">Rs. {$pendingAmt}</td></tr></table></td></tr></tbody></table><table style="width: 100%"><tbody><tr><th></th><th></th><th></th><th></th><th></th><th></th></tr><tr><td colspan="6"><table width="100%" border="1" style="text-align: center;"><tbody><tr style="background-color: #ccc;" height="36"><td>DESCRIPTION / MEMO</td><td>AMOUNT</td></tr><tr height="36"><td>{$order->product->title}</td><td>Rs. {$order->gross_total}</td></tr><tr height="36"><td>TOTAL AMOUNT:</td><td>Rs. {$order->gross_total}</td></tr><tr height="36"><td>PAID AMOUNT:</td><td>Rs. {$order->booking_amount}</td></tr><tr height="36"><td>PENDING AMOUNT:</td><td>Rs. {$pendingAmt}</td></tr></tbody></table></td></tr></tbody></table>
	EOD;

	// Print text using writeHTMLCell()
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	// ---------------------------------------------------------

	// Close and output PDF document
	// This method has several options, check the source code documentation for more information.
	//ob_end_clean();
	//$pdf->Output('example_001.pdf', 'D');
	//$pdf->Output(__DIR__.'/example_001.pdf', 'F');
	//EXIT();
	$time=time();
	$pdf_string=$pdf->Output($time.'.pdf', 'S');
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'pdf/'.$time.'.pdf', $pdf_string);
	$output =$_SERVER['DOCUMENT_ROOT'].'pdf/'.$time.'.pdf';
//exit();

?>