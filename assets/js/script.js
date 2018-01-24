

function sortTable(columnName){
    
    var sort = $("#sort").val();
    $.ajax({
        url:'localhost/krocomumet/C_Admin/admin',
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

