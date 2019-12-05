<?php

namespace App\Classes;

Class FormataTudo{
    private $_moeda = 'R$';
    public function formatar($dados, $tipo, $destino='form'){



        if($dados == "" && $tipo == "data")return "0000-00-00";
        if($dados == "" && $tipo == "telefone")return "";
        if(strlen($dados) == 11 && $tipo == "telefone")$tipo = "celular";

        $tipo = strtolower($tipo);
        if($destino == 'banco'){
            switch($tipo){
                case "cnpj":
                case "cpf":
                case "telefone":
                case "celular":
                case "cep":
                case "inteiro":
                    $dados = $this->formatar($dados, 'limpanumero', 'banco');
                    break;
                case "moeda":
                    $dados = str_replace($this->_moeda, '',trim($this->formatar($dados, 'decimal', 'banco')));
                    break;
                case "decimal":
                    $dados = $this->converter_decimal_vp($dados);
                    break;
                case "data":
                    $dados = $this->converter_data_fb($dados);
                    break;
                case "hora":
                    $dados = $this->converter_time_bf($dados);
                    break;
                case "datahora":
                    $ret = $this->converter_data_fb(substr($dados, 0, 10));
                    $ret .= ' ' . $this->converter_time_bf(substr($dados, 11, 8));
                    $dados = $ret;
                    break;
                case 'limpanumero':
                    $ret = preg_replace('/[^0-9]/', '', $dados);
                    $dados = $ret;
                    break;

                Default:
                    break;
            }
        }else{
            switch($tipo){
                case "cpf":
                    $formato = "###.###.###-##";
                    break;
                case "cnpj":
                    $formato = "##.###.###/####-##";
                    break;
                case "telefone":
                    $formato = "(##) ####-####";
                    break;
                case "celular":
                    $formato = "(##) #####-####";
                    break;
                case "cep":
                    $formato = "#####-###";
                    break;
                case "moeda":
                    $dados = str_replace(',', '.', $dados);
                    $dados = $this->_moeda.' '.$this->formatar($dados, 'decimal');
                    break;
                case "decimal":
                    $dados = $this->converter_decimal_pv($dados);
                    break;
                case "inteiro":
                    $dados = $this->converter_int_vp($dados);
                    break;
                case "data":
                    $dados = $this->converter_data_bf($dados);
                    break;
                case "hora":
                    $dados = $this->converter_time_bf($dados);
                    break;
                case "datahora":
                    $ret = $this->converter_data_bf(substr($dados, 0, 10));
                    $ret .= ' '.$this->converter_time_bf(substr($dados, 11, 8));
                    $dados = $ret;
                    break;
                case "decimalarquivobanco":
                    $dados = number_format($dados, '2', '', '');
                    break;
                case "dataarquivobanco":
                    $dados = date('Ymd', strtotime($dados));
                    break;

                case "percentual":
                    $dados = round($dados, 0)."%";
                    break;
                Default:
                    break;
            }

        }
        if(isset($formato)){
            $dados = $this->string_format($formato, $dados);
        }
        return $dados;
    }
    public function converter_int_vp($strInt) {
        $strInt = number_format($strInt,0,',','.');
        return $strInt;
        unset($strInt);
    }
    public function converter_int_pv($strInt) {
        $strInt = str_replace(".", "", $strInt);
        return $strInt;
        unset($strInt);
    }
    public function converter_decimal_pv($strDecimal) {
        $strDecimalFinal = number_format($strDecimal,2,',','.');
        return $strDecimalFinal;
    }
    function converter_decimal_vp($strDecimal) {
        $strDecimal = str_replace(".", "", $strDecimal);
        $strDecimalFinal = str_replace(",", ".", $strDecimal);
        return $strDecimalFinal;
    }
    function converter_data_fb($strData) {
        if(substr_count($strData, '/') == 2){
            // Recebemos a data no formato: dd/mm/aaaa
            // Convertemos a data para o formato: aaaa-mm-dd
            if ( preg_match("#/#",$strData) == 1 ) {
                $data = array_reverse(explode('/',$strData));
                if(strlen($data[0]) == 2){
                    $data[0] = "20".$data[0];
                }
                $strDataFinal = implode('-', $data);
            }



            return $strDataFinal;
        }else{
            return $strData;
        }
    }
    function converter_data_bf($strData) {
        if(substr_count($strData, '-') == 2){
            // Recebemos a data no formato: aaa-mm-dd
            // Convertemos a data para o formato: dd/mm/aaaa
            if ( preg_match("#-#",$strData) == 1 ) {
                $strDataFinal = implode('/', array_reverse(explode('-',$strData)));
            }
            return $strDataFinal;
        }else{
            return $strData;
        }
    }
    function converter_time_bf($strTime) {
        if(substr_count($strTime, ':') == 2){
            list($time1, $time2, $time3) = explode(":", $strTime);
            $strTimeFinal = $time1.':'.$time2;
            return $strTimeFinal;
        }else{
            return $strTime;
        }
    }
    function string_format($format, $string, $placeHolder = "#")
    {
        $numMatches = preg_match_all("/($placeHolder+)/", $format, $matches);
        foreach ($matches[0] as $match)
        {
            $matchLen = strlen($match);
            $format = preg_replace("/$placeHolder+/", substr($string, 0, $matchLen), $format, 1);
            $string = substr($string, $matchLen);
        }
        return $format;
    }
}
?>