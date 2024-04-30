const select2Table = $('#select2Table');
const select2Form = $('#select2Form');

if (select2Table) select2Table.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: select2Table.parent(),
});

if (select2Form) select2Form.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: select2Form.parent(),
});

Livewire.on('resetSelectForm', function () {
    if (select2Form) select2Form.val('').trigger('change');
});
