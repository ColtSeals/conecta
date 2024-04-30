function formatPhoneNumber(input) {
    let phoneNumber = input.value.replace(/\D/g, '');

    phoneNumber = phoneNumber.replace(/^(\d{2})(\d)/g, '($1) $2');
    phoneNumber = phoneNumber.replace(/(\d)(\d{4})$/, '$1-$2');

    return phoneNumber;
}

function applyCepMask(input) {
    let value = input.value.replace(/\D/g, '');

    if (/^\d*$/.test(value)) {
        if (value.length === 8) value = value.replace(/(\d{2})(\d{3})(\d{3})/, '$1.$2-$3');

        return value;
    }
}

const addInputMaskEventListener = (input, maskFunction) => {
    if (input) input.addEventListener('input', () => maskFunction(input));
};
