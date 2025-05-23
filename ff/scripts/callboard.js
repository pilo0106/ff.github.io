(function (win){
    var callboarTimer;
    var callboard = $('#callboard');
    var callboardUl = callboard.find('ul');
    var callboardLi = callboard.find('li');
    var liLen = callboard.find('li').length;
    var initHeight = callboardLi.first().outerHeight(true);
    
    win.autoAnimation = function (){
        
        if (liLen <= 1) return;
        var self = arguments.callee;
        
        var callboardLiFirst = callboard.find('li').first();
        
        callboardLiFirst.animate({
            marginTop:-initHeight
        }, 800, function (){
            clearTimeout(callboarTimer);
            callboardLiFirst.appendTo(callboardUl).css({marginTop:0});
            callboarTimer = setTimeout(self, 4000); 
        });   
    }
    callboard.mouseenter(
        function (){
            clearTimeout(callboarTimer);
        }).mouseleave(function (){
            callboarTimer = setTimeout(win.autoAnimation, 5000);
    });
    
}(window));

setTimeout(window.autoAnimation, 5000);