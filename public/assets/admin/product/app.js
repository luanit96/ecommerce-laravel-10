$(() => {
    $(".tags_select2_choose").select2({
        tags: true,
        placeholder: "Enter Tag",
        tokenSeparators: [',']
    });
    $(".category_select2").select2({
        placeholder: "--Select Category--",
        allowClear: true
    });

    //summernote config
    let lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    let LFMButton = function(context) {
      let ui = $.summernote.ui;
      let button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render()
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote-editor').summernote({
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['popovers', ['lfm']],
      ],
      buttons: {
        lfm: LFMButton
      }
    })

    //Event change product file image
    productFile.onchange = e => {
        const [file] = productFile.files;
        if (file) {
            outputProductFile.src = URL.createObjectURL(file)
        }
    }

    //Event change product multiple file image
    multipleProductFile.onchange = e => {
        $('#outputMultipleProductFile').html('');
        const multipleFile = multipleProductFile.files;
        let img;
        if (multipleFile) {
            for (let i = 0; i < multipleFile.length; i++) {
                img = $(
                    '<img class="img-product" accept=".png, .jpg, .jpeg">');
                img.attr('src', URL.createObjectURL(multipleFile[i]));
                img.appendTo('#outputMultipleProductFile');
            }
        }
    }

});