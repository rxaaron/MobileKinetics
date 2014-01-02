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
    var heightMeters = InchesToMeters(heightInches);
    var weightPounds = document.getElementById(prefix + 'weight').value;
    var weightKilograms = PoundsToKilograms(weightPounds);
    var SerumCreatinine = document.getElementById(prefix + 'scr').value;
    var DBW = 0;
    var BSA = 0;
    var BMI = 0;
    var CrCl = 0;
    var CrClStd = 0;
    
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
        
    }
};