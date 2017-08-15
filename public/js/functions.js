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
                addProductLauncher.style.display  = 'none';
            });
            var alertDanger = document.getElementsByClassName('alert-danger');
            if(alertDanger.length > 0) {
               addProductContainer.style.display = 'block';
               addProductLauncher.style.display  = 'none';
            }
        }
    },

    addCustomer() {
        var addCustomerLauncher = document.getElementById('addCustomerLauncher');
        if(addCustomerLauncher !== null) {
            var addCustomerContainer = document.getElementById('addCustomerContainer');
            addCustomerLauncher.addEventListener("click", function(){
                addCustomerContainer.style.display = 'block';
                addCustomerLauncher.style.display  = 'none';
            });
            var alertDanger = document.getElementsByClassName('alert-danger');
            if(alertDanger.length > 0) {
               addCustomerContainer.style.display = 'block';
               addCustomerLauncher.style.display  = 'none';
            }
        }
    },

    deleteDetail() {
        var deleteDetail = document.getElementsByClassName('delete-detail');
        for(var i = 0, len = deleteDetail.length; i < len; i++){
            deleteDetail[i].addEventListener('click',function(){
                return confirm('¿Confirma que elimina este registro permanentemente?');
            });
        }
    },

    editPurchase() {
        var invoiceInput  = document.getElementById('invoiceInput');
        var paymentSelect = document.getElementById('paymentSelect');
        var savePurchase  = document.getElementById('savePurchase');
        var editPurchase  = document.getElementById('editPurchase');
        if(editPurchase) {
            editPurchase.addEventListener('click',function(){
                invoiceInput.removeAttribute('disabled');
                paymentSelect.removeAttribute('disabled');
                savePurchase.removeAttribute('disabled');
                editPurchase.setAttribute('disabled','disabled');
            });
        }
    },

    init: function () {
        scFunctions.detailsActions();
        scFunctions.addProduct();
        scFunctions.addCustomer();
        scFunctions.deleteDetail();
        scFunctions.editPurchase();
    }

};

scFunctions.init();
