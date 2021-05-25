<?php
if(isset($_POST["sel"]))
{
	if($_POST["sel"]){
    $mivariable_para_consultar =$_POST["sel"];
    $language_from = 'auto';
    $language_to='es';
    
    $text_to_translate = $mivariable_para_consultar;
    
    if (isset($_GET['tl']) and !empty($_GET['tl'])) {
        $language_to = $_GET['tl'];
    }
    
    $encoded_text = urlencode(strip_tags($text_to_translate));
    
    $url = 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=' . $language_from . '&tl=' . $language_to . '&dt=t&q=' . $encoded_text;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch, CURLOPT_USERAGENT, 'AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1');
    $output = curl_exec($ch);
    curl_close($ch);
    
    
    $response_a = json_decode($output);
    
    foreach ($response_a[0] as $text_block) {
        echo '<p>' . $text_block[0] . '</p>';
    }}
    
	else
		echo "He recibido un campo vacio";
}
?>