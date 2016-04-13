<html>
<head>
<title>Estate Sale Strip</title>
<style type="text/css">
table 	{ width:700px !important; height:auto !important; text-align:center !important; }
tr 		{ display:block; height:auto !important; vertical-align:top !important; clear:both; }
td 		{ display:block; height:auto !important; vertical-align:top !important; clear:both; }
</style>
</head>
<body>
<?
$estatesales = strip_tags(file_get_contents("http://www.pghestatesales.com/"), '<table><tr><td><p><br><b><strong>');
//$estatesales = file_get_contents("http://www.pghestatesales.com/");
function highlight($text, $words, $color) {
    preg_match_all('~\w+~', $words, $m);
    if(!$m)
        return $text;
    $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
    //$re = '~\\b(' . implode('|', $m[0]) . ')\\b~';
    $finaltext = preg_replace($re, '<b style="background-color:'.$color.';">$0</b>', $text);
    return $finaltext;
}

function highlight2($text, $words, $color) {
    return str_ireplace($words, '<b style="background-color:'.$color.';">'.$words.'</b>', $text);
}




$words = 'records';


$estatesales = highlight2($estatesales, 'record', 'orange');
$estatesales = highlight2($estatesales, 'albums', 'orange');
$estatesales = highlight2($estatesales, 'books', 'orange');
$estatesales = highlight2($estatesales, 'stereo', 'orange');
$estatesales = highlight2($estatesales, 'camera', 'pink');
$estatesales = highlight2($estatesales, 'nikon', 'pink');
$estatesales = highlight2($estatesales, 'nikkor', 'pink');
$estatesales = highlight2($estatesales, 'canon', 'pink');
$estatesales = highlight2($estatesales, 'leica', 'pink');
$estatesales = highlight2($estatesales, 'yashica', 'pink');
$estatesales = highlight2($estatesales, 'lens', 'pink');
$estatesales = highlight2($estatesales, 'microscope', 'pink');
$estatesales = highlight2($estatesales, 'guitar', 'orange');
$estatesales = highlight2($estatesales, 'instrument', 'orange');

$subcount = strtoupper($estatesales);

?>
<h1>Keyword Count</h1>
<ul>
    <li>Record: <?= substr_count($subcount, strtoupper('record')) ?></li>
    <li>Albums: <?= substr_count($subcount, strtoupper('albums')) ?></li>
    <li>Books: <?= substr_count($subcount, strtoupper('books')) ?></li>
    <li>Stereo: <?= substr_count($subcount, strtoupper('stereo')) ?></li>
    <li>Guitar: <?= substr_count($subcount, strtoupper('guitar')) ?></li>
    <li>Instrument: <?= substr_count($subcount, strtoupper('instrument')) ?></li>
    <li>Tools: <?= substr_count($subcount, strtoupper('camera')) ?></li>
    <li>Nikon: <?= substr_count($subcount, strtoupper('nikon')) ?></li>
    <li>Nikkor: <?= substr_count($subcount, strtoupper('nikkor')) ?></li>
    <li>Canon: <?= substr_count($subcount, strtoupper('canon')) ?></li>
    <li>Leica: <?= substr_count($subcount, strtoupper('leica')) ?></li>
    <li>Yashica: <?= substr_count($subcount, strtoupper('yashica')) ?></li>
    <li>Leica: <?= substr_count($subcount, strtoupper('leica')) ?></li>
    <li>Lens: <?= substr_count($subcount, strtoupper('lens')) ?></li>
    <li>Microscope: <?= substr_count($subcount, strtoupper('microscope')) ?></li>
</ul>
<?
//preg_replace($estatesales, '<SPAN style="BACKGROUND-COLOR: #ffff00"><b>$0</b></SPAN>', $text);
echo $estatesales;
?>
</body>
</html>