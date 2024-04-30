Livewire.on('natureTagifyInit', () => {
    const tagQuery = document.getElementById('tagify');

    const tagify = new Tagify(tagQuery);

    tagify.on('input', () => {
        const value = tagify.value;

        if (value.length > 0) Livewire.dispatch('updateNatureTags', tagify.value)
    });
});

