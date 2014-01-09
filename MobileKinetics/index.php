<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Encore Dosing Calculator</title>
        <link rel="stylesheet" href="rsc/pure-min.css" />
        <link rel="stylesheet" href="rsc/side-menu.css" type="text/css" />
        <link rel="stylesheet" href="rsc/pureskin.css" type="text/css" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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
                    <a class="pure-menu-heading" href="/kinetics/">Start Over</a>
                    <a class="pure-menu-subheading">New Dose</a>
                    <ul>
                        <li id="newdemolist"><a href="#newdemographics" onclick="divchange('newdemotab','newdemolist');"><i class="fa fa-users"></i> Demographics</a></li>
                        <li id="goalslist"><a href="#goals" onclick="divchange('goalstab','goalslist');"><i class="fa fa-bullseye"></i> Goals</a></li>
                        <li id="calculatelist"><a href="#calculateddose" onclick="divchange('calculatetab','calculatelist');"><i class="fa fa-pencil"></i> Calculations</a></li>
                        <li id="newplanlist"><a href="#newplan" onclick="divchange('newplantab','newplanlist');"><i class="fa fa-list-ol"></i> Plan</a></li>
                    </ul>
                    <a class="pure-menu-subheading">Adjustment</a>
                    <ul>
                        <li id="adjdemolist"><a href="#adjdemographics" onclick="divchange('adjdemotab','adjdemolist');"><i class="fa fa-users"></i> Demographics</a></li>
                        <li id="resultslist"><a href="#results" onclick="divchange('resultstab','resultslist');"><i class="fa fa-tint"></i> Lab Results</a></li>
                        <li id="adjdoselist"><a href="#adjusteddose" onclick="divchange('adjdosetab','adjdoselist');"><i class="fa fa-pencil-square-o"></i> Adjustment</a></li>
                        <li id="adjplanlist"><a href="#adjplan" onclick="divchange('adjplantab','adjplanlist');"><i class="fa fa-list-ol"></i> Plan</a></li>
                    </ul>
                    <a class="pure-menu-subheading">Extra Options</a>
                    <ul>
                        <li id="pknotelist"><a href="#pknote" onclick="divchange('pknotetab','pknotelist');"><i class="fa fa-paperclip"></i> PK Note</a></li>
                        <li id="mathlist"><a href="#maths" onclick="divchange('mathtab','mathlist');"><i class="fa fa-tachometer"></i> Math Details</a></li>
                        <li id="settingslist"><a href="#settings" onclick="divchange('settingstab','settingslist');"><i class="fa fa-cog"></i> Settings</a></li>
                    </ul>
                </div>
               
            </div>
            <div class="content" id="pages">
                <div class="pure-visible" id="starttab">
                    <h2>Welcome!</h2>
                    <h4>Quick instructions for use:</h4>
                    <ul>
                        <li>Do not use the Forward or Back button on your browser.  This is a self-contained page and you will lose your data.</li>
                        <li>Items with <i class="fa fa-signal"></i> require Internet service.</li>
                        <li>Use the buttons in each section to move on to the next section.</li>
                        <li>You can jump to a specific section by opening the menu using <span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-bars fa-stack-1x fa-inverse"></span></i> in the upper-left.</li>
                        <li>Most of the time you should follow the page order to go forward.  Each new page requires the data from the previous page.</li>
                        <li>Extra information for an item can be found by clicking <i onclick="moreinfo('infoexample','show');" class="fa fa-info-circle"></i> .
                        <div id="infoexample" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infoexample','hide');"></i>The information will appear below the item, similar to this.  Some of the extra information may contain links to outside websites.</div></li>
                        <li><i class="fa fa-envelope"></i> Send questions or comments to <a href="mailto:taylor@myvalleyrx.com">Aaron Taylor</a></li>
                    </ul>
                    <form class="pure-form pure-form-stacked">
                        <div class="pure-g-r">
                            <div class="pure-u-1-2">
                                <button class="pure-button pure-button-primary pure-input-1" onclick="divchange('newdemotab','newdemolist');">New<br>Dosing</button>
                            </div>
                            <div class="pure-u-1-2">
                                <button class="pure-input-1 pure-button pure-button-success" onclick="divchange('adjdemotab','adjdemolist');">Dose<br>Adjustment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pure-hidden" id="newdemotab">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Demographics</legend>
                            <div class="pure-g-r">
                                <div class="pure-u-1-2">
                                    <label for="newnursinghome">Nursing Home</label>
                                    <select class="pure-input-1" id="newnursinghome">
                                        <option value="brier">The Brier</option>
                                        <option value="manor">Greenbrier Manor</option>
                                        <option value="springfield">Springfield Center</option>
                                    </select>
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newdrugchoice">Drug</label>
                                    <select class="pure-input-1" id="newdrugchoice">
                                        <option value="vancomycin">Vancomycin</option>
                                        <option value="gentamicin">Gentamicin</option>
                                        <option value="tobramycin">Tobramycin</option>
                                    </select>
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newfirstname">First Name</label>
                                    <input class="pure-input-1" id="newfirstname" type="text" placeholder="First Name">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newlastname">Last Name</label>
                                    <input class="pure-input-1" id="newlastname" type="text" placeholder="Last Name">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newsex">Sex</label>
                                    <select class="pure-input-1" id="newsex">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newdob">Date of Birth</label>
                                    <input class="pure-input-1" id="newdob" type="date" value="1950-01-01">
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="newheight">Height (inches)</label>
                                    <input class="pure-input-1" id="newheight" type="tel" placeholder="Height in Inches" min="0" step="1">
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="newweight">Weight (pounds)</label>
                                    <input class="pure-input-1" id="newweight" type="tel" placeholder="Weight in Pounds" min="0" step="1">
                                </div>
                                    <div class="pure-u-1-3">    
                                    <label for="newscr">Serum Creatinine</label>
                                    <input class="pure-input-1" id="newscr" type="number" placeholder="SCr" min="0" step="0.1">
                                </div>
                            </div>
                        </fieldset>    
                    </form>    
                    <button class="pure-button-full-width pure-button pure-button-primary" onclick="divchange('goalstab','goalslist');mathLogic('new');">Next<br>(Goal Levels)</button>
                </div>
                <div class="pure-hidden" id="goalstab">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Concentration Goals</legend>
                            <div class="pure-g-r">
                                <div class="pure-u-1-2">
                                    <label for="newgoalpk">Goal Peak</label>
                                    <input class="pure-input-1" id="newgoalpk" type="number" placeholder="Peak" min="0" step="1">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newgoaltr">Goal Trough</label>
                                    <input class="pure-input-1" id="newgoaltr" type="number" placeholder="Trough" min="0" step="0.5">
                                </div>
                                <div class="pure-u-1-2">
                                    <button class="pure-input-1 pure-button pure-button-error" onclick="divchange('newdemotab','newdemolist');">Back<br>(Demographics)</button>
                                </div>
                                <div class="pure-u-1-2">
                                    <button class="pure-input-1 pure-button pure-button-primary" onclick="CalculateNewDose(); divchange('calculatetab','calculatelist')">Next<br>(Calculate Dose)</button>
                                </div>
                            </div>
                            <p id="agextintp" class="form-disabled">Patient is candidate for extended interval dosing: <span id='extintok'class='nope'></span> <button id='extintgobtn'class='pure-hidden' onclick="GoExtInt();divchange('newplantab','newplanlist');">Calculate</button></p>
                        </fieldset>
                    </form>
                    <h2>Dosing Hints</h2>
                    <ul>
                        <li>Vancomycin:
                            <ul>
                                <li>Goal Peak ranges from 20&ndash;40 mg/L. Use 35 mg/L if not sure. <i onclick="moreinfo('infovancpk','show');" class="fa fa-info-circle"></i>
                        <div id="infovancpk" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infovancpk','hide');"></i>Guidelines do not monitor peak levels.  Vancomycin's bacteria killing comes from keeping the trough level continually above MIC, therefore goal peak is mostly for calculation purposes.</div></li>
                                <li>Goal Trough should always be above 10 mg/L.  Standard range is 10&ndash;15 mg/L. <i onclick="moreinfo('infovanctr1','show');" class="fa fa-info-circle"></i>
                        <div id="infovanctr1" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infovanctr1','hide');"></i>These goals assume an MIC of less than 1 mg/L.</div></li>
                                <li>Goal trough range for complicated infections is 15&ndash;20 mg/L. <i onclick="moreinfo('infovanctr2','show');" class="fa fa-info-circle"></i>
                                    <div id="infovanctr2" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infovanctr2','hide');"></i>Examples of complicated infections:<ul><li>Bacteremia</li><li>Endocarditis</li><li>Osteomyelitis</li><li>Meningitis</li><li>Hospital Acquired Staphylococcus Aureus Pneumonia</li></ul></div></li>
                            </ul>
                        </li>
                        <li>Gentamicin / Tobramycin: <i onclick="moreinfo('infoag','show');" class="fa fa-info-circle"></i>
                            <div id="infoag" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infoag','hide');"></i>These drugs share the same goals and kinetics.</div>
                            <ul>
                                <li>Use Extended Interval dosing if possible.</li>
                                <li>Use traditional dosing if kidney status is extremely volatile or unknown.</li>
                                <li>Traditional Goal Peak varies by indication:  <i onclick="moreinfo('infoagpk','show');" class="fa fa-info-circle"></i>
                                    <div id="infoagpk" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infoagpk','hide');"></i>
                                        <div class='pure-g'>
                                            <div class='pure-u-1-2'>Urinary Tract Infections:</div><div class='pure-u-1-2'><b>4&ndash;6 mg/L</b></div>
                                            <div class='pure-u-1-2'>Bacteremia:</div><div class='pure-u-1-2'><b>6&ndash;8 mg/L</b></div>
                                            <div class='pure-u-1-2'>Skin and Soft Tissue:</div><div class='pure-u-1-2'><b>6&ndash;8 mg/L</b></div>
                                            <div class='pure-u-1-2'>Serious Infections:</div><div class='pure-u-1-2'><b>6&ndash;8 mg/L</b></div>
                                            <div class='pure-u-1-2'>Pneumonia:</div><div class='pure-u-1-2'><b>8&ndash;10 mg/L</b></div>
                                            <div class='pure-u-1-2'>Meningitis:</div><div class='pure-u-1-2'><b>8&ndash;10 mg/L</b></div>
                                            <div class='pure-u-1-2'>Life Threatening Infections:</div><div class='pure-u-1-2'><b>8&ndash;10 mg/L</b></div>
                                        </div>
                                    </div>
                                </li>
                                <li>Traditional Trough range is 0.5&ndash;2 mg/L. <i onclick="moreinfo('infoagtr','show');" class="fa fa-info-circle"></i>
                                    <div id="infoagtr" class="info-hidden"><i class="fa fa-times info-close" onclick="moreinfo('infoagtr','hide');"></i>
                                        Use 1 mg/L as your goal if unsure.
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="pure-hidden" id="calculatetab">
                    <div class="info-hidden" id="newvanc1g">
                        <h4><i class="fa fa-exclamation-circle"></i> Choose one of these options if within range.  If not, see below.</h4>
                        <form class="pure-form pure-form-stacked">
                            <div class="pure-g-r">
                                <div class="pure-u-1-2">
                                    <button class="pure-button pure-button-secondary pure-input-1">1000 mg every 12 hours<br>peak = <output class="math-result" id="vnpk12">N/A</output> trough = <output class="math-result" id="vntr12">N/A</output></button>
                                </div>
                                <div class="pure-u-1-2">
                                    <button class="pure-button pure-button-tertiary pure-input-1">1000 mg every 24 hours<br>peak = <output class="math-result" id="vnpk24">N/A</output> trough = <output class="math-result" id="vntr24">N/A</output></button>
                                </div>
                                <div class="pure-u-1-2">
                                    <button class="pure-button pure-button-secondary pure-input-1">1000 mg every 36 hours<br>peak = <output class="math-result" id="vnpk36">N/A</output> trough = <output class="math-result" id="vntr36">N/A</output></button>
                                </div>
                                <div class="pure-u-1-2">
                                    <button class="pure-button pure-button-tertiary pure-input-1">1000 mg every 48 hours<br>peak = <output class="math-result" id="vnpk48">N/A</output> trough = <output class="math-result" id="vntr48">N/A</output></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Calculated Dosing</legend>
                            <div class="pure-g-r">
                                <div class="pure-u-1-2">
                                    <label for="newcalcdose">Dose (mg)</label>
                                    <input class="pure-input-1" type="number" id="newcalcdose" placeholder="Dose" step="1" oninput="PredictLevels();">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="newcalcfreq">Frequency (hours)</label>
                                    <input class="pure-input-1" type="number" id="newcalcfreq" placeholder="Frequency" step="12" oninput="PredictLevels();">
                                </div>
                                <div class="pure-u-1-2">
                                    Predicted Peak: <output class="math-result" id="newcalcpk"></output>
                                </div>
                                <div class="pure-u-1-2">
                                    Predicted Trough: <output class="math-result" id="newcalctr"></output>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="pure-hidden" id="newplantab">Plan of action for new dosing.</div>
                <div class="pure-hidden" id="adjdemotab">Demographics for our repeat offenders.</div>
                <div class="pure-hidden" id="resultstab">Lab results are entered here.</div>
                <div class="pure-hidden" id="adjdosetab">We see the calculated adjustments.</div>
                <div class="pure-hidden" id="adjplantab">This is the plan for dose adjustments.</div>
                <div class="pure-hidden" id="pknotetab">Hopefully this tab will do something.</div>
                <div class="pure-hidden" id="mathtab">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Calculated Values</legend>
                            <div class="pure-g-r">
                                <div class="pure-u-1-3">
                                    <label for="DBW">Dosing Body Weight (kg)</label>
                                    <input class="pure-input-1" id="DBW" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="BSA">Body Surface Area (m<sup>2</sup>)</label>
                                    <input class="pure-input-1" id="BSA" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="BMI">Body Mass Index</label>
                                    <input class="pure-input-1" id="BMI" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="CrCl">Creatinine Clearance (ml/min)</label>
                                    <input class="pure-input-1" id="CrCl" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="CrClStd">Standardized Creatinine Clearance (ml/min/1.73m<sup>2</sup>)</label>
                                    <input class="pure-input-1" id="CrClStd" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="estVd">Estimated Volume of Distribution</label>
                                    <input class="pure-input-1" id="estVd" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="estK">Estimated Elimination Rate Constant [k]</label>
                                    <input class="pure-input-1" id="estK" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="estTpoint5">Estimated Half-Life [t&frac12;]</label>
                                    <input class="pure-input-1" id="estTpoint5" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="actualVd">Actual Volume of Distribution</label>
                                    <input class="pure-input-1" id="actualVd" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="actualK">Actual Elimination Rate Constant [k]</label>
                                    <input class="pure-input-1" id="actualK" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                                <div class="pure-u-1-3">
                                    <label for="actualTpoint5">Actual Half-Life [t&frac12;]</label>
                                    <input class="pure-input-1" id="actualTpoint5" type="text" placeholder="To Be Calculated" readonly>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="pure-hidden" id="settingstab">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
                            <legend>Settings</legend>
                            <div class="pure-g-r">
                                <div class="pure-u-1-2">
                                    <label for="vancVConstant">Vancomycin Population Vd Constant (L/kg)</label>
                                    <input class="pure-input-1" id="vancVConstant" type="text" value="0.7">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="vancRound">Round Vancomycin Dosing To (mg)</label>
                                    <input class="pure-input-1" id="vancRound" type="text" value="250">
                                </div> 
                                <div class="pure-u-1-2">
                                    <label for="vancPeakDraw">Vancomycin Peak Draw Time (hours)</label>
                                    <input class="pure-input-1" id="vancPeakDraw" type="text" value="3">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="vancInfusionTime">Vancomycin Infusion Time (hours)</label>
                                    <input class="pure-input-1" id="vancInfusionTime" type="text" value="2">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="agVConstant">Aminoglycosides Population Vd Constant (L/kg)</label>
                                    <input class="pure-input-1" id="agVConstant" type="text" value="0.25">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="agRound">Round Aminoglycoside Dosing To (mg)</label>
                                    <input class="pure-input-1" id="agRound" type="text" value="20">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="agPeakDraw">Aminoglycosides Peak Draw Time (hours)</label>
                                    <input class="pure-input-1" id="agPeakDraw" type="text" value="1">
                                </div>
                                <div class="pure-u-1-2">
                                    <label for="agInfusionTime">Aminoglycoside Infusion Time (hours)</label>
                                    <input class="pure-input-1" id="agInfusionTime" type="text" value="0.5">
                                </div>
                            </div>
                        </fieldset>    
                    </form>
                </div>
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
