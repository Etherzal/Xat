function insertMsg(user,msg){
    $('div#' + user).html($('div#' + user).html() + "<p>" + user + ': ' + msg + "</p>");
}

function getData(){
    $.get('cm.php', function(data) {
        var data2 = data.split("|")
        if ($('div#' + data2[0]).length >= 1){
            insertMsg(data2[0],data2[1]);
        }else{
            $('div#frameChat').append('<div id="' + data2[0] + '" class="chatbox"></div>');
            $('div#chatlist').append('<button>' + data2[0] + '</button>');
            insertMsg(data2[0],data2[1]);
            $('div#chatlist button').unbind('click');
            updateEventsInChat();
        }
        getData();
    });
}

function updateEventsInChat(){
    $('div#chatlist button').click(function(){
        $('#chatlist button').removeClass('active');
        $(this).addClass('active');
        $('.chatbox').removeClass('active');
        if ($('#' + $(this).text()).length >= 1){
            $('#' + $(this).text()).addClass('active');
        }else{
            $('div#frameChat').append('<div id="' + $(this).text() + '" class="chatbox"></div>');
            $('div#chatlist').append('<button>' + $(this).text() + '</button>');
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
            $('div#chatlist button').removeClass('active');
            $('div#chatlist').append('<button class="active">' + $(this).text() + '</button>');
            $('#' + $(this).text()).addClass('active');
        }
        updateEventsInChat();
    })
}

$(document).ready(function(){
    getData();
    
    $("button#send").click(function(){
        $.get('sm.php?m=' + $(".chatbox.active").attr("id") + "|" + $("input#write").attr('value'));
        $(".chatbox.active").html($(".chatbox.active").html() + "<p>" + $('#username').text() + ": " + $("input#write").attr('value') + "</p>");
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