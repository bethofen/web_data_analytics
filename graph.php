<?php
 
$limit = 50000;

$dataPoints = array();
$file = fopen("btc-usdt-1h-gob.csv","r");
if(isset($_POST['feature'])){
    $featurename = $_POST['feature']+2;
}else{$featurename = 7;}
// file("btc-usdt-1h-gob.csv", FILE_SKIP_EMPTY_LINES);
// function plotbyfopen(){
    $dataPoints = array();
    $file = fopen("btc-usdt-1h-gob.csv","r");
    $i = 0;
    $name = fgetcsv($file)[$featurename];
    while(!feof($file)) {
            $y = fgetcsv($file)[$featurename];
            error_reporting(E_ERROR | E_PARSE);
            array_push($dataPoints, array("x" => $i, "y" => $y));
            $i++;
            }
          fclose($file);
    // return $dataPoints,$name;
// }
// function plotbyfile(){
//     $dataPoints = array();
//     $file = file("btc-usdt-1h-gob.csv", FILE_SKIP_EMPTY_LINES);
//     echo $file[1];
//     for($i = 0;$i<count($file);$i++){
//         $y = $file[$i];
//         echo $y,"<br>";
//         array_push($dataPoints, array("x" => $i, "y" => $y));
//     }
//     return $dataPoints;
// }

// $dataPoints,$name = plotbyfopen();

?>
<!DOCTYPE HTML>
<html>
<head> 
<script>
window.onload = function () {
	
var data = [{
		type: "line",                
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}];
	
//Better to construct options first and then pass it as a parameter
var options = {
	zoomEnabled: true,
	animationEnabled: true,
	title: {
		text: "<?php echo $name?>"
	},
	axisY: {
		lineThickness: 1
	},
	data: data  // random data
};
 
var chart = new CanvasJS.Chart("chartContainer", options);
var startTime = new Date();
chart.render();
var endTime = new Date();
//document.getElementById("timeToRender").innerHTML = "Time to Render: " + (endTime - startTime) + "ms";
 
}
</script>
<style>
	#timeToRender {
		position:absolute; 
		top: 10px; 
		font-size: 20px; 
		font-weight: bold; 
		background-color: #d85757;
		padding: 0px 4px;
		color: #ffffff;
	}
</style>
</head>
<body>
<form method="post">
    <?php 
    $all_feature = array('Open', 'High', 'Low', 'Close', 'Volume','taker_base_vol','Rsi7','Rsi14','ema12','ema26','sma20','bollup','bolldown','macd','VWap');
    echo count($all_feature);
    for($i=0;$i<count($all_feature);$i++){
        echo "<input type='radio' name='feature' value='$i'> $all_feature[$i] ";
    }
    ?>
        <div><input type="submit" value="สร้างตาราง"></div>
    </form>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<span id="timeToRender"></span>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
 
</body>
</html>   