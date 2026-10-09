document.addEventListener("DOMContentLoaded", function() {
const d = new Date();
let text = d.toLocaleDateString();
document.getElementById('todayDate').innerHTML = text;});


let grandTotal = localStorage.getItem("grandTotal");
document.getElementById('finalAmount').textContent = "Tsh" + " " + grandTotal;

document.getElementById('payNow').addEventListener("click",function(){
    alert("✅ ORDER CONFIRMED\n" +
          "Thanks for your Order\n" +
          "Your order has been received successfully.\n"
           
    );
});
