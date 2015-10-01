<?php

class Encoder {

  private $iBase = 2;


  public function __construct($iBase) {
    $this->iBase = $iBase;
  }


  public function encode($iCharacter) {

    $iQuotient  = floor($iCharacter / $this->iBase); //int(numero/divisor)
    $iRemainder =  $iCharacter % $this->iBase; // Number modulo of Base

    $sQuotientCode  = $this->getQuatientCode($iQuotient);
    $sRemainderCode = $this->getRemainderCode($iRemainder);

    $sCode = $sQuotientCode . $sRemainderCode;

    return $sCode;
  }

  private function getQuatientCode($iQuotient){

    $sQuatientCode  = str_repeat('1', $iQuotient);
    $sQuatientCode .= '0';

    return $sQuatientCode;
  }

  private function getRemainderCode($iRemainder){

    $iBaseRemainder = ceil(log($this->iBase, 2));

    if ((($this->iBase-1) & $this->iBase) == 0) {
      $sRemainderCode = str_pad(decbin($iRemainder), $iBaseRemainder, "0", STR_PAD_LEFT);
      return $sRemainderCode;
    }

    if ($iRemainder < (pow(2, $iBaseRemainder) - $this->iBase)){
      $sRemainderCode = str_pad(decbin($iRemainder), $iBaseRemainder-1, "0", STR_PAD_LEFT);
      return $sRemainderCode;
    }

    $iNumber =  $iRemainder + pow(2, $iBaseRemainder) - $this->iBase;
    $sRemainderCode = str_pad(decbin($iNumber), $iBaseRemainder, "0", STR_PAD_LEFT);
    
    return $sRemainderCode;
  }
}