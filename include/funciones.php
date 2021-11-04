<?php    




    //ENCRIPTAR DATOS
    //ENCRIPTAR DATOS
    //ENCRIPTAR DATOS

    //KEY PARA CIFRAR
    $keyEN="pP5z*b9/Vg1=?ri0w";
    //FUNCION PARA ENCRIPTAR LOS DATOS
    function encrypt($data,$keyEN)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('blowfish'));
        $encrypted=openssl_encrypt($data, "blowfish", $keyEN, 0, $iv);
        return base64_encode($encrypted."::".$iv);
    }

    //FUNCION PARA DESENCRIPTAR LOS DATOS
    function decrypt($data,$keyEN)
    {
        list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
        return openssl_decrypt($encrypted_data, 'blowfish', $keyEN, 0, $iv);
    }





    
    //GENERAR CODIGO ALEATORIO
    //GENERAR CODIGO ALEATORIO
    //GENERAR CODIGO ALEATORIO

    function GeraHash($qtd){ 
        $Caracteres = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $QuantidadeCaracteres = strlen($Caracteres); 
        $QuantidadeCaracteres--; 
        
        $Hash=NULL; 
        for($x=1;$x<=$qtd;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        } 
        
        return $Hash; 
    }
    
    function TransHash($qtd){ 
        $Caracteres = '1234567890abecdef'; 
        $QuantidadeCaracteres = strlen($Caracteres); 
        $QuantidadeCaracteres--; 
        
        $Hash=NULL; 
        for($x=1;$x<=$qtd;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        } 
        
        return $Hash; 
    }





    //FUNCION PARA VERIFICAR SI ES UN CORREO VÁLIDO
    //FUNCION PARA VERIFICAR SI ES UN CORREO VÁLIDO
    //FUNCION PARA VERIFICAR SI ES UN CORREO VÁLIDO

    function isEmail($email) {
	   return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}




    //CALCULAR EDADES Y TIEMPOS DE DIFERENCIA ENTRE 2 FECHAS
    //CALCULAR EDADES Y TIEMPOS DE DIFERENCIA ENTRE 2 FECHAS
    //CALCULAR EDADES Y TIEMPOS DE DIFERENCIA ENTRE 2 FECHAS

    //ESPAÑOL
    function get_format($df) {
                                
        $str = '';
        $str .= ($df->invert == 1) ? ' - ' : '';
        if ($df->y > 0) {
            // AÑOS
            $str .= ($df->y > 1) ? $df->y . ' años ' : $df->y . ' año ';
        } else if ($df->m > 0) {
            // MESES
            $str .= ($df->m > 1) ? $df->m . ' meses ' : $df->m . ' mes ';
        } else if ($df->d > 0) {
            // DIAS
            $str .= ($df->d > 1) ? $df->d . ' días ' : $df->d . ' día ';
        } else if ($df->h > 0) {
            // HORAS
            $str .= ($df->h > 1) ? $df->h . ' horas ' : $df->h . ' hora ';
        } else if ($df->i > 0) {
            // MINUTOS
            $str .= ($df->i > 1) ? $df->i . ' minutos ' : $df->i . ' minuto ';
        } else if ($df->s > 0) {
            // SEGUNDOS
            $str .= ($df->s > 1) ? $df->s . ' segundos ' : $df->s . ' segundo ';
        }
        
        return $str;
    }

    //INGLÉS
    function get_formatEn($df) {
                                
        $str = '';
        $str .= ($df->invert == 1) ? ' - ' : '';
        if ($df->y > 0) {
            // AÑOS
            $str .= ($df->y > 1) ? $df->y . ' years ' : $df->y . ' year ';
        } else if ($df->m > 0) {
            // MESES
            $str .= ($df->m > 1) ? $df->m . ' months ' : $df->m . ' month ';
        } else if ($df->d > 0) {
            // DIAS
            $str .= ($df->d > 1) ? $df->d . ' days ' : $df->d . ' day ';
        } else if ($df->h > 0) {
            // HORAS
            $str .= ($df->h > 1) ? $df->h . ' hours ' : $df->h . ' hour ';
        } else if ($df->i > 0) {
            // MINUTOS
            $str .= ($df->i > 1) ? $df->i . ' minutes ' : $df->i . ' minute ';
        } else if ($df->s > 0) {
            // SEGUNDOS
            $str .= ($df->s > 1) ? $df->s . ' seconds ' : $df->s . ' second ';
        }
        
        return $str;
    }

?>