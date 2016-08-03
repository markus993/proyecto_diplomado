<?php

	if (isset($_GET["var"])) {
		$var = $_GET["var"];
		require_once './mpdf/mpdf.php';
		ob_start();
		include_once './plantilla.php';
		$contenido = ob_get_contents();
		ob_end_clean();
		$mpdf = new mPDF('landscape', 'LETTER-L');
		$mpdf->WriteHTML($contenido);
		$mpdf->Output('informe.pdf', 'I');
	}else
		echo 'falta variable de entrada';
?>
