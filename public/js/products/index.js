
var product = {};

product.index = {

    config : {
        inputFile : $('input[name="productFile"]', '.js-products'),
        inputContent: $('input[name="fileContent"]'),
        formFile: $('form.js-formFile', '.js-products'),
        submitButton: $('form input[type=submit]', '.js-products'),
        tableProducts: $('#productTable', '.js-products'),
        divInputFile: $('.js-divFileInput', '.js-products')
    },

    init: function() {
        this.config.inputFile.on('change', function(ev){
            var file = ev.target.files[0];
            if (file != '') {
                product.index.config.divInputFile.find('.js-selectedFile').html(file.name);
                // create reader
                var reader = new FileReader();
                reader.readAsText(file);
                reader.onload = function (e) {
                    // browser completed reading file - display it
                    product.index.config.inputContent.val(e.target.result);
                }
                product.index.config.submitButton.removeClass('disabled');
                product.index.config.submitButton.prop('disabled', false);
            } else {
                product.index.config.submitButton.addClass('disabled');
                product.index.config.submitButton.prop('disabled', true);
            }
        });
        var url = $('#productTable', '.js-products').data('url');
        $('#productTable', '.js-products').DataTable({
            "dom": 'frtp',
            "ajax" : {
                "url": url,
            },
            "columns" : [
                { "title": "Code", "class": "code", "data": "code" },
                { "title": "Name", "class": "name", "data": "name"},
                { "title": "Description", "class": "description", "data": "description" }
            ],
            language: {
                paginate: {
                    previous: "<",
                    next: ">",
                    first: "|<",
                    last: ">|"
                }
            }
        });
    },
}

product.index.init();