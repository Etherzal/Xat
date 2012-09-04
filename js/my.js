function scrollBot(){
    if($(".chatbox.active p:last").position()){
        $('.chatbox.active').scrollTop($('.chatbox.active').scrollTop() + $(".chatbox.active p:last").position().top - $(".chatbox.active").height() + 45);
    }
}

function insertMsg(user,msg){
    $('div#' + user).html($('div#' + user).html() + "<p>" + user + ': ' + msg + "</p>");
}

function sendMsg(user,msg){
    $.get('sm.php?u=' + user + "&m=" + escape(msg));
}

function getData(){
    $.getJSON('cm.php', function(data) {
        for (i=0;i<data.length;i++){
            if ($('div#' + data[i].user).length >= 1){
                insertMsg(data[i].user,data[i].msg);
            }else{
                $('div#frameChat').append('<div id="' + data[i].user + '" class="chatbox"></div>');
                $('div#chatlist').append('<button>' + data[i].user + '</button>');
                insertMsg(data[i].user,data[i].msg);
                $('div#chatlist button').unbind('click');
                updateEventsInChat();
            }
        }
        scrollBot();
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
        sendMsg($(".chatbox.active").attr("id"),$("input#write").attr('value'));
        $(".chatbox.active").html($(".chatbox.active").html() + "<p>" + $('#username').text() + ": " + $("input#write").attr('value') + "</p>");
        $("input#write").attr('value',"");
        scrollBot();
    })
    $('input#write').keydown(function(event){
        if(event.which == 13){
            $("button#send").click();
        }
    })
    updateEventsInChat();
    updateEventsInBox();
})