<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="rsc/main.css" type="text/css" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css" />
        <link rel="stylesheet" href="rsc/pureskin.css" type="text/css" />
        <link rel="stylesheet" href="rsc/side-menu.css" type="text/css" />
        <link rel="shortcut icon" href="rsc/favicon.ico" />
    </head>
    <body class="pure-skin-gmap">
        <div id="layout">
            <div class="pure-top-bar"><a>Pharmacokinetics</a></div>
            <a href="#menu" id="menuLink" class="menu-link">
                <span></span>
            </a>
            <div id="menu">
                <div class="pure-menu pure-menu-open">
                    <a class="pure-menu-heading" href="http://gmapserver.grcs.local/kinetics/">Home</a>
                    
                    <ul>
                        <li><a href="#bob">Bob</a></li>
                        <li><a href="#tom">Tom</a></li>
                    </ul>
                    <a class="pure-menu-subheading">Oh Yeah!</a>
                    <ul>
                        <li class="menu-item-divided"><a id="jimjim" href="#jim" onclick="bob(this.id);">Jim</a></li>
                        <li><a class="pure-menu-subheading" href="#whynot">Why Not?</a></li>
                    </ul>
                </div>
               
            </div>
                 <div class="content">
                    <div id="jimmy" style="display:none;">Not Here!!</div>
                </div>
        </div>
    </body>
    <script type="text/javascript" src="js/pharmcalc.js"></script>
    <script type="text/javascript" src="js/ui.js"></script>
    <script>
    function bob(jj){
        var jjclass = document.getElementById(jj).className;
        document.getElementById(jj).className=jjclass + ' pure-menu-selected';
        document.getElementById('jimmy').style.display = "block";
    }
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
