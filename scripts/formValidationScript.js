// Category Add form validation start
const form = document.getElementById("categoryAddForm");

form.addEventListener("submit", function (event) {
    const categoryName = document.getElementById("categoryName");
    if (categoryName.value === "") {
        alert("Please enter Category Name");
        event.preventDefault();
        return;
    }
});
// Category Add form validation end