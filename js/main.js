var maxSlider = 0;
var countSlider = 0;

function popPreview(c,n, t, nm, f){
  var num = n;
  var name = nm;
  t.setAttribute("onclick", " ");
  var wr = document.getElementById("popTut");
  if(c === "open"){
    sliderPreview(num, f);
    headerTut(name, f);
    wr.style.display = "block";
    setTimeout(function(){
      wr.style.opacity = "1";
    },600);
  } else {
    clearSlider();
    wr.style.opacity = "0";
    setTimeout(function(){
      wr.style.display = "none";
    },600);
  }
  setTimeout(function(){
    t.setAttribute("onclick", "popPreview('"+c+"',"+n+", this, '"+name+"', '"+f+"')");
  },1000);
}

function headerTut(n,f){
  var tt = document.getElementById("titleTut"),
      ic = document.getElementById("iconTut");
  tt.innerHTML = n;
  ic.setAttribute("class", f);
}

function sliderPreview(n, f){
  var slider = document.getElementById("sliderTut"),
      bullets = document.getElementById('bulletsTut'),
      wBullets = n * 35,
      wLi = 100 / n;
  maxSlider = n * 100;
  bullets.style.width = wBullets + "px";
  slider.style.width = maxSlider + "%";
  for (var i = 0; i < n; i++) {
    var slide = document.createElement("LI"),
        imgSlide = document.createElement("IMG"),
        bullet = document.createElement("LI"),
        span = document.createElement("SPAN");
    span.setAttribute("class", "bull");
    slide.style.width = wLi+"%";
    imgSlide.setAttribute("src", "img/screensTut/"+f+i+".png");
    slide.setAttribute("class", "displayFlex");
    bullet.setAttribute("onclick", "bulletSlider("+i+")");
    slide.appendChild(imgSlide);
    bullet.appendChild(span);
    slider.appendChild(slide);
    bullets.appendChild(bullet);
  }
  bulletSelected(countSlider);
}

function clearSlider(){
  var slider = document.getElementById('sliderTut'),
      bullets = document.getElementById('bulletsTut');
      slider.setAttribute("style", " ");
      slider.innerHTML = null;
      bullets.innerHTML = null;
      countSlider = 0;
}

function arrowsSlider(c){
  var slider = document.getElementById('sliderTut');
  var maxToSlide = maxSlider - 100;
  if(c === 'next'){
    countSlider += 100;
    if(countSlider >= maxSlider) countSlider = 0;
    slider.style.left = "-"+countSlider+"%";
  } else {
    countSlider -= 100;
    if(countSlider < 0) countSlider = maxToSlide;
    slider.style.left = "-"+countSlider+"%";
  }
  bulletSelected(countSlider);
}

function swipeTransform(el,d) {
  var slider = document.getElementById('sliderTut');
  var maxToSlide = maxSlider - 100;
  if(d == "l") {
    countSlider += 100;
    if(countSlider >= maxSlider) countSlider = 0;
    slider.style.left = "-"+countSlider+"%";
  }
  if(d == "r"){
    countSlider -= 100;
    if(countSlider < 0) countSlider = maxToSlide;
    slider.style.left = "-"+countSlider+"%";
  }
  bulletSelected(countSlider);
}

function bulletSlider(n){
  var slider = document.getElementById('sliderTut');
  slider.style.left = "-"+(n*100)+"%";
  countSlider = n * 100;
  bulletSelected(countSlider);
}


function bulletSelected(c){

  var bullets =document.getElementsByClassName('bull'),
      count = (c/100);

      for (var i = 0; i < bullets.length; i++) {
        bullets[i].setAttribute("class", "bull ");
      }
      bullets[count].setAttribute("class", "bull bulletSelected");
}

function detectswipe(el,func) {
      swipe_det = new Object();
      swipe_det.sX = 0;
      swipe_det.sY = 0;
      swipe_det.eX = 0;
      swipe_det.eY = 0;
      var min_x = 20,
          max_x = 40,
          min_y = 40,
          max_y = 50,
          direc = "";

      ele = document.getElementById(el);
      ele.addEventListener('touchstart',function(e){
        var t = e.touches[0];
        swipe_det.sX = t.screenX;
        swipe_det.sY = t.screenY;
      },false);
      ele.addEventListener('touchmove',function(e){
        e.preventDefault();
        var t = e.touches[0];
        swipe_det.eX = t.screenX;
        swipe_det.eY = t.screenY;
      },false);

      ele.addEventListener('touchend',function(e){
        if ((((swipe_det.eX - min_x > swipe_det.sX) || (swipe_det.eX + min_x < swipe_det.sX)) && ((swipe_det.eY < swipe_det.sY + max_y) && (swipe_det.sY > swipe_det.eY - max_y)))) {
          if(swipe_det.eX > swipe_det.sX) direc = "r";
          else direc = "l";
          } if (direc != "") {
            if(typeof func == 'function') func(el,direc);
          }
          direc = "";
      },false);
}
