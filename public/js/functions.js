/**
 * Created by Attakinsky on 3/23/2017.
 */
var scFunctions = {

    detailsActions : function () {
        if(typeof productPricesList === "undefined") return false;
        var productDropDpwn = document.getElementById('productname');
        productDropDpwn.addEventListener("change", function() {});
        console.log(productPricesList);
    },

    init: function () {
        scFunctions.detailsActions();
    }

};

scFunctions.init();