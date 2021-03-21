data-department_ID_Selected="{{$producto->departmentID}}"
data-department_name="{{$producto->departmentName}}" {{--El nombre del departamento para el modal edit--}}
data-itemlookupcode="{{$producto->itemlookupcode}}"
data-description="{{$producto->description}}"
data-tipo_descuento="{{$producto->tipoDesc}}"
data-descuento="{{number_format((float)$producto->descuento, 2, '.', '')}}"
data-fecha_inicia="{{\Carbon\Carbon::parse($producto->fechaInicia)->format('Y-m-d')}}"
data-fecha_finaliza="{{\Carbon\Carbon::parse( $producto->fechaFinaliza)->format('Y-m-d')}}"
data-requisitos="{{$producto->requisitos}}"



