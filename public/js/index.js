$('document').ready(function(){
   $('.optionMenu li', '.content').on('click', function(ev){
        console.log(ev.target);
   });
});