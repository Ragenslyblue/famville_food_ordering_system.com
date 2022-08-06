<div>
  <textarea id="display-area" style="font-size: 18px; color:chartreuse; height:22px; background-color: black; padding-left:16px; padding-right: 12px;  width:133px; border: groove; border-width: 4px; border-color: goldenrod; border-radius: 3px; resize:none; overflow:hidden">
  00:00:00.000</textarea>
</div>
<input id="stop_btn" type="hidden" value="stop"/>

<div>
  <textarea id="display-area2" style="font-size: 18px; color:chartreuse; height:22px; background-color: black; padding-left:16px; padding-right: 12px;  width:133px; border: groove; border-width: 4px; border-color: goldenrod; border-radius: 3px; resize:none; overflow:hidden">
  00:00:00.000</textarea>
</div>
<input id="stop_btn2" type="hidden" value="stop"/>
<script type="text/javascript">
var timer;
var timer2;
var startTime;
var startTime2;

function start() {
  startTime = parseInt(localStorage.getItem('startTime') || Date.now());
  localStorage.setItem('startTime', startTime);
  timer = setInterval(clockTick, 100);
}
function start2(){
    startTime2=parseInt(localStorage.getItem('startTime2') || Date.now());
    localStorage.setItem('startTime2', startTime2);
    timer2 = setInterval(clockTick, 100);
}

function stop() {
  clearInterval(timer);
}
function stop2(){
    clearInterval(timer2);
}

function reset() {
  clearInterval(timer);
  localStorage.removeItem('startTime');
  document.getElementById('display-area').innerHTML = "00:00:00.000";
}

function reset2() {
  clearInterval(timer2);
  localStorage.removeItem('startTime2');
  document.getElementById('display-area2').innerHTML = "00:00:00.000";
}

function clockTick() {
  var currentTime = Date.now(),
    timeElapsed = new Date(currentTime - startTime),
    hours = timeElapsed.getUTCHours(),
    mins = timeElapsed.getUTCMinutes(),
    secs = timeElapsed.getUTCSeconds(),
    ms = timeElapsed.getUTCMilliseconds(),
    display = document.getElementById("display-area");
    
    timeElapsed2 = new Date(currentTime - startTime2),
    hours = timeElapsed2.getUTCHours(),
    mins = timeElapsed2.getUTCMinutes(),
    secs = timeElapsed2.getUTCSeconds(),
    ms = timeElapsed2.getUTCMilliseconds(),
    display2 = document.getElementById("display-area2");

  display.innerHTML =
    (hours > 9 ? hours : "0" + hours) + ":" +
    (mins > 9 ? mins : "0" + mins) + ":" +
    (secs > 9 ? secs : "0" + secs) + "." +
    (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
    
  display2.innerHTML =
    (hours > 9 ? hours : "0" + hours) + ":" +
    (mins > 9 ? mins : "0" + mins) + ":" +
    (secs > 9 ? secs : "0" + secs) + "." +
    (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
};

var stopBtn = document.getElementById('stop_btn');
var stopBtn2 = document.getElementById('stop_btn2');


stopBtn.addEventListener('click', function() {
  stop();
})
start();

stopBtn2.addEventListener('click', function() {
  stop();
})
start2();

</script>
