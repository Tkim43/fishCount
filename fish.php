<?php

header("Access-Control-Allow-Origin: *");
/**
 * Created by PhpStorm.
 * User: tiffanykim
 * Date: 11/7/18
 * Time: 6:34 PM
 */

print_r($_SERVER);

// we have to grab the user agent
// curl

    // have a page that prints that
$data = file_get_contents('https://www.976-tuna.com/e107_plugins/landing/wrapup.php');

//$data = substr($data, 5000, 5000);
//
//print($data);exit();

$boatposStart = strpos($data, 'EoF Sitelinks');

$boatposEnd = strpos($data, '</table>', $boatposStart);

$dataSegment = substr($data, $boatposStart, $boatposEnd-$boatposStart);
//print($dataSegment);
$rowEnd = 0;
$rowData = [];
do{
    $rowStart = strpos($dataSegment, '<tr>', $rowEnd);
    $rowEnd = strpos($dataSegment, '</tr>', $rowStart);
    $row = substr($dataSegment, $rowStart, $rowEnd - $rowStart);
    //print("\n#################".$row);
    $found = preg_match_all("/forumheader[0-9]'>(.*)<\/td>/sU",$row,$matches);
    if($found) {
        $thisData = [
            'location' => $matches[1][0],
            'boatCount' => $matches[1][1],
            'anglerCount' => $matches[1][2],
            'details' => strtr($matches[1][3],["\t"=>'',"\n"=>''])
        ];
        if ($matches[1][4] !== '&nbsp;'){
            $thisData['audio'] = $matches[1][4];
        }
        $rowData[] = $thisData;
    }

} while($rowStart !== false);

print(json_encode($rowData));
//
//preg_match_all('/<tr>(.*)<\/tr>/s',$dataSegment, $rows);
//
//print_r($rows);



?>