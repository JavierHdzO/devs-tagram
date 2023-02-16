import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const fromDropzone = document.getElementById("dropzone");

const dropzone = new Dropzone(fromDropzone, {
    dictDefaultMessage:'Upload image here',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Delete file',
    maxFiles:1,
    uploadMultiple: false,
    init: function() {
        const imageName = document.querySelector('[name="image"]').value.trim();
        if(imageName){
            const image = {};
            image.size = 1234;
            image.name = imageName;
            this.options.addedfile.call(this, image);
            this.options.thumbnail.call(this, image, `/uploads/${image.name}`);

            image.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});


dropzone.on('success', (file, response) =>{
    document.querySelector('[name="image"]').value = response.image;
});

dropzone.on('removedfile', ( file ) =>{
    document.querySelector('[name="image"]').value = "";
});
