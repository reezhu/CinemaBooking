
function chooseFilm(film) {

    answer=confirm("Do you want to watch <<"+film+">>?");
    if(answer!=false) {
        var title = document.getElementById("name")
        //var performanceDateTime = document.getElementById("performance").innerHTML;
        //var production = document.getElementById("production").innerHTML;


        var form = document.createElement('form');
        form.setAttribute('method', 'POST');
        form.setAttribute('action', 'time.php');
        form.style.display = 'hidden';

        var performanceElement = document.createElement("input");
        performanceElement.setAttribute("name", "title");
        performanceElement.setAttribute("type", "hidden");
        performanceElement.setAttribute("value", film);
        form.appendChild(performanceElement);


        document.body.appendChild(form);
        form.submit();
    }

}
