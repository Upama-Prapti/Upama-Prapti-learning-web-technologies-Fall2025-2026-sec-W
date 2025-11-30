document.addEventListener("DOMContentLoaded", function() {
    var clock = document.getElementById("clock");
    
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        
        var hours24 = hours < 10 ? "0" + hours : hours;
        var minutes24 = minutes < 10 ? "0" + minutes : minutes;
        var seconds24 = seconds < 10 ? "0" + seconds : seconds;
        var time24 = hours24 + ":" + minutes24 + ":" + seconds24;
        
        var period = hours >= 12 ? "PM" : "AM";
        var hours12 = hours % 12;
        if (hours12 === 0) {
            hours12 = 12;
        }
        hours12 = hours12 < 10 ? "0" + hours12 : hours12;
        var time12 = hours12 + ":" + minutes24 + ":" + seconds24 + " " + period;
        
        clock.innerText = time24 + " / " + time12;
    }
    
    setInterval(updateClock, 1000);
    
    updateClock();
});

