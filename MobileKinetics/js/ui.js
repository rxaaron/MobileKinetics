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
    var NewExtIntDose = RoundToSignificance(AgExtIntDose(document.getElementById('DBW').value),20);
    document.getElementById('newcalcdose').value = NewExtIntDose;
    var NewExtIntInt = AgExtIntInitialInterval(document.getElementById('CrCl').value);
    document.getElementById('newcalcfreq').value = NewExtIntInt;
};

function CalculateNewDose(){
    var drug = document.getElementById('newdrugchoice').value;
    var PeakTime;
    var DoseRound;
    var InfusionTime;
    var Vd = document.getElementById('estVd').value;
    var k = document.getElementById('estK').value;
    
    if(drug==='vancomycin'){
        document.getElementById('newvanc1g').className='';
        document.getElementById('newcalcdose').step = '250';
        PeakTime = document.getElementById('vancPeakDraw').value;
        DoseRound = document.getElementById('vancRound').value;
        InfusionTime = document.getElementById('vancInfusionTime').value;
        var pk12 = PredictPeak(1000,2,k,3,Vd,12);
        document.getElementById('vnpk12').value = Math.round(pk12 * 10) / 10;
        document.getElementById('vntr12').value = Math.round(PredictTrough(pk12,k,12,3) * 10) / 10;
        var pk24 = PredictPeak(1000,2,k,3,Vd,24);
        document.getElementById('vnpk24').value = Math.round(pk24 * 10) / 10;
        document.getElementById('vntr24').value = Math.round(PredictTrough(pk24,k,24,3) * 10) / 10;
        var pk36 = PredictPeak(1000,2,k,3,Vd,36);
        document.getElementById('vnpk36').value = Math.round(pk36 * 10) / 10;
        document.getElementById('vntr36').value = Math.round(PredictTrough(pk36,k,36,3) * 10) / 10;
        var pk48 = PredictPeak(1000,2,k,3,Vd,48);
        document.getElementById('vnpk48').value = Math.round(pk48 * 10) / 10;
        document.getElementById('vntr48').value = Math.round(PredictTrough(pk48,k,48,3) * 10) / 10;
    }else if(drug==='gentamicin'){
        document.getElementById('newvanc1g').className='info-hidden';
        document.getElementById('newcalcdose').step = '20';
        PeakTime = document.getElementById('agPeakDraw').value;
        DoseRound = document.getElementById('agRound').value;
        InfusionTime = document.getElementById('agInfusionTime').value;
    }else if(drug==='tobramycin'){
        document.getElementById('newvanc1g').className='info-hidden';
        document.getElementById('newcalcdose').step = '20';
        PeakTime = document.getElementById('agPeakDraw').value;
        DoseRound = document.getElementById('agRound').value;
        InfusionTime = document.getElementById('agInfusionTime').value;
    }
    var FlatFrequency = CalculateInterval(document.getElementById('newgoaltr').value,document.getElementById('newgoalpk').value,k,PeakTime);
    var Frequency;
    if(FlatFrequency<10){
        Frequency = RoundToSignificance(FlatFrequency,2);
    }else{
        Frequency = RoundToSignificance(FlatFrequency,12);
    }
    if(isNaN(Frequency)===true){
        document.getElementById('newcalcfreq').value = 'Enter More Data';
    }else{
        document.getElementById('newcalcfreq').value = Frequency;
    }
    var Dose = RoundToSignificance(CalculateDose(document.getElementById('newgoalpk').value, Vd, k, Frequency, InfusionTime, PeakTime),DoseRound);
    if(isNaN(Dose)===true){
        document.getElementById('newcalcdose').value = 'Enter More Data';
    }else{
        document.getElementById('newcalcdose').value = Dose;
    }
    if(isNaN(Dose)===false && isNaN(Frequency)===false){
        var newpk = PredictPeak(Dose,InfusionTime,k,PeakTime,Vd,Frequency);
        document.getElementById('newcalcpk').value = Math.round(newpk * 10) / 10;
        document.getElementById('newcalctr').value = Math.round(PredictTrough(newpk,k,Frequency,PeakTime) * 10) / 10;
    }
};

function PredictLevels(){
        var drug = document.getElementById('newdrugchoice').value;
    var PeakTime;
    var DoseRound;
    var InfusionTime;
    var Vd = document.getElementById('estVd').value;
    var k = document.getElementById('estK').value;
    
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
    var Dose = document.getElementById('newcalcdose').value;
    var Frequency = document.getElementById('newcalcfreq').value;
    if(isNaN(Dose)===false && isNaN(Frequency)===false){
        var newpk = PredictPeak(Dose,InfusionTime,k,PeakTime,Vd,Frequency);
        document.getElementById('newcalcpk').value = Math.round(newpk * 10) / 10;
        document.getElementById('newcalctr').value = Math.round(PredictTrough(newpk,k,Frequency,PeakTime) * 10) / 10;
    }
};