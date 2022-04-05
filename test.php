<?
$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
$stack = array();
$email['email']='d@d';
$email['val']=0;
array_push($stack, $email);
$email['email']='gg@gmail.com';
$email['val']=1;
array_push($stack, $email);
$email['email']='123@gmail.ru';
$email['val']=1;
array_push($stack, $email);
$email['email']='fs@gmail.com';
$email['val']=1;
array_push($stack, $email);
$email['email']='.abc@mail.com';
$email['val']=0;
array_push($stack, $email);
$email['email']='abc@mail.com';
$email['val']=1;
array_push($stack, $email);
$email['email']='abc.def@mail.c';
$email['val']=0;
array_push($stack, $email);
$email['email']='abc.def@mail.cc';
$email['val']=1;
array_push($stack, $email);
$email['email']='abc.def@mail#archive.com';
$email['val']=0;
array_push($stack, $email);
$email['email']='abc.def@mail-archive.com';
$email['val']=1;
array_push($stack, $email);
unset($email['val']);
$email['email']='123@mail-archive.com';
array_push($stack, $email);
for ($i = 0; $i < count($stack) ; $i++) {
    if (preg_match($pattern, $stack[$i]['email'])){$stack[$i]['autoval']=1;}
    else $stack[$i]['autoval']=0;
}
echo 
"<pre>";
echo print_r($stack)." </pre>";
if (preg_match($pattern, "abc.def@mail.c")) {
    echo "Вхождение найдено.";
} else {
    echo "Вхождение не найдено.";
}

?>