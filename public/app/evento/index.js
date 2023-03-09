$(document).ready(function() {
    load();
    var data_fields = [
        { "id": 1, "text": "nombre", type: 'text', field: 'nombre' },
    ];



    $("#cmb-field").select2({
        theme: "bootstrap4",
        "data": data_fields,
    });



    CI.filter({
        controls: { field: '#cmb-field', operator: '#cmb-operator', value: '#text-value' },
        data: data_fields,
        default_filter: 'byField',
        elemnt_action: '#btn-add-filter',
        text_value: '#text-value',
        content_filters: '#content-filters',
        load: function() {
            load();
        }
    });
    var customize_rules = {

        /* @validation states + elements
        ------------------------------------------- */
        ignore: [],
        errorClass: "state-error",
        validClass: "state-success",
        errorElement: "em",

        /*  rules
        ------------------------------------------ */
        rules: {},

        /* @validation error messages
        ---------------------------------------------- */
        messages: {},

        /* @validation highlighting + error placement
        ---------------------------------------------------- */
        highlight: function(element, errorClass, validClass) {
            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
            $(element).parent().find('.select2 > .selection > .select2-selection').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
            $(element).parent().find('.select2 > .selection > .select2-selection').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function(error, element) {
            if (element.is(":radio") || element.is(":checkbox")) {
                element.closest('.option-group').after(error);
            } else {
                error.insertAfter(element.parent());
                error.insertAfter(element.closest(".field"));
            }
        }
    };

    var rules = $.extend(true, {}, customize_rules);
    rules.rules = {
        nombre: { required: true },
    }
    ModalCRUD.create({
        title: 'Evento',
        element: '.entity-create',
        form_element: '#form-evento-create',
        element_is_load: true,
        isLoadFromAjax: false,
        rules: rules,
        url: function(elemt) {
            return $(elemt).attr('href');
        },
        initialized: function() {
            load_functions();
        },
        afterSuccess: function() {
            load();

        }
    });

    $(document).on('click', '.pagination li a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        load(url);
    });


});


function eliminar($id, $url) {
    swal({
        title: "Dar de baja",
        text: "Estas seguro de dar de baja a este registro",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: $url, //"{{ url('/dashboard/user/delete') }}",
                    method: 'post',
                    data: {
                        id: $id
                    },
                    success: function(dataJson) {
                        if (dataJson.rpt === 1) {
                            swal("Registro eliminado correctamente", {
                                icon: "success",
                            })
                                .then((result) => {
                                    if (result) {
                                        load();
                                    }
                                });
                        }

                    }
                });


            }
            /*else {
                  swal("Your imaginary file is safe!");
                }*/
        });
}

function activar($id, $url) {
    swal({
        title: "Activar Registro",
        text: "Estas seguro activar el registro",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: $url, //"{{ url('/dashboard/user/active') }}",
                    method: 'post',
                    data: {
                        id: $id
                    },
                    success: function(dataJson) {
                        if (dataJson.rpt === 1) {
                            swal("Registro activado correctamente", {
                                icon: "success",
                            })
                                .then((result) => {
                                    if (result) {
                                        load();
                                    }
                                });
                        }

                    }
                });


            }
            /*else {
                  swal("Your imaginary file is safe!");
                }*/
        });
}

function desactivar($id, $url) {

    swal({
        title: "Desactivar Registro",
        text: "Estas seguro desactivar este registro",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: $url, //"{{ url('/dashboard/user/desactive') }}",
                    method: 'post',
                    data: {
                        id: $id
                    },
                    success: function(dataJson) {
                        if (dataJson.rpt === 1) {
                            swal("Registro desactivado correctamente", {
                                icon: "success",
                            })
                                .then((result) => {
                                    if (result) {
                                        load();
                                    }
                                });
                        }

                    }
                });
            }
        });
}

function load(url = null) {
    var filters = get_filters();
    var url = url ? url : url_evento_load;

    $.get(url, filters, function(data) {
        $('#table-content').html(data);
        init_functions();
    });
}

var init_functions = function() {
    ModalCRUD.edit({
        title: 'Evento',
        element: '.edit-entity',
        element_is_load: true,
        form_element: '#form-evento-edit',
        isLoadFromAjax: false,
        url: function(element) {
            return $(element).attr("href");
        },
        initialized: function() {
        },
        afterSuccess: function() {
            load();
        }
    });
}
