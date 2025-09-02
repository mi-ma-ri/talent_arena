import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    var checkbox = document.getElementById("agreementCheckbox");
    var addFormButton = document.getElementById("add-form");
    var formCount = 1;

    // チーム紹介画面上で、「練習場所」を追加するボタン
    if (addFormButton) {
        addFormButton.addEventListener("click", function () {
            if (formCount < 3) {
                formCount++;
                var formHtml = `
            <div class="form-group">
                <input type="text" class="form-control mb-3 p-3 detail-background" id="input${formCount}" name="ground[]">
            </div>
        `;
                addFormButton.insertAdjacentHTML("beforebegin", formHtml);
            }
            if (formCount === 3) {
                addFormButton.disabled = true;
            }
        });
    }
});
