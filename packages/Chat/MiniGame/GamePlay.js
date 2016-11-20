/**
 * Created by ekrem on 19.11.2016.
 */

var canvas,
ctx,
width,
height,

states = {Menu: 0, Game : 1, FinalScreen :2};

function main() {
    canvas = document.createElement("canvas");

    width = window.innerWidth;
    height = window.innerHeight;

    if(width >= 500){ /* Decrease the window size in case it's too big */
        width = 320;
        height = 480;
        canvas.style.border = "1px solid =000";
    }

    canvas.width = width;
    canvas.height = height;
    ctx = canvas.getContext("2d");

    document.body.appendChild(canvas);
}
function run() {
}

main();


