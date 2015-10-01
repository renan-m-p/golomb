<?php
require_once('libs/Encoder.php');
require_once('libs/Decoder.php');


$iBase   = $_POST['base'];
$sOption = $_POST['option'];


$sText = file_get_contents($_FILES['arquivo']['tmp_name']);

if (empty($sText)) {
  throw new Exception("Erro ao Ler o arquivo");
}

if ($sOption == 'encoder') {

  $oEncoder = new Encoder($iBase, $sText);
  $oEncoder->process();

  echo $oEncoder->getSteps();

} else {
  $oDecoder = new Decoder($iBase);
  
}

// $sTextOutHexa = '';

// $M = 10; //@divisor



// for ($i = 0; $i < strlen($sText); $i++) {
  
//   $sCharacter = $sText[$i];
//   // echo $sCharacter . ' - ' . ord($sCharacter) . "</br>";

//   $iCharacter = (int) ord($sCharacter);
//   $sCode      = $oEncoder->encode($iCharacter);

//   echo $sCharacter . ' - [' . $iCharacter . '] - ' . $sCode . "</br>";
//   $sTextOutHexa .= base_convert($sCode, 2, 16);
// }

// echo "input hex </br>";
// echo $sText . PHP_EOL .  "</br>";

// echo "output hex: </br>";
// echo $sTextOutHexa;

// echo "</br>";
// echo "</br>";
// echo "</br>";

// $sDecode = '111111111110100';

// $iCode = $oDecoder->decode($sDecode);

// print_r(chr($iCode));

// $sQuantient = explode(0, $sDecode)[0];
// $iQuantient = strlen($sQuantient) * $M;

// $iBaseRemainder = ceil(log($M, 2));
// $sRemainderCode = substr($sDecode, strlen($sQuantient));
// $iRemainderCode = bindec($sRemainderCode);
// 
// if ($iRemainderCode >  (pow(2, $iBaseRemainder) - $M)) {
  // $iNumber =   $iRemainderCode -(pow(2, $iBaseRemainder) - $M);
  // $iRemainderCode = $iNumber;
// }
// 
// echo '<pre>';
// print_r($sRemainderCode);
// echo "</br>";
// print_r($iQuantient);
// echo "</br>";
// echo chr($iQuantient + $iRemainderCode);
// die();



?>
