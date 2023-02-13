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
