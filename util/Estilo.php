<?php


/**
 *
 * @author Hélder
 */
class Estilo {
   static function corDaDataEmRelacaoAoPrazo ($data)
   {
       require_once $_SERVER['DOCUMENT_ROOT'] . '/gerenciadorDeTarefas/util/UtilitarioData.php';
       if(UtilitarioData::dataEPassada($data)){
           return " style='color:red' ";
       }else if (UtilitarioData::dataEHoje($data)){
           return " style='color:blue' ";
       }else{
           return " style='color:green' ";
       }
   }
}
