
var client = {};

client.index = {

    config : {
        formClient: $('form.js-formClient', '.js-clients'),
        submitButton: $('form input[type=submit]', '.js-clients'),
        tableClients: $('#clientsTable', '.js-clients'),
        formField: $('fieldset', '.js-clients'),
        multiSelect: $('.js-multiSelect', '.js-clients')
    },

    init: function() {
        this.config.formClient.on('submit', this.validateForm);
        this.config.formField.on('click', this.removeError);
        this.config.multiSelect.multiselect({
            buttonWidth: '200px'
        });
        var url = $('#clientsTable', '.js-clients').data('url');
        this.config.tableClients.DataTable({
            "dom": '<"top"f>rt<"bottom"p><"clear">',
            "ajax" : url,
            "columns" : [
                { "title": "DNI", "class" : "id", "data": "id_num" },
                { "title": "Name", "class": "name", "data": "name"},
                { "title": "Surname", "class": "surname", "data": "surname" },
                { "title": "Email", "class": "email", "data": "email" },
                { "title": "Address", "class": "address", "data": "address" },
                { "title": "Phone", "class": "phone", "data": "phone" },
                { "title": "Products", "class": "products", "data": "products" },
                { "title": "Actions", "class": "actions", "data": "actions" }
            ],
            language:
            {
                paginate:
                {
                    previous: "<",
                    next: ">",
                    first: "|<",
                    last: ">|"
                }
            }

        });
    },
    validateForm: function(ev){
        var ack = true;
        var name = $('input[name="name"]', '.js-clients').val()
        if (name == undefined || name.length == 0) {
            ack = false;
            $('input[name="name"]', '.js-clients').closest('fieldset').append('<span class="error"> *Field required</span>')
        }
        var surname = $('input[name="surname"]', '.js-clients').val()
        if (surname == undefined || surname.length == 0) {
            ack = false;
            $('input[name="surname"]', '.js-clients').closest('fieldset').append('<span class="error"> *Field required</span>')
        }
        var phone = $('input[name="phone"]', '.js-clients').val()
        if (phone == undefined || phone.length <= 0) {
            ack = false;
            $('input[name="phone"]', '.js-clients').closest('fieldset').append('<span class="error"> *Field required</span>')
        }
        var email = $('input[name="email"]', '.js-clients').val()
        if (email == undefined || email.length <= 0) {
            ack = false;
            $('input[name="email"]', '.js-clients').closest('fieldset').append('<span class="error"> *Field required</span>')
        }
        var id_num = $('input[name="id_num"]', '.js-clients').val()
        if (id_num == undefined || id_num.length <= 0) {
            ack = false;
            $('input[name="id_num"]', '.js-clients').closest('fieldset').append('<span class="error"> *Field required</span>')
        }

        if (!ack) {
            return false;
        }
    },
    removeError: function() {
        if ($(this).hasClass('error')) {
           $(this).remove();
        }
        $(this).find('span.error').remove();
    }
}

client.index.init();