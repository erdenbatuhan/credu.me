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
    birdImage = new Environment(img,0,701,30,30);
    redPointImage = new Environment(img,0,701,30,30);
    tenPointImage = new Environment(img,61,701,30,30);
    pointImage = new Environment(img,91,701,30,30);
    bombImage = new Environment(img,123,701,30,30);
}
