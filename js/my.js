function insertMsg(user,msg){
    $('div#' + user).html($('div#' + user).html() + "<br>" + user + ': ' + msg);
}

function getData(){
    $.get('cm.php', function(data) {
        var data2 = data.split("|")
        if ($('div#' + data2[0]).length >= 1){
            insertMsg(data2[0],data2[1]);
        }else{
            $('div#frameChat').append('<div id="' + data2[0] + '" class="chatbox"></div>');
            $('div#chatlist').append('<span>' + data2[0] + '</span>');
            insertMsg(data2[0],data2[1]);
            $('div#chatlist span').unbind('click');
            updateEventsInChat();
        }
        getData();
    });
}

function updateEventsInChat(){
    $('div#chatlist span').click(function(){
        $('.chatbox').removeClass('active');
        if ($('#' + $(this).text()).length >= 1){
            $('#' + $(this).text()).addClass('active');
        }else{
            $('div#frameChat').append('<div id="' + $(this).text() + '" class="chatbox"></div>');
            $('div#chatlist').append('<span>' + $(this).text() + '</span>');
        }
    })
}

function updateEventsInBox(){
    $('div#usersBox li').click(function(){
        $('.chatbox').removeClass('active');
        if ($('#' + $(this).text()).length >= 1){
            $('#' + $(this).text()).addClass('active');
        }else{
            $('div#frameChat').append('<div id="' + $(this).text() + '" class="chatbox"></div>');
            $('div#chatlist').append('<span>' + $(this).text() + '</span>');
            $('#' + $(this).text()).addClass('active');
        }
        updateEventsInChat();
    })
}

$(document).ready(function(){
    getData();
    
    $("button#send").click(function(){
        $.get('sm.php?m=' + $(".active").attr("id") + "|" + $("input#write").attr('value'));
        $(".active").html($(".active").html() + "<br>" + $('#username').text() + ": " + $("input#write").attr('value'));
        $("input#write").attr('value',"");
    })
    $('input#write').keydown(function(event){
        if(event.which == 13){
            $("button#send").click();
        }
    })
    updateEventsInChat();
    updateEventsInBox();
})