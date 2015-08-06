
function chooseTime(film,time) {

    answer=confirm("Do you want to watch this movie on "+time+"?");
    if(answer!=false) {
        var performance = document.getElementById("title")
        var dateOnShow = document.getElementById("name")
        //var performanceDateTime = document.getElementById("performance").innerHTML;
        //var production = document.getElementById("production").innerHTML;


        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'seat.php');
        form.style.display = 'hidden';

        var performanceElement = document.createElement("input");
        performanceElement.setAttribute("name", "performance");
        performanceElement.setAttribute("type", "hidden");
        performanceElement.setAttribute("value", film);
        form.appendChild(performanceElement);

        var performanceElement = document.createElement("input");
        performanceElement.setAttribute("name", "dateOnShow");
        performanceElement.setAttribute("type", "hidden");
        performanceElement.setAttribute("value", time);
        form.appendChild(performanceElement);

        document.body.appendChild(form);
        form.submit();
    }

}
