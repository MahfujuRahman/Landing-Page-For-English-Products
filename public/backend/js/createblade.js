document.getElementById("add-image-btn").addEventListener("click", function () {
    const imageContainer = document.getElementById("image-container");
    const newImageInput = document.createElement("div");
    newImageInput.classList.add("row", "mb-3");
    newImageInput.innerHTML = `
    <div class="col-md-9">
        <input type="file" class="form-control" name="images[]" accept="image/*">
    </div>
    <div class="col-md-12 image-preview-container"></div>
    `;

    imageContainer.appendChild(newImageInput);
});

document
    .getElementById("image-container")
    .addEventListener("change", function (e) {
        if (e.target.type === "file") {
            showImagePreview(e.target);
        }
    });

function showImagePreview(inputElement) {
    const previewContainer = inputElement
        .closest(".row")
        .querySelector(".image-preview-container");
    previewContainer.innerHTML = "";

    const file = inputElement.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.style.maxWidth = "200px";
            img.style.height = "auto";
            img.style.borderRadius = "8px";

            // Add remove button
            const removeButton = document.createElement("button");
            removeButton.classList.add(
                "btn",
                "btn-danger",
                "btn-sm",
                "mt-2",
                "remove-image",
                "ms-4"
            );
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", function () {
                removeImageInput(inputElement.closest(".row"));
            });

            previewContainer.appendChild(img);
            previewContainer.appendChild(removeButton);

            // Hide remove button for the row if an image is added
            const row = inputElement.closest(".mb-3");
            row.querySelector(".remove-row").style.display = "none";
        };
        reader.readAsDataURL(file);
    }
}

function removeImageInput(imageInputContainer) {
    const previewContainer = imageInputContainer.querySelector(
        ".image-preview-container"
    );
    const inputField = imageInputContainer.querySelector(
        'input[type="file"], input[type="text"]'
    );

    if (inputField) {
        inputField.value = "";
    }
    previewContainer.innerHTML = "";

    const removeButton = imageInputContainer.querySelector(".remove-row");
    if (removeButton) {
        removeButton.style.display = "none";
    }

    imageInputContainer.remove();
}

const removeRowButtons = document.querySelectorAll(".remove-row");
removeRowButtons.forEach((button) => {
    button.addEventListener("click", function () {
        const row = this.closest(".mb-3");
        removeImageInput(row);
    });
});
