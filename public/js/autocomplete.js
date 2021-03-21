    
    // $("#departmentIDSelected").on("change",function(){
    //     //Getting Value
    //     //var selValue = $("#departmentIDSelected").val();
    //     //Setting Value

    //    // searcode();
    //     //searhDescription();
    //     //$("#textFieldValueJQ").val(selValue)
        
    //     //console.log(selValue);
    // });   
        // $("#departmentIDSelected").on("change",function(){
        //     //Getting Value
        //     departmentID = $("#departmentIDSelected").val();
        //     //Setting Value
    
        //    // searcode();
        //     //searhDescription();
        //     //$("#textFieldValueJQ").val(selValue)
            
        //     //console.log(selValue);

        //     //return departmentID
        // });

 
    
    $( document ).ready(function(){
        /*console.log("test");*/
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            /*url: '{{ url("") }}'*/
            url: 'producto-search',
            success:function(response){
                //console.log(response);
                //var itemArray = response;
                var array = {};
                var array2 = {};//Buscar por decripcion
                var array3 = {};//Buscar por Itemlookupcode
                var departmentID;
               //var departmentID;
               //departmentID =  $("#departmentIDSelected").val();
               //departmentID = departmentchanged(departmentID);
               //console.log(departmentID)

                for(var i = 0, i; i < response.length; i++ ) {
                    array [ response[i].itemlookupcode] = null;
                        //console.log(response[i].departmentid)
                        //array2 [ response[i].description] = response[i];
                   
                    array3 [ response[i].itemlookupcode] = response[i];
                    
                }
                //console.log(array);
                //console.log(array2);
                //console.log(departmentID);
                $('input#add_itemlookupcode').autocomplete({
                    data:array3,
                    minLength:3,
                    cacheable:false,
                    limit:20,
                    delay:300,
                    //scroll: true,
                    //scrollHeight: 180,
                    onAutocomplete:function(reqdata){
                        //console.log(reqdata);
                        // $('Modal-add').on('show.bs.modal', function (e) {
                        //     $("input#add_itemlookupcode").val(array2[reqdata]['itemlookupcode']);
                        //  })
                        // //console.log(reqdata);
                        $('#add_itemlookupcode').val(array3[reqdata].itemlookupcode);
                        $('#add_description').val(array3[reqdata].description);
                    }
                });
            }
        })
    }); 



    $( document ).ready(function(){
        /*console.log("test");*/
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            /*url: '{{ url("") }}'*/
            url: 'producto-search',
            success:function(response){
                //console.log(response);
                //var itemArray = response;
                var array = {};
                var array2 = {};//Buscar por decripcion
                var array3 = {};//Buscar por Itemlookupcode
                var departmentID;
                                   
                //departmentID =  $("#departmentIDSelected").val();
                //departmentID = departmentchanged(departmentID);

                for(var i = 0, i; i < response.length; i++ ) {
                    array [ response[i].itemlookupcode] = null;
                        //console.log(response[i].departmentid)
                       
                            array2 [ response[i].description] = response[i];
                        
                        //array3 [ response[i].itemlookupcode] = response[i];
                }
                //console.log(array);
                //console.log(array2);
                $('input#add_description').autocomplete({
                    data:array2,
                    minLength:3,
                    delay:300,
                    cacheable:false,
                    limit:20,
                    scroll: true,
                    scrollHeight: 180,
                    onAutocomplete:function(reqdata){
                        //console.log(reqdata);
                        // $('Modal-add').on('show.bs.modal', function (e) {
                        //     $("input#add_itemlookupcode").val(array2[reqdata]['itemlookupcode']);
                        //  })
                        // //console.log(reqdata);
                        $('#add_itemlookupcode').val(array2[reqdata].itemlookupcode);
                        $('#add_description').val(array2[reqdata].description);
                    }
                });
            }
        })
    }); 