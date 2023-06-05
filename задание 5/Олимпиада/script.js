$(document).ready(function($){

    $('body').on('input', '.input-ru', function(){
        this.value = this.value.replace(/[^а-яё,\s]/gi, '');
    });
    let id = 1;
    var score;

    let tableVisible = false;
    
    function start () {
            if (!tableVisible) {
                $('.reg-content').toggleClass('is-visible');
                $('body').toggleClass('overflow-hidden');
                tableVisible = true;
            }
    
            let item;
            if ($('#txt').val() == "") $("#new-dialog").modal("show");
            if ($('#txt').val() !== "") {
                
                let str = $('#txt').val().replace(/\s+/g, '');//удаление пробелов
                let names = str.split(',');//массив имен
                for (let i = 1; i < names.length + 1; i++) {
                    
                    $.ajax({
                    type: "GET",
                    url: 'test.php',
                    success: function(data){
                            item = $("<tr><th>" + id + "</th><td>" + names[i - 1] + "</td><td>" + data + "</td></tr>");          
                            $("#newItem").append(item);
                            id++;
                        }
                    });
                    
                }
                $('#txt').val("");
            }
        }
    
    
    $('#btn-reg').on('click', start);
    $("#txt").on("keydown", function(event){
        if (event.which === 13 && $(this).val() !== "") {
            start();
    }});
});