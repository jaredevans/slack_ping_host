<?php

# Install fping package on your machine first.

if ( $_POST{token} != "<your app Verification Token goes here>" ) {
  exit;
}

# Any code that's commented out below can be uncommented for debugging purposes.
#header("Content-Type: plain/text");
header("Content-Type: application/json");

$domain = $_POST{text};
$command = "fping -q -t 200 -c 1 $domain";

#print "Running $command </P>\r\n";
$output_status = shell_exec("$command > /dev/null 2>&1; echo $?");

if ( $output_status == 0 ) {
   print "{
    \"text\": \"Pinging $domain\",
    \"attachments\": [
        {
            \"text\":\"Success\" , \"color\":\"#3a9648\"
        }
    ]
}";

} else {
   $digcmd = "dig -4 $domain +short";
   #print "Running $digcmd </P>\r\n";
   $full_output = shell_exec("$digcmd 2>&1; echo $?");
   $output = shell_exec("$digcmd 2>&1");
   #print "Full Resut: $full_output </P>\r\n";
   #print "Resut:${output}x</P>\r\n";

   if ( $output != "" ) {
     print "{
       \"text\": \"Pinging $domain\",
        \"attachments\": [
          {
            \"text\":\"Failure but host resolves to $output (host is down or firewall blocking pings)\" , \"color\":\"danger\"
          }
        ]
       }";
   } else {
     print "{
       \"text\": \"Pinging $domain\",
        \"attachments\": [
          {
            \"text\":\"Failure and host not resolvable\" , \"color\":\"danger\"
          }
        ]
     }";
   }

}

#foreach ($_POST as $key => $value){
#  echo "{$key} = {$value}\r\n";
#}

?>

