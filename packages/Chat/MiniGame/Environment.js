/**
 * Created by ekrem on 19.11.2016.
 */

var backgroundImage,
    floorImage,
    GameOverImage,
    birdImage,
    playAgainImage,
    redPointImage,
    pointImage,
    tenPointImage,
    thugBirdImage,
    scoreBoardImage,
    tapToPlayImage,
    smallNumberImage,
    bigNumberImage,
    bombImage;

/* This is used for retrieving images from single PNG file */
/* x,y values stand for the starting coordinate of the image */
/* width-height stand for the width and height of the image */

function Environment(img,x,y,width,height){
    this.img = img;
    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
};

Environment.prototype.draw = function(ctx,x,y){
    ctx.drawImage(this.img,this.x,this.y,this.width,this.height,x,y,this.width,this.height);
};

function initEnvironment(img) {
    backgroundImage = new Environment(img, 0, 0, 320,490);
    floorImage = new Environment(img,0,510,400,161);
    birdImage = new Environment(img,0,701,30,30);
    redPointImage = new Environment(img,0,701,30,30);
    tenPointImage = new Environment(img,61,701,30,30);
    pointImage = new Environment(img,91,701,30,30);
    bombImage = new Environment(img,123,701,30,30);
    thugBirdImage = new Environment(img,0,750,150,50);
    GameOverImage = new Environment(img,0,820,190,50);
    scoreBoardImage = new Environment(img,0,870,250,150);
    playAgainImage = new Environment(img,0,1000,250,50);
    tapToPlayImage = new Environment(img,0,1050,150,100);
    smallNumberImage = new Environment(img, 0, 1158, 152, 14);
    bigNumberImage = new Environment(img, 0, 1181, 160, 18);

    // Below is for writing score to the screen and converting numbers to image
    smallNumberImage.draw = bigNumberImage.draw = function(ctx, x, y, num, center, offset) {
        num = num.toString();

        var step = this.width + 2;

        if (center) {
            x = center - (num.length*step-2)/2;
        }
        if (offset) {
            x += step*(offset - num.length);
        }

        for (var i = 0, len = num.length; i < len; i++) {
            var n = parseInt(num[i]);
            ctx.drawImage(img, step*n, this.y, this.width, this.height, x, y, this.width, this.height)
            x += step;
        }
    }

}
