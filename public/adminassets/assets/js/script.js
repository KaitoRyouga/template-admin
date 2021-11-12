const previewContainer = document.getElementById("imagePreview");
const previewImage = document.querySelector(".image-preview__image");
const previewDefaultText = document.querySelector(".image-preview__default-text");


function checkImage(url) {

    var request = new XMLHttpRequest();

    request.open("GET", url, true);
    request.send();
    request.onload = function () {

        if (request.status != 200) {
            $('.image-preview').empty();
        }
    }
}


$(document).ready(function () {

    if (($('#imagePreview img').attr('src') == "")) {
        $('.image-preview').empty();
    } else if ($('#imagePreview img').attr('src')) {
        checkImage($('#imagePreview img').attr('src'))
    }
    
});


$(document).on("change", "#imageFile", function () {

    const file = this.files[0];

    if (file) {

        const reader = new FileReader();

        reader.addEventListener("load", function () {

            // let img = new Image()
            // img.src = this.result

            // img.onload = () => {

            //     var canvas = document.createElement("canvas");
            //     var ctx = canvas.getContext("2d");

            //     ctx.drawImage(img, 0, 0, 400, 350);

            //     var dataurl = canvas.toDataURL(file.type);

            //     $('#imagePreview').empty();
            //     $preview = $(`
            //         <img src="${dataurl}"
            //             alt="Image Preview" class="image-preview__image" style="display:block;" />
            //         <span class="image-preview__default-text" style="display:none">Hình ảnh</span>
            //     `)
            //     $('#imagePreview').append($preview)

            // }

            $('#imagePreview').empty();
            $preview = $(`
                    <img src="${this.result}"
                        alt="Image Preview" class="image-preview__image" style="display:block;" />
                    <span class="image-preview__default-text" style="display:none">Hình ảnh</span>
                `)
            $('#imagePreview').append($preview)



        });
        reader.readAsDataURL(file);

    } else {
        document.getElementById("error").innerHTML = "Kích thước hình ảnh không được vượt quá 2MB";
        previewDefaultText.style.display = null;
        previewImage.style.display = null
        previewImage.setAttribute("src", "");
    }
});