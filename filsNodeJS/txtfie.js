var ficher=require('fs');
ficher.readFile('fille.txt',function(err,data)
{
    if(err)
    {
        return console.error(err);
    }
    console.log('contenu de ficher'+'  '+data.toString());
}
);
