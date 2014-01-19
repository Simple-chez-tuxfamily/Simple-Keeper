<?php
    /*
     * css.php est le *SEUL* fichier css à charger. Il s'occupe de minifier le fichier css du thème de l'utilisateur
    */
    
    ob_start('ob_gzhandler'); // Compression GZIP
        $css = file_get_contents('../theme/template.css');
        
        $mauvaises_choses = array(
          "\r",
          "\t",
          "\n\n",
          "\n",
          '  ',
          '   ',
        );
        
        $css = preg_replace('/(\/\*([\s\S]*?)\*\/)|(\/\/(.*)$)/m', '', $css);
        $css = str_replace($mauvaises_choses, '', $css);
        $css = str_replace(': ', ':', $css);
        $css = str_replace(', ', ',', $css);
        $css = str_replace(';}', '}', $css);
        
        header('Content-type: text/css; charset=utf-8'); // Encodage
        // Cache de 24 heures
        $ts = gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT';
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time() - 604800) . ' GMT');
        header('Pragma: cache');
        header('Cache-Control: max-age=604800');
        
        echo $css;
    ob_end_flush();
?>