<?php
function callAPI($method,$url, $data)
{
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                   
    'Content-Type: application/json',                                                           
    'Content-Length: ' . strlen($data),
         'User-Agent: tryout')                                                               
);
    $result = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //echo $http_code;
   if(!$result){
    die("Connection Failure");
}
$result=json_decode($result,true);
 curl_close($curl);
return $result;
  
   
    }

    function callAPIUpdate($method,$url, $data)
    {
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(                   
    'Content-Type: application/json',                                                           
    'Content-Length: ' . strlen($data),
         'User-Agent: tryout')                                                               
);
    $result = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //echo $http_code;
   if(!$result){
    die("Connection Failure");
}
$result=json_decode($result,true);
 curl_close($curl);
return $http_code;
  
   
    }
function callAPIUsers($method,$url, $data)
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
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  
   if(!$result){
    die("Connection Failure");
}
$result=json_decode($result,true);
 curl_close($curl);
return $result;
  
   
    }
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
$result=json_decode($result,true);
 curl_close($curl);
 $keys = array_keys($result);
 if(in_array("content", $keys))
 {
  $content=$result['content'];
 }
 else
 {
  $content="";
 }
return $content;
   
    }
function getusers($user_name,$access_token)
{
    
   $url="https://api.github.com/users/".$user_name."/repos?access_token=".$access_token;
 
    $data_array="";
    
       
$characters = callAPIUsers("GET", $url, json_encode($data_array));
return $characters;
//$response = json_decode($update_plan, true);
    }
function getcontents($user_name,$access_token,$repo_name,$path_name)
{
    
   $url = "https://api.github.com/repos/".$user_name."/".$repo_name."/contents/".$path_name."?access_token=".$access_token;
  
 
    $data_array="";
    
       
$characters = callAPIContent("GET", $url, json_encode($data_array));
return $characters;
//$response = json_decode($update_plan, true);
    }

    function getsha($user_name,$access_token,$repo_name,$path_name)
{
    
   $url = "https://api.github.com/repos/".$user_name."/".$repo_name."/contents/".$path_name."?access_token=".$access_token;
  
 
    $data_array="";
    
       
$characters = callAPI("GET", $url, json_encode($data_array));
return $characters;
//return $characters;
//$response = json_decode($update_plan, true);
    }
function create_files($access_token,$user_name,$repo_name,$path_name,$email_id)
{
    
   
  $url = "https://api.github.com/repos/".$user_name."/".$repo_name."/contents/".$path_name."?access_token=".$access_token;
  //echo $url."\n";
    $data_array =array(
                    'message' => "New Reposiory",
                    'committer' => array(
                        "name" =>$user_name,
                        "email"=>$email_id,
                    ),
                    "content" => '' );
       
$update_plan = callAPI("PUT", $url, json_encode($data_array));
//$response = json_decode($update_plan, true);
    }
function create_files_data($access_token,$user_name,$repo_name,$path_name,$email_id,$data)
{
    
   $data=base64_encode($data);
  $url = "https://api.github.com/repos/".$user_name."/".$repo_name."/contents/".$path_name."?access_token=".$access_token;
  //echo $url."\n";
    $data_array =array(
                    'message' => "New Reposiory",
                    'committer' => array(
                        "name" =>$user_name,
                        "email"=>$email_id,
                    ),
                    "content" => $data );
       
$update_plan = callAPI("PUT", $url, json_encode($data_array));
    }
function create_files_update($access_token,$user_name,$repo_name,$path_name,$data,$sha)
{
    
   $data=base64_encode($data);
  $url = "https://api.github.com/repos/".$user_name."/".$repo_name."/contents/".$path_name."?access_token=".$access_token;
  //echo $url."\n";
    $data_array =array(
                    'message' => "New Reposiory",
                    'committer' => array(
                        "name" =>$user_name,
                        "email"=>$user_name,
                    ),
                    "content" => $data,
                    "sha"=>$sha );
       
$update_plan = callAPIUpdate("PUT", $url, json_encode($data_array));
return $update_plan;
    }
function create_repo($access_token,$repo_name,$description,$private)
{
  
     $url = "https://api.github.com/user/repos?access_token=".$access_token;
       $data_array = array(                  
       "name"=> $repo_name,
       "description"=> $description,
       "private"=> $private);
$response = callAPI("POST", $url, json_encode($data_array));
//$response = json_decode($update_plan, false);
//echo $response;
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//echo($http_code);
$html_url = $response['html_url'];
return $html_url.$http_code;
    }
if(isset($_GET['create']))
{
   create_files();
}
?>