var fich=require('fs');
fich.open('dosierjs/ficherjslol.txt','w',function(err,data)

{
if(err)
{
    return console.error(err);
}
console.log("le ficher est bien crée");
});