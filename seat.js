
window.onload=function() {
    reservedseat=new Array();
    price=new Array();
    total=0;
    max=5;
    selected=0;
}


function seatReserved(){
    alert("reserved!");
}

function addtoBusket(no,area,single) {
    var singleprice=Number(single);
    answer = confirm("Do you want to order seat " + no + " with "+singleprice+" pounds?");

    if (answer == true) {
        test = false;


        if(selected==0){
        }
        else {
            var i = 0;
            while (i <= selected) {


                var n = reservedseat[i];
                i++;


                if (n == no) {

                    test = true;

                    //release selected seats.
                    document.getElementById(no).className = "seatboxAvaliable";
                    var index = reservedseat.indexOf(no);
                    reservedseat.splice(index, 1);
                    price.splice(index, 1);
                    selected--;
                    total-=singleprice;
                    document.getElementById("state").innerHTML='You have booked '+selected+' tickets.<br/>Total amount is '+total+' Pounds.';
                    var element = document.getElementById(no+'list');
                    element.parentNode.removeChild(element);

                    //end
                    break;

                }
            }
        }
        if(test==false) {
            if(selected<max) {

                //choose a seat.
                document.getElementById(no).className = "seatboxOrdered";
                reservedseat.push(no);
                price.push(singleprice);
                selected++;
                total+=singleprice;
                document.getElementById("state").innerHTML='You have booked '+selected+' tickets.<br/>Total amount is '+total+' Pounds.';
                document.getElementById('list').innerHTML += ('<table id="'+no+'list" class="submitoutput" ><tr><td>  Seat Number: '+no+'</td><td>  Price:'+singleprice+' pounds</td><td>  Area:'+area+'</td></tr> </table>');
                //end
            }else{
                alert("You can only book "+max+" seats");}
        }
    }
}

function checkout(name,time){
    //
    if(selected==0){alert("Please choose a seat!");}
    else{
        var seatsstring = reservedseat.join("");
       // var  = document.getElementById('');
        //var  = document.getElementById('');
        //chosenSeats = chosenSeats + ',' + production + ',' + performance; // To avoid creating even more hidden POST variables, I appended some to the end of the chosenSeats string.
        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'detail.php');
        form.style.display = 'hidden';
        var element = document.createElement("input");
        element.setAttribute("name", "seats");
        element.setAttribute("type", "hidden");
        element.setAttribute("value", seatsstring);
        form.appendChild(element);
        var element2 = document.createElement("input");
        element2.setAttribute("name", "film");
        element2.setAttribute("type", "hidden");
        element2.setAttribute("value", name);
        form.appendChild(element2);
        var element3 = document.createElement("input");
        element3.setAttribute("name", "time");
        element3.setAttribute("type", "hidden");
        element3.setAttribute("value", time);
        form.appendChild(element3);
        var element4 = document.createElement("input");
        element4.setAttribute("name", "number");
        element4.setAttribute("type", "hidden");
        element4.setAttribute("value", selected);
        form.appendChild(element4);
        var element5 = document.createElement("input");
        element5.setAttribute("name", "money");
        element5.setAttribute("type", "hidden");
        element5.setAttribute("value", total);
        form.appendChild(element5);
        document.body.appendChild(form);
        form.submit();
    }
}