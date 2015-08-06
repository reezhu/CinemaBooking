function search(){
    var name = document.getElementById('fullname').value;
    //document.getElementById('container').innerHTML=;
    var form = document.createElement('form');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', 'edit.php');
    form.style.display = 'hidden';
    var element = document.createElement("input");
    element.setAttribute("name", "name");
    element.setAttribute("type", "hidden");
    element.setAttribute("value", name);
    form.appendChild(element);
    document.body.appendChild(form);
    form.submit();

}

function search2(name){
    //var name = document.getElementById('fullname').value;
    //document.getElementById('container').innerHTML=;
    var form = document.createElement('form');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', 'edit.php');
    form.style.display = 'hidden';
    var element = document.createElement("input");
    element.setAttribute("name", "name");
    element.setAttribute("type", "hidden");
    element.setAttribute("value", name);
    form.appendChild(element);
    document.body.appendChild(form);
    form.submit();
}