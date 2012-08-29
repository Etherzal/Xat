function getData(){
    $.get('cm.php', function(data) {
        var data2 = data.split("|")
        $('div#' + data2[0]).html($('div#' + data2[0]).html() + "<br>" + data2[1]);
        getData();
    });
}

$(document).ready(function(){
    getData();
    
    $("button#send").click(function(){
        $.get('sm.php?m=' + $(".active").attr("id") + "|" + $("input#write").attr('value'));
        $(".active").html($(".active").html() + "<br>" + $("input#write").attr('value'));
        $("input#write").attr('value',"");
    })
    $('input#write').keydown(function(event){
        if(event.which == 13){
            $("button#send").click();
        }
    })
    $('div#chatlist span').click(function(){
        $('.chatbox').removeClass('active');
        $('#' + $(this).text()).addClass('active');;
    })
})