<?php
// Generates a strong password of N length containing at least one lower case letter,
// one uppercase letter, one digit, and one special character. The remaining characters
// in the password are chosen at random from those four sets.
//
// The available characters in each set are user friendly - there are no ambiguous
// characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
// makes it much easier for users to manually type or speak their passwords.
//
// Note: the $add_dashes option will increase the length of the password by
// floor(sqrt(N)) characters.
$sets='';
foreach($_POST as $title => $info){
if($info=='true' && $title!='length' && $title!='dashes') {
	$sets .=$title;
}
if($title=='length') {
$length=$info;
}
if($title=='dashes') {
if($info=='true'){
	$dashes=true;
}else{
	$dashes=false;
}
}

}
if($sets==null){
echo '<div class="alert alert-danger" role="alert"><strong>Generation Error:</strong> Please Define some Parameters </div>';

} else{
echo '<div class="alert alert-success" role="alert"><strong>New Password:</strong> '.generateStrongPassword($length,$dashes, $sets).'</div>';
}
function generateStrongPassword($length = 27, $add_dashes = false, $available_sets = 'luda')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '~,"!@#$`%\'^&*?+/:;.}]|=[{_-()';
	if(strpos($available_sets, 'a') !== false)
		$sets[] = 'iloILO10';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);
	$password = str_shuffle($password);
	$password = sha1(md5($password));

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}
?>
