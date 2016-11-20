/**
 * Created by ekrem on 19.11.2016.
 */
var bird = {
        xPos : 80,
        yPos : 0,
        velocity : 0,
        birdFrame : 0,
        rotation : 0,
        gravity : 0.25,
        jumpPower : 4.6,

    jump: function() {
        this.velocity = -this.jumpPower;

    },

    update: function() {

    },

    draw: function(ctx) {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.rotation);

        birdImage.draw(ctx, birdImage.width / 2, birdImage.height / 2);
        ctx.restore();
    }
};