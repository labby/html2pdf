<?php

/**
 *  @module      	Library html2pdf
 *  @version        see info.php of this module
 *  @author         cms-lab
 *  @copyright      2017-2018 CMS-LAB
 *  @license        Open Software License v. 3.0 (OSL-3.0)
 *  @license terms  see info.php of this addon
 *  @platform       see info.php of this addon
 */

class lib_html2pdf extends LEPTON_abstract
{
    public static $instance;
    
    public function initialize()
    {
        define("K_TCPDF_EXTERNAL_CONFIG", false); 
        spl_autoload_register(array(__CLASS__, 'htm2pdf_autoload_for_lepton'), true, true);
    }

    private function htm2pdf_autoload_for_lepton( $sClassName )
    {
        
        // echo "<p>".$sClassName."</p>";
        
        if( $sClassName === "Html2Pdf")
        {
            $sLookupPath = dirname(__DIR__)."/lib/spipu/html2pdf/src/Html2Pdf.php";
            if(!file_exists($sLookupPath))
            {
                die( $sLookupPath ); 
            }
            
            require_once $sLookupPath; 
            return true;
        } else {
            
            if(strpos($sClassName, 'Spipu\Html2Pdf' ) !== false)
            {
                $sClassName = str_replace("Spipu\Html2Pdf", "", $sClassName);
                $aPaths = explode("\\", $sClassName);
                $sLookupPath = dirname(__DIR__)."/lib/spipu/html2pdf/src/".implode("/", $aPaths).".php";
                
                if(file_exists( $sLookupPath ))
                {
                    require_once $sLookupPath;
                } else {
                    echo "<p> NOT FOUND:: ".$sLookupPath."</p>";
                }
            } elseif ( strpos($sClassName, "TCPDF" ) !== false ) {
                $sLookupPath = dirname(__DIR__)."/lib/tecnickcom/tcpdf/".$sClassName.".php";

                if(file_exists( $sLookupPath ))
                {
                    require_once $sLookupPath;
                    return true;
                } else {
                    echo "<p> Also NOT found:: ".$sLookupPath."</p>";
                }

            }
        }
        return 0;
    }
}