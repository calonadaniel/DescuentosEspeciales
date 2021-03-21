{{--Utiliza propiedad name para obtner el dato en el backend--}}
    {{-- Version para seleccionara el departamento a futuro
    <div class="form-row ">

        <div class="col pt-4">
            <label for="departamento">Departamento</label>
            @if($action == "add")
                <select class="form-control selectpicker" name="{{$action}}_department_ID_Selected"  id="{{$action}}_department_ID_Selected" data-live-search="true" data-parsley-required>
                @foreach($listaDepartamentos as $departamentos)
                    <option data-tokens="{{$departamentos->departmentName}}" value="{{$departamentos->departmentID}}" data-parsley-required>{{$departamentos->departmentName}}</option>
                @endforeach
                </select>
            @elseif($action == "edit")
                <input type="text" class="form-control" name ="{{$action}}_department_name" id="{{$action}}_department_name">
            @endif

        </div>
        <div class="col pt-4">
            <div class="input-field">
                <label for="itemlookupcode">Itemlookupcode:</label>
                @if($action == "add")
                    <input type="text" class="form-control autocomplete" style="style="width:300px;"  name="{{$action}}_itemlookupcode" id="{{$action}}_itemlookupcode" placeholder="" data-parsley-maxlength="25" data-parsley-required data-parsley-required-message="Campo obligatorio" > 

                @elseif($action == "edit")
                    <input type="text" class="form-control autocomplete" style="style="width:300px;" name="{{$action}}_itemlookupcode" id="{{$action}}_itemlookupcode" placeholder="" data-parsley-maxlength="25" data-parsley-required data-parsley-required-message="Campo obligatorio" readonly> 
                @endif
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="col pt-4 input-field">
            <label for="description ">Descripcion:</label>
            <input type="text" class="form-control autocomplete" name="{{$action}}_description" id="{{$action}}_description"  placeholder="" data-parsley-maxlength="30" data-parsley-required data-parsley-required-message="Campo obligatorio">
        </div>
    </div>--------------}}

    <div class="form-row">
        <div class="col pt-4 input-field">
                <label for="itemlookupcode">Itemlookupcode:</label>
                @if($action == "add")
                    <input type="text" class="form-control autocomplete" style="style="width:300px;"  name="{{$action}}_itemlookupcode" id="{{$action}}_itemlookupcode" placeholder="" data-parsley-maxlength="25" data-parsley-required data-parsley-required-message="Campo obligatorio" > 

                @elseif($action == "edit")
                    <input type="text" class="form-control autocomplete" style="style="width:300px;" name="{{$action}}_itemlookupcode" id="{{$action}}_itemlookupcode" placeholder="" data-parsley-maxlength="25" data-parsley-required data-parsley-required-message="Campo obligatorio" readonly> 
                @endif
        </div>

        <div class="col pt-4 input-field">
                <label for="description ">Descripcion:</label>
                <input type="text" class="form-control autocomplete" name="{{$action}}_description" id="{{$action}}_description"  placeholder="" data-parsley-maxlength="30" data-parsley-required data-parsley-required-message="Campo obligatorio">
        </div>
    </div>

    @if($action == "edit")
    <div class="form-row">
        <div class="col pt-4 ">
        <label for="departamento">Departamento</label>
            <input type="text" class="form-control" name ="{{$action}}_department_name" id="{{$action}}_department_name">
        </div>
    </div>
    @endif

    <div class="form-row">
        <div class="col pt-4">
            <label for="tipo_descuento">Tipo Descuento</label>
            <select class="form-control" id="{{$action}}_tipo_descuento" name="{{$action}}_tipo_descuento" data-parsley-required>
                <option>Cupon</option>
                <option>Otros</option>
            </select>
        </div>
        <div class="col pt-4">
            <label for="descuento">Descuento %</label>
            <input type="number" step="any" min="0" max="100" class="form-control" name="{{$action}}_descuento" id="{{$action}}_descuento" placeholder="" data-parsley-type="number"  data-parsley-required data-parsley-required-message="Campo obligatorio">
        </div>

        <div class="col pt-4">
            <label for="fecha_inicia">Fecha Inicio:</label>
            <input type="date" class="form-control" name="{{$action}}_fecha_inicia" id="{{$action}}_fecha_inicia" placeholder="" data-parsley-required data-parsley-required-message="Campo obligatorio">
        </div>
        <div class="col pt-4">
            <label for="fecha_finaliza">Fecha Finalizacion:</label>
            <input type="date" class="form-control" name="{{$action}}_fecha_finaliza" id="{{$action}}_fecha_finaliza" placeholder="" data-parsley-required data-parsley-required-message="Campo obligatorio">
        </div>
    </div>

    <div class="form-row pt-4">
        <div class="col">
            <label for="requisitos">Requisitos</label>
            <textarea class="form-control" name="{{$action}}_requisitos" id="{{$action}}_requisitos" rows="5" placeholder="..." data-parsley-required="false"></textarea>
        </div> 
    </div>
    