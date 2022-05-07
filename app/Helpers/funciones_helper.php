<?php
if(!defined('APPPATH')) exit('No direct script access allowed');

if(!function_exists('mes_help')){
    function mes_help($n){
        switch($n){
            case 1: return 'ENERO';
                break;
            case 2: return 'FEBRERO';
                break;
            case 3: return 'MARZO';
                break;
            case 4: return 'ABRIL';
                break;
            case 5: return 'MAYO';
                break;
            case 6: return 'JUNIO';
                break;
            case 7: return 'JULIO';
                break;
            case 8: return 'AGOSTO';
                break;
            case 9: return 'SETIEMBRE';
                break;
            case 10: return 'OCTUBRE';
                break;
            case 11: return 'NOVIEMBRE';
                break;
            default: return 'DICIEMBRE';
        }
    }
}

?>