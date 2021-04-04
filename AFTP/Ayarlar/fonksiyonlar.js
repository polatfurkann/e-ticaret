$(document).ready(function() {

    $.SoruIcerigiGoster = function(ElemanIDsi) {
        var SoruIDsi = ElemanIDsi;
        var IslenecekAlan = "#" + ElemanIDsi;
        $(".SorununCevapAlani").slideUp();
        $(IslenecekAlan).parent().find(".SorununCevapAlani").slideToggle();
    }

});