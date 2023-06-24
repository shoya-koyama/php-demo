サンプルコード
<?php
printf( "3*4=%d\n", 3*4); //乗算
printf( "8/2=%d\n", 8/2); //除算
printf( "1+5=%d\n", 1+5); //加算
printf( "7-3=%d\n", 7-3); //減算
printf( "10%%3=%d\n", 10%3); //剰余
?>

<?php
$array=array(0,5,8);
foreach( $array as $val){
    printf( "値は、%dです。\n",$val);
    if( $val > 5 ){
        print "5より大きいです\n";
    } else {
        print "5以下です\n";
    }
}
?>

<?php
//現在の日付と時間
$d=date("Y-m-d H:i:s");
printf("現在、%s\n",$d);
 
//明日、昨日、一週間後の日付を計算
$today=date("Y年m月d日");
$tomorrow=date("Y年m月d日",strtotime("1 day"));
$yesterday=date("Y年m月d日",strtotime("-1 day"));
$afterweek=date("Y年m月d日",strtotime("1 week"));
printf( "今日は%sです。\n", $today);
printf( "明日は%sです。\n", $tomorrow);
printf( "昨日は%sです。\n", $yesterday);
printf( "一週間後は%sです。\n", $afterweek);
 
//指定日の一ヶ月後の日付を計算
$anyday="2020-02-21";
$anyday_aftermonth=date("Y-m-d",strtotime('+1 month',strtotime($anyday)));
printf( "%sの一ヶ月後は、%sです。\n",$anyday, $anyday_aftermonth);
?>