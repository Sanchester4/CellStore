var startProductBarPos=-1;
window.onscroll=function(){
  var bar = document.getElementById('categories');
  if(startProductBarPos<0)startProductBarPos=findPosY(bar);

  if(pageYOffset>startProductBarPos){
    bar.style.position='sticky';
    bar.style.top=0;
  }else{
    bar.style.position='relative';
  }

};

function findPosY(obj) {
  var curtop = 0;
  if (obj && obj.offsetParent) {
    while (obj.offsetParent) {
      curtop += obj.offsetTop;
      obj = obj.offsetParent;
    }
    curtop += obj.offsetTop;
  }
  else if (obj && obj.y)
    curtop += obj.y;
  return curtop;
}