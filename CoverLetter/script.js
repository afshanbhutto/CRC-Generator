
//Generating Cover Letter
// function generateResume(){
//     //console.log("generating Cover Lettr");
//     let nameField = document.getElementById('nameField').value;
//     let nameT = document.getElementById('nameT');
//     nameT.innerHTML = nameField;
// }

function printCL(){
    document.getElementById("print").style.visibility='hidden';
    document.getElementById("send").style.visibility='hidden';
    window.print();
    document.getElementById("print").style.visibility='visible';
    document.getElementById("send").style.visibility='visible';
}