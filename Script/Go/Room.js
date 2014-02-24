;go(function() {
var 
	meVideo = document.querySelector("#me video"),

$;

var 
    meeting = new Meeting(),
    rooms = {},

$;

meeting.onmeeting = function(room) {
    if(rooms[room.roomid]) {
        return;
    }

    rooms[room.roomid] = room;

    console.log("Entering " + room.roomid);
    meeting.meet(room);
};

meeting.onaddstream = function(e) {
    var li = template("cam"),
        span_name = document.createElement("span");

    li.appendChild(e.video);

    e.video.removeAttribute("controls");
    if(e.video.id.indexOf("__") > 0) {
        e.video.id = e.video.id.substring(0, e.video.id.lastIndexOf("__"));
    }


    if(e.type === "local") {
        li.id = "me";
        span_name.textContent = "You";
    }
    else {
        span_name.textContent = e.video.id;        
    }
    li.appendChild(span_name);

    dom("#cams").appendChild(li);
};

meeting.onuserleft = function(userid) {
    var video = document.getElementById(userid);
    if (video) {
        video.parentNode.remove();
    }
};

meeting.userid = atob(CONFAB.vars.u) + "__" + Math.round(Math.random() * 99999);

meeting.firebase = "dazzling-fire-5656";
meeting.check();

setTimeout(function() {
    if(Object.keys(rooms).length <= 0) {
        meeting.setup();
    }
}, 5000);

}, /^\/Room\//);