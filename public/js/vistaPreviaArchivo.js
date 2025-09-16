document.addEventListener('DOMContentLoaded', function () {
    const fileInputs = document.querySelectorAll('input[type="file"][data-preview-target]');

    fileInputs.forEach(fileInput => {
        const previewSelector = fileInput.getAttribute('data-preview-target');
        const previewContainer = document.querySelector(previewSelector);

        if (!previewContainer) return;

        fileInput.addEventListener('change', function () {
            previewContainer.innerHTML = '';

            const files = fileInput.files;
            if (files.length === 0) return;

            Array.from(files).forEach(file => {
                const fileWrapper = document.createElement('div');
                fileWrapper.classList.add('p-2', 'border', 'rounded', 'd-flex', 'align-items-center');
                fileWrapper.style.minWidth = '150px';
                fileWrapper.style.maxWidth = '250px';
                fileWrapper.style.overflow = 'hidden';
                fileWrapper.style.whiteSpace = 'nowrap';
                fileWrapper.style.textOverflow = 'ellipsis';
                fileWrapper.style.gap = '5px';

                const fileNameSpan = document.createElement('span');
                fileNameSpan.classList.add('text-truncate');
                fileNameSpan.textContent = file.name;
                fileNameSpan.title = file.name;

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.maxWidth = '40px';
                        img.style.maxHeight = '40px';
                        img.classList.add('img-thumbnail');
                        fileWrapper.prepend(img);
                    };
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    const icon = document.createElement('i');
                    icon.classList.add('bi', 'bi-file-earmark-pdf-fill', 'text-danger', 'fs-3');
                    fileWrapper.prepend(icon);
                } else {
                    const icon = document.createElement('i');
                    icon.classList.add('bi', 'bi-file-earmark', 'fs-3');
                    fileWrapper.prepend(icon);
                }

                fileWrapper.appendChild(fileNameSpan);
                previewContainer.appendChild(fileWrapper);
            });
        });
    });
});
