function getTime() {
    var time = new Date();
    var ampm = time.getHours( ) >= 12 ? ' PM' : ' AM';

    var hours = time.getHours();
    hours = hours % 12;
    hours = hours ? hours : 12;
    hours = ('0' + hours).slice(-2)
    var minutes = ('0' + time.getMinutes()).slice(-2);
    var seconds = ('0' + time.getSeconds()).slice(-2);

    //var x1 = time.getMonth() + 1 + "/" + time.getDate() + "/" + time.getFullYear(); 
    var clock = hours + ":" +  minutes + ":" +  seconds + " " + ampm;
    document.querySelector('.timedate').innerHTML = clock;
}

$(document).ready(function() {
    getTime();
    setInterval(getTime, 1000);
});
