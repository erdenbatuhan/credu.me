/**
 * Created by ekrem on 19.11.2016.
 */

var canvas,
ctx, /* context */
width,
height,
floorPosition = 0,
frames = 0,
score = 0,
bestScore = 0,
currentState,

states = {Menu: 0, Game : 1, FinalScreen :2};

/* eventListener function */
function onpress(event) {
    switch(currentState){
        case states.Menu:
            currentState = states.Game;
            bird.jump();
            break;
        case states.Game:
            bird.jump();
            break;
        case states.FinalScreen:
            break;
    }
}

function main() {
    canvas = document.createElement("canvas");

    width = window.innerWidth;
    height = window.innerHeight;

    var event = "touchstart";
    if(width >= 500){ /* Decrease the window size in case it's too big */
        width = 320;
        height = 480;
        canvas.style.border = "1px solid #000000";
        event = "mousedown";
    }
    document.addEventListener(event,onpress);

    canvas.width = width;
    canvas.height = height;
    ctx = canvas.getContext("2d");

    currentState = states.Menu;

    document.body.appendChild(canvas);

    /* Loading sprite */
    var img = new Image();
    img.onload = function() {
        initEnvironment(this);
        run();
    };
    img.src = "res/imageSprite.png";
}

function run() {
    var loop = function(){
        update();
        render();
        window.requestAnimationFrame(loop,canvas);
    };
    window.requestAnimationFrame(loop,canvas);
}

function update() {
    frames ++;
    if(currentState !== states.FinalScreen) {
        floorPosition = (floorPosition - 2) % 20;
        /* This is used for moving the floor in Menu and Game states */
    }
    bird.update();
}

function render() {
    backgroundImage.draw(ctx,0,0);
    bird.draw(ctx);
    floorImage.draw(ctx,floorPosition,320);
}

main();


