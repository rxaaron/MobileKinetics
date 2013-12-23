<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>
           .blah{-webkit-animation: fadein 0.5s ease-in forwards;}
           @-webkit-keyframes fadein{
            from{opacity:0;}
            to{opacity:1;}
            }
        </style>
    </head>
    <body>
        <p id="testerific">Answer here.</p>
        <input type="text" id="weight" /><br>
        <input type="text" id="height" /><br>
        <button onclick="Test();">Click ME!</button>
        <hr width="480px">
        <div id="bob" style="opacity:0;">
        <h1>Ignore the crap above...</h1>
        Text:<input type="text"><br>
        Email:<input type="email"><br>
        Tel:<input type="tel"><br>
        Number:<input type="number"><br>
        Password:<input type="password"><br>
        Date:<input type="date"><br>
        DateTime:<input type="datetime"><br>
        Month:<input type="month"><br>
        Search:<input type="search"><br>
        </div>
    </body>
    <script type="text/javascript" src="js/pharmcalc.js"></script>
    <script>
    function Test(){
        document.getElementById("bob").className="blah";
    };
    </script>
</html>
