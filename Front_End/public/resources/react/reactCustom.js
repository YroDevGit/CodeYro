function GetInputData(element){
    const formData = new FormData(element);
    const data = Object.fromEntries(formData.entries());
    return data;
}