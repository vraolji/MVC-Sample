<?php
print_r($this->forecastLoc);

$json1 = $this->forecastData1;
$json2 = $this->forecastData2;
$json3 = $this->forecastData3;

// Weather Data
$place = $json1['response']['place'];
$ob1 = $json1->response->ob;

$cname =  ucwords($json3["response"][0]["place"]["name"]);   	// City Name
$sname =  strtoupper($json1["response"]["place"]["state"]);;   	// State Name
$conditionimg = $json1["response"]["ob"]["icon"];			// Current Image

$thelat = $json3["response"][0]["loc"]["lat"];      // Latitude
$thelong = $json3["response"][0]["loc"]["long"];    // Longitude

$timeoffset = $json3["response"][0]["profile"]["tzoffset"];   // Location Time Offset

$sunrise = $json1["response"]["ob"]["sunrise"] + $timeoffset;    // Sunrise Time
$sunset = $json1["response"]["ob"]["sunset"] + $timeoffset;    // Sunset Time

// 7 Day Forecast Times

$stamp1 = $json2["response"][0]["periods"][0]["timestamp"];
$stamp2 = $json2["response"][0]["periods"][1]["timestamp"];
$stamp3 = $json2["response"][0]["periods"][2]["timestamp"];
$stamp4 = $json2["response"][0]["periods"][3]["timestamp"];
$stamp5 = $json2["response"][0]["periods"][4]["timestamp"];
$stamp6 = $json2["response"][0]["periods"][5]["timestamp"];
$stamp7 = $json2["response"][0]["periods"][6]["timestamp"];
?>
This is the FORECAST page for:<br>

<div class="forecast-title forecast-space"><?= $cname  ?>, <?= $sname ?></div>

<div class="forecast-space" style="clear:both;"></div>


<div class="forecast-header forecasttopmargin">
<div class="forecast-headertitle">Current Conditions</div>
</div>
<div class="forecast-current">
<div class="condition-image"><img src="<?php echo URL; ?>/site/weather/icons110/<?= $conditionimg ?>" alt="<?= $ob1->weather ?>" /></div>
<div class="condition-numbers">
<div class="forecast-temp"><?= $json1["response"]["ob"]["tempF"] ?>&deg;</div>
<div class="forecast-subtitle" style="width: 150px;"><?= $json1["response"]["ob"]["weather"] ?></div>
</div>
<div class="forecast-space" style="clear:both;"></div>
<div>
<table border="0" cellpadding="0" cellspacing="0" class="currenttable">
<tr>
	<td class="forecast-text">Feels Like: </td>
	<td class="forecast-text textbold"><?= $json1["response"]["ob"]["feelslikeF"] ?>&deg;</td>
	<td class="forecast-text">Sunrise:</td>
	<td class="forecast-text textbold"><?= date("g:iA",$sunrise) ?></td>
</tr>
<tr>
	<td class="forecast-text">Humidity: </td>
	<td class="forecast-text textbold"><?= $json1["response"]["ob"]["humidity"] ?>%</td>
	<td class="forecast-text">Sunset:</td>
	<td class="forecast-text textbold"><?= date("g:iA",$sunset) ?></td>
</tr>
<tr>
	<td class="forecast-text">Wind: </td>
	<td class="forecast-text textbold"><?= $json1["response"]["ob"]["windSpeedMPH"] ?>mph <?= $json1["response"]["ob"]["windDir"] ?></td>
	<td class="forecast-text">Barometer:</td>
	<td class="forecast-text textbold"><?= $json1["response"]["ob"]["pressureIN"] ?> in.</td>
</tr>
</table>
</div>
</div>


<div style="clear:both;"></div>
<div class="forecast-space" style="clear:both;">&nbsp;</div>


<div class="forecast-header">
<div class="forecast-headertitle">7-Day Forecast</div>
</div>
<div class="forecast7day">
<ul>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp1); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp1); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][0]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][0]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][0]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][0]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][0]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][0]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp2); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp2); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][1]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][1]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][1]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][1]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][1]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][1]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp3); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp3); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][2]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][2]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][2]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][2]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][2]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][2]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp4); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp4); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][3]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][3]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][3]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][3]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][3]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][3]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp5); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp5); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][4]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][4]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][4]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][4]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][4]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][4]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp6); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp6); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][5]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][5]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][5]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][5]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][5]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][5]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
	<li>
<div style="float: left;padding-top: 10px;padding-left: 10px;width: 70px;">
	<div class="forecast-text textbold"><? echo date("l", $stamp7); ?></div>
	<div class="forecast-text"><? echo date("M jS", $stamp7); ?></div>
</div>
<div style="float: left;width: 80px;text-align:center;"><img src="<?php echo URL; ?>/site/weather/icons55/<? echo $json2["response"][0]["periods"][6]["icon"] ?>" alt="<? echo $json2["response"][0]["periods"][6]["weather"] ?>" /></div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-subtitle textbold">High <? echo $json2["response"][0]["periods"][6]["maxTempF"] ?>&deg;</div>
	<div class="forecast-subtitle textbold forecast-space">Low <? echo $json2["response"][0]["periods"][6]["minTempF"] ?>&deg;</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text forecast-space">Precip:<br><? echo $json2["response"][0]["periods"][6]["pop"] ?>%</div>
</div>
<div style="float: left;padding-top: 10px; width: 100px;">
	<div class="forecast-text">Winds:<br><? echo $json2["response"][0]["periods"][6]["windSpeedMPH"] ?>mph</div>
</div>
<div style="clear:both;"></div>
	</li>
</ul>
</div>


<div style="clear:both;"></div>
<div class="forecast-space" style="clear:both;">&nbsp;</div>


