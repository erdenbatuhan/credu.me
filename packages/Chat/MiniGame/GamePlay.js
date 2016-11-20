/**
 * Created by ekrem on 19.11.2016.
 */

var canvas,
ctx, /* center x */
width,
height,
floorPosition = 0,
frames = 0,
score = 0,
bestScore = 0,

states = {Menu: 0, Game : 1, FinalScreen :2};

function main() {
    canvas = document.createElement("canvas");

    width = window.innerWidth;
    height = window.innerHeight;

    if(width >= 500){ /* Decrease the window size in case it's too big */
        width = 320;
        height = 480;
        canvas.style.border = "1px solid #000000";
    }

    canvas.width = width;
    canvas.height = height;
    ctx = canvas.getContext("2d");

    document.body.appendChild(canvas);

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
    floorPosition = (floorPosition - 2) % 25; /* This is used for moving the floor */
}

function render() {
    backgroundImage.draw(ctx,0,0);
    floorImage.draw(ctx,floorPosition,320);
}

main();


