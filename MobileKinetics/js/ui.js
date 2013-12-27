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
        hidedivs[i].className='pure-hidden';
    }
    setTimeout(function(){document.getElementById(fadein).className="pure-visible";},150);
    var clearmenu = document.getElementById('menu').getElementsByTagName('li');
    for(var j=0; j<clearmenu.length; j++){
        clearmenu[j].className='';
    }
    document.getElementById(menuselect).className='pure-menu-selected';
};
