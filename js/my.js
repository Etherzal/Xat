function getData(){
    $.get('cm.php', function(data) {
        $('div#chatbox').html($('div#chatbox').html() + "<br>" + data);
        getData();
    });
}

$(document).ready(function(){
    getData();
    
    $("button#send").click(function(){
        $.get('sm.php?m=' + $("input#write").attr('value'));
        $("input#write").attr('value',"");
    })
    $('input#write').keydown(function(event){
        if(event.which == 13){
            $("button#send").click();
        }
    })
})