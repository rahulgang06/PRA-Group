<?php
//require "create.php";

    function callAPIContent($method,$url, $data)
{ //echo($url);
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                        
    'Content-Length: ' . strlen($data),
         'User-Agent: tryout')                                                               
);
    $result = curl_exec($curl);
   if(!$result){
    die("Connection Failure");
}
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  echo($http_code);
$result=json_decode($result,true);
 curl_close($curl);
return $result['content'];
   
    }
function getcontent()
{
  $url = "https://api.github.com/repos/lekhana3003/abcd/contents/abcd.yaml?access_token=e80842a7732d141bc13c3545d926a1781c2f9613";
  
 
    $data_array="";
    
       
$characters = callAPIContent("GET", $url, json_encode($data_array));

return $characters;
//$response = json_decode($update_plan, true);
    }
$characters=getcontent();
echo(base64_decode($characters));
    ?>