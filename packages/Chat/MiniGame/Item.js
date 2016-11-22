/**
 * Created by ekrem on 19.11.2016.
 */
var Item = {

    bombs : [],
    points : [],

    reset : function() {
        this.bombs = [];
        this.points = [];
    },

    update : function(){

        /* Send bombs - points per 100 frame */
        if (frames % 100 === 0) {
            var bombPosition = 20 + 250 * Math.random();
            this.bombs.push({
                x: 500 + 100 * Math.random(),
                y: bombPosition,
                width : bombImage.width,
                height : bombImage.height
            });
            var pointPosition = 20 + 250 * Math.random();
            this.points.push({
                x: 500 + 100 * Math.random(),
                y: pointPosition,
                width : pointImage.width,
                height : pointImage.height
            });
        }
        /* Clear the items that left the window */
        for (var i = 0 , len = this.bombs.length; i < len; i++) {
            var bomb = this.bombs[i];
            detectBombCollision(bomb);

            bomb.x -= 2;
            if (bomb.x < -20) {
                this.bombs.splice(i, 1);
                i--;
                len--;
            }
        }

        for (var i = 0, len = this.points.length; i < len; i++){
            var point = this.points[i];
            detectPointCollision(point);
            point.x -=3;
            if(point.x < -20){
                this.points.splice(i,1);
                i--;
                len--;
            }
        }

        function detectBombCollision(bomb) {
            var distanceX = bird.xPos - bomb.x;
            var distanceY = bird.yPos - bomb.y;

            var sumRadius = bird.birdRadius + bomb.width/2;
            var sqrRadius = sumRadius * sumRadius;

            var distSqr = (distanceX * distanceX) + (distanceY * distanceY);

            if (distSqr <= sqrRadius) {
                currentState = states.FinalScreen;
            }
        }

        function detectPointCollision(point){
            var distanceX = bird.xPos - point.x;
            var distanceY = bird.yPos - point.y;

            var sumRadius = bird.birdRadius + point.width/2;
            var sqrRadius = sumRadius * sumRadius;

            var distSqr = (distanceX * distanceX) + (distanceY * distanceY);

            if (distSqr <= sqrRadius) {
                score += 1;
                Item.points.splice(i,1);
                i--;
                len--;
            }
        }

    },

    draw : function(ctx){
        for (var i = 0 , len = this.bombs.length; i < len; i++) {
            var bomb  = this.bombs[i];
            bombImage.draw(ctx,bomb.x,bomb.y);
        }
        for (var i = 0, len = this.points.length; i < len; i++){
            var point = this.points[i];
            pointImage.draw(ctx,point.x,point.y);
        }
    },
}
