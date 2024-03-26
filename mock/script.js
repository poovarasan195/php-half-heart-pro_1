
var user_form = document.getElementById('from_user');
var user_button = document.getElementById('user_button');

user_button.addEventListener('click', function(){
    user_form.style.display = 'block'; 
    setTimeout(function(){
        user_button.addEventListener('dblclick', function(){
            user_form.style.display = 'none';
         });
   });
});
