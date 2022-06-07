$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.previewImage = (() => {
    /**
     * @param {string} boxSelector
     * @param {{
     *  inputName: string,
     *  inputClass: string,
     *  placeholder: string,
     *  style: string,
     * }} options
     */
    function init(boxSelector, options = {}) {
        const box = document.querySelector(boxSelector);

        // create two element input_file + preview_area
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('name', options.inputName);
        input.setAttribute('class', options.inputClass);
        input.setAttribute('placeholder', options.placeholder);
        input.setAttribute('style', options.style);

        const preview = document.createElement('div');
        preview.setAttribute('class', 'img-preview');

        // box.innerHTML = '';
        box.append(input, preview);

        input.addEventListener('change', function (e) {
            if (e.target.files.length) {
                const image_preview = document.querySelector('#image-preview');
                image_preview.innerHTML = '';
                const src = URL.createObjectURL(e.target.files[0]);
                // generate preview img element
                const img = document.createElement('img');
                img.setAttribute('width', '120px');
                img.setAttribute('class', 'pt-2');
                img.src = src;

                preview.innerHTML = '';
                preview.appendChild(img)
            }
        })
    }

    return {
        init
    }
})()




