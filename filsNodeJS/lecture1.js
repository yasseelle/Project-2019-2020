var ficher=require('fs');
console.log('ouverture de ficher');
ficher.open('fille.txt','r',function()
{
    if(err)
    {
    return console.error(err);

    }
    console.log('contenue de ficher  '+DataCue.toString());

}

);
