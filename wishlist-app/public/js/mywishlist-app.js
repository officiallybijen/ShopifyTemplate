window.axios = require('axios');

console.warn("hello vv");

const appDomain =
    "https://6d7e-2400-1a00-b030-9237-2fe1-bd4b-260d-d7f4.in.ngrok.io";
function addWishList(customer, product_id) {
    alert("before axios");
    axios
        .post(appDomain + "/api/addToWishlist", {
            shop_id: Shopify.shop,
            customer_id: customer,
            product_id: product_id,
        })
        .then((response) => {
            console.log("Response: ", response);
        })
        .catch((error) => {
            console.log("ERROR: ", error);
        });

    alert("added item: " + product_id);
}

function removeWishList() {
    alert("remove item");
}

var wishListButton = document.querySelector(".wishlist-btn");

wishListButton.addEventListener("click", function () {
    if (this.classList.contains("active")) {
        this.classList.remove("active");
        removeWishList();
    } else {
        this.classList.add("active");

        var customer = this.dataset.customer;
        var id = this.dataset.product;

        addWishList(customer, id);
    }
});
