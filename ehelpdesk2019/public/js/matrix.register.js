

$(document).ready(function(){	

    

    $('select[name="project"]').append('<option value="{{ old("project") }}">Please Select</option>');

    $('select[name="state"]').on('change', function() {  

        var stateId = $(this).val();

        if(stateId){

            $.ajax({ 

                url:'register/getstate'+stateId,

                type:'GET',

                dataType: "json",

                success:function(data){

                  $('select[name="project"]').empty();

                  $('select[name="project"]').append('<option value="{{ old("project") }}">Please Select</option>');

                    $.each(data, function(key, value) {                       

                        $('select[name="project"]').append('<option value="'+ key +'">'+ value +'</option>');

                       

                    });                    

                }

            });

        }else{

            

            $('select[name="project"]').empty();

            

             

        }           

      

        

      });



      $('select[name="departmentArea"]').append('<option value="{{ old("departmentArea") }}">Please Select</option>');

      $('select[name="project"]').on('change', function() {  

          var projectId = $(this).val();

          if(projectId){

              $.ajax({ 

                  url:'register/getdepartment'+projectId,

                  type:'GET',

                  dataType: "json",

                  success:function(data){

                    $('select[name="departmentArea"]').empty();

                    $('select[name="departmentArea"]').append('<option value="{{ old("departmentArea") }}">Please Select</option>');

                      $.each(data, function(key, value) {                       

                          $('select[name="departmentArea"]').append('<option value="'+ key +'">'+ value +'</option>');

                         

                      });                    

                  }

              });

          }else{

              

              $('select[name="departmentArea"]').empty();

              

               

          }           

        

          

        });

      



      $('select[name="project"]').on('change', function(){

          $(this).find("option:selected").each(function(){

            var optionValue = $(this).attr("value");

            if(optionValue){

                $.ajax({ 

                    url:'register/getproject'+optionValue,

                    type:'GET',

                    dataType: "json",

                    success:function(data){

                       $('#address1').val(data[0].address1);

                       $('#address2').val(data[0].address2);

                       $('#postcode').val(data[0].postcode);

                    }

                });

            }else{

                

              

                

                 

            } 

        

        });

    });

    

    $( "#status_id" ).change(function () {

    

      $("#remarks").hide();

      $("#des").hide();

  

    $("#part").hide();

    $("#part1").hide();

    $("#part2").hide();

    $("#date").hide();



    $( "#status_id option:selected" ).each(function() {
     
      if(this.value == '4'){
        $("#des").show();
      
                    
      }
      else 
      if(this.value == '3'){
   
        $("#des").show();
      
                    
      }else
      if(this.value == '5'){

        $("#des").show();
      
                    
      }else
      if(this.value == '6'){
        
        $("#des").show();
      
                    
      }else{
        ("#desc").hide();
      }
     
    });
   
  }).change();



  $( "#department_id" ).change(function () {

    $("#sla").hide();

    $( "#department_id option:selected" ).each(function() {    

       

        if(this.value > '1'){

            $("#sla").hide();

            $("#company").show();

        }

        else{

            $("#sla").show();

            $("#company").hide();

        }



     

     



    });

   

  }).change();



  //datepicker claim

  $('#datepicker').datepicker({

    uiLibrary: 'bootstrap4',

    viewMode: 'years',

        format: 'yyyy-m-d',

       });



//datatable for claim

$('.table').DataTable();



 //count ticket check checkbox

 var checkall = $('.checkall:checked');

  var $checkboxes = $('[name="checkid"]');   

       

    

    $checkboxes.change(function(){

        var count = $checkboxes.filter(':checked').length;

        $('#totalticket').val(count);



        

    

        

    });

    // Select all checkboxes

    

        $('.checkall').click(function (event) { 

            $('[name="checkid"]').prop('checked', this.checked);

            var $checkboxes = $('[name="checkid"]');

            var count = $checkboxes.filter(':checked').length;

            $('#totalticket').val(count);

            

        });

        

        //Count total ticket

        $(".check").click(function(event) {

            var total = 0;

            $(".check:checked").each(function() {

                total += parseInt($(this).val());

            });

            

            if (total == 0) {

                $('#totalticket').val('');

            } else {                

                $('#totalticket').val(total);

            }

        });



        //total price

        function calculateSum(){

          var sumTotal=0;

             $('table tbody tr').each(function() {

               var $tr = $(this);

         

               if ($tr.find('input[type="checkbox"]').is(':checked')) {

                   

                 var $columns = $tr.find('td').next('td');

                  

                  

          var $Cost=parseInt($columns.next('td').html());

                  sumTotal+=$Cost;

               }

             });

         

                $("#totalamount").val(sumTotal);

                

         }

         

           $('#sum').on('click', function() {

              

             calculateSum();

           });

         

           $("input[type='text']").keyup(function() {

              calculateSum();

         

           });

           

            $("input[type='checkbox']").change(function() {

              calculateSum();

         

           });







      $('select[name="brand_id"]').append('<option value="{{ old("brand_id") }}">Choose Brand</option>');  

      $('select[name="inventory_id"]').on('change', function() {       

          var brandId = $(this).val();

          if(brandId){

              $.ajax({ 

                  url:'brand/getbrand'+brandId,

                  type:'GET',

                  dataType: "json",

                  success:function(data){

                    $('select[name="brand_id"]').empty();

                    $('select[name="brand_id"]').append('<option value="{{ old("brand_id") }}">Choose Brand</option>');

                      $.each(data, function(key, value) {                       

                          $('select[name="brand_id"]').append('<option value="'+ key +'">'+ value +'</option>');

                        

                      });                    

                  }

              });            



          }else{

              

              $('select[name="brand_id"]').empty();

              

              

          } });

          

          $('select[name="equipment_id"]').append('<option value="{{ old("equipment_id") }}">Choose Equipment</option>');

          $('select[name="inventory_id"]').on('change', function() { 

            var equipmentId = $(this).val();

            if(equipmentId){

              $.ajax({ 

                  url:'equipment/getequipment'+equipmentId,

                  type:'GET',

                  dataType: "json",

                  success:function(data){

                     $('select[name="equipment_id"]').empty();

                    $('select[name="equipment_id"]').append('<option value="{{ old("equipment_id") }}">Sila Pilih</option>');

                      $.each(data, function(key, value) {                       

                          $('select[name="equipment_id"]').append('<option value="'+ key +'">'+ value +'</option>');

                        

                      });                    

                  }

              });            

  

          }else{

              

              $('select[name="equipment_id"]').empty();

              

              

          }  

            });       

// crete ticket



          $('select[name="equipment_id"]').append('<option value="{{ old("equipment_id") }}">Choose Equipment</option>');

          $('select[name="category_id"]').on('change', function() { 

            var equipmentId = $(this).val();

            if(equipmentId){

              $.ajax({ 

                  url:'ticket/getequipment'+equipmentId,

                  type:'GET',

                  dataType: "json",

                  success:function(data){

                     $('select[name="equipment_id"]').empty();

                    $('select[name="equipment_id"]').append('<option value="{{ old("equipment_id") }}">Sila Pilih</option>');

                      $.each(data, function(key, value) {                       

                          $('select[name="equipment_id"]').append('<option value="'+ key +'">'+ value +'</option>');

                        

                      });                    

                  }

              });            

  

          }else{

              

              $('select[name="equipment_id"]').empty();

              

              

          }  

            });     



            

             

   



            



            

            

});

