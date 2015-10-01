<?php

class Encoder {

  private $iBase = 2;

  private $sText;

  private $aCodes = array();

  private $aCodesHex = array();

  private $aSteps = array();

  public function __construct($iBase, $sText) {
    $this->iBase = $iBase;
    $this->sText = $sText;
  }


  public function process() {

    for ($iText = 0; $iText < strlen($this->sText); $iText++) {

      $sCharacter     = $this->sText[$iText];
      $iCharacter     = (int) ord($sCharacter);
      $sCode          = $this->encode($iCharacter);

      $this->aCodes[]  = $sCode;
      $this->aCodesHex = base_convert($sCode, 2, 16);
      $this->aSteps[]  = $this->makeLine($sCharacter,$sCode);
    }
  }

  public function getBinaryCode() {
    return implode(' ', $this->aCodes);
  }

  public function getHexCode() {
    return implode(' ', $this->aCodesHex);
  }

  public function getSteps() {
    return implode("</br>", $this->aSteps);
  }

  private function makeLine($sCharacter, $sCode) { //@todo Pensar melhro nisso...

    $sHtml  = "<li>";
    $sHtml .= "  <span>$sCharacter</span>";
    $sHtml .= "  => $sCode";
    $sHtml .= "</li>";

    return $sHtml;
  }


  private function encode($iCharacter) {

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