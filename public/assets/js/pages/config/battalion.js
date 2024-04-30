const select = $('#select2battalion');

if (select) select.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: select.parent(),
});
