/**
 * Created by ekrem on 19.11.2016.
 */

var backgroundImage,
    floorImage,
    birdImage,
    redPointImage,
    tenPointImage,
    pointImage,
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
    birdImage = new Environment(img,0,687,80,80);
    redPointImage = new Environment(img,0,787,80,80);
    tenPointImage = new Environment(img,80,787,80,80);
    pointImage = new Environment(img,165,787,80,80);
    bombImage = new Environment(img,248,787,80,80);
}
