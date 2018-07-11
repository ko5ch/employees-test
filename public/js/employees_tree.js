$(document).ready(function(){
    $('#tree  ul li a').live('click',function(){
        var id=$(this).attr('id');
        $('#'+id+' span ul ').toggle();
        $.ajax({
            type:'GET',
            url:'/employees/'+id,
            data:{},
            dataType:'html',
            success:function(data){
                $('#'+id+' span ul').html($('#tree ul li', data));
            },
            error:function(){alert('Error!')}
        });

        return false;
    });
});