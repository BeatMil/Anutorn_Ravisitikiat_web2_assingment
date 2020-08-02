var shop = {
    customerName: "Chaky",
    totalPrice: 0,
    products: [
        "Pizza",
        "Naan",
        "Sourdough",
        "Foccacia",
        "iPhone X"
    ],
    price: [40,10,20,80,1000],
    displayCustomerName: function() {
        var customerElement = document.getElementById("customerName");
        customerElement.innerHTML += this.customerName;
    },

    displayProductList: function() {
        var productText = "";
        var productElement = document.getElementById("product-list");
        for (var i=0; i<5; i++){
            productText += "<li class='list-group-item d-flex justify-content-between align-items-center'>"
            + this.products[i] + '<span class="badge badge-secondary badge-pill">' + this.price[i] +'</span></li>'
            //<li class="list-group-item d-flex justify-content-between align-items-center">
            //Pizza
            //<span class="badge badge-secondary badge-pill">$40</span>
            //</li>
        }
        productElement.innerHTML = productText;
    },

    displayTotalPrice: function() {
        var totalPrice = 0;
        for (var i=0; i<this.price.length; i++){
            totalPrice += this.price[i];
            console.log(totalPrice)
        }
        totalPrice2 = String(totalPrice);
        document.getElementById("total_price").innerHTML += totalPrice2;
        document.getElementById("total_price").innerHTML += '<span class="badge badge-warning badge-pill">25% off</span>'
    }
}

var calendar = {
    header: "<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>",
    displayCalendar: function() {
        var ele = document.getElementById("calendar");
        var calendarText = "<table class='table table-condensed'>";
        calendarText += this.header;
        for (var i=1; i<=31; i++){
            //write code to display the date

            if (i==1){
                calendarText += "</tr><tr>";
            }

            calendarText += "<th>" + i + "</th>";

            if (i==31){
                calendarText += "</tr>";
            }
            else if (i%7==0){
                calendarText += "</tr><tr>";
            }
        }
        calendarText += "</table>";
        ele.innerHTML = calendarText;
    }
}
console.log(document.getElementById("shop_name").innerText)
shop.displayCustomerName();
shop.displayProductList();
shop.displayTotalPrice();
calendar.displayCalendar();
