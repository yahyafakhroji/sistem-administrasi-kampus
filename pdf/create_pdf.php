<?php 
	echo set_include_path(get_include_path() . PATH_SEPARATOR . "/pdf");
	require_once '../conn.php';
	error_reporting(E_ALL & ~E_NOTICE);

	$name = "";

	ob_start();
	include_once("template.php");

	require_once "dompdf_config.inc.php";

	$dompdf = new DOMPDF();
	if($action == 'singlePdf')
	{
		$dompdf->set_paper("A4","potrait");		
	}
	else
	{
		$dompdf->set_paper("A4","landscape");		
	}

	//$html = file_get_contents("template.php");
	$dompdf->load_html(ob_get_clean());
	$dompdf->render();
	$canvas = $dompdf->get_canvas();
	$canvas->page_text(16, 800, "Page: {PAGE_NUM} of {PAGE_COUNT} | Date: ".date('d-M-Y',strtotime(now)), $font, 8, array(0,0,0));

	$dompdf->stream($name.".pdf",array("Attachment"=>1));
?>