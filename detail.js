window.onload=function() {


    //alert(seat+film+time);
}



function confirm() {
    /*
     if(selected==0){alert("Please choose a seat!");}
     else{
     var seatsstring = reservedseat.join();*/
    var fullname = document.getElementById('fullname').value;
    var address = document.getElementById('address').value;
    var requair = document.getElementById('requair').value;
    var seats = document.getElementById('seat').value;
    var film = document.getElementById('film').value;
    var time = document.getElementById('time').value;
    //var seat=new Array();
    var seat=seats;

    //seat[]=seats.split(",");


    //alert(fullname+address+requair);
    if (fullname.length<3||fullname.length>30) {
        alert("please input your name")
    }
    else if (address.length<5||address.length>300) {
        alert("please input your address")
    }
    else {
        //var  = document.getElementById('');
        //chosenSeats = chosenSeats + ',' + production + ',' + performance; // To avoid creating even more hidden POST variables, I appended some to the end of the chosenSeats string.
        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'pay.php');
        form.style.display = 'hidden';
        var element = document.createElement("input");
        element.setAttribute("name", "fullname");
        element.setAttribute("type", "hidden");
        element.setAttribute("value", fullname);
        form.appendChild(element);
        var element2 = document.createElement("input");
        element2.setAttribute("name", "address");
        element2.setAttribute("type", "hidden");
        element2.setAttribute("value", address);
        form.appendChild(element2);
        var element3 = document.createElement("input");
        element3.setAttribute("name", "requair");
        element3.setAttribute("type", "hidden");
        element3.setAttribute("value", requair);
        form.appendChild(element3);

        //for(var i=0;i<cars.length;i++){}
        var element4 = document.createElement("input");
        element4.setAttribute("name", "seat");
        element4.setAttribute("type", "hidden");
        element4.setAttribute("value", seat);
        form.appendChild(element4);


        var element5 = document.createElement("input");
        element5.setAttribute("name", "film");
        element5.setAttribute("type", "hidden");
        element5.setAttribute("value", film);
        form.appendChild(element5);
        var element6 = document.createElement("input");
        element6.setAttribute("name", "time");
        element6.setAttribute("type", "hidden");
        element6.setAttribute("value", time);
        form.appendChild(element6);




        document.body.appendChild(form);
        form.submit();
    }
}
