var nav = document.querySelector('.nav1');

window.addEventListener('scroll', function(){
    if(window.scrollY > 30){
        nav.classList.add('bg-dark2','shadow');
    }
    else{
        nav.classList.remove('bg-dark2', 'shadow');
    }
})


/* */
var nav = document.querySelector('nav');

window.addEventListener('scroll', function () {
  if (window.pageYOffset > 20) {
    nav.classList.add('bg-dark', 'shadow');
  } else {
    nav.classList.remove('bg-dark', 'shadow');    
  }
});
/* */