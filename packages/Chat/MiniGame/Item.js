/**
 * Created by ekrem on 19.11.2016.
 */
var Item = {

    bombs : [],
    points : [],
    redPoints: [],
    tenPoints: [],
    redPoints: [],


    reset : function() {
        this.bombs = [];
        this.points = [];
        this.redPoints = [];
        this.tenPoints = [];
        this.redPoints = [];
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
            var tenPointPosition = 20 + 250 * Math.random();
            this.tenPoints.push({
                x: 500 + 100 * Math.random(),
                y: tenPointPosition,
                width : tenPointImage.width,
                height : tenPointImage.height
            });
            var redPointPosition = 20 + 250 * Math.random();
            this.redPoints.push({
                x: 400 + 100 * Math.random(),
                y: redPointPosition,
                width : redPointImage.width,
                height : redPointImage.height
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

        for (var i = 0 , len = this.tenPoints.length; i < len; i++) {
            var tenPoint = this.tenPoints[i];
            detectTenPointCollision(tenPoint);

            tenPoint.x -= 7;
            if (tenPoint.x < -20) {
                this.tenPoints.splice(i, 1);
                i--;
                len--;
            }
        }

        for (var i = 0 , len = this.redPoints.length; i < len; i++) {
            var redPoint = this.redPoints[i];
            detectRedPointCollision(redPoint);

            redPoint.x -= 9;
            if (redPoint.x < -20) {
                this.redPoints.splice(i, 1);
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

        function detectTenPointCollision(tenPoint){
            var distanceX = bird.xPos - tenPoint.x;
            var distanceY = bird.yPos - tenPoint.y;

            var sumRadius = bird.birdRadius + tenPoint.width/2;
            var sqrRadius = sumRadius * sumRadius;

            var distSqr = (distanceX * distanceX) + (distanceY * distanceY);

            if (distSqr <= sqrRadius) {
                currentState = states.FinalScreen;
            }
        }

        function detectRedPointCollision(redPoint){
            var distanceX = bird.xPos - redPoint.x;
            var distanceY = bird.yPos - redPoint.y;

            var sumRadius = bird.birdRadius + redPoint.width/2;
            var sqrRadius = sumRadius * sumRadius;

            var distSqr = (distanceX * distanceX) + (distanceY * distanceY);

            if (distSqr <= sqrRadius) {
                if(score == 0)currentState = states.FinalScreen;
                else{
                    score -= 1;
                    Item.redPoints.splice(i,1);
                    i--;
                    len--;
                }
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
        for (var i = 0, len = this.tenPoints.length; i < len; i++){
            var tenPoint = this.tenPoints[i];
            tenPointImage.draw(ctx,tenPoint.x,tenPoint.y);
        }
        for (var i = 0, len = this.redPoints.length; i < len; i++){
            var redPoint = this.redPoints[i];
            redPointImage.draw(ctx,redPoint.x,redPoint.y);
        }
    },

}
