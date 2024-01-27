import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    var checkbox = document.getElementById("agreementCheckbox");
    var submitButton = document.getElementById("submitButton");

    checkbox.addEventListener("change", function () {
        submitButton.disabled = !this.checked;
    });
});
