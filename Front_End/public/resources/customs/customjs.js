var SUCCESS = 200;

function GetInputData(element){
    const formData = new FormData(element);
    const data = Object.fromEntries(formData.entries());
    return data;
}

function GetFormData(element){
    const formData = new FormData(element);
    const data = Object.fromEntries(formData.entries());
    return data;
}

function getValueById(id, datatype="string"){
    $ret = null;
    $value = document.getElementById(id).value;
    switch (datatype) {
        case "string": $ret = $value+""; break;
        case "int": $ret = parseInt($value); break;
        case "float": $ret = parseFloat($value); break;
        default:$ret = $value+"";break;
    } 
    return $ret;
}

function getValue(attr, datatype="string"){
    $ret = null;
    $value = document.querySelector(attr).value;
    switch (datatype) {
        case "string": $ret = $value+""; break;
        case "int": $ret = parseInt($value); break;
        case "float": $ret = parseFloat($value); break;
        default:$ret = $value+"";break;
    } 
    return $ret;
}

function getElementById(id){
    return document.getElementById(id);
}

function getElement(attr){
    var inputElement = document.querySelector(attr);
    return inputElement;
}

function setValue(attr, value){
    document.querySelector(attr).value = value;
}

function clearValue(attr){
    document.querySelector(attr).value = "";
}

function inputIsEmpty(attr){
    $ret = false;
    $val =  document.querySelector(attr).value;
    if($val=="" || $val ==null){
        $ret = true;
    }
    return $ret;
}
