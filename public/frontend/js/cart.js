// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function () {
    // =============================
    // Private methods and propeties
    // =============================
    cart = [];

    // Constructor
    function Item(id, image, type, size, name, price, quantity, location, weight) {
        this.name = name;
        this.price = price;
        this.quantity = quantity;
        this.id = id;
        this.product_id = id;
        this.image = image;
        this.type = type;
        this.size = size;
        this.variationid = id + type;
        this.location = location;
        this.weight = weight;
    }

    // Save cart
    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
    }
    if (localStorage.getItem("shoppingCart") != null) {
        loadCart();
    }

    // =============================
    // Public methods and propeties
    // =============================
    var obj = {};

    // Add to cart
    obj.addItemToCart = function (
        id,
        image,
        type,
        size,
        name,
        price,
        quantity,
        location,
        weight
    ) {
        for (var item in cart) {
            if (cart[item].variationid === id + type) {
                cart[item].quantity++;
                saveCart();
                return;
            }
        }
        var item = new Item(id, image, type, size, name, price, quantity, location, weight);
        cart.push(item);
        saveCart();
    };

    obj.addItemToCartIncrement = function (variationid) {
        for (var item in cart) {
            if (cart[item].variationid === variationid) {
                cart[item].quantity++;
                saveCart();
                return;
            }
        }
    };

    // Set quantity from item
    // Set quantity for item
    obj.setquantityForItem = function (variationid, quantity) {
        for (var i in cart) {
            if (cart[i].variationid === variationid) {
                cart[i].quantity = quantity;
                saveCart();
                return;
            }
        }
    };

    // Remove item from cart
    obj.removeItemFromCart = function (variationid) {
        for (var item in cart) {
            if (cart[item].variationid === variationid) {
                cart[item].quantity--;
                //bujhinay
                if (cart[item].quantity === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    };

    // Remove all items from cart
    obj.removeItemFromCartAll = function (variationid) {
        for (var item in cart) {
            if (cart[item].variationid === variationid) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    };

    // Clear cart
    obj.clearCart = function () {
        cart = [];
        saveCart();
    };

    // quantity cart
    obj.totalquantity = function () {
        var totalquantity = 0;
        for (var item in cart) {
            totalquantity += cart[item].quantity;
        }
        return totalquantity;
    };

    // Total cart
    obj.totalCart = function () {
        var totalCart = 0;
        for (var item in cart) {
            totalCart += cart[item].price * cart[item].quantity;
        }
        return Number(totalCart.toFixed(2));
    };

    // List cart
    obj.listCart = function () {
        //clear na
        var cartCopy = [];
        for (i in cart) {
            item = cart[i];
            itemCopy = {};
            for (p in item) {
                itemCopy[p] = item[p];
            }
            itemCopy.total = Number(item.price * item.quantity).toFixed(2);
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // quantityCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();

// *****************************************
// Triggers / Events
// *****************************************
// Add item
// $('body').on('click', '.add-to-cart', function (event) {
//     console.log('testing...');
//     event.preventDefault();
//     var name = $(this).data("name");
//     var id = $(this).data("id");
//     var image = $(this).data("image");
//     var type = $(this).data("type");
//     var size = $(this).data("size");
//     var weight = $(this).data("weight");
//     var price = Number($(this).data("price"));
//     console.log(price);
//     var location = Number($(this).data("location"));
//     var qty = Number($(this).data("qty"));
//     shoppingCart.addItemToCart(id, image, type, size, name, price, qty, location, weight);
//     displayCart();
// });


$('body').on('click', '.add-to-cart', function (event) {
    event.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");
    var image = $(this).data("image");
    var type = $(this).data("type");
    var size = $(this).data("size");
    var weight = $(this).data("weight");
    var price = Number($(this).data("price"));
    var location = Number($(this).data("location"));
    var qty = Number($(this).data("qty"));
    shoppingCart.addItemToCart(id, image, type, size, name, price, qty, location, weight);
    displayCart();
});


$(".customer_area").change(function (event) {
    event.preventDefault();
    displayCart();
});


// Clear items
$(".clear-cart").click(function () {
    shoppingCart.clearCart();
    displayCart();
});

function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    var weight = 0;
    var outputTable = "";

    for (var i in cartArray) {
        console.log(cartArray[i]);
        var sl = Number(i) + 1;
        weight += Number(cartArray[i].quantity) * Number(cartArray[i].weight);

        var totalPrice =
            Number(cartArray[i].price) * Number(cartArray[i].quantity);

        var hiddenFields = `
            <input type='hidden' value='${totalPrice}' name='product_price[]'>
            <input type='hidden' value='${cartArray[i].product_id}' name='product_id[]'>
            <input type='hidden' value='${cartArray[i].name}' name='product_name[]'>
            <input type='hidden' value='${cartArray[i].image}' name='product_image[]'>
            <input type='hidden' value='${cartArray[i].variationid}' name='variation_id[]'>
            <input type='hidden' value='${cartArray[i].location}' name='location_id'>
            <input type='hidden' value='${cartArray[i].quantity}' name='product_buy_item[]'>
            <input type='hidden' value='${cartArray[i].weight}' name='product_weight[]'>
        `;

        output +=
            "<input type='hidden' value='" + totalPrice + "' name='product_price[]'>" +
            "<input type='hidden' value='" + cartArray[i].product_id + "' name='product_id[]'>" +
            "<input type='hidden' value='" + cartArray[i].name + "' name='product_name[]'>" +
            "<input type='hidden' value='" + cartArray[i].image + "' name='product_image[]'>" +
            "<input type='hidden' value='" + cartArray[i].variationid + "' name='variation_id[]'>" +
            "<input type='hidden' value='" + cartArray[i].location + "' name='location_id'>" +
            "<input type='hidden' value='" + cartArray[i].quantity + "' name='product_buy_item[]'>" +
            "<input type='hidden' value='" + cartArray[i].weight + "' name='product_weight[]'>" +
            `
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="javascript:void(0);">${cartArray[i].name}</a>
                    </h4>
                    <span class="cart-product-info">
                        <span class="cart-product-qty">${cartArray[i].quantity}</span> × ৳${cartArray[i].price.toFixed(2)}
                    </span>
                </div>
                <!-- End .product-details -->
                <figure class="product-image-container">
                    <a href="javascript:void(0);" class="product-image">
                        <img src="${cartArray[i].image}" alt="${cartArray[i].name}" width="80" height="80">
                    </a>
                    <a href="javascript:void(0);" class="btn-remove delete-item" title="Remove Product" data-variation_id="${cartArray[i].variationid}">
                        <span>×</span>
                    </a>
                </figure>
            </div>
            `;

        outputTable += `
            <tr class="product-row">
            ${hiddenFields}
                <td>
                    <figure class="product-image-container gap_5">
                        <a href="javascript:void(0);" class="product-image">
                            <img src="${cartArray[i].image}" alt="${cartArray[i].name}" width="30" height="20" class="checkout_image">
                        </a>
                        <h5 class="product-title">
                            <a href="javascript:void(0);">${cartArray[i].name}</a>
                        </h5>
                    </figure>
                </td>
                <td class="unit_price">৳${cartArray[i].price.toFixed(2)}</td>
                <td class="quantity">
                    <div class="product-single-qty cart_quantity">
                        <input class="horizontal-quantity form-control" data-variation_id="${cartArray[i].variationid}" type="text" value="${cartArray[i].quantity}">
                    </div>
                </td>
                <td class="text-right amount">
                    <span class="subtotal-price">৳${totalPrice.toFixed(2)}</span>
                </td>
                <td>
                    <div class="text-center text-danger cursor-pointer cart_trash delete-item" data-variation_id="${cartArray[i].variationid}">
                        <i class="fa-solid fa-trash rad_5"></i>
                    </div>
                </td>
            </tr>
        `;   
    }

    $(".show-cart").html(output);
    $(".cart_data").html(outputTable);
    $(".total-cart").html(shoppingCart.totalCart());
    var shipping_charge = $("#delivery_charge").val();
    console.log(shipping_charge);
    $(".shipping_charge_amount").html(shipping_charge);
    if (shipping_charge){
        $(".total_amount_full").html(Number(shoppingCart.totalCart())+Number(shipping_charge));
    }else{
        $(".total_amount_full").html(shoppingCart.totalCart());
    }
    
    


    var selected_area = $("#customer_area").val();
    var default_limit = Number($("#default_limit").val());
    default_limit = default_limit / 1000;
    $(".sub_total").html(shoppingCart.totalCart() + " BDT");

    weight = Math.ceil(weight / 1000);

    $(".total_weight").html(weight + " Kg");
    $("#total_weight").val(weight + " Kg");

    if (selected_area == "In Dhaka City") {
        var delivery_charge = Number($("#delivery_charge_dhaka").val());
        var additional = 0;
        if (weight > default_limit) {
            additional = $("#additional_dhaka").val();
            var temp_weight = weight - default_limit;
            additional = temp_weight * (additional);
            delivery_charge += additional;
        }
        $(".delivery_charge").html(delivery_charge + " BDT");
        $("#delivery_charge").val(delivery_charge);

        var total_cart_price = delivery_charge + shoppingCart.totalCart() + additional;

    } else if (selected_area == "Out Of Dhaka City") {
        var delivery_charge = Number($("#delivery_charge_outside_dhaka").val());
        var additional = 0;
        if (weight > default_limit) {
            additional = $("#additional_outside_dhaka").val();
            var temp_weight = weight - default_limit;
            additional = temp_weight * (additional);
            delivery_charge += additional;
        }
        $(".delivery_charge").html(delivery_charge + " BDT");
        $("#delivery_charge").val(delivery_charge);
        var total_cart_price = delivery_charge + shoppingCart.totalCart() + additional;
    } else {
        var total_cart_price = shoppingCart.totalCart();
    }


    $(".total_amount").html(total_cart_price + " BDT");
    $("#total_amount").val(total_cart_price);
    $(".displayCart").html(shoppingCart.totalquantity());

    $(".horizontal-quantity").TouchSpin({
        verticalbuttons: !1,
        buttonup_txt: "",
        buttondown_txt: "",
        buttondown_class: "btn btn-outline btn-down-icon",
        buttonup_class: "btn btn-outline btn-up-icon",
        initval: 1,
        min: 1
    })
}

// Delete item button

$(".show-cart").on("click", ".delete-item", function (event) {
    var variation_id = $(this).data("variation_id");
    shoppingCart.removeItemFromCartAll(variation_id);
    displayCart();
});

// -1
$(".show-cart").on("click", ".minus-item", function (event) {
    var variation_id = $(this).data("variation_id");
    shoppingCart.removeItemFromCart(variation_id);
    displayCart();
});
// +1
$(".show-cart").on("click", ".plus-item", function (event) {
    var variation_id = $(this).data("variation_id");
    shoppingCart.addItemToCartIncrement(variation_id);
    displayCart();
});

$(".cart_data").on("click", ".btn-up-icon", function (event) {
    var variation_id = $(this)
        .closest("td")
        .find(".horizontal-quantity")
        .data("variation_id");
    shoppingCart.addItemToCartIncrement(variation_id);
    displayCart();
});


// Item quantity input
$("#delivery_charge").on("change", function () {
    displayCart();
});


$(".cart_data").on("click", ".btn-down-icon", function (event) {
    var variation_id = $(this)
        .closest("td")
        .find(".horizontal-quantity")
        .data("variation_id");
    shoppingCart.removeItemFromCart(variation_id);
    displayCart();
});




// Item quantity input
$(".show-cart").on("change", ".item-quantity", function (event) {
    var variation_id = $(this).data("variation_id");
    var quantity = Number($(this).val());
    shoppingCart.setquantityForItem(variation_id, quantity);
    displayCart();
});

displayCart();

function settocart() {
    var cartdata = JSON.parse(localStorage.getItem("shoppingCart"));
    var cartStoreRoute = "/cart/store";
    $.ajax({
        url: cartStoreRoute, // Use the variable here
        type: "POST",
        data: {
            cartdata: cartdata,
        },
        success: function (response) {
            // Handle the response if needed
        },
        error: function (xhr, status, error) {
            // Handle the error if needed
        },
    });
}
var url = window.location.pathname;
if (url == "/cart/checkout") {
    settocart();
}

// code for logout and store cart data into database
var cartdata = JSON.parse(localStorage.getItem("shoppingCart"));
// Function to access the element with id "loader-load" and show the loader
function showLoader() {
    const loaderElement = document.getElementById("preloader");
    if (loaderElement) {
        loaderElement.style.display = "block";
    }
}

// Function to handle the actual logout
function logout() {
    // Show the loader
    showLoader();

    var cartStoreRoute = "/cart/store";
    $.ajax({
        url: cartStoreRoute, // Use the variable here
        type: "POST",
        data: {
            cartdata: cartdata,
        },
        success: function (response) {
            // hideLoader();
            console.log(response);
            // Handle the response if needed
            shoppingCart.clearCart();
            localStorage.removeItem("shoppingCart");

            // Perform the logout action after clearing the cart and localStorage
            window.location.href = "/logout";
        },
        error: function (xhr, status, error) {
            hideLoader();
            // Handle the error if needed
            console.log(xhr);
            console.log(status);
            console.log(error);

            // In case of an error, hide the loader and perform the logout action

            window.location.href = "/logout";
        },
    });
}

// Function to hide the loader
function hideLoader() {
    const loaderElement = document.getElementById("preloader");
    if (loaderElement) {
        loaderElement.style.display = "none";
    }
}

// Add an event listener to the logout link
$("#logout").click(function () {
    logout();
});