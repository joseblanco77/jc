/**
 * Created by Attakinsky on 3/23/2017.
 */
var scFunctions = {

    detailsActions() {
        if(typeof productPricesList === "undefined") return false;
        var productDropDpwn = document.getElementById('product_id');
        var productPrice = document.getElementById('price');
        productDropDpwn.addEventListener("change", function() {
            var selectedProduct = this.options[this.selectedIndex].getAttribute('value');
            productPrice.setAttribute('value',productPricesList[selectedProduct]);
        });

    },

    addProduct() {
        var addProductLauncher = document.getElementById('addProductLauncher');
        if(addProductLauncher !== null) {
            var addProductContainer = document.getElementById('addProductContainer');
            addProductLauncher.addEventListener("click", function(){
                addProductContainer.style.display = 'block';
            });
            var alertDanger = document.getElementsByClassName('alert-danger');
            if(alertDanger.length > 0) {
               addProductContainer.style.display = 'block';
            }
        }
    },

    init: function () {
        scFunctions.detailsActions();
        scFunctions.addProduct();
    }

};

scFunctions.init();
