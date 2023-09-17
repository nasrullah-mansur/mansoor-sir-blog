const GET_DD_DATA = new Array();
let checkIfChanged = false;

autoPosition();
getListItemData();
getItemValueOnKeyUp();
// collapseAndDelete();

$(".dd").nestable({
    maxDepth: 3,
    serialize: "toArray",
    expandBtnHTML: null,
    collapseBtnHTML: null,
    callback: function (l, e) {
        if (e.parent().parent().attr("data-id")) {
            e.attr("data-pid", e.parent().parent().attr("data-id"));
        } else {
            e.attr("data-pid", 0);
        }
    },
});

$(".dd").on("change", function () {
    autoPosition();
    getListItemData();
});

function autoPosition() {
    Array.from($("#list-area li.dd-item")).forEach(function (value, index) {
        if (value.getAttribute("data-position") != index + 1) {
            value.setAttribute("data-position", index + 1);
        }
    });
}

function setLiData(
    data_id,
    className,
    icon,
    label,
    p_id,
    position,
    target,
    url
) {
    return `<li data-id="${data_id}" data-url="${url}" data-label="${label}" data-class="${className}" data-target="_self" data-slug="home" data-pid="0" data-position="${position}" class="dd-item">
                <div class="dd-handle d-flex justify-content-between">
                    <div>
                        <span class="title-show text-capitalize">${label}</span>
                    </div>
                </div>
                <div class="list-content">
                    <div class="dd-text">
                        <a href="javascript:void(0);" class="collapsed-btn">
                            <span class="ft-chevron-down"></span>
                        </a>
                    </div>
                    <div class="collapse border">
                        <div class="dd-details">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <div class="col-12 px-0">
                                                    <label class="col-12 label-control text-bold-500">Label
                                                        <input type="text" class="form-control" placeholder="Label" name="label" value="${label}" />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 px-0">
                                                    <label class="col-12 label-control">URL
                                                        <input type="text" class="form-control" placeholder="CSS Class" name="url" value="${url}" />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 px-0">
                                                    <label class="col-12 label-control">CSS Class
                                                        <input type="text" class="form-control" placeholder="CSS Class" name="class" value="${
                                                            className == null
                                                                ? ""
                                                                : className
                                                        }" />
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 label-control">Target</label>
                                                <div class="col-12">
                                                    <select class="form-control" name="target">
                                                        <option value="_self">Open link directly</option>
                                                        <option value="_blank">Open link in new tab</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions text-right">
                                            <button type="button" class="btn btn-danger remove-btn"><i class="ft-x"></i> Remove Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;
}

$(".menu-builder label").on("click", function () {
    $(this).parents("li").first().toggleClass("active");
});

function getListItemData() {
    GET_DD_DATA.splice(0, GET_DD_DATA.length);
    Array.from($(".dd li.dd-item")).forEach(function (data) {
        let getPid = data.parentElement.parentElement.getAttribute("data-id");
        if (getPid) {
            data.setAttribute("data-pid", getPid);
        } else {
            data.setAttribute("data-pid", 0);
        }
        let dataid = data.getAttribute("data-id");
        let dataLabel = data.getAttribute("data-label");
        let dataClass = data.getAttribute("data-class");
        let dataTarget = data.getAttribute("data-target");
        let dataSlug = data.getAttribute("data-slug");
        let dataPid = data.getAttribute("data-pid");
        let dataPosition = data.getAttribute("data-position");
        let setDataToObject = {
            id: dataid,
            label: dataLabel,
            class: dataClass,
            target: dataTarget,
            slug: dataSlug,
            p_id: dataPid,
            position: dataPosition,
        };
        GET_DD_DATA.push(setDataToObject);
    });
}

// Get and set value;
function getItemValueOnKeyUp() {
    $("#list-area").on("keyup", 'input[name="label"]', function () {
        let inputVal = $(this).val();
        let getLi = $(this).parents("li").first();
        getLi.attr("data-label", inputVal);
        getLi.children().find(".title-show").first().text(inputVal);
    });

    $("#list-area").on("keyup", 'input[name="class"]', function () {
        let inputVal = $(this).val();
        let getLi = $(this).parents("li").first();
        getLi.attr("data-class", inputVal);
    });

    $("#list-area").on("keyup", 'input[name="slug"]', function () {
        let inputVal = $(this).val();
        let getLi = $(this).parents("li").first();
        getLi.attr("data-slug", inputVal);
    });

    $("#list-area").on("change", 'select[name="target"]', function () {
        let inputVal = $(this).val();
        let getLi = $(this).parents("li").first();
        getLi.attr("data-target", inputVal);
    });
}

// Collapse;
$("#list-area").on("click", ".collapsed-btn", function () {
    $(this).parent().parent().find(".collapse").toggle();
    $(this).children("span").toggleClass("rotate");
});

// Set menu location;
function setMenuLocation(menuId) {
    let allLiData = [];
    let allLiDataElements = $("#dd-list .dd-item");
    let locationVal = $(".set_location").filter(":checked").val();

    Array.from(allLiDataElements).forEach((element) => {
        let id = element.dataset.id;
        let label = element.dataset.label;
        let className = element.dataset.class;
        let target = element.dataset.target;
        let slug = element.dataset.slug;
        let pid = element.dataset.pid;
        let position = element.dataset.position;
        let set_location = locationVal == undefined ? null : locationVal;

        let liData = {
            id: id,
            menu_id: menuId,
            p_id: pid,
            label: label,
            slug: slug,
            class: className,
            position: position,
            target: target,
            set_location: set_location,
        };

        allLiData.push(liData);
    });

    return allLiData;
}

// Add Custom Menu Item;
function addCustomMenuItem(getLiSelect) {
    let setData = {
        liMenuId: getLiSelect.getAttribute("data-menu-id"),
        liLabel: getLiSelect.getAttribute("data-label")
            ? getLiSelect.getAttribute("data-label")
            : "custom link",
        liUrl: getLiSelect.getAttribute("data-slug")
            ? getLiSelect.getAttribute("data-slug")
            : "#",
        liClass: getLiSelect.getAttribute("data-class")
            ? getLiSelect.getAttribute("data-class")
            : null,
        liPosition: getLiSelect.getAttribute("data-position")
            ? getLiSelect.getAttribute("data-position")
            : null,
        liTarget: getLiSelect.getAttribute("data-target")
            ? getLiSelect.getAttribute("data-target")
            : null,
    };

    return setData;
}
