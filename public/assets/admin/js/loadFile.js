$(() => {
    //Event change file image
    if($('#fileUpload')) {
        $('#fileUpload').change(() => {
            const [file] = fileUpload.files;
            if (file) {
                outputFileUpload.src = URL.createObjectURL(file)
            }
        });
    }

    //Event change multiple file image
    if($('#multipleFileUpload')) {
        $('#multipleFileUpload').change(() => {
            $('#outputMultipleProductFile').html('');
            const multipleFile = multipleFileUpload.files;
            let img;
            if (multipleFile) {
                for (let i = 0; i < multipleFile.length; i++) {
                    img = $(
                        '<img class="img-style" accept=".png, .jpg, .jpeg">');
                    img.attr('src', URL.createObjectURL(multipleFile[i]));
                    img.appendTo('#outputMultipleFile');
                }
            }
        });
    }
});