  Date.prototype.addHours = function(h) {
     this.setTime(this.getTime() + (h*60*60*1000));
     return this;
  }
  Date.prototype.addMinutes = function(m) {
     this.setTime(this.getTime() + (m*60*1000));
     return this;
  }
  Date.prototype.addSeconds = function(s) {
     this.setTime(this.getTime() + (s*1000));
     return this;
  }
  function pageRedirect() {
      $("form.main *").children().removeAttr('required');
      $('#next').click();
    }
  function countdown_timer(timestamp='00:01:00',id="timer"){
      // Set the date we're counting down to
      var time, time_left,timeout;
      var hours =timestamp.substring(0, 2);
      var minutes =timestamp.substring(3, 5);
      var seconds =timestamp.substring(6, 8);
      console.log(hours+':'+minutes+':'+seconds);
      // var countDownDate = new Date().addHours(h).addMinutes(m).addSeconds(s).getTime();
      var countDownDate = new Date().addHours(hours).addMinutes(minutes).addSeconds(seconds).getTime();

      var totalSeconds = 0;
      // Update the count down every 1 second
      var x = setInterval(function() {
      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      if(seconds<10) seconds ='0'+seconds;
      if(minutes<10) minutes ='0'+minutes;
      if(hours<10) hours ='0'+hours;
      // Output the result in an element with id="demo"

      ++totalSeconds;
      // If the count down is over, write some text
      if (distance < 0) {
        timeout="00:"+ pad(parseInt(totalSeconds / 60)) + ":" + pad(totalSeconds % 60);
          clearInterval(x);
          $("#"+id).html("Time-up");
          $("#timer_field").val(timeout);
          $("#countdown_field").val(timeout);
          pageRedirect();
      }
      else{

        $("#"+id).html(" "+hours +":"+ minutes + ":" + seconds);
        $("#countdown_field").val(" "+hours +":"+ minutes + ":" + seconds);
        $("#timer_field").val("00:"+ pad(parseInt(totalSeconds / 60)) + ":" + pad(totalSeconds % 60));
      }

  }, 1000);
  }
  function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
      return "0" + valString;
    } else {
      return valString;
    }
}
