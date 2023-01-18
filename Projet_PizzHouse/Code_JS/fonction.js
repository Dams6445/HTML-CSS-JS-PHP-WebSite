var boolStock = new Boolean(true);
var recupStock = document.getElementsByClassName("stocks");
var nbRows;
var compt00 = 0;
var compt01 = 0;
var compt02 = 0;
var compt03 = 0;
var compt04 = 0;
var compt05 = 0;


function modifVal(num,stocks,boolFonction) 
{
    switch(num)
    {
        case 0:
            if(boolFonction == 0)
            {
                if(compt00 < stocks)
                {
                    compt00++;
                    update(num,compt00);
                }
            }
            else
            {
                if(compt00 > 0)
                {
                    compt00--;
                    update(num,compt00);
                }
            }
        break;

        case 1:
            if(boolFonction == 0)
            {
                if(compt01 < stocks)
                {
                    compt01++;
                    update(num,compt01);
                }
            }
            else
            {
                if(compt01 > 0)
                {
                    compt01--;
                    update(num,compt01);
                }
            }
        break;

        case 2:
            if(boolFonction == 0)
            {
                if(compt02 < stocks)
                {
                    compt02++;
                    update(num,compt02);
                }
            }
            else
            {
                if(compt02 > 0)
                {
                    compt02--;
                    update(num,compt02);
                }
            }
        break;

        case 3:
            if(boolFonction == 0)
            {
                if(compt03 < stocks)
                {
                    compt03++;
                    update(num,compt03);
                }
            }
            else
            {
                if(compt03 > 0)
                {
                    compt03--;
                    update(num,compt03);
                }
            }
        break;

        case 4:
            if(boolFonction == 0)
            {
                if(compt04 < stocks)
                {
                    compt04++;
                    update(num,compt04);
                }
            }
            else
            {
                if(compt04 > 0)
                {
                    compt04--;
                    update(num,compt04);
                }
            }
        break;

        case 5:
            if(boolFonction == 0)
            {
                if(compt05 < stocks)
                {
                    compt05++;
                    update(num,compt05);
                }
            }
            else
            {
                if(compt05 > 0)
                {
                    compt05--;
                    update(num,compt05);
                }
            }
        break;

    }
}

function update(num,val) {
    document.getElementById("compt"+num).innerHTML = val;
}

function erreurContact()
{
    var text = document.getElementById("contenuContact").innerHTML;
    if(text = "")
    {
        contenuContact.style.border = "5px solid red";
    }
    else
    {
        contenuContact.style.border = "1px solid black";
    }
}

function gestionStocks()
{
    if (boolStock)
    {
        alert("J'affiche les stocks");
        boolStock = false;
        nbRows = 0;
        for(nbRows; nbRows < 7; nbRows++)
        {
            recupStock[nbRows].style.display = "revert";
        }
    }
    else
    {
        alert("Je cache les stocks");
        boolStock = true;
        nbRows = 0;
        for(nbRows; nbRows < 7; nbRows++)
        {
            recupStock[nbRows].style.display = "none";
        }
    }
}