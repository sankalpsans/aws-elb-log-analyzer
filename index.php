<pre><?php
$filename = './246435084856_elasticloadbalancing_ap-southeast-1_sportskeeda-new_20151214T0000Z_54.169.126.87_ge4j0a9a.log';

$latency_threshold = [0, 100, 1000];

$handle = fopen($filename, "r");
if ($handle) {
    $older_second = 0;
    $older_class = 0;
    while (($line = fgets($handle)) !== false) {
    	$line = explode(" ", $line);
        $newer_second = date("h:i:s", strtotime($line[0]));
        echo "Compare $newer_second with $older_second";
        if($newer_second != $older_second) {
         echo '<span class = "class'. ($older_class ++) % 2 .'">';
        }   
        else {
         echo '<span class = "class'. $older_class .'">';
        }
        $older_second = $newer_second;
	echo get_line_from_raw($line).'</span><br /><br />';
    }

    fclose($handle);
} else {
    echo "Error";
} 

function get_line_from_raw($line) {
 return date("D d M Y h:i:s", strtotime($line[0])).' | '.$line[3].' | '.(floatval($line[4]) * 1000).' + '.(floatval($line[5]) * 1000).' + '.(floatval($line[6]) * 1000).
        ' | '.
        $line[7].' '.$line[8].' | '.$line[9].' &darr; | '.$line[10].' &uarr; '.
        ' | <b>'.$line[11].
        '</b> '.$line[12].' | ';
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
