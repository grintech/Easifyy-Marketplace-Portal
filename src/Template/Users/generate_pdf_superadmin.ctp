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
$date= date("d/m/Y");// date_format($order->created, "d/m/Y h:i:A");

$cGstPercntage=$sGstPercntage="9";
$iGstPercntage="18";
if($sGst==0){
    $cGstPercntage = $sGstPercntage="0";
}
if($iGst==0){
    $iGstPercntage="0";
}
// Set some content to print
$html = <<<EOD
<table cellpadding="2" border="1" width="100%"><tr><th align="center" colspan="18"><img src="https://easifyy.com/img/logo.png" alt="" width="100"></th></tr><tr><th colspan="18" align="center"><b>POWERED BY EASIFYY.COM</b></th></tr><tr><th colspan="18"><b>Name:</b>&nbsp;{$order->merchant->billing_name}&nbsp;</th></tr><tr><th colspan="18"><b>Address:</b>&nbsp;{$order->merchant->address_line_1}&nbsp;{$order->merchant->address_line_2}&nbsp;</th></tr><tr><td colspan="6"><b>Phone No.:</b>&nbsp;{$order->merchant->phone_1}&nbsp;</td><td colspan="6"><b>Email:</b>{$order->merchant->username}</td><td colspan="6"><b>PAN:</b>&nbsp;{$order->merchant->pan_number}&nbsp;</td></tr><tr><td colspan="7"><b>GSTIN: </b>&nbsp;{$order->merchant->gst_number}&nbsp;</td><td colspan="7"><b>State: </b>&nbsp;{$merchantState}&nbsp;</td><td colspan="4"><b>Code:</b>&nbsp;{$merchantStateGstCode}&nbsp;</td></tr><tr><td colspan="8"><b>ORDER No.:</b>&nbsp;{$order->invoice_id}&nbsp;</td><td colspan="5"><b>ORDER DATE:</b>{$orderPlacedDate}</td><td colspan="5"><b>Referral Code :</b></td></tr><tr align="center"><th colspan="18"><b>TAX INVOICE (Original for Receipient)</b></th></tr><tr><td colspan="12"><b>Invoice No.:</b>&nbsp;{$invoiceNo}&nbsp;</td><td colspan="6"><b>Invoice Date:</b>&nbsp;{$date}&nbsp;</td></tr><tr><td align="center" colspan="18"><b>CUSTOMER DETAILS</b></td></tr><tr><td colspan="12"><b>Name:</b> KISTEN EDUCATION PVT. LTD.</td><td colspan="6"><b>PAN:</b> AUXVPV4333E</td></tr><tr><td colspan="18"><b>Address:</b> H-16/A/947, SANGAM VIHAR NEW DELHI 110062</td></tr><tr><td colspan="7"><b>GSTIN: </b></td><td colspan="7"><b>State: </b> Delhi</td><td colspan="4"><b>Code:</b> 07</td></tr><tr><td colspan="6"><b>Phone</b></td><td colspan="12"><b>Email</b> welcome@easifyy.com</td></tr><tr><td colspan="2"><b>S.No.</b></td><td colspan="5"><b>Description</b></td><td colspan="2"><b>SAC Code</b></td><td colspan="3"><b>Non Taxable Amount (Rs.)</b></td><td colspan="3"><b>Taxable Amount (Rs.)</b></td><td colspan="3"><b>Total Amount (Rs.)</b></td></tr><tr><td colspan="2" align="center">1</td><td colspan="5">Professional Fee -{$serviceName}</td><td colspan="2">{$sac_code}</td><td colspan="3"></td><td colspan="3" align="center">{$commissionAmt}.00</td><td colspan="3" align="center">{$commissionAmt}.00</td></tr><tr><td colspan="2" align="center">2</td><td colspan="5">{$gvtHeading1}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice1}.00</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice1}.00</td></tr><tr><td colspan="2" align="center">3</td><td colspan="5">{$gvtHeading2}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice2}.00</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice2}.00</td></tr><tr><td colspan="2" align="center">4</td><td colspan="5">{$gvtHeading3}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice3}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice3}</td></tr><tr><td colspan="2" align="center">5</td><td colspan="5">{$gvtHeading4}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice4}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice4}</td></tr><tr><td colspan="2" align="center">6</td><td colspan="5">{$gvtHeading5}</td><td colspan="2"></td><td colspan="3" align="center">{$gvtPrice5}</td><td colspan="3"></td><td colspan="3" align="center">{$gvtPrice5}</td></tr><tr><td rowspan="7" colspan="9"><p style="text-align:center;"><b>Total Invoice amount in words :</b>{$totalPayinWords}</p></td><td colspan="6">Sub Total</td><td colspan="3" align="center">{$totalbill}</td></tr><tr><td colspan="6">Less: Transaction Fees</td><td colspan="3" align="center">{$transactionFee}</td></tr><tr><td colspan="6">Less: Other charges</td><td colspan="3" align="center">{$otherCharges}</td></tr><tr><td colspan="4">Add: Referrals</td><td align="center">{$couponDiscount}</td><td>%</td><td colspan="3" align="center">{$couponDiscount}</td></tr><tr><td colspan="6"><b>Total Amount before Tax</b></td><td colspan="3" align="center">{$totalbillaftertax}</td></tr><tr><td colspan="4">Add: CGST @</td><td align="center">{$cGstPercntage}</td><td>%</td><td colspan="3" align="center">{$cGst}</td></tr><tr><td colspan="4">Add: SGST @</td><td align="center">{$sGstPercntage}</td><td>%</td><td colspan="3" align="center">{$sGst}</td></tr><tr><td rowspan="5" colspan="9"> <br><br><br><br><p style="text-align:center;">For &nbsp;<b>{$order->merchant->billing_name}</b>&nbsp;PSP Firm</p></td><td colspan="4">Add: IGST @</td><td align="center">{$iGstPercntage}</td><td>%</td><td colspan="3" align="center">{$iGst}</td></tr><tr><td colspan="6">Total Tax Amount</td><td colspan="3" align="center">{$totalTax}</td></tr><tr><td colspan="6"><b>Total Amount after Tax</b></td><td colspan="3" align="center">{$totalaftertax}</td></tr><tr><td colspan="6">Amount Received</td><td colspan="3" align="center">{$totalPaidAmount}.00</td></tr><tr><td colspan="6"><b>Balance Amount</b></td><td colspan="3" align="center">{$totalPendingAmount}</td></tr><tr><td colspan="18" align="center">This is a Computer generated invoice, therefore , Signature is not required</td></tr></table>
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