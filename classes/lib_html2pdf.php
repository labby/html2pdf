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
    /**
     *  The own singelton instance.
     *  @type   instance
     */
    public static $instance;

    /**
     *  Called by instance. All we have to do during the initialisation of this class.
     * 
     */    
    public function initialize()
    {
        define("K_TCPDF_EXTERNAL_CONFIG", false);
        define("K_PATH_MAIN",       dirname(__DIR__)."/lib/tecnickcom/tcpdf/");
        define("K_PATH_FONTS",      K_PATH_MAIN."fonts/");
        define("K_PATH_URL",        str_replace(LEPTON_PATH, LEPTON_URL, dirname(__DIR__))."/lib/");
        define("K_PATH_URL_CACHE",  K_PATH_URL.'cache/');
        define("K_PATH_IMAGES",     LEPTON_PATH.MEDIA_DIRECTORY."/"); // 
        
        spl_autoload_register(array(__CLASS__, 'htm2pdf_autoload_for_lepton'), true, true);
    }

    /**
     *  The internal "autoloader" for the assets.
     *  Keep in mind that we are not in the need to changes any path or something eslse inside the lib-folder!
     *  
     */
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
                    return true;
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