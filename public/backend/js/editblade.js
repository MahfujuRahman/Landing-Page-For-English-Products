document.getElementById("add-image-btn").addEventListener("click", function () {
    const imageContainer = document.getElementById("image-container");
    const newImageInput = document.createElement("div");
    newImageInput.classList.add("row", "mb-3");
    newImageInput.innerHTML = `

        <div class="col-md-9 mt-5">
            <input type="file" class="form-control" name="images[]" accept="image/*">
        </div>
        <div class="col-md-12 pt-4 image-preview-container"></div>
    `;
    imageContainer.appendChild(newImageInput);

    // Handle remove button for the newly added image input
    // const removeButton = document.createElement('button');
    // removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mt-2', 'remove-row', 'ms-4');
    // removeButton.textContent = 'Remove';
    // removeButton.style.display = 'inline-block';
    // newImageInput.appendChild(removeButton);

    // removeButton.addEventListener('click', function() {
    //     newImageInput.remove();
    // });
});

// Handle preview of selected images
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
    previewContainer.innerHTML = ""; // Clear previous preview

    const file = inputElement.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.style.maxWidth = "200px";
            img.style.height = "auto";
            img.style.borderRadius = "5px";

            // Add remove button
            const removeButton = document.createElement("button");
            removeButton.classList.add(
                "btn",
                "btn-danger",
                "btn-sm",
                "mt-4",
                "remove-image",
                "ms-4"
            );
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", function () {
                previewContainer.innerHTML = "";
                inputElement.value = "";
            });

            previewContainer.appendChild(img);
            previewContainer.appendChild(removeButton);
        };
        reader.readAsDataURL(file);
    }
}

// Array to store removed image IDs
let removedImages = [];

// Event delegation for removing existing images
document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("remove-image")) {
        const imageId = e.target.getAttribute("data-image-id");
        console.log("Image ID:", imageId); // Check the imageId

        // Remove the image from UI
        const imageContainer = document.getElementById("image-" + imageId);
        console.log("Image container:", imageContainer); // Debug: Check if image container is found

        if (imageContainer) {
            imageContainer.remove();
        } else {
            console.error("Image container not found for ID:", imageId);
        }

        // Add the imageId to the removedImages array if not already present
        if (!removedImages.includes(imageId)) {
            removedImages.push(imageId);
            console.log("Added to removedImages:", removedImages);
        }

        let deletedImagesInput = document.getElementById("deleted_images");
        deletedImagesInput.value = removedImages;
    }
});

$("#website_id").on("change", function () {
    var websiteId = $(this).val();

    if (websiteId) {
        console.log(`/get-website-data/${websiteId}`); // Debug URL

        $.ajax({
            url: `/get-website-data/${websiteId}`,
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // CSRF Token
            },
            success: function (response) {
                console.log(response); // Log the response for debugging

                if (response.status === "success") {
                    updateRelatedData(response.related_data);
                } else {
                    alert(response.message); // Display error message from backend
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching data:", error); // Log the error for debugging
            },
        });
    }
});

// Function to update form fields
function updateRelatedData(relatedData) {
    $("#title").val(relatedData.title || ""); // Update Title field
    $("#subtitle").val(relatedData.subtitle || ""); // Update Subtitle field
    $("#btn_title_1").val(relatedData.btn_title_1 || "");
    $("#btn_url_1").val(relatedData.btn_url_1 || "");
    $("#btn_title_2").val(relatedData.btn_title_2 || "");
    $("#btn_url_2").val(relatedData.btn_url_2 || "");
}
