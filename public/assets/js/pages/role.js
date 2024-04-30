Livewire.on('initTagify', (data) => {
    const element = document.querySelector("#tagify");

    const whitelist = data.data.map(item => item.name)

    const options = {
        whitelist: whitelist,
        maxTags: data.count,
        dropdown: {
            classname: "",
            enabled: 0,
            closeOnSelect: !1
        }
    }

    const tagify = new Tagify(element, options)

    tagify.on('add', () => {
        Livewire.dispatch('updateData', { data: tagify.value })
    })
})
