<pre>
               Current BTC Price For 1 USD = <?php $url= "https://blockchain.info/ticker";
               $zan=get_data($url);
 function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$usd=json_decode($zan,true);

echo $usd['USD']['last'];

              ?>