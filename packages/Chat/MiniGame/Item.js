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
            var bombPosition = 20 + 200 * Math.random();
            this.bombs.push({
                x: 500 + 100 * Math.random(),
                y: bombPosition,
                width : bombImage.width,
                height : bombImage.height
            });
            var pointPosition = 15 + 200 * Math.random();
            this.points.push({
                x: 500 + 100 * Math.random(),
                y: pointPosition,
                width : pointImage.width,
                height : pointImage.height
            });
        }
        /* Clear the items that left the window */
        for (var i = 0 , len = this.bombs.length; i < len; i++){
            var bomb = this.bombs[i];
            bomb.x -= 2;
            if(bomb.x < -30){
                this.bombs.splice(i,1);
                i--;
                len--;
            }
        }
        for (var i = 0, len = this.points.length; i < len; i++){
            var point = this.points[i];
            point.x -=3;
            if(bomb.x < -30){
                this.points.splice(i,1);
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
    }
}