import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone",
{
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true, 
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function()
    {
        if(document.querySelector('[name="imagen"]').value.trim())
        {
            const imagePublicada = {};
            imagePublicada.size = 1234;
            imagePublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagePublicada);
            this.options.thumbnail.call(this, imagePublicada, `/uploads/${imagePublicada.name}`);
            imagePublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('sending', function(file, xhr, formdata)
{
    console.log(file);
});

dropzone.on('success', function(file, response)
{
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('error', function(file, message)
{
    console.log(message);
});

dropzone.on('removedfile', function()
{
    document.querySelector('[name="imagen"]').value = "";
});