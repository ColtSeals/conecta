const select2question = $('#select2question');

if (select2question) select2question.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: select2question.parent(),
});
