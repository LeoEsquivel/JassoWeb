var counter = 0,
isClicked=false,
timer = 30;

var user = document.getElementById('username').innerHTML;


function startFunc() {
    isClicked =true;
    if (isClicked) {
    
    var start = document.getElementById("startGame"),
    count=0,
    score2 = document.getElementById("score")
    timeB = document.getElementById("time"),
    game = document.getElementById("mainGame");
    
    timeB.innerHTML = timer;
    timeB.style.color="lime"
    start.style.display = "none";
    game.style.display = "block";
    
    var s = setInterval(function () {
   //alert(count )
   timer--;
   timeB.innerHTML =timer;
            if (timer ==0) {
                alert ("Tu puntuacion es de "+counter)  
                alert ("Felicidades");
                game.style.display = "none";
                start.style.display = "block";
                saveScore(user, counter)
                clearInterval(s);
                counter =0;
                timer =20;
                score2.innerHTML = "";
            } else if (timer == 13) {
                timeB.style.color="yellow"
            } else if (timer==6) {
                timeB.style.color="red"
            } 
        },1000) 
        
    } else {
        isClicked =false;
    }
}

    

window.onload = function () {

    document.onkeyup = teclas

    var c = document.getElementById("canvas"),
    bot = document.getElementById("bottom"),
    up = document.getElementById("up"),
    right = document.getElementById("r"),
    left = document.getElementById("l"),
    score = document.getElementById("score"),
    ctx = c.getContext("2d"),
    xo = [50,100,150,200]; 
    yo = [50,100,150,200]; 
    randY = Math.floor(Math.random()*yo.length);
    randX = Math.floor(Math.random()*xo.length);
    
    
    var randY2 = function () {
        return Math.floor(Math.random()*yo.length);
    }
    
    var randX2 = function () {
        return Math.floor(Math.random()*xo.length);
    }


    function Options (x,y,w,h) {
        this.x = x;
        this.y = y;
        this.w = w;
        this.h = h;
    }
    
    Options.prototype = { 
        
        draw: function () {
            ctx.clearRect(0,0,300,300);
            ctx.fillStyle = "#fff"
            ctx.fillRect(this.x, this.y, this.w, this.h);
            ctx.fillStyle = "green";
            ctx.fillRect(xo[randX], yo[randY], 50, 50 )      
            /*ctx.fillStyle="#fff"
            ctx.font="20px arial";
            ctx.fillText("Score: "+counter, 80, 20)*/            
        },
        
        moveDown: function () {
            opts.draw();
            this.y+=50;
            if (this.y>= 250) this.y=250;
            else if (this.y == yo[randY] && this.x == xo[randX]) {    
                counter++;
                score.innerHTML = counter;
                randY = randY2()
                randX = randX2()
               // c.style.backgroundColor= "red";
            }
            
            requestAnimationFrame(opts.moveDown);
        },
        moveUp: function () {
            opts.draw();
            this.y-=50;
            if (this.y<=0) this.y = 0;
            else if (this.y == yo[randY] && this.x == xo[randX]) {
                counter++;
                score.innerHTML = counter;
                randY = randY2()
                randX = randX2()
               // c.style.backgroundColor= "red"
            }
            
            requestAnimationFrame(opts.moveDown);
        },        
        moveRight: function () {
            opts.draw()
            this.x += 50
            if (this.x >= 250) this.x= 250;
            else if (this.y == yo[randY] && this.x == xo[randX]) {
                counter++;
                score.innerHTML = counter;
                randY = randY2()
                randX = randX2()
                //c.style.backgroundColor= "red"
            }
            
            requestAnimationFrame(opts.moveRight);
        },
        moveLeft: function () {
            opts.draw()
            this.x -= 50
            if (this.x<=0) this.x = 0;
            else if (this.y == yo[randY] && this.x == xo[randX]) {
                counter++;
                score.innerHTML = counter;
                randY = randY2()
                randX = randX2()
                //c.style.backgroundColor= "red"
            }
            
            requestAnimationFrame(opts.moveRight);
        }
    }
    
    var opts = new Options(0,0,50,50);
    
    opts.draw();
    
    bot.onclick = function () {
        opts.moveDown();            
    }
    
    up.onclick = function () {
        opts.moveUp()
        }
        
    r.onclick = function () {
        opts.moveRight()
    } 
    
    l.onclick = function () {
        opts.moveLeft()
    }

    function teclas(event){
        var codigo = event.keyCode;
        if(codigo == 38){
            opts.moveUp();
        }
        if(codigo==40){
            opts.moveDown();
        }
        if(codigo==37){
            opts.moveLeft();
        }
        if(codigo==39){
            opts.moveRight();
        }
    }
} 

function saveScore(usuario, score){
    console.log(usuario, score)
    window.location = "puntuaciones.php?usuario="+usuario+"&score="+score;    
}
