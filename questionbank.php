<?php
$quote = get_quote();
$questionBank = ["How are you feeling right now?", "How much energy do you have today?", "What is this question?"];

?>

<?php

function get_quote() {
    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://zenquotes.io/api/quotes",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $return = json_decode($response);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo ($return[0]->q);
    }
}




?>
