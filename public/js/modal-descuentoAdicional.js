    /*Script para <-  ver - editar - borrar -> la informacion de un expediente por medio del modal*/
    var add = "add";
    validateform(add)

    //var show = "show";
    //modaldata(show)

    var edit = "edit";
    modaldata(edit)
    validateform(edit)

    var deletee = "delete";
    modaldata(deletee)

    //Con esta funcion muestro los datos en los respectivos modales la cual es inicilializada con un string indicando la accion
    function modaldata(str_action) {

        //El string se coloca en el id modal para generar la info para dicho modal
        $('#Modal-'+str_action).on('show.bs.modal', function(event){
            //El modal-delete solo necesita el id_expediente para borrar el exediente
            if(str_action == "delete"){
                var button = $(event.relatedTarget)
                var itemlookupcode = button.data('itemlookupcode')
                var modal = $(this);
                modal.find('.modal-body #delete_itemlookupcode').val(itemlookupcode)
            }else if(str_action == "show"||"edit") { //Los modales de ver y editar utiliza la misma informacion 
            var button = $(event.relatedTarget)
            var department_ID_Selected= button.data('department_ID_Selected')
            var department_name = button.data('department_name')
            var itemlookupcode = button.data('itemlookupcode')
            var description = button.data('description')
            var tipo_descuento = button.data('tipo_descuento')
            var descuento = button.data('descuento')
            var fecha_inicia = button.data('fecha_inicia')
            var fecha_finaliza = button.data('fecha_finaliza')
            var requisitos = button.data('requisitos')
    
            var modal = $(this);
            
            //modal.find('.modal-title').text('Texto dinamico')
            modal.find('.modal-body #'+str_action+'_department_ID_Selected').val(department_ID_Selected)
            modal.find('.modal-body #'+str_action+'_department_name').val(department_name)
            modal.find('.modal-body #'+str_action+'_itemlookupcode').val(itemlookupcode)
            modal.find('.modal-body #'+str_action+'_description').val(description)
            modal.find('.modal-body #'+str_action+'_tipo_descuento').val(tipo_descuento)
            modal.find('.modal-body #'+str_action+'_descuento').val(descuento)
            modal.find('.modal-body #'+str_action+'_fecha_inicia').val(fecha_inicia)

            modal.find('.modal-body #'+str_action+'_fecha_finaliza').val(fecha_finaliza)
            modal.find('.modal-body #'+str_action+'_requisitos').val(requisitos)

            //El modal de ver  solo debe mostrar la informacion sin que esta pueda ser editable por lo que se desactivan
            //sus campos dejando solo los botones de cerrar y dismiss habilitados.
            if(str_action =="show"){
                $('#Modal-show *').prop('disabled', true); 
                $('.btn-secondary').attr('disabled',false);
                $('.close').attr('disabled',false);
            }

            if(str_action == "edit"){
                //$('#Modal-edit *').prop('disabled', true); 
                modal.find('.modal-body #'+str_action+'_department_name').prop('disabled', true)
                modal.find('.modal-body #'+str_action+'_description').prop('disabled', true)
                $('.btn-secondary').attr('disabled',false);
                $('.close').attr('disabled',false);
            }
        }
        });
    }



     /*Validacion client-side del formulario para las acciones de agregar y editar descuentos
    para mejorar el funcionamiento para el usuario y evitar recargar la pagina completa
    Estas validaciones son complementarias a las del server-side*/ 
    function validateform(action) {
        $('#productoform-'+ action).parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
            return true; 
        });
    }


