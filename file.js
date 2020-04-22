$(document).ready(function(){
    $("#fileupload").on("change", fileHandle);

});

function fileHandle(event){
    let fileupload = event.target;
    let files = fileupload.files;

    let firstFile = files[0];

    let fileReader = new FileReader();

    //this function loads the information from the textfile
    //to the content editor
    fileReader.onload = function(event){
        let contents = event.target.result;
        $("#editor").text(contents);
        $("#content").val(contents);
    }
    fileReader.readAsText(firstFile);
    
}