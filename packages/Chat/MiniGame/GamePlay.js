/**
 * Created by ekrem on 19.11.2016.
 */

var canvas,
ctx, /* context */
width,
height,
floorPosition = 0,
okbtn,
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

            var mx = event.offsetX, my = event.offsetY;

            if(okbtn.x < mx && mx < okbtn.x + okbtn.width &&
                okbtn.y < my && my < okbtn.y + okbtn.height)
            {

                currentState = states.Menu;
                Item.reset();
                score = 0;
            }
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

        okbtn = {

            x: (width - playAgainImage.width)/2,
            y: height - 200,
            width: playAgainImage.width,
            height: playAgainImage.height
        };

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
    if(currentState === states.Game){
        Item.update();
    }
    bird.update();
}

function render() {
    backgroundImage.draw(ctx,0,0);
    bird.draw(ctx);
    Item.draw(ctx);
    floorImage.draw(ctx,floorPosition,320);

    if(currentState === states.Menu){

        tapToPlayImage.draw(ctx,(width/2)- tapToPlayImage.width/2,height-330);
    }

    else if(currentState === states.FinalScreen){

        GameOverImage.draw(ctx,(width/2)- GameOverImage.width/2,height-400);
        scoreBoardImage.draw(ctx,(width/2)- scoreBoardImage.width/2,height-340);
        playAgainImage.draw(ctx,(width/2)- playAgainImage.width/2,height-220);

    }

    else{
        //need to be fixed in the Environment
        smallNumberImage.draw(ctx,null,20,4,width/2);

    }
}

main();


