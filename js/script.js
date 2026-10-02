document.addEventListener("DOMContentLoaded", function () {
    const orderButtons = document.querySelectorAll(".order-button");

    orderButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const foodCard = button.closest(".food-card");
            const foodName = foodCard.querySelector("h3").textContent;
            alert("You selected: " + foodName);
        });
    });
});