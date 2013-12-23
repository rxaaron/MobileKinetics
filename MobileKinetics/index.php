<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="rsc/main.css" type="text/css"/>
        <link rel="shortcut icon" href="rsc/favicon.ico" />
    </head>
    <body>
        <div id="question1" class="blah">
            <button onclick="Test('new');">New Dosing</button>
            <br>
            <button onclick="Test('adjustment');">Adjustment</button>
        </div>
        <div id="newdose" class="gone">New Dose!!!</div>
        <div id="adjustment" class="gone">Adjustment!!!</div>
    </body>
    <script type="text/javascript" src="js/pharmcalc.js"></script>
    <script>
    function Test(one){
        if(one==="new"){
            document.getElementById("newdose").className="blah";
        }else{
            document.getElementById("adjustment").className="blah";
        }
        document.getElementById("question1").className="gone";
    };
    </script>
</html>
