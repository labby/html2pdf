### lib_html2pdf
============

Html2Pdf (as a library for Content Management Systems [LEPTON CMS][1])is a HTML to PDF converter written in PHP, and compatible with PHP 5.4 to 7.2.<br />
It allows the conversion of valid HTML in PDF format, to generate documents like invoices, documentation

#### Requirements

* [LEPTON CMS][1]

#### Installation

* download latest [addon.zip][2] installation archive
* in CMS backend select the file from "Add-ons" -> "Modules" -> "Install module"

#### First Steps

Go to https://html2pdf.fr/en/download and see what to do

#### LEPTON_CMS quick test example given
See [Html2Pdf at GitHub][4] for details!  

Open a new (blank) Code2 section and paste:  
```code
$oPDF = lib_html2pdf::getInstance();

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld LEPTON_CMS</h1>This is my first test');

// See details for the parameters at:
// https://github.com/spipu/html2pdf/blob/master/doc/output.md
$html2pdf->output( LEPTON_PATH.MEDIA_DIRECTORY'/pdf_file_xxxx.pdf', 'F');

echo "file written!";

````

[1]: http://lepton-cms.org "LEPTON CMS"
[2]: http://www.lepton-cms.com/lepador/libraries/lib_html2pdf.php
[3]: https://html2pdf.fr/en/download "html2pdf"
[4]: https://github.com/spipu/html2pdf/ "Html2Pdf at GitHub"

