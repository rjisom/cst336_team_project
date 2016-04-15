// JavaScript Document


var cartItem = [];
var cart = {};
var item;
    
     
    function writeTable(){
        document.write("<div> <table id='productTable' border=1 width='600'>");
        document.write("<tr> <td> Id </td>");
        document.write("<td> Name </td>");
        document.write("<td> Price </td>");
        document.write("<td> Calories </td></tr>");
        document.write("<?php displayAllProducts('descending');  ?>");
        document.write("</table></div>");
        
    }
    
    function makeTable(){
    document.write("<table id='productTable'><tr>" 
    + "<th class='productId'> </th> <th class='productName'> </th>"
    + "<th class='price'></th> <th class='calories'></th> </tr>"
    + "</table>");
    }
    

function addItem() {
    if (confirm("Add item to cart?")) {
    alert("Item Added");
    }
    else {
    alert("Item Not Added");
    }
}


function cartItem(productName, quanity, price) {
    this.productName = productName;
    this.quanity = quanity;
    this.price = price;
}

/*
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

function findName(productName) { 
    return cartItem.productName === productName;
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
*/
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
        