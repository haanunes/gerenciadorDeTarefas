<?php

/**
 * Description of ConverterData
 *
 * @author Hélder
 */
class UtilitarioData {

    static function formatarDateSQLParaDataBrasil($dataSql) {
        $dataTimestamp = strtotime($dataSql);
        $dataFormatada = date('d/m/Y', $dataTimestamp);
        return $dataFormatada;
    }

    static function formatarDataBrasilParaDataSQL($dataBrasileira) {
        $dataTimestamp = strtotime(str_replace('/', '-', $dataBrasileira));
        $dataFormatada = date('Y-m-d', $dataTimestamp);
        return $dataFormatada;
    }

    static function dataEPassada($data) {
        $dataAtual = date('Y-m-d',time());
        return $data < $dataAtual;
    }
    static function dataEHoje($data) {
        $dataAtual = date('Y-m-d',time());
        return $data == $dataAtual;
    }
    static function dataEFutura($data) {
        $dataAtual = date('Y-m-d',time());
        return $data > $dataAtual;
    }

}
