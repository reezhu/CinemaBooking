window.onload=function() {
    var seat = document.getElementById('seat').value;
    var seat = document.getElementById('seat').value;
    //alert(seat);
    var seats=new Array();
    seats=seat.split(",");
    //alert(seats);
}

function cancel(name,number){
    var answer=confirm("Do you really want to cancel this ticket?");
    if(answer){

        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'delete.php');
        form.style.display = 'hidden';
        var element = document.createElement("input");
        element.setAttribute("name", "number");
        element.setAttribute("type", "hidden");
        element.setAttribute("value", number);
        form.appendChild(element);
        var element1 = document.createElement("input");
        element1.setAttribute("name", "name");
        element1.setAttribute("type", "hidden");
        element1.setAttribute("value", name);
        form.appendChild(element1);
        document.body.appendChild(form);
        form.submit();
    }
}