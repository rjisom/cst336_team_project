// JavaScript Document


var cartItem = [];
var cart = {};
var item;

function cartItem(productName, quanity, price) {
    this.productName = productName;
    this.quanity = quanity;
    this.price = price;
}

function addItem(productName, price, quanity) {
    console.log('cart item');
    for(var i = 0; i < cart.length; i++){
        var tempItem = cart[i];
        if(tempItem.findName(productName) == 1){
            cart[i].quanity = cart[i].quanity + quanity;
        }
        else{
        var newCartItem = new item(productName, price, quanity);
        cart.push(newCartItem);
        }
    }
}

$(document).ready(function() {
    $('#addToCart').click(function() {
      foo($('#productId').val());
    });
});

function addItem(productName, price) {
    console.log('cart item');
    for(var i = 0; i < cart.length; i++){
        var tempItem = cart[i];
        if(tempItem.findName(productName) == 1){
            cart[i].quanity++;
        }
        else{
        var newCartItem = new item(productName, price);
        cart.push(newCartItem);
        document.write(productName);
        }
    }
}

function findName(productName) { 
    return cartItem.productName === productName;
}

function addChartItem(productId, productName, product, price, calories, quanity) {
    console.log('f3 arg1: ' + arg1);
    var newItem = new item(productId, productName, price, calories, quanity);
    var a = fruits.indexOf("Apple");
    
    if (newItem.productId == cart.indexOf(productId)){
        cart.find()
    }
    else { cart.push(newItem); }
    
}

function addToCart(item,index,arr) {
    if(arr[index].productId == document.getElementById("addItem")){
    arr[index].quanity =+ document.getElementById("addItem").value;
    demo.innerHTML=cart;
    }
    else{ 
        var newItem = new cartItem(item.productId, item.productName, item.price, item.calories, item.quanity);
        cart.push(newItem);
    }
    document.writeln("<div>" + item + "</div>");
    JSON.stringify(item);
}

var cartttt = [{
            color : "red",
            mileage : 58765,
            manufacturingDate : new Date(1980, 5, 16),
            doors : [{
                "position" : "frontDriver"
            }, {
                "position" : "frontPassenger"
            }, {
                "position" : "backDriver"
            }, {
                "position" : "backPassenger"
            }],
            drive : function(distance) {
                console.log('driving the car.............' + distance);
            }
        }, {
            "mileage" : 19808
        }, {
            
        }];
        