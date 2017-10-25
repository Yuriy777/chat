function sendData(data, callback){
    $.post("http://learn/chat/server.php",JSON.stringify(data),callback, "json");
}

$(document).on('submit', function(e) {
     e.preventDefault();
     var name = $('#name').val();
    var mess = $('#message').val();
    var time = new Date().getTime();
    sendData({
        func: 'addMessage',
        nick: name,
        message: mess,
        time: time
    });
    $('#name').val('');
    $('#message').val('');
});
var messId = 0;

function getMessage(data) {
    $.each(data, function (index, value) {
        var datePost = parseData(+value.timestamps);
        $('#result').prepend('<div><p>' + datePost +'</p><strong>' + value.nick + ': </strong><span>' + value.message + '</span></div>');
        if(messId < +value.id) {
            messId = +value.id;
        }
    });
}


 setInterval(function(){
    var mess =  {
        func: 'getMessages',
        messageId: messId
    }
    sendData(mess, getMessage);
}, 2000);

//функция ParseData
function parseData(dat) {
    var date = new Date();
    date.setTime(dat);
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    return day + "." + month + "." + year + " " + hours + ":" + minutes + ":" + seconds;
}
