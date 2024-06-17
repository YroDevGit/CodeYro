function $(id){
    return document.getElementById(id);
}

function $name(id){
    return document.getElementByName(id);
}

function transfer(value1, value2){
    $name(value1).value($name(value2).value);
}

function setValue(name, val){
    document.getElementById(name).value = val;
}

function CreateDataContent(component, route, type){
    var xml = new XMLHttpRequest();
        xml.onload = function(){
            document.getElementById(component).innerHTML = this.responseText;
        }
        xml.open(type,route);
        xml.send();
}