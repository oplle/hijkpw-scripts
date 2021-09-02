<?php
if (!isset($_GET['d'])) {
    echo "record not found!";
    return;
}
$domain = $_GET['d'];
if (!preg_match('/^(?!\-)(?:(?:[a-zA-Z\d][a-zA-Z\d\-]{0,61})?[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/', $domain)) {
        echo "1 fail to resolve $domain";
        exit(1);
}
$ip = gethostbyname($domain);
if ($ip == $domain) {
    $ip = system("dig AAAA +short $domain");
    if (strlen($ip) > 0) {
        echo $ip;
    } else {
        echo "fail to resolve $domain";
    }
} else {
    echo $ip;
}
?>