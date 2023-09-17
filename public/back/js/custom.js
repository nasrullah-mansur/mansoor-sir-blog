// AJAX SETUP;
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"').attr("content"),
    },
});

// Preloader;
$(window).on("load", function () {
    $(".preloader").fadeOut(150);
});

// Image Preview;
if ($(".image-input-show").length > 0 && $(".image-preview").length > 0) {
    $(".image-input-show").on("change", function (e) {
        let input = e.target;
        let preview = e.target.parentElement.parentElement.querySelector("img");
        let label = e.target.nextElementSibling;
        let setLabel = input.value.split("\\").pop();
        label.innerHTML = setLabel;
        e.target.parentElement.parentElement
            .querySelector(".image-preview")
            .classList.remove("hide");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    });
}

// Summer Note Init;
if ($(".summernote").length > 0) {
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 140,
        });
    });
}

// Tag Input Plugin Init;
if ($(".tagging").length > 0) {
    $(document).ready(function () {
        $(".tagging").tagging();
    });
}

// Select 2 Plugin Init;
if ($(".select2").length > 0) {
    $(".select2").select2({
        placeholder: "Select Here",
    });
}

// Tagging Plugin Init;
if ($(".taginput").length > 0) {
    $(".taginput").tagging({
        "case-sensitive": true,
    });
}

// jQuery NiceSelect;
if ($("select:not(.dataTables_length select)").length > 0) {
    $("select:not(.custom-select)").niceSelect();
    $("body").on("click", function () {
        $("select:not(.dataTables_length select, .custom-select").niceSelect();
    });
}

// Input Characters Count;
if ($(".characters-count").length > 0) {
    const DATA = {
        upperValue: null,
        inputLength: null,
        currentValue: null,
    };
    $(".has-count").on("focus", function (e) {
        e.target.parentElement.querySelector(
            ".characters-count"
        ).style.display = "block";
        let GetValue = e.target.parentElement.querySelector("span").innerHTML;
        DATA.upperValue = GetValue;
        if (e.target.classList.contains("has-count")) {
            e.target.addEventListener("keyup", function (e) {
                let getTextLength = e.target.value.length;
                DATA.inputLength = getTextLength;
                DATA.currentValue = DATA.upperValue - DATA.inputLength;
                e.target.parentElement.querySelector("span").innerHTML =
                    DATA.currentValue;
                if (DATA.currentValue < 0) {
                    e.target.classList.add("is-invalid");
                } else {
                    e.target.classList.remove("is-invalid");
                }
            });
        }
    });
}

// Email Validation;
if ($(".email-valid").length > 0) {
    $(".email-valid").on("blur", function () {
        let inputValue = $(".email-valid").val();
        let regex = /^[a-z0-9.]{3,}@[a-z]{3,}\.[a-z]{3,}$/;
        if (!regex.test(inputValue)) {
            $(this).addClass("is-invalid");
            $(this).keyup(function () {
                $(this).removeClass("is-invalid");
            });
        } else {
            $(this).removeClass("is-invalid");
        }
    });
}

// Phone Validation;
if ($(".phone-valid").length > 0) {
    $(".phone-valid").on("blur", function () {
        let inputValue = $(".phone-valid").val();
        let regex = /^[\+0-9\(\)][0-9\W\+\(\)]+$/;
        if (!regex.test(inputValue)) {
            $(this).addClass("is-invalid");
            $(this).keyup(function () {
                $(this).removeClass("is-invalid");
            });
        } else {
            $(this).removeClass("is-invalid");
        }
    });
}

// SEO Output;
if ($(".seo").length > 0) {
    $("input.seo-title").on("keyup", function (e) {
        let targetTitle =
            e.target.parentElement.parentElement.parentElement.querySelector(
                ".seo-title"
            );
        targetTitle.innerHTML = e.target.value;
    });

    $("textarea.seo-description").on("keyup", function (e) {
        let targetDescription =
            e.target.parentElement.parentElement.parentElement.querySelector(
                ".seo-description"
            );
        console.log(targetDescription);
        targetDescription.innerHTML = e.target.value;
    });
}

// Language Layout Setting;
if ($("#language_condition").length > 0) {
    let selectTag = $("#language_condition");
    function selectLayout() {
        if (selectTag.val() == 1) {
            $("fieldset.hide").fadeOut();
        } else {
            $("fieldset.hide").fadeIn();
        }
    }
    selectLayout();
    $("#language_condition").on("change", function (e) {
        selectLayout();
    });
}

// Custom tag builder;
if ($(".custom-tag-input").length > 0) {
    let myTags = [];

    // Initialize;
    let targetKeys = $(".custom-tag-input").val();
    let targetArray = targetKeys.split(",");

    targetArray.forEach((item) => {
        if (item != "") {
            myTags.push(item.trim());
            $(".custom-tag-input").val("");
        }
    });

    tagHandler(myTags);
    tagSelectHandler();

    $(".custom-tag-input").on("keyup", function (event) {
        if (event.key === ",") {
            let targetKeys = this.value;
            let targetArray = targetKeys.split(",");

            targetArray.forEach((item) => {
                if (item != "") {
                    myTags.push(item.trim());
                    $(".custom-tag-input").val("");
                }
            });

            tagHandler(myTags);
            tagSelectHandler();
        }
    });

    function tagHandler(arr) {
        $(".custom-tag-output").html("");
        arr.map((item) => {
            $(".custom-tag-output").append(`
                <small>
                    <span>${item}</span>
                    <i class="ft-x"></i>
                </small>
            `);
        });
    }

    $(".custom-tag-output").on("click", "i", function () {
        let key = $(this).parents("small").text();

        myTags = myTags.filter((item) => {
            return item != key.trim();
        });

        tagHandler(myTags);

        tagSelectHandler();
    });

    function tagSelectHandler() {
        $(".custom-tag-select").html("");

        myTags.map((item) => {
            $(".custom-tag-select").append(`
            <option selected value="${item}">${item}</option>
            `);
        });
    }
}
