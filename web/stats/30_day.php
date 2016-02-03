&title=30%e5%a4%a9%e6%95%b0%e6%8d%ae%e5%8c%85%e7%bb%9f%e8%ae%a1,{font-size: 20px; color: #000000}&
&x_axis_steps=1&
&y_ticks=5,10,5&
&line_dot=3,#9999CC,pkts,12,4&
&y_min=0&
&bg_colour=#FFFFFF&
&tool_tip=%E6%97%A5%E6%9C%9F%3A%23x_label%23%3Cbr%3E%E5%85%B1%E8%AE%A1%3A%23val%23%E6%AC%A1&
<?php
// 
// &y_max=170&
// &values=25,72,78,76,64,44,40,74,72,60,54,70,96,85,100,115,98,102,107,105,84,86,66,61,15&
// &values_2=0,8,145,102,4,32,18,31,4,19,18,9,70,101,166,4,8,36,4,22,20,0,8,8,8&
// &values_3=0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,0&
// &values_4=0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0&
// &x_labels=11,12,13,14,15,16,17,18,19,20,21,22,23,00,01,02,03,04,05,06,07,08,09,10,11&

date_default_timezone_set("Asia/Shanghai");
include "../db.php";

$d=date("Y-m-d",strtotime("-30days"));

$v1="";
$x="";
$y_max=0;


for ($i=-30;$i<1;$i++) {
	$dstr=$i."days";
	$d=date("d",strtotime($dstr));
	if($x=='') 
		$x=$d;
	else $x=$x.",".$d;

	$d=date("Y-m-d",strtotime($dstr));
	$q="select count(*) from aprspacket where tm>='".$d." 00:00:00' and tm<='".$d." 23:59:59'";
	$result = $mysqli->query($q);
	$r=$result->fetch_array();
	if($v1=="")
		$v1=$r[0];
	else $v1=$v1.",".$r[0];
	if($r[0]>$y_max) $y_max = $r[0];

}
$y_max = intval($y_max);
$y_max = $y_max+10 - $y_max%10;
// &values=25,72,78,76,64,44,40,74,72,60,54,70,96,85,100,115,98,102,107,105,84,86,66,61,15&
// &values_2=0,8,145,102,4,32,18,31,4,19,18,9,70,101,166,4,8,36,4,22,20,0,8,8,8&
// &values_3=0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,0&
// &values_4=0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0&
// &x_labels=11,12,13,14,15,16,17,18,19,20,21,22,23,00,01,02,03,04,05,06,07,08,09,10,11&
echo "&values=".$v1;
echo "&x_labels=".$x;
echo "&y_max=".$y_max;
?>
