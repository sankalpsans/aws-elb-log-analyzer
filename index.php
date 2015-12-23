<pre><?php
require_once('./config.php');
$latency_threshold = [0, 100, 1000];

$handle = fopen($filename, "r");
if ($handle) {
    $older_second = 0;
    $older_class = 0;
    while (($line = fgets($handle)) !== false) {
    	$line = explode(" ", $line);
        $newer_second = date("h:i:s", strtotime($line[0]));
        //echo "Compare $newer_second with $older_second";
        if($newer_second != $older_second) {
	 $older_class  = ($older_class + 1) % 2;
        }   
        echo '<span class = "class'. $older_class .'">';
        $older_second = $newer_second;
	echo get_line_from_raw($line).'</span><br /><br />';
    }

    fclose($handle);
} else {
    echo "Error";
} 

function get_line_from_raw($line) {
 $return_string = date("D d M Y h:i:s", strtotime($line[0])).' | '.$line[3].' | '.(floatval($line[4]) * 1000).' + '.(floatval($line[5]) * 1000).' + '.(floatval($line[6]) * 1000).' | ';
 global $status_code_to_color_class;
 if(isset($status_code_to_color_class[$line[7]])) {
  $return_string .= '<span class="'.$status_code_to_color_class[$line[7]].'">'.$line[7].'</span>';
 }
 else {
  $return_string .= $line[7];
 }
        $return_string .= ' '.$line[8].' | '.$line[9].' &darr; | '.$line[10].' &uarr; '.
        ' | <b>'.$line[11].
        '</b> '.$line[12].' | ';
 return $return_string;
}
?>
</pre>
<style>
.err{ color:red; }
.warn{ color:orange; }
.good{ color:green; }
.info{ color:blue; }
.class0{ color:#000; }
.class1{ background:#eee; color:#999; }
</style>
