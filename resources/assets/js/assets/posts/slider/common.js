export function openPopupSubCat () {
    $(this).children('.sidebar-modal').toggle();
}

export function addChooseIco () {
    $(this).children('.choose-ico').toggle();
}

export function addSubCat (dataType, subCatId) {
    $(`[data-type=${dataType}]`).find('jdshf').append();
}

