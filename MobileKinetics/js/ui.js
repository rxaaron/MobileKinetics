(function (window, document) {

    var layout   = document.getElementById('layout'),
        menu     = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for(; i < length; i++) {
          if (classes[i] === className) {
            classes.splice(i, 1);
            break;
          }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    };

}(this, this.document));

function divchange(fadein,menuselect){
    var hidedivs = document.getElementById('pages').getElementsByTagName('div');
    for(var i=0; i<hidedivs.length; i++){
        if(hidedivs[i].className==='pure-visible'){
            hidedivs[i].className='pure-hidden';
        }
    }
    setTimeout(function(){window.scroll(0,0);},210);
    setTimeout(function(){document.getElementById(fadein).className="pure-visible";},225);
    var clearmenu = document.getElementById('menu').getElementsByTagName('li');
    for(var j=0; j<clearmenu.length; j++){
        clearmenu[j].className='';
    }
    document.getElementById(menuselect).className='pure-menu-selected';
    
};

function moreinfo(divname,action){
    if(action==="show"){
        document.getElementById(divname).className='info-visible';
    }else if(action==="hide"){
        document.getElementById(divname).className='info-hidden';
    }
}

function mathLogic(prefix){
    var drug = document.getElementById(prefix + 'drugchoice').value;
    var sex = document.getElementById(prefix + 'sex').value;
    var age = CalculateAge(document.getElementById(prefix + 'dob').value);
    var heightInches = document.getElementById(prefix + 'height').value;
    var weightPounds = document.getElementById(prefix + 'weight').value;
    var weightKilograms = PoundsToKilograms(weightPounds);
    var LabSerumCreatinine = document.getElementById(prefix + 'scr').value;
    var SerumCreatinine = 0;
    var DBW = 0;
    var BSA = 0;
    var BMI = 0;
    var CrCl = 0;
    var CrClStd = 0;
    var Vd = 0;
    var k = 0;
    var tpoint5 = 0;
    
    if(LabSerumCreatinine!==''){
        SerumCreatinine = Math.round(IDMSCorrection(LabSerumCreatinine) * 10) / 10;
    }
    
    if(heightInches!=='' && weightKilograms!=='' && sex!==''){
        DBW = Math.round(DosingWeight(heightInches,weightKilograms,sex) * 10) / 10;
        document.getElementById('DBW').value = DBW;
        BSA = Math.round(BodySurfaceArea(weightKilograms,heightInches) * 10) / 10;
        document.getElementById('BSA').value = BSA;
        BMI = Math.round(BodyMassIndex(weightKilograms,heightInches) * 10) / 10;
        document.getElementById('BMI').value = BMI;
    }
    if(DBW!==0 && age!==0 && SerumCreatinine!=='' && sex!==''){
        CrCl = Math.round(CCG(age,DBW,SerumCreatinine,sex) * 10) / 10;
        document.getElementById('CrCl').value = CrCl;
        CrClStd = Math.round(StandardizedCrCl(CrCl,BSA) * 10) / 10;
        document.getElementById('CrClStd').value = CrClStd;
    }
    if(drug!=='' && DBW!==0){
        if(drug==='vancomycin'){
            Vd = Math.round(EstVolumeOfDistribution(document.getElementById('vancVConstant').value,weightKilograms) * 100) / 100;
            document.getElementById('estVd').value = Vd;
            k = Math.round(VancomycinEstK(CrCl) * 1000) / 1000;
            document.getElementById('estK').value = k;
            document.getElementById('agextintp').className='form-disabled';
            document.getElementById('extintok').className='nope';
            document.getElementById('extintgobtn').className='pure-hidden';
        }else if(drug==='gentamicin'){
            Vd = Math.round(EstVolumeOfDistribution(document.getElementById('agVConstant').value,weightKilograms) * 100) / 100;
            document.getElementById('estVd').value = Vd;
            k = Math.round(AminoglycosideEstK(CrCl) * 1000) / 1000;
            document.getElementById('estK').value = k;
            document.getElementById('agextintp').className='';
            if(AgExtIntInitialInterval(CrCl)>0){
                document.getElementById('extintok').className='yep';
                document.getElementById('extintgobtn').className='pure-button pure-button-success';
            }else{
                document.getElementById('extintok').className='nope';
                document.getElementById('extintgobtn').className='pure-hidden';
            }
        }else if(drug==='tobramycin'){
            Vd = Math.round(EstVolumeOfDistribution(document.getElementById('agVConstant').value,weightKilograms) * 100) / 100;
            document.getElementById('estVd').value = Vd;
            k = Math.round(AminoglycosideEstK(CrCl) * 1000) / 1000;
            document.getElementById('estK').value = k;
            document.getElementById('agextintp').className='';
            if(AgExtIntInitialInterval(CrCl)>0){
                document.getElementById('extintok').className='yep';
                document.getElementById('extintgobtn').className='pure-button pure-button-success';
            }else{
                document.getElementById('extintok').className='nope';
                document.getElementById('extintgobtn').className='pure-hidden';
            }
        }
        tpoint5 = Math.round(HalfLife(k) * 10) / 10;
        document.getElementById('estTpoint5').value = tpoint5;
    }
};

function GoExtInt(){
    
};

function CalculateNewDose(){
    var drug = document.getElementById('newdrugchoice').value;
    var PeakTime;
    var DoseRound;
    var InfusionTime;
    if(drug==='vancomycin'){
        PeakTime = document.getElementById('vancPeakDraw').value;
        DoseRound = document.getElementById('vancRound').value;
        InfusionTime = document.getElementById('vancInfusionTime').value;
    }else if(drug==='gentamicin'){
        PeakTime = document.getElementById('agPeakDraw').value;
        DoseRound = document.getElementById('agRound').value;
        InfusionTime = document.getElementById('agInfusionTime').value;
    }else if(drug==='tobramycin'){
        PeakTime = document.getElementById('agPeakDraw').value;
        DoseRound = document.getElementById('agRound').value;
        InfusionTime = document.getElementById('agInfusionTime').value;
    }
    var Frequency = Math.round(CalculateInterval(document.getElementById('newgoaltr').value,document.getElementById('newgoalpk').value,document.getElementById('estK').value,PeakTime) * 10) / 10;
    document.getElementById('newcalcfreq').value = Frequency;
    
    var Dose = Math.round(CalculateDose(document.getElementById('newgoalpk').value, document.getElementById('estVd').value, document.getElementById('estK').value, Frequency, InfusionTime, PeakTime));
    document.getElementById('newcalcdose').value = Dose;
};