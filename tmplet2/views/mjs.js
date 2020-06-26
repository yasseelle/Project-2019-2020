$('p').html('bonjour')
$('#divx').css('background-color','orange')
$('#divx').animate({width:'20%',fontSize:'24px',left:'50%',top:'20%',height:'40%'},3000)
var a=3
$.post('localhost:8081/pug/pug.php',{aa:a},function(d){
    $('#divx').html(d)
})