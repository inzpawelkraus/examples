<?php

//$name=mysql_real_escape_string($_POST['name']);
//$query=mysql_query("select * from user where username='$name'");
//$row=mysql_num_rows($query);
//if($row!=0)
//{
//echo "jest";
//}
//else{
//    echo 'brak nowych wpisów';
//}

$q = "SELECT * FROM comments ";
$q .= "WHERE state = 'lodzkie' ";
dump($q);
$query=mysql_query($q);
$row=mysql_num_rows($query);
dump($row);die;
$row = '';
while ($row = $this->db->fetch_assoc()) {
    $result[] = $row;
}
return $result;
