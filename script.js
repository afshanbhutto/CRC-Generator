
//printing the resume
function printresume(){
    document.getElementById("printBtn").style.visibility='hidden';
    document.getElementById("sendBtn").style.visibility='hidden';
    window.print();
    document.getElementById("printBtn").style.visibility='visible';
    document.getElementById("sendBtn").style.visibility='visible';
}
