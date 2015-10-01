<?php

class Decoder {
  
  private $iBase = 2;

  public function __construct($iBase) {
    $this->iBase = $iBase;
  }

  public function decode($sCode) {


    $iQuantient = $this->getQuantient($sCode);
    $iRemainder = $this->getRemainder($sCode, $iQuantient);

    return $iQuantient + $iRemainder;
  }

  private function getQuantient($sCode) {
    
    $aQuantient = explode(0, $sCode);
    $sQuantient = $aQuantient[0];

    $iQuantient = strlen($sQuantient) * $this->iBase;
    return $iQuantient;
  }

  private function getRemainder($sCode, $iQuantient) {

    $iBaseRemainder = ceil(log($this->iBase, 2));
    $sRemainderCode = substr($sCode, ($iQuantient / $this->iBase));
    $iRemainderCode = bindec($sRemainderCode);

    if ($iRemainderCode >  (pow(2, $iBaseRemainder) - $this->iBase)) {
      $iNumber        =   $iRemainderCode -(pow(2, $iBaseRemainder) - $this->iBase);
      $iRemainderCode = $iNumber;
    }

    return $iRemainderCode;
  }
}