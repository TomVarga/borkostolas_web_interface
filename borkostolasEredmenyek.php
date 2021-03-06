<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
	<!--Load the AJAX API-->
	<script type="text/javascript" src="/js/jsapi"></script>
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/js/topNavActivator.js"></script>
	<script type="text/javascript">
		$(function () {
			$('.topScrollingBlockWrapper').on('scroll', function () {
				$('.leftTableContainer').scrollLeft($('.topScrollingBlockWrapper').scrollLeft());
			});
			$('.leftTableContainer').on('scroll', function () {
				$('.topScrollingBlockWrapper').scrollLeft($('.leftTableContainer').scrollLeft());
			});
		});
		$(window).on('load', function () {
			$('.topScroll').width($('.leftTable').width());
		});
	</script>
	<script type='text/javascript'>
		google.load('visualization', '1.0', {'packages':['corechart']});
		google.setOnLoadCallback(drawChart);
		google.setOnLoadCallback(drawChart2);
		function drawChart() {
			var graphData = [
				['Kóstolók', 'Korreláció', 'Különbségek átlaga'],
				["1. Kóstoló",+(0.819838622814).toFixed(3),+(0.89796775814).toFixed(3)],
				["2. Kóstoló",+(0.767161200075).toFixed(3),+(0.715520880337).toFixed(3)],
				["3. Kóstoló",+(0.639048657415).toFixed(3),+(0.896240519253).toFixed(3)],
				["4. Kóstoló",+(0.531053310191).toFixed(3),+(0.599607230856).toFixed(3)],
				["5. Kóstoló",+(0.74315011031).toFixed(3) ,+(0.800791717914).toFixed(3)],
				["6. Kóstoló",+(0.695260795848).toFixed(3),+(1).toFixed(3)],
				["7. Kóstoló",+(0.61544368154).toFixed(3) ,+(0.919458316967).toFixed(3)]
			];

			var data = google.visualization.arrayToDataTable(graphData);

			var options = {
				// vAxis: {title: 'Year',  titleTextStyle: {color: 'red'}}
			};

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.ColumnChart(document.getElementById("graph"));
			chart.draw(data, options);

		}
		function drawChart2() {
			var graphData = [
				['Kóstolók', 'CoHITS'],
				["1. Kóstoló",+(100).toFixed(3)],
				["2. Kóstoló",+(94.5844563).toFixed(3)],
				["3. Kóstoló",+(93.0791606).toFixed(3)],
				["4. Kóstoló",+(89.91960977).toFixed(3)],
				["5. Kóstoló",+(90.5993078).toFixed(3)],
				["6. Kóstoló",+(97.48039866).toFixed(3)],
				["7. Kóstoló",+(97.43265052).toFixed(3)]
			];

			var data = google.visualization.arrayToDataTable(graphData);

			var options = {
				// vAxis: {title: 'Year',  titleTextStyle: {color: 'red'}}
			};

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.ColumnChart(document.getElementById("graph2"));
			chart.draw(data, options);
		}
	</script>
</head>


<body>
<div id="wrapper">
	<!--HEADER/LOGO-->
	<?php include('header.php'); ?>
	<div id="contentWrapper">
		<!--SIDE BAR CONTENT-->
		<?php include('sidebar.php'); ?>
		<!--MAIN CONTENT-->
		<div id="content">

			<h2> Értékelés &rsaquo;</h2>
			<div class="topScrollingBlockWrapper">
				<div class="topScroll"><br /></div>
			</div>
			<div class="tableContainer">
				<div class="leftTableContainer">
					<table class="leftTable">
						<thead>
						<tr>
							<th>Sorszám</th>
							<th>Bor</th>
							<th>Pincészet</th>
							<th></th>
							<th>Évjárat</th>
							<th>Összetétel</th>
							<th>Ár</th>
						</tr>
						</thead>
						<tbody>
						<?php
						// http://www.textfixer.com/html/csv-convert-table.php
						?>
						<tr><td>1</td><td>Georg</td><td>Edegger Pincészet</td><td>Badacsonyi </td><td>2009</td><td>45% cabernet sauvignon, 45% merlot, 10% pinot noir</td><td>2,835 Ft</td></tr>
						<tr><td>2</td><td>ZEKK az Élet Jolly Jokere- Kiss Gábor Villányi Kissvörös</td><td>Kiss Gábor</td><td>Villány</td><td>2009</td><td>cabernet sauvignon, cabernet franc, merlot, kékfrankos</td><td>1,799 Ft</td></tr>
						<tr><td>3</td><td>Pinceátlag Szekszárdi házasítás</td><td>Eszterbauer Borászat</td><td>Szekszárdi </td><td>2008</td><td>cabernet sauvignon, cabernet franc, merlot, kékfrankos, pinot noir, kadarka</td><td>1,890 Ft</td></tr>
						<tr><td>4</td><td>Egri Paptag vörös</td><td>Juhász Testvérek Pincészete</td><td>Eger</td><td>2008</td><td>cabernet sauvignon, cabernet franc, merlot</td><td>2,000 Ft</td></tr>
						<tr><td>5</td><td>Cabernet</td><td>CHW Bormanufaktúra Kft.</td><td>Eger</td><td>2008</td><td>cabernet sauvignon, cabernet franc</td><td>2,190 Ft</td></tr>
						<tr><td>6</td><td>Cabernet Sauvignon &#38; Franc barrique</td><td>Tiffán Ede és Zsolt</td><td>Villány</td><td>2008</td><td>cabernet sauvignon, cabernet franc</td><td>3,150 Ft</td></tr>
						<tr><td>7</td><td>Szekszárdi Cabernet Sauvignon</td><td>Mészáros Pál</td><td>Szekszárd</td><td>2009</td><td>cabernet sauvignon</td><td>1800-2200 Ft</td></tr>
						<tr><td>8</td><td>Szent György-hegyi Cabernet Sauvignon</td><td>Szászi Endre/ Szászi Pince</td><td>Badacsonyi </td><td>2008</td><td>cabernet sauvignon</td><td>1,800 Ft</td></tr>
						<tr><td>9</td><td>Günzer Cabernet Sauvignon</td><td>Günzer Zoltán</td><td>Villányi </td><td>2008</td><td>cabernet sauvignon</td><td>1,990 Ft</td></tr>
						<tr><td>10</td><td>Kővirág Balatonfüred- Csopaki Cabernet Sauvignon Hordószelekció</td><td>Badacsonyi Pincegazdaság</td><td>Balatonfüred- Csopaki </td><td>2008</td><td>cabernet sauvignon</td><td>2,800 Ft</td></tr>
						<tr><td>11</td><td>Soproni Cabernet Sauvignon</td><td>Töltl Pincészet</td><td>Sopron</td><td>2008</td><td>cabernet sauvignon</td><td>2,250 Ft</td></tr>
						<tr><td>12</td><td>Cabernet Sauvignon Kettő007</td><td>Pfneiszl BioBirtok</td><td>Sopron</td><td>2007</td><td>cabernet sauvignon</td><td>3,000 Ft</td></tr>
						<tr><td>13</td><td>György- Villa Collection Villányi Cabernet Sauvignon</td><td>György- Villa Pincészet</td><td>Villányi </td><td>2007</td><td>cabernet sauvignon</td><td>1,899 Ft</td></tr>
						<tr><td>14</td><td>Hajós Cabernet Sauvignon barrique</td><td>Brilliant Holding Kft.</td><td>Hajós-Baja</td><td>2006</td><td>cabernet sauvignon</td><td>1,990 Ft</td></tr>
						<tr><td>15</td><td>Cabernet Franc</td><td>Lics Pincészet</td><td>Szekszárdi </td><td>2009</td><td>cabernet franc</td><td>1300-1800 Ft</td></tr>
						<tr><td>16</td><td>Ferenczi Cabernet Franc</td><td>Ferenczi Szőlőbirtok</td><td>Szekszárdi </td><td>2008</td><td>cabernet franc</td><td>2,300 Ft</td></tr>
						<tr><td>17</td><td>Cabernet Franc</td><td>Bősz Adrián</td><td>Szekszárd</td><td>2008</td><td>cabernet franc</td><td>2,300 Ft</td></tr>
						<tr><td>18</td><td>Cabernet Franc</td><td>Brunyai Pince</td><td>Villányi </td><td>2008</td><td>cabernet franc</td><td>2,500 Ft</td></tr>
						<tr><td>19</td><td>Cabernet Franc</td><td>Takler Pince</td><td>Szekszárd</td><td>2008</td><td>cabernet franc</td><td>2,500 Ft</td></tr>
						<tr><td>20</td><td>Domaine Gróf Zichy Cabernet Franc</td><td>Baron von Twickel Szőlőbirtok</td><td>Szekszárd</td><td>2007</td><td>cabernet franc</td><td>2,540 Ft</td></tr>
						<tr><td>21</td><td>Konyári Cabernet Sauvignon-Syrah</td><td>Konyári János</td><td>Balatonlelle</td><td>2008</td><td>cabernet sauvignon, syrah</td><td>2,790 Ft</td></tr>
						<tr><td>22</td><td>Tenkes</td><td>Malatinszky Kúria Organikus Szőlőbirtok</td><td>Villány</td><td>2007</td><td>cabernet sauvignon, cabernet franc, kékfrankos</td><td>2,800 Ft</td></tr>
						<tr><td>23</td><td>Bordó</td><td>Janus Pincészet</td><td>Villány</td><td>2007</td><td>cabernet sauvignon, cabernet franc, merlot</td><td>1,770 Ft</td></tr>
						<tr><td>24</td><td>Domaine Gróf Zichy Cuvée</td><td>Baron von Twickel Szőlőbirtok</td><td>Szekszárd</td><td>2007</td><td>cabernet franc 60%, merlot 40%</td><td>2,800 Ft</td></tr>
						<tr><td>25</td><td>Rhapsody</td><td>Kovács Nimród Winery</td><td>Eger</td><td>2006</td><td>cabernet franc, cabernet sauvignon, merlot, kékfrankos</td><td>2,990 Ft</td></tr>
						<tr><td>26</td><td>Superior Bikavér</td><td>Kovács Nimród Winery</td><td>Eger</td><td>2006</td><td>cabernet franc, merlot, kékfrankos, pinot noir</td><td>4,600 Ft</td></tr>
						<tr><td>27</td><td>Ikon Shiraz</td><td>Ikon Pincészet</td><td>Balatonboglár</td><td>2008</td><td>shiraz</td><td>1,890 Ft</td></tr>
						<tr><td>28</td><td>Badacsonyi Óvörös</td><td>Első Magyar Borház</td><td>Badacsonyi </td><td>2005</td><td>bakator, cabernet sauvignon, pinot noir</td><td>2,470 Ft</td></tr>
						<tr><td>29</td><td>Sebestyén Kadarka</td><td>Sebestyén Csaba</td><td>Szekszárd</td><td>2009</td><td>kadarka</td><td>2,280 Ft</td></tr>
						<tr><td>30</td><td>Kadarka</td><td>Tóth Ferenc Pincészet</td><td>Eger</td><td>2008</td><td>kadarka</td><td>3,005 Ft</td></tr>
						<tr><td>31</td><td>Bussay Pinot Noir</td><td>Bussay László</td><td>Csörnyeföld</td><td>2009</td><td>pinot noir</td><td>2,790 Ft</td></tr>
						<tr><td>32</td><td>Légli Pinot Noir</td><td>Légli Ottó</td><td>Dél-Balaton</td><td>2008</td><td>pinot noir</td><td>2,750 Ft</td></tr>
						<tr><td>33</td><td>Soproni Pinot Noir</td><td>Iváncsics Borászat</td><td>Sopron</td><td>2007</td><td>pinot noir</td><td>1,750 Ft</td></tr>
						<tr><td>34</td><td>ZEKK Szép- Gál Tibor Egri Pinot Noir</td><td>Gál Tibor</td><td>Eger</td><td>2007</td><td>pinot noir</td><td>2,666 Ft</td></tr>
						<tr><td>35</td><td>Kúria Red</td><td>Etyeki Kúria</td><td>Sopron</td><td>2007</td><td>pinot noir, merlot</td><td>2,500 Ft</td></tr>
						<tr><td>36</td><td>Divinus Egri Zweigelt</td><td>Závodszky Zoltán/ Dr. Pók Tamás</td><td>Eger</td><td>2009</td><td>zweigelt</td><td></td></tr>
						<tr><td>37</td><td>Ördög</td><td>Vylyan Szőlőbirtok és Pincészet</td><td>Villányi </td><td>2008</td><td>zweigelt, kékfrankos, kadarka, merlot</td><td>2,060 Ft</td></tr>
						<tr><td>38</td><td>Örökség</td><td>Cousin-Vin Pincészet</td><td>Sopron</td><td>2010</td><td>kékfrankos</td><td>1390- 1790 Ft</td></tr>
						<tr><td>39</td><td>Jánoshegy Kékfrankos</td><td>Kislaki Bormanufaktúra/ Légli Géza</td><td>Balatonboglár</td><td>2009</td><td>kékfrankos</td><td>2,710 Ft</td></tr>
						<tr><td>40</td><td>Soproni Kékfrankos</td><td>Iváncsics Borászat</td><td>Sopron</td><td>2008</td><td>kékfrankos</td><td>1,950 Ft</td></tr>
						<tr><td>41</td><td>Rokka Szekszárdi Kékfrankos</td><td>Pálos Miklós Borműhely</td><td>Szekszárd</td><td>2008</td><td>kékfrankos</td><td>1700-1800 Ft</td></tr>
						<tr><td>42</td><td>Badacsonyi Kékfrankos</td><td>Első Magyar Borház</td><td>Badacsonyi </td><td>2006</td><td>kékfrankos</td><td>1,850 Ft</td></tr>
						<tr><td>43</td><td>Parázs Bikavér</td><td>Szent Gaál Pincészet</td><td>Szekszárd</td><td>2008</td><td>kékfrankos, merlot, cabernet franc, kadarka</td><td></td></tr>
						<tr><td>44</td><td>St. Andrea Áldás (Egri Bikavér)</td><td>St. Andrea/ Lőrincz György</td><td>Eger</td><td>2008</td><td>kékfrankos, cabernet franc, merlot, syrah, pinot noir, menoir</td><td>2,950 Ft</td></tr>
						<tr><td>45</td><td>Takler Trió</td><td>Takler Pince</td><td>Szekszárd</td><td>2007</td><td>kékfrankos, cabernet sauvignon, merlot</td><td>1,980 Ft</td></tr>
						<tr><td>46</td><td>Szekszárdi Bikavér</td><td>Vesztergombi Ferenc és Csaba</td><td>Szekszárd</td><td>2007</td><td>kékfrankos, kadarka, cabernet sauvignon, merlot</td><td>2,000 Ft</td></tr>
						<tr><td>47</td><td>Egri Bikavér Superior</td><td>Bakondi Borászat</td><td>Eger</td><td>2006</td><td>kékfrankos, cabernet, merlot, pinot noir</td><td>1,800 Ft</td></tr>
						<tr><td>48</td><td>Heimann Merlot</td><td>Heimann Pince</td><td>Szekszárd</td><td>2008</td><td>merlot</td><td>2,350 Ft</td></tr>
						<tr><td>49</td><td>Szemes Merlot</td><td>Szemes József</td><td>Villány</td><td>2008</td><td>merlot</td><td>2,650 Ft</td></tr>
						<tr><td>50</td><td>Merlot</td><td>Vesztergombi Ferenc és Csaba</td><td>Szekszárd</td><td>2008</td><td>merlot</td><td>2,100 Ft</td></tr>
						<tr><td>51</td><td>Merlot</td><td>Juhász Testvérek Pincészete</td><td>Eger</td><td>2008</td><td>merlot</td><td>1,465 Ft</td></tr>
						<tr><td>52</td><td>Bagueri Merlot</td><td>Goriska Brda</td><td>Brda</td><td>2006</td><td>merlot</td><td>3,800 Ft</td></tr>
						<tr><td>53</td><td>Szekszárdi Merlot</td><td>Brilliant Holding Kft.</td><td>Szekszárd</td><td>2006</td><td>merlot</td><td>1,499 Ft</td></tr>
						<tr><td>54</td><td>Tűzkő Talentum</td><td>Tűzkő Birtok</td><td>Tolnai </td><td>2006</td><td>merlot, kékfrankos, cabernet franc</td><td>1,800 Ft</td></tr>
						<tr><td>55</td><td>Sauska Cuvée 13</td><td>Sauska Pincészet</td><td>Villány</td><td>2010</td><td>cabernet sauvignon, cabernet franc, merlot</td><td>2,950 Ft</td></tr>
						<tr><td>56</td><td>Törökverő</td><td>Demeter Pincészet</td><td>Egri </td><td>2009</td><td>cabernet franc 40%, kékfrankos 40%, merlot 20%</td><td>1,800 Ft</td></tr>
						<tr><td></td></tr>

						</tbody>
					</table>
				</div>
				<div class="rightTableContainer">
					<table class="rightTable">
						<thead>
						<tr>
							<th>1. Kóstoló</th>
							<th>2. Kóstoló</th>
							<th>3. Kóstoló</th>
							<th>4. Kóstoló</th>
							<th>5. Kóstoló</th>
							<th>6. Kóstoló</th>
							<th>7. Kóstoló</th>
						</tr>
						</thead>
						<tbody>

						<tr><td>16.4</td><td>16.9</td><td>16.8</td><td>16.8</td><td>18</td><td>17</td><td>16.5</td></tr>
						<tr><td>14.8</td><td>17.5</td><td>14.4</td><td>12</td><td>14</td><td>15</td><td>16.5</td></tr>
						<tr><td>15.8</td><td>16.8</td><td>15</td><td>15.3</td><td>16</td><td>16</td><td>16.5</td></tr>
						<tr><td>15.2</td><td>14</td><td>14</td><td>15.8</td><td>13</td><td>14</td><td>14.5</td></tr>
						<tr><td>10</td><td>10</td><td></td><td></td><td></td><td></td><td></td></tr>
						<tr><td>14.9</td><td>14.4</td><td>16.4</td><td>16.3</td><td>18</td><td>16</td><td>14.5</td></tr>
						<tr><td>13</td><td>12</td><td>13</td><td>16</td><td>12</td><td>15</td><td>15</td></tr>
						<tr><td>14.7</td><td>14.3</td><td>12.5</td><td>16.5</td><td>13</td><td>14</td><td>14.5</td></tr>
						<tr><td>14</td><td>14.5</td><td>14</td><td>16.7</td><td>15</td><td>15</td><td>14</td></tr>
						<tr><td>15.3</td><td>14.5</td><td>15.5</td><td>17.6</td><td>12</td><td>14</td><td>13</td></tr>
						<tr><td>16.5</td><td>14</td><td>14.8</td><td>15.6</td><td>12</td><td>15</td><td>13</td></tr>
						<tr><td>14.4</td><td>14</td><td>16</td><td>15.7</td><td>12.5</td><td>16</td><td>16.5</td></tr>
						<tr><td></td><td>16</td><td>14.5</td><td>16.2</td><td>16</td><td>15</td><td>14</td></tr>
						<tr><td>10</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
						<tr><td>15.8</td><td>12</td><td>15.8</td><td>14.8</td><td>12</td><td>14</td><td>14</td></tr>
						<tr><td>15.2</td><td>15</td><td>14</td><td>17</td><td>17</td><td>15</td><td>13.5</td></tr>
						<tr><td>15.5</td><td>16</td><td>15</td><td>17</td><td>15</td><td>14</td><td>16.5</td></tr>
						<tr><td>12</td><td>14</td><td>12</td><td>12</td><td>10</td><td>14</td><td>13.5</td></tr>
						<tr><td>14.5</td><td>10</td><td>16.8</td><td>14</td><td>13</td><td>16</td><td>15</td></tr>
						<tr><td>13</td><td>12</td><td>16</td><td>15</td><td></td><td>15</td><td>12.5</td></tr>
						<tr><td>15.9</td><td>14</td><td>17.8</td><td>17.6</td><td>16.3</td><td>16</td><td>16</td></tr>
						<tr><td>14.4</td><td></td><td>16</td><td>15.4</td><td>13</td><td>14</td><td>12</td></tr>
						<tr><td>10</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
						<tr><td>13.5</td><td>14.4</td><td>17.8</td><td>16.2</td><td>15.2</td><td>15.5</td><td>14</td></tr>
						<tr><td>12</td><td>12</td><td>15</td><td>15.8</td><td>15.4</td><td>15</td><td>13.8</td></tr>
						<tr><td>15</td><td>10.5</td><td>15.8</td><td>15.9</td><td>12.5</td><td>14</td><td>15.5</td></tr>
						<tr><td>14.4</td><td></td><td>13</td><td></td><td></td><td>15</td><td>12</td></tr>
						<tr><td>10</td><td>12</td><td>15</td><td>15.6</td><td>14.6</td><td>14.5</td><td>12.5</td></tr>
						<tr><td>16.9</td><td>16.3</td><td>17</td><td>16.5</td><td>16.4</td><td>17</td><td>16.5</td></tr>
						<tr><td>13</td><td>14.8</td><td>14</td><td>15</td><td>14.9</td><td>12</td><td>16</td></tr>
						<tr><td>14</td><td>15.8</td><td>13</td><td>15.5</td><td>14.4</td><td>16.2</td><td>14.5</td></tr>
						<tr><td>15.2</td><td>15.5</td><td>14.5</td><td>15.8</td><td>15.2</td><td>16</td><td>13.5</td></tr>
						<tr><td>15</td><td>15.8</td><td>15</td><td>12</td><td>12.6</td><td>16.2</td><td>14.5</td></tr>
						<tr><td>dugós</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
						<tr><td>15.9</td><td>17.8</td><td>16</td><td>18</td><td>16.1</td><td>17</td><td>17</td></tr>
						<tr><td>13</td><td>13</td><td>14</td><td>17.5</td><td>12.9</td><td>14.4</td><td>14</td></tr>
						<tr><td>12</td><td>17.4</td><td>16</td><td>16.8</td><td>12.2</td><td>16.2</td><td>16</td></tr>
						<tr><td>14.2</td><td>15</td><td>12</td><td>13.5</td><td>12.9</td><td>16.5</td><td>12</td></tr>
						<tr><td>16.7</td><td>16</td><td>14</td><td>17</td><td>16.5</td><td>18</td><td>17</td></tr>
						<tr><td>13.5</td><td>18</td><td>13</td><td>15.8</td><td>13.3</td><td>16.5</td><td>14</td></tr>
						<tr><td>15</td><td>16.5</td><td>14</td><td>17.2</td><td>15.3</td><td>16.3</td><td>13.5</td></tr>
						<tr><td>12</td><td>16</td><td>13</td><td>13</td><td>15.4</td><td>16.49</td><td>14.5</td></tr>
						<tr><td>13.5</td><td>12</td><td>14</td><td>17.6</td><td>12.6</td><td>9</td><td>15.5</td></tr>
						<tr><td>16.3</td><td>18</td><td>15</td><td>16.8</td><td>16.6</td><td>17.3</td><td>17</td></tr>
						<tr><td>15.2</td><td>17.4</td><td>14</td><td>16.5</td><td>14.2</td><td>16.6</td><td>16</td></tr>
						<tr><td>10</td><td>11</td><td>12</td><td>17.8</td><td>10</td><td></td><td></td></tr>
						<tr><td>10</td><td>11</td><td></td><td>14.5</td><td></td><td></td><td></td></tr>
						<tr><td>14.8</td><td>18.5</td><td></td><td>18.1</td><td>13.8</td><td>18.4</td><td>17</td></tr>
						<tr><td>13</td><td>16</td><td>15</td><td>18</td><td>12.5</td><td>13.2</td><td>16.5</td></tr>
						<tr><td>14</td><td>14</td><td>12</td><td>17.4</td><td>14.5</td><td>13.9</td><td>12</td></tr>
						<tr><td>15</td><td>17.3</td><td>17.8</td><td>18.4</td><td>13.9</td><td>16.49</td><td>16.5</td></tr>
						<tr><td>16.6</td><td>17.2</td><td>17.4</td><td>17.9</td><td>14.9</td><td>16.8</td><td>17</td></tr>
						<tr><td>10</td><td>10</td><td></td><td></td><td></td><td></td><td>16.5</td></tr>
						<tr><td>16.1</td><td>18.5</td><td>16.5</td><td>19</td><td>17.2</td><td>18.3</td><td>16</td></tr>
						<tr><td>17</td><td>18.5</td><td>17.5</td><td>19.2</td><td>16.9</td><td>18.6</td><td>17.5</td></tr>
						<tr><td>12</td><td>10</td><td>16</td><td>17.7</td><td>15.2</td><td>18.6</td><td>17.5</td></tr>
						<tr><td></td></tr>

						</tbody>
					</table>
				</div>
			</div>
			<div id='bugResult'>
				<h2>Eredmények &rsaquo;</h2>
				<div id="graph2"></div>
				<div id="graph"></div>
			</div>
		</div>
	</div>


	<!--THE FOOTER-->
	<?php include('footer.php'); ?>
</div>
</body>
</html>
