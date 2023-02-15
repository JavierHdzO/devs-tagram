import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const fromDropzone = document.getElementById("dropzone");

const dropzone = new Dropzone(fromDropzone, {
    dictDefaultMessage:'Upload image here',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Delete file',
    maxFiles:1,
    uploadMultiple: false
});


dropzone.on('success', (file, response) =>{
    console.log(response);
});

dropzone.on('sending', ( file, xhr, formData ) => {
    console.log(formData);
});
