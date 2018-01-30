

function sortTable(columnName){
    
    var sort = $("#sort").val();
    $.ajax({
        url:'/krocomumet/C_Admin/admin',
        type:'post',
        data:{columnName:columnName,sort:sort},
        success: function(response){
       
            $("#table_data tr:not(:first)").remove();
            
            $("#table_data").append(response);
            if(sort == "asc"){
                $("#sort").val("desc");
            }else{
                $("#sort").val("asc");
            }
                        
        }
    });
}

function editKota(){
    var provinsi = $("#provinsi_name").val();
    $.ajax({
        url:'/krocomumet/C_Admin/editKota',
        type:'get',
        data:{provinsi:provinsi},
        success: function(response){
            alert(response);
                        
        }
    });
}

function change_provinsi(){
    
    $.ajax({
        url:'/krocomumet/C_Admin/editProvinsi',
        type:'get',
        // data:{provinsi:provinsi},
        success: function(response){
            var dropdown = response;
             var span = "<span id=\"editKota\" onclick=\"editKota();\" class=\"btn btn-xl glyphicon glyphicon-repeat\"></span>";
            //var span = "<span  onclick=\"editKota();\" class=\"btn btn-xl glyphicon glyphicon-repeat\"></span>";
            $("#provinsi_label").remove();
            $("#change_provinsi").remove();
            
            $("#provinsi_holder").append(dropdown);
            $("#provinsi_holder").append(span);
            // alert(dropdown);
            
                        
        }
    });
}
// $(document).ready(function(){
//     $("#change_provinsi").click(function(){
//         $("#provinsi_label").remove();
//     });
// });

