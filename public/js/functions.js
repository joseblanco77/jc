/**
 * Created by Attakinsky on 3/23/2017.
 */
var scFunctions = {

    detailsActions : function () {
        if(typeof productPricesList === "undefined") return false;
        var productDropDpwn = document.getElementById('product_id');
        var productPrice = document.getElementById('price');
        productDropDpwn.addEventListener("change", function() {
            var selectedProduct = this.options[this.selectedIndex].getAttribute('value');
            productPrice.setAttribute('value',productPricesList[selectedProduct]);
        });

    },

    init: function () {
        scFunctions.detailsActions();
    }

};

scFunctions.init();