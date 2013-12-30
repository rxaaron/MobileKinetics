<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Encore Dosing Calculator</title>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css" />
        <link rel="stylesheet" href="rsc/side-menu.css" type="text/css" />
        <link rel="stylesheet" href="rsc/pureskin.css" type="text/css" />
        <link rel="shortcut icon" href="rsc/favicon.ico" />
    </head>
    <body class="pure-skin-gmap">
        <div id="layout">
            <div class="pure-top-bar">
                <a>Pharmacokinetics</a>
            </div>
            <a href="#menu" id="menuLink" class="menu-link">
                <span></span>
            </a>
            <div id="menu">
                <div class="pure-menu pure-menu-open">
                    <a class="pure-menu-heading" href="http://gmapserver.grcs.local/kinetics/">Start Over</a>
                    <a class="pure-menu-subheading">New Dose</a>
                    <ul>
                        <li id="newdemolist"><a href="#newdemographics" onclick="divchange('newdemotab','newdemolist');">Demographics</a></li>
                        <li id="goalslist"><a href="#goals" onclick="divchange('goalstab','goalslist');">Goals</a></li>
                        <li id="calculatelist"><a href="#calculateddose" onclick="divchange('calculatetab','calculatelist');">Calculation</a></li>
                        <li id="newplanlist"><a href="#newplan" onclick="divchange('newplantab','newplanlist');">Plan</a></li>
                    </ul>
                    <a class="pure-menu-subheading">Adjustment</a>
                    <ul>
                        <li id="adjdemolist"><a href="#adjdemographics" onclick="divchange('adjdemotab','adjdemolist');">Demographics</a></li>
                        <li id="resultslist"><a href="#results" onclick="divchange('resultstab','resultslist');">Lab Results</a></li>
                        <li id="adjdoselist"><a href="#adjusteddose" onclick="divchange('adjdosetab','adjdoselist');">Adjustment</a></li>
                        <li id="adjplanlist"><a href="#adjplan" onclick="divchange('adjplantab','adjplanlist');">Plan</a></li>
                    </ul>
                    <a class="pure-menu-subheading">Follow-Up</a>
                    <ul>
                        <li id="pknotelist"><a href="#pknote" onclick="divchange('pknotetab','pknotelist');">PK Note <i class="fa fa-signal"></i></a></li>
                    </ul>
                </div>
               
            </div>
            <div class="pure-hidden" id="hiddenfields">
                
            </div>
            <div class="content" id="pages">
                <div class="pure-visible" id="starttab">
                    <h2>Welcome!</h2>
                    <h4>Quick instructions for use:</h4>
                    <ul>
                        <li>Items with <i class="fa fa-signal"></i> require Internet service.</li>
                        <li>There are next and previous buttons at the bottom of each page.</li>
                        <li>You can jump to a specific section by opening the menu using <span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-bars fa-stack-1x fa-inverse"></span></i> in the upper-left.</li>
                        <li>Most of the time you should follow the page order to go forward.  Each new page requires the data from the previous page.</li>
                        <li>Extra information for an item can be found by clicking <i onclick="moreinfo('infoexample','show');" class="fa fa-info-circle"></i> .</li>
                        <div id="infoexample" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infoexample','hide');"></i>The information will appear below the item, similar to this.  Some of the extra information may contain links to outside websites, especially when guidelines are involved.</div>
                        <li><i class="fa fa-envelope"></i> Send questions or comments to <a href="mailto:taylor@myvalleyrx.com">Aaron Taylor</a></li>
                    </ul>
                    
                        <button class="pure-button pure-button-primary pure-button-half-width" onclick="divchange('newdemotab','newdemolist');">New<br>Dosing</button>     
                        <button class=" pure-button-half-width pure-button pure-button-primary" onclick="divchange('adjdemotab','adjdemolist');">Dose<br>Adjustment</button>
                </div>
                <div class="pure-hidden" id="newdemotab">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Demographics</legend>
                            <div class="pure-control-group">
                                <label for="newnursinghome">Nursing Home</label>
                                <select class="pure-input-1" id="newnursinghome">
                                    <option value="brier">The Brier</option>
                                    <option value="manor">Greenbrier Manor</option>
                                    <option value="springfield">Springfield Center</option>
                                </select>
                            </div>
                            <div class="pure-control-group">
                                <label for="newfirstname">First Name</label>
                                <input class="pure-input-1" id="newfirstname" type="text" placeholder="First Name">
                            </div>
                            <div class="pure-control-group">
                                <label for="newlastname">Last Name</label>
                                <input class="pure-input-1" id="newlastname" type="text" placeholder="Last Name">
                            </div>
                            <div class="pure-control-group">
                                <label for="newdob">Date of Birth</label>
                                <input class="pure-input-1" id="newdob" type="date">
                            </div>
                            <div class="pure-control-group">
                                <label for="newheight">Height (inches)</label>
                                <input class="pure-input-1" id="newheight" type="tel" placeholder="Height in Inches">
                            <div class="pure-control-group">
                                <label for="newweight">Weight (pounds)</label>
                                <input class="pure-input-1" id="newweight" type="tel" placeholder="Weight in Pounds">
                            </div>
                                <div class="pure-control-group">    
                                <label for="newscr">Serum Creatinine</label>
                                <input class="pure-input-1" id="newscr" type="number" placeholder="SCr">
                            </div>
                            <div class="pure-control-group">
                                <label for="newdrugchoice">Drug</label>
                                <select class="pure-input-1" id="newdrugchoice">
                                    <option value="vancomycin">Vancomycin</option>
                                    <option value="gentamicin">Gentamicin</option>
                                    <option value="tobramycin">Tobramycin</option>
                                </select>
                            </div>
                        </fieldset>    
                    </form>    
                    <button class="pure-button-full-width pure-button pure-button-primary" onclick="divchange('goalstab','goalslist');">Next<br>(Goal Levels)</button>
                </div>
                <div class="pure-hidden" id="goalstab">
                    <button class="pure-button pure-button-error" onclick="alert(document.getElementById('newscr').value);">SCr Level</button>
                </div>
                <div class="pure-hidden" id="calculatetab">We doing some math here.</div>
                <div class="pure-hidden" id="newplantab">Plan of action for new dosing.</div>
                <div class="pure-hidden" id="adjdemotab">Demographics for our repeat offenders.</div>
                <div class="pure-hidden" id="resultstab">Lab results are entered here.</div>
                <div class="pure-hidden" id="adjdosetab">We see the calculated adjustments.</div>
                <div class="pure-hidden" id="adjplantab">This is the plan for dose adjustments.</div>
                <div class="pure-hidden" id="pknotetab">Hopefully this tab will do something.</div>
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
    </script>
</html>
