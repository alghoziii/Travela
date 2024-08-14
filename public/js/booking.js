function calculatePrice() {
    let subTotal = 0;
    let quantity = parseInt(document.getElementById("quantity").textContent);
    let packageTourPrice = parseInt(
        document.getElementById("packageTourPrice").value
    );
    let insurance = 300000;
    let taxRate = 0.1; // Assuming a tax rate of 10%

    const tourPrice = packageTourPrice;
    subTotal = tourPrice * quantity;
    const totalInsurance = insurance * quantity;
    const totalTax = subTotal * taxRate;
    const totalGrandTotal = subTotal + totalInsurance + totalTax;

    const btnAddQty = document.getElementById("add-quantity");
    const btnRemoveQty = document.getElementById("remove-quantity");

    document.getElementById("quantity").textContent = quantity;

    document.getElementById("insurance").textContent =
        "Rp " + totalInsurance.toLocaleString("id");

    document.getElementById("tax").textContent =
        "Rp " + totalTax.toLocaleString("id");

    document.getElementById("subtotal").textContent =
        "Rp " + subTotal.toLocaleString("id");

    document.getElementById("total_quantity").textContent = quantity;

    document.getElementById("grandtotal").textContent =
        "Rp " + totalGrandTotal.toLocaleString("id");
}

function addQuantity() {
    let quantityElement = document.getElementById("quantity");
    let quantityInput = document.getElementById("quantity_input");
    let quantity = parseInt(quantityElement.textContent);
    quantity++;
    quantityInput.value = quantity; // Update hidden input
    quantityElement.textContent = quantity;
    calculatePrice();
}

function removeQuantity() {
    let quantityInput = document.getElementById("quantity_input");
    let quantityElement = document.getElementById("quantity");
    let quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
        // Prevents quantity from going below 1
        quantity--;
        quantityInput.value = quantity; // Update hidden input
        quantityElement.textContent = quantity;
        calculatePrice();
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("add-quantity")
        .addEventListener("click", addQuantity);
    document
        .getElementById("remove-quantity")
        .addEventListener("click", removeQuantity);
    calculatePrice(); // Initial calculation
});
