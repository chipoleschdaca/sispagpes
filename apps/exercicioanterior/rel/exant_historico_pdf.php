<?php
// Require composer autoload
  include('../../../plugins/mpdf-6.1.3/mpdf.php');
// Create an instance of the class:
  $mpdf = new mPDF();

// Write some HTML code:
  $mpdf->WriteHTML('Hello World');

// Output a PDF file directly to the browser
  $mpdf->Output();
  
  
