let cart = JSON.parse(localStorage.getItem("cart")) || [];
let cartBadge = document.getElementById('cartBadge');
if(cartBadge){
    cartBadge.textContent =cart.length;
}
function addToCart(productname,price,image,size){
    cart.push({
        name:productname,
        price:price,
        image:image,
        size:size
    })
    alert(productname +" " + "has been added to cart");
    localStorage.setItem("cart",JSON.stringify(cart));
    if(cartBadge){
        cartBadge.textContent = cart.length;
    }
    console.log(cart);
}

//to save products to shopCart page
let savedCart = localStorage.getItem("cart");
console.log(savedCart)

//to show product in the table
let cartItems = document.getElementById("cartItems");
if (cartItems) {

    cartItems.innerHTML = "";
    cart.forEach(function(product) {
       cartItems.innerHTML += `
            <tr>
                <td class="py-4">
                    <div class="d-flex align-items-center">
                       <img src="${product.image}" class="img-fluid rounded me-3" style="width: 
                       100px; height: 100px; object-fit: cover;">
                        <div>
                            <h6 class="mb-1 fw-semibold">${product.name}</h6>
                            <small class="text-dark d-block">
                                ${product.size}
                            </small>
                        </div>
                     </div>
                </td>
                <td class="price">${product.price}</td>
             <td>
                <div class="input-group input-group-sm justify-content-center mx-auto" style="
                width: 100px;">
                 <input type="number" class="form-control text-center qty-input" value="1" min="1">
                </div>
                </td>
              <td class="total">${product.price}</td>
            </tr>
        `;
    });
}      


//calculations
function updateCart(){
    let subtotal = 0;
    document.querySelectorAll('tbody tr').forEach(function(row){
        let price = Number(row.querySelector('.price').textContent);
        let quantity =Number(row.querySelector('.qty-input').value);
        let productTotal = price*quantity;
    row.querySelector('.total').textContent = "Tsh" + " " + productTotal;
        subtotal = subtotal + productTotal;
    });
    document.getElementById('subtotal').textContent = "Tsh" + " " + subtotal;
       let discountRate = Number(document.getElementById('discount').textContent);
       let discountAmount = subtotal*discountRate;
       let grandTotal= (subtotal) - (discountAmount);
    document.getElementById('grandTotal').textContent = "Tsh" + " " + grandTotal;
    localStorage.setItem("grandTotal",grandTotal);
}
document.querySelectorAll('.qty-input').forEach(function(input){
    input.addEventListener('input',updateCart);
});
updateCart();


//clear cart
let clearCart = document.getElementById('clearCart');
 clearCart.addEventListener("click",function(){
    localStorage.removeItem("cart");
    alert("cart has been cleared");
    location.reload();
 })