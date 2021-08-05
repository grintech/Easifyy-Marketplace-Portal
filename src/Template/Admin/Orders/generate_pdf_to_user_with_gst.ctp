<?php

require_once('/var/www/easifyy.com/html/easifyy/vendor/tcpdf/examples/tcpdf_include.php');


// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$custom_layout=array();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);



// set document information
$pdf->SetCreator(PDF_CREATOR);


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$totalPayWithTcs=$totalPay+$tcs;
$date= date("d/m/Y");//date_format($order->created, "d/m/Y h:i:A");
$cGstPercntage=$sGstPercntage="9";
$iGstPercntage="18";
if($sGst==0){
    $cGstPercntage=$sGstPercntage="0";
}
if($iGst==0){
    $iGstPercntage="0";
}
// Set some content to print
$html = <<<EOD
<table cellpadding="2" border="1" width="100%"><tr align="center"><th colspan="18"><img src="https://easifyy.com/img/logo.png" alt="" width="100"></th></tr><tr align="center"><th colspan="18"><b>POWERED BY EASIFYY.COM</b></th></tr><tr align="center"><th colspan="18"><b> KISTEN EDUCATION PVT. LTD.</b></th></tr><tr align="center"><th colspan="18"><b>Address:</b> H-16/A/947, SANGAM VIHAR, NEW DELHI 110062</th></tr><tr><td colspan="6"><b>Phone No.:</b></td><td colspan="6"><b>Email:</b> welcome@easifyy.com</td><td colspan="6"><b>PAN:</b> AAECK0248H</td></tr><tr><td colspan="7"><b>GSTIN: </b> </td><td colspan="7"><b>State: </b> DELHI</td><td colspan="4"><b>Code:</b> 07</td></tr><tr><td colspan="12"><b>ORDER No.:</b>{$order->invoice_id}</td><td colspan="6"><b>ORDER DATE:</b>{$orderPlacedDate}</td></tr><tr align="center"><th colspan="18"><b>TAX INVOICE (Original for Receipient)</b></th></tr><tr><td colspan="12"><b>Invoice No.:</b>{$invoiceNo}</td><td colspan="6"><b>Invoice Date:</b>{$date}</td></tr><tr><td align="center" colspan="18"><b>CUSTOMER DETAILS</b></td></tr><tr><td colspan="12"><b>Name: </b>{$order->user->first_name}&nbsp;{$order->user->last_name}</td><td colspan="6"><b>PAN: </b> AYG004179</td></tr><tr><td colspan="18"><b>Address: </b>{$order->user->addresses[0]['address_line_1']}&nbsp;{$order->user->addresses[0]['address_line_2']}&nbsp;{$userCity}&nbsp;{$userState}&nbsp;{$order->user->addresses[0]['zip_code']}</td></tr><tr><td colspan="7"><b>GSTIN: </b>{$order->merchant->gst_number}</td><td colspan="7"><b>State: </b>{$userGstState}</td><td colspan="4"><b>Code:</b>{$userGstStatecode}</td></tr><tr><td colspan="7"><b>Phone No.:</b>{$order->user->phone}</td><td colspan="7"><b>Email</b> :{$order->user->username}</td><td colspan="4">Referral code</td></tr><tr><td colspan="2"><b>S.No.</b></td><td colspan="5"><b>Description</b></td><td colspan="2"><b>SAC Code</b></td><td colspan="3"><b>Non Taxable Amount (Rs.)</b></td><td colspan="3"><b>Taxable Amount (Rs.)</b></td><td colspan="3"><b>Total Amount (Rs.)</b></td></tr><tr><td colspan="2" align="center">1</td><td colspan="5">Consultancy & Service Fee -{$serviceName}</td><td colspan="2" align="center">{$sac_code}</td><td colspan="3"></td><td colspan="3" align="center">{$professionalFee}</td><td colspan="3" align="center">{$professionalFee}</td></tr><tr><td colspan="2" align="center">2</td><td colspan="5">{$gvtHeading1}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice1}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice1}</td></tr><tr><td colspan="2" align="center">3</td><td colspan="5">{$gvtHeading2}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice2}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice2}</td></tr><tr><td colspan="2" align="center">4</td><td colspan="5">{$gvtHeading3}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice3}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice3}</td></tr><tr><td colspan="2" align="center">5</td><td colspan="5">{$gvtHeading4}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice4}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice4}</td></tr><tr><td colspan="2" align="center">6</td><td colspan="5">{$gvtHeading5}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice5}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice5}</td></tr><tr><td rowspan="4" colspan="9"><p style="text-align:center;"><br><br><b>Total Invoice amount in words :</b>{$totalAmountInwords}</p></td><td colspan="6"><b>Total Amount</b></td><td colspan="3" align="center">{$totalAmount}</td></tr><tr><td colspan="4">Referral Discount</td><td align="center">{$couponCode}</td><td>%</td><td colspan="3" align="center">{$couponDiscount}</td></tr><tr><td colspan="6"><b>Total Amount before Tax</b></td><td colspan="3" align="center">{$totalAmount}</td></tr><tr><td colspan="4">Add: CGST @</td><td align="center">{$cGstPercntage}</td><td>%</td><td colspan="3" align="center">{$cGst}</td></tr><tr><td rowspan="4" colspan="9"> <br><br><br><br><p style="text-align:center;"><b>For Kisten Education Pvt. Ltd.</b></p></td><td colspan="4">Add: SGST @</td><td align="center">{$sGstPercntage}</td><td>%</td><td colspan="3" align="center">{$sGst}</td></tr><tr><td colspan="4">Add: IGST @</td><td align="center">{$iGstPercntage}</td><td>%</td><td colspan="3" align="center">{$iGst}</td></tr><tr><td colspan="6">Total Tax Amount</td><td colspan="3" align="center">{$totalTax}</td></tr><tr><td colspan="6"><b>Total Amount after Tax</b></td><td colspan="3" align="center">{$totalAmountwithDiscount}</td></tr><tr><td colspan="18" style="text-align:center;">This is a computer Generated Invoice therefore signature is not required</td></tr></table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
// ob_end_clean();
// $pdf->Output('example_001.pdf', 'I');

$time=time();
$pdf_string=$pdf->Output($time.'.pdf', 'S');
file_put_contents($_SERVER['DOCUMENT_ROOT'].'pdf/'.$time.'.pdf', $pdf_string);
$output =$_SERVER['DOCUMENT_ROOT'].'pdf/'.$time.'.pdf';
//============================================================+
// END OF FILE
//============================================================+
?>