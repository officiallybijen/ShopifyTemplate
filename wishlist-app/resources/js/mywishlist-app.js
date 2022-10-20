
require("noty/src/noty.scss")
require("noty/src/themes/mint.scss")


window.Noty = require('noty')
window.axios = require('axios')

var wishListButton = document.querySelector(".wishlist-btn");

const appDomain="https://e901-2400-1a00-b030-cf58-3778-855-6536-8c64.in.ngrok.io";
function addWishList(customer, id) {
    axios.post(appDomain+'/api/addToWishlist',{shop_id:Shopify.shop,customer_id:customer, product_id:id })
    .then(response=>{
        console.log("response:",response)
    })
    .catch(error=>{
       console.log("ERROR: ",error) 
    })
    new Noty({
        type: 'success',
        layout:'topRight',
        timeout:3000,
        text: 'Item added'
    }).show();    
}

function removeWishList(customer, id) {
    axios.post(appDomain+'/api/removeWishlist',{shop_id:Shopify.shop,customer_id:customer, product_id:id })
    .then(response=>{
        console.log("response:",response)
    })
    .catch(error=>{
       console.log("ERROR: ",error) 
    })
    new Noty({
        type: 'danger',
        layout:'topRight',
        text: 'Item removed',
        timeout:3000
    }).show(); 
}

function checkWishList(customer, id) {
    axios.post(appDomain+'/api/checkWishlist',{shop_id:Shopify.shop,customer_id:customer, product_id:id })
    .then(response=>{
        if(response.data==1){
            wishListButton.classList.add('active')
        }
    })
    .catch(error=>{
       console.log("ERROR: ",error) 
    })
}



wishListButton.addEventListener("click", function () {
    var customer=this.dataset.customer;
    var id=this.dataset.product;
    if (this.classList.contains("active")) {
        this.classList.remove("active");
        removeWishList(customer,id);
    } else {
        this.classList.add("active");
        addWishList(customer,id);
    }
});


if(wishListButton){
    var customer=wishListButton.dataset.customer;
    var id=wishListButton.dataset.product;
    checkWishList(customer,id);
}