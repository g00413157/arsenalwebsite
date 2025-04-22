function showCart() {
    fetch("cart.php", { method: "POST", body: new FormData().append('show_cart', true) })
        .then(response => response.text())
        .then(data => {
            document.getElementById("cart_change").innerHTML = data;
            document.getElementById("cart_modal").style.display = "block"; // Open modal
        })
        .catch(error => console.error("Error:", error));
}

function addtoCart(id) {
    const formData = new FormData();
    formData.append('add_to_cart', id);

    fetch('cart.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        }
        throw new Error('Network Response was not okay.');
    })
    .then(data => {
        // Update cart modal or cart container with the latest cart content
        document.getElementById("cart_change").innerHTML = data;
    })
    .catch(error => console.error("Error:", error));
}

function removeFromCart(id) {
    const formData = new FormData();
    formData.append('remove_item', id);

    fetch("cart.php", { method: "POST", body: formData })
        .then(response => response.text())
        .then(data => {
            // Update cart modal or cart container with the latest cart content
            document.getElementById("cart_change").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
}

function changeCartValue(id, change) {
    const formData = new FormData();
    formData.append('change_item', id);
    formData.append('change_number', change);

    fetch("cart.php", { method: "POST", body: formData })
        .then(response => response.text())
        .then(data => {
            // Update cart modal or cart container with the latest cart content
            document.getElementById("cart_change").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
}

function checkoutItems(total_price) {
    const formData = new FormData();
    formData.append('total_price', total_price);

    fetch("cart.php", { method: "POST", body: formData })
        .then(response => response.text())
        .then(data => {
            // Optionally handle checkout feedback here
            document.getElementById("cart_change").innerHTML = data;
        })
        .catch(error => console.error("Error:", error));
}

function closeCartModal() {
    document.getElementById("cart_modal").style.display = "none";
}
function updateCartCount() {
    const cartCountElement = document.getElementById('cart-count');
    if (!cartCountElement) return; // Don't run if cart element isn't on this page

    fetch('cartcount.php')
        .then(response => response.json())
        .then(data => {
            cartCountElement.textContent = data.count;
        })
        .catch(error => console.error('Error fetching cart count:', error));
}



document.addEventListener('DOMContentLoaded', updateCartCount);
setInterval(updateCartCount, 5000); // Update cart count every 5 seconds
