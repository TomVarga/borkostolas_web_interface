<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
    <title>Borkóstolás</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen, print, projection" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- <script type="text/javascript" src="Chart.min.js"></script> -->
    <!-- <script type="text/javascript" src="Legend.js"></script> -->
    <script type="text/javascript" src="http://numericjs.com/lib/numeric-1.2.6.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            getMyScores(document.getElementById('user_id').innerHTML, document.getElementById('user_name').innerHTML.trim());
        });
        google.load('visualization', '1.0', {'packages':['corechart']});
        // google.setOnLoadCallback(drawChart);
        var nMaxSize = 10000;
        var algoritmusok = [
            ["hits", "CoHITS"],
            ["hamming", "Hamming"],
            ["cosine", "Koszinusz"],
            ["precedence", "Precedencia"],
            ["adjacency", "Összefüggőségi"],
            ["positional", "Pozíció szerint"]
        ];
        function getAlgoritmusName(algoritmus){
            for (i = 0; i< algoritmusok.length; i++){
                if ( algoritmusok[i][0] == algoritmus ){
                    return algoritmusok[i][1];
                }
            }
            return "Ismeretlen";
        }
        function clearResults(){
            // clear graphs
            var graph = document.getElementById("graph");
            while (graph.hasChildNodes()) {
                graph.removeChild(graph.lastChild);
            }
            var graph = document.getElementById("graph2");
            while (graph.hasChildNodes()) {
                graph.removeChild(graph.lastChild);
            }

            // clear textResults
            var textResult = document.getElementById("textResult");
            while (textResult.hasChildNodes()) {
                textResult.removeChild(textResult.lastChild);
            }
            var textResult = document.getElementById("textResult2");
            while (textResult.hasChildNodes()) {
                textResult.removeChild(textResult.lastChild);
            }

        }
        function drawChart(graphData, graphData2) {
            // alert(graphData);
            // alert(graphData2[1]);
            graphData[1] = graphData2[1];

            var data = google.visualization.arrayToDataTable(graphData);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" }
            ]);
            var options = {
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById("graph"));
            chart.draw(view, options);

            // var chart = new google.visualization.BarChart(document.getElementById('graph'));
            // chart.draw(data, options);
        }
        function drawChart2(graphData){
            // alert(JSON.stringify(graphData));
            // google.load('visualization', '1.0', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            // google.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.

            // Create the data table.
            // var data = google.visualization.arrayToDataTable(
            // 	var a = [
            // 	['Kóstoló', 'CoHITS'],
            // 	['tom',  18.472],
            // 	['6. kóstoló',  100.000],
            // 	['7. kóstoló',  95.321],
            // 	['8. kóstoló',  94.209],
            // 	['9. kóstoló',  90.758],
            // 	['10. kóstoló',  91.243],
            // 	['11. kóstoló',  96.965],
            // 	['12. kóstoló',  99.031],
            // ];
            // document.getElementById('result').innerHTML = JSON.stringify(graphData);
            // );
            var data = google.visualization.arrayToDataTable(graphData);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" }
            ]);
            var options = {
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.BarChart(document.getElementById("graph2"));
            chart.draw(view, options);

            // var chart = new google.visualization.BarChart(document.getElementById('graph'));
            // chart.draw(data, options);

        }
        function addTextResultHeader(){
            var textResult = document.getElementById("textResult");
            var p = document.createElement('p');
            var h2 = document.createElement('h2');
            h2.innerHTML = " Eredmény ›";
            p.appendChild(h2);
            textResult.appendChild(p);
        }
        function addTextResult2Header(){
            var textResult = document.getElementById("textResult2");
            var p = document.createElement('p');
            var h2 = document.createElement('h2');
            h2.innerHTML = " Csak az általad értékeltek alapján ›";
            p.appendChild(h2);
            textResult.appendChild(p);
        }
        function getData2(returnArray, graphData2){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){

                    // document.getElementById("result").innerHTML = xmlhttp.responseText;

                    var algoritmus = returnArray[2];
                    if (algoritmus == "hits"){
                        // alert(xmlhttp.responseText);
                        var data = JSON.parse(xmlhttp.responseText);
                        // let the users client calculate eigenvalues and vectors.
                        var B = numeric.eig(numeric.transpose(data.matrix));

                        var xmlhttpEIG=new XMLHttpRequest();
                        xmlhttpEIG.onreadystatechange=function(){
                            if (xmlhttpEIG.readyState==4 && xmlhttpEIG.status==200){
                                // var response = JSON.parse(xmlhttpEIG.responseText);
                                var CoHITS = JSON.parse(xmlhttpEIG.responseText);

                                var tCorrelation = data.tCorrelation;
                                var tSumOfDiff = data.tSumOfDiff;

                                var bZeroCollerlationFound = false;
                                for (var i = 0; i < tCorrelation.length; i++) {
                                    if (tCorrelation[i] == 0){
                                        bZeroCollerlationFound = true;
                                        break;
                                    }
                                };
                                // norm to hundred
                                var max = Math.max.apply(null, CoHITS);
                                for (var i=0; i < CoHITS.length; i++){
                                    CoHITS[i] = (CoHITS[i]/max*100);
                                }
                                // alert(max);
                                // var graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}]};
                                var graphData = [['Kóstoló', getAlgoritmusName(algoritmus)]];
                                for (var i=0; i < CoHITS.length; i++){
                                    graphData[graphData.length] = [data.tOrderOfTasters[i],+CoHITS[i].toFixed(3)];
                                }
                                // alert(graphData);
                                // var graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}, {label: 'Korreláció', data: tCorrelation}, {label: 'Különbségek átlaga', data: tSumOfDiff}]};
                                // if (bZeroCollerlationFound){
                                // 	graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}, {label: 'Különbségek átlaga', data: tSumOfDiff}]};
                                // }
                                // alert(tCorrelation);;
                                clearResults();
                                addTextResultHeader();
                                drawChart2(graphData);
                                addTextResult2Header();
                                drawChart(graphData2, graphData);

                                // document.getElementById("result").innerHTML = JSON.stringify(tSumOfDiff);
                            }
                        }
                        xmlhttpEIG.open("POST","../CoHITS_from_eig.php?q="+JSON.stringify(B),false);
                        xmlhttpEIG.send();
                    } else {
                        // alert(xmlhttp.responseText);
                        var response = JSON.parse(xmlhttp.responseText);
                        var array=[];
                        for(a in response){
                            array.push([a,response[a]])
                        }
                        var graphData = [['Kóstoló', getAlgoritmusName(algoritmus)]];
                        for (var i=0; i < array.length; i++){
                            graphData[graphData.length] = [array[i][0],+array[i][1].toFixed(3)];
                        }
                        clearResults();
                        addTextResultHeader();
                        drawChart2(graphData);
                        addTextResult2Header();
                        drawChart(graphData2, graphData);

                    }
                }
            }
            xmlhttp.open("POST","../demo.php?q="+JSON.stringify(returnArray),false);
            xmlhttp.send();
        }
        function getData(returnArray, returnArray2){
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){

                    // document.getElementById("result").innerHTML = xmlhttp.responseText;

                    var algoritmus = returnArray[2];
                    if (algoritmus == "hits"){
//                        alert(xmlhttp.responseText);
                        var data = JSON.parse(xmlhttp.responseText);
                        // let the users client calculate eigenvalues and vectors.
                        var B = numeric.eig(numeric.transpose(data.matrix));

                        var xmlhttpEIG=new XMLHttpRequest();
                        xmlhttpEIG.onreadystatechange=function(){
                            if (xmlhttpEIG.readyState==4 && xmlhttpEIG.status==200){
                                // var response = JSON.parse(xmlhttpEIG.responseText);
                                var CoHITS = JSON.parse(xmlhttpEIG.responseText);

                                var tCorrelation = data.tCorrelation;
                                var tSumOfDiff = data.tSumOfDiff;

                                var bZeroCollerlationFound = false;
                                for (var i = 0; i < tCorrelation.length; i++) {
                                    if (tCorrelation[i] == 0){
                                        bZeroCollerlationFound = true;
                                        break;
                                    }
                                };
                                // norm to hundred
                                var max = Math.max.apply(null, CoHITS);
                                for (var i=0; i < CoHITS.length; i++){
                                    CoHITS[i] = (CoHITS[i]/max*100);
                                }
//                                alert(max);
                                // var graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}]};
                                var graphData = [['Kóstoló', getAlgoritmusName(algoritmus)]];
                                for (var i=0; i < CoHITS.length; i++){
                                    graphData[graphData.length] = [data.tOrderOfTasters[i],+CoHITS[i].toFixed(3)];
                                }
                                // alert(graphData);
                                // var graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}, {label: 'Korreláció', data: tCorrelation}, {label: 'Különbségek átlaga', data: tSumOfDiff}]};
                                // if (bZeroCollerlationFound){
                                // 	graphData = {labels: data.tOrderOfTasters, datasets: [{label: 'CoHITS', data: CoHITS}, {label: 'Különbségek átlaga', data: tSumOfDiff}]};
                                // }
                                // alert(tCorrelation);;
                                // clearResults();
                                // addTextResultHeader();
                                // drawChart2(graphData);
                                // addTextResult2Header();
                                // drawChart(graphData[1]);
                                getData2(returnArray2, graphData);
                                // document.getElementById("result").innerHTML = JSON.stringify(tSumOfDiff);
                            }
                        }
                        xmlhttpEIG.open("POST","../CoHITS_from_eig.php?q="+JSON.stringify(B),false);
                        xmlhttpEIG.send();
                    } else {
                        // alert(xmlhttp.responseText);
                        var response = JSON.parse(xmlhttp.responseText);
                        var array=[];
                        for(a in response){
                            array.push([a,response[a]])
                        }
                        var graphData = [['Kóstoló', getAlgoritmusName(algoritmus)]];
                        for (var i=0; i < array.length; i++){
                            graphData[graphData.length] = [array[i][0],+array[i][1].toFixed(3)];
                        }
                        getData2(returnArray2, graphData);
                        // array.sort(function(a,b){return a[1] - b[1]});
                        // array.reverse();
                        // // alert(array[0][0]);
                        // clearResults();
                        // addTextResultHeader();

                        // var tbl = document.createElement('table');
                        // var thead = document.createElement('thead');
                        // var trHead = document.createElement('tr');
                        // var th = document.createElement("th");
                        // th.appendChild(document.createTextNode("#"));
                        // trHead.appendChild(th);
                        // var th = document.createElement("th");
                        // th.appendChild(document.createTextNode("Név"));
                        // trHead.appendChild(th);
                        // var th = document.createElement("th");
                        // th.appendChild(document.createTextNode("Értékelés"));
                        // trHead.appendChild(th);
                        // thead.appendChild(trHead);
                        // tbl.appendChild(thead);

                        // var nKostolok = array.length;
                        // var tbdy=document.createElement('tbody');
                        // for (i=0;i<nKostolok;i++){
                        // 	var tr=document.createElement('tr');
                        // 	var td=document.createElement('td');
                        // 	td.appendChild(document.createTextNode((i+1)+"."));
                        // 	tr.appendChild(td);
                        // 	var td=document.createElement('td');
                        // 	td.appendChild(document.createTextNode(array[i][0]));
                        // 	tr.appendChild(td);
                        // 	var td=document.createElement('td');
                        // 	td.appendChild(document.createTextNode(array[i][1]));
                        // 	tr.appendChild(td);
                        // 	tbdy.appendChild(tr);
                        // }
                        // tbl.appendChild(tbdy);

                        // document.getElementById("textResult").appendChild(tbl);
                    }
                }
            }
            xmlhttp.open("POST","../demo.php?q="+JSON.stringify(returnArray),false);
            xmlhttp.send();
        }
        function getMyScores(user_id, user_name){
            var result = document.getElementById("result");
//            result.appendChild(document.createTextNode(user_id));
            var nKostolok = 7;
            var nBorok = 0;
            var tempArray = [];
            tempArray[tempArray.length] = user_name;

            var response;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    response = xmlhttp.responseText;
                } else {

                    return;
                }
            }
            xmlhttp.open("POST","../getWineScoresForUser.php?user_id="+JSON.stringify(user_id),false);
            xmlhttp.send();
            response = JSON.parse(response);

            var map = {};
            var maxId = parseInt(response[0].wine_id);
            for (i=0;i<response.length;i++){
                var wine_id = parseInt(response[i].wine_id);
                map[wine_id] = response[i].score;
                if (wine_id > maxId) maxId = wine_id;

            }
            for (i=1;i<=maxId;i++){
                if(map[i]){
                    tempArray[tempArray.length] = map[i];
                }else{
                    tempArray[tempArray.length] = "";
                }
            }

            nBorok = maxId;

            var response;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    response = JSON.parse(xmlhttp.responseText);
                } else {
                    return;
                }
            }
            xmlhttp.open("POST","../getWiredInScores.php",false);
            xmlhttp.send();

            var nTastedBorokBySelf = 0;
            var tempArray3 = [];
            for (i=0; i < tempArray.length;i++){
                if (tempArray[i] != ""){
                    tempArray3[tempArray3.length] = tempArray[i];
                    nTastedBorokBySelf++;
                }
            }
            nTastedBorokBySelf--;

            var tempArray2 = [];
            for (var taster in response){
                if (response.hasOwnProperty(taster)) {
                    tempArray2[tempArray2.length] = (taster+('. Kóstoló'));
                    tempArray[tempArray.length] = (taster+('. Kóstoló'));
                    for (var i=1; i <= nBorok; i++){
                        if (response[taster][i] == null){
                            if (tempArray[i] != ""){
                                tempArray2[tempArray2.length] = "";
                            }
                            tempArray[tempArray.length] = "";
                        } else {
                            if (tempArray[i] != ""){
                                tempArray2[tempArray2.length] = JSON.stringify(response[taster][i]);
                            }
                            tempArray[tempArray.length] = JSON.stringify(response[taster][i]);
                        }
                    }
                }
            }

            var returnArray = [ nKostolok+1, nBorok, 'hits' ];
            var returnArray2 = [ nKostolok+1, nTastedBorokBySelf, 'hits' ];
            returnArray2.push.apply(returnArray2, tempArray3);

            returnArray2.push.apply(returnArray2, tempArray2);
            returnArray.push.apply(returnArray, tempArray); // teljes adatsor
//            alert(tempArray2);
//            alert(JSON.stringify(map));
//            result.appendChild(document.createTextNode(tempArray));
            getData(returnArray, returnArray2);


        }
        function submitMyScores(user_name){
            var nKostolok = 7;
            var nBorok = 0;
            var tempArray = [];
            tempArray[tempArray.length] = user_name;
            for (i=1;i<nMaxSize;i++) {
                var bor_score_i = document.getElementById('wine_score_'+i);
                if (!bor_score_i){
                    break;
                }
                nBorok = i;

                var bor_score_i_value = bor_score_i.value;
                //  validate values here
                if (isNaN(bor_score_i_value)){
                    alert("Az " + i + ". bor pontszáma nem megfelelő formátumú! (Számnak kell lennie, vagy üresen kell hagyni)")
                    return;
                } else {
                    if (bor_score_i_value > 99999.999 ){
                        alert("Az " + i + ". bor pontszáma nem megfelelő formátumú! (túl nagy, kisebbnek kell lennie mint 99999.999)")
                        return;
                    }
                    var nDecPrec = getDecPrec(bor_score_i_value);
                    if (nDecPrec > 3){
                        alert("Az " + i + ". bor pontszáma nem megfelelő formátumú! (túl sok a decimálisjegy, maximum 3 tizedes jegy pontosság engedélyezett)")
                        return;
                    }
                }
                tempArray[tempArray.length] = bor_score_i_value.trim();
            }
            // nBorok--;

            var response;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    response = xmlhttp.responseText;
                } else {

                    return;
                }
            }
            xmlhttp.open("POST","addWineScoresToDB.php?q="+JSON.stringify(tempArray),false);
            xmlhttp.send();
            // document.getElementById("result").innerHTML = response;

            var response;
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    response = JSON.parse(xmlhttp.responseText);
                } else {
                    return;
                }
            }
            xmlhttp.open("POST","getWiredInScores.php",false);
            xmlhttp.send();

            var nTastedBorokBySelf = 0;
            var tempArray3 = [];
            for (i=0; i < tempArray.length;i++){
                if (tempArray[i] != ""){
                    tempArray3[tempArray3.length] = tempArray[i];
                    nTastedBorokBySelf++;
                }
            }
            nTastedBorokBySelf--;

            var tempArray2 = [];
            for (var taster in response){
                if (response.hasOwnProperty(taster)) {
                    tempArray2[tempArray2.length] = (taster+('. Kóstoló'));
                    tempArray[tempArray.length] = (taster+('. Kóstoló'));
                    for (var i=1; i <= nBorok; i++){
                        if (response[taster][i] == null){
                            if (tempArray[i] != ""){
                                tempArray2[tempArray2.length] = "";
                            }
                            tempArray[tempArray.length] = "";
                        } else {
                            if (tempArray[i] != ""){
                                tempArray2[tempArray2.length] = JSON.stringify(response[taster][i]);
                            }
                            tempArray[tempArray.length] = JSON.stringify(response[taster][i]);
                        }
                    }
                }
            }
//            alert(tempArray);
            var returnArray = [ nKostolok+1, nBorok, 'hits' ];
            var returnArray2 = [ nKostolok+1, nTastedBorokBySelf, 'hits' ];
            returnArray2.push.apply(returnArray2, tempArray3);
            returnArray2.push.apply(returnArray2, tempArray2);
            returnArray.push.apply(returnArray, tempArray); // teljes adatsor
//            alert(returnArray2);
            getData(returnArray, returnArray2);


        }


    </script>
</head>
<body>
    <select id='algoritmus' name='Algoritmus'>
        <option value='hits'>Co_HITS</option>

        <option value='hamming'>Hamming</option>
        <option value='cosine'>Koszinusz</option>
        <option value='precedence'>Precedencia</option>
        <option value='adjacency'>Összefüggőségi</option>
        <option value='positional'>Pozíció szerint</option>
        <!--<option value='sajat'>Saját</option>-->
    </select>
    <div id="user_id" hidden="true">
        <?php
            $user_id = $_REQUEST['user_id'];
            $user_id = 3;
            print_r($user_id);
        ?>
    </div>
    <div id="user_name" hidden="true">
        <?
            $user_name = "";
            include_once("dbUtils.php");
            $user_name = getUserName($user_id);
            print_r($user_name);
        ?>
    </div>
<?php
    $p = print_r;
//    include_once("../getWineScoresForUser.php");
//    $user_name = "tom";
//    $p(getScoresByUserName($user_name));


    $p("asadf");
?>
    <div id="result">
        <div id="textResult" class="textResult"></div>
        <div id="graph" class="graph"></div>
        <div id="textResult2" class="textResult"></div>
        <div id="graph2" class="graph"></div>
    </div>
</body>
</html>