//select element function
const selectElement = function (element){
    return document.querySelector(element);
};
let menuToggler =selectElement('.menu-toggle');
let body =selectElement('body');
menuToggler.addEventListener('click',function (){
    body.classList.toggle('open');
});
//scroll reveal
window.sr=ScrollReveal();
sr.reveal('.animate-left',{
    origin :'left', //where the animation comes from
    duration: 1000 ,//1s
    distance: '25rem' ,//how far its travel from
    delay:300 // .3s how long should it take before animation
});
sr.reveal('.animate-right',{
    origin :'right', //where the animation comes from
    duration: 1000 ,//1s
    distance: '25rem' ,//how far its travel from
    delay:600 // .6s how long should it take before animation
});
sr.reveal('.animate-top',{
    origin :'top', //where the animation comes from
    duration: 1000 ,//1s
    distance: '25rem' ,//how far its travel from
    delay:600 // .6s how long should it take before animation
});
sr.reveal('.animate-bottom',{
    origin :'bottom', //where the animation comes from
    duration: 1000 ,//1s
    distance: '25rem' ,//how far its travel from
    delay:600 // .6s how long should it take before animation
});