function ajaxLoad(filename, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.loading').show();
    $.ajax({
        type: "GET",
        url: filename,
        contentType: false,
        success:function(data){
            console.log(data);
            console.log(filename);
            console.log(content);
            $('#list').html($(data));
            $('.loading').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
$(document).ready(function () {
    ajaxLoad('employees/list');
});