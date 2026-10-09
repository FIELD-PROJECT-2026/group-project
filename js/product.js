let cart = JSON.parse(localStorage.getItem("cart")) || [];
let cartBadge = document.getElementById('cartBadge');
if(cartBadge){
    cartBadge.textContent =cart.length;
}
function addToCart(productName,price,image,size){
    cart.push({
        name:productName,
        price:price,
        image:image,
        size:size
    })
    alert(productName +" " + "has been added to cart");
    localStorage.setItem("cart",JSON.stringify(cart));
    if(cartBadge){
        cartBadge.textContent = cart.length;
    }
    console.log(cart);
}

//to save products to shopCart page
let savedCart = localStorage.getItem("cart");
console.log(savedCart)


// SEARCH BUTTON
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
   if(searchInput && searchBtn){
searchBtn.addEventListener("click",function(){
    let searchValue = searchInput.value.toLowerCase();
    const products = document.querySelectorAll('.product-card');
    products.forEach(function(product){
        let productName = product.textContent.toLowerCase();
        if(productName.includes(searchValue)){
            product.parentElement.style.display = "";
        }
        else{
            product.parentElement.style.display = "none";
        }
    });
   });
}
   
//enter key to function in search btn
searchInput.addEventListener('keypress',function(event){
    if(event.key === "Enter"){
        searchBtn.click();
    }
});