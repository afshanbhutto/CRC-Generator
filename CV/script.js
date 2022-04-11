function NewWEField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('weField');
    newNode.classList.add('mt-2');
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter your experiences");

    let weOb = document.getElementById("we");
    let weAddButtonOb = document.getElementById("weAddButton");

    weOb.insertBefore(newNode, weAddButtonOb);
}
function NewEDField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('eqField');
    newNode.classList.add('mt-2');
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder", "Enter your qualification");

    let edOb = document.getElementById("ed");
    let aqAddButtonOb = document.getElementById("aqAddButton");

    edOb.insertBefore(newNode, aqAddButtonOb);
}
function NewSkillsField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('skillsField');
    newNode.classList.add('mt-2');
    newNode.setAttribute("rows", 1);
    newNode.setAttribute("placeholder", "Enter your Skills");

    let skillsOb = document.getElementById("skills");
    let skAddButtonOb = document.getElementById("skAddButton");

    skillsOb.insertBefore(newNode, skAddButtonOb);
}
function NewAwardsField(){
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('awardsField');
    newNode.classList.add('mt-2');
    newNode.setAttribute("rows", 1);
    newNode.setAttribute("placeholder", "Enter your awards");

    let awardsOb = document.getElementById("awards");
    let awAddButtonOb = document.getElementById("awAddButton");

    awardsOb.insertBefore(newNode, awAddButtonOb);
}
 function NewReferencesField( ){
    var editor_data = editor1.getData();
    document.getElementById('referenceT').innerHTML = editor_data;
}

//Generating CV
function generateCV(){
    // name
    document.getElementById("nameT").innerHTML = document.getElementById("nameField").value;
    //career
    document.getElementById("careerT").innerHTML = document.getElementById("careerField").value;
    //contact
    document.getElementById("contactT").innerHTML = document.getElementById("contactField").value;
    //email
    document.getElementById("emailT").innerHTML = document.getElementById("emailField").value;
    //address
    document.getElementById("addressT").innerHTML = document.getElementById("addressField").value;
    //facebook
    document.getElementById("fbT").innerHTML = document.getElementById("fbField").value;
    //twitter
    document.getElementById("twitterT").innerHTML = document.getElementById("twitterField").value;
    //insta
    document.getElementById("instaT").innerHTML = document.getElementById("instaField").value;
    //linkedIn
    document.getElementById("linkedT").innerHTML = document.getElementById("linkedField").value;
    //objective
    document.getElementById('objectiveT').innerHTML = document.getElementById("objectiveField").value;
    // for work experience
    let wes = document.getElementsByClassName("weField");
    let str = "";
    for(let e of wes){
        str = str + `<li>${e.value}</li>`;
    }
    document.getElementById("weT").innerHTML = str;

    // for academic qualifications
    let aqs = document.getElementsByClassName("eqField");
    let str1 = "";
    for(let e of aqs){
        str1 = str1 + `<li>${e.value}</li>`;
    }
    document.getElementById("educationT").innerHTML = str1;

    // skills
    let sk = document.getElementsByClassName("skillsField");
    let str2 = "";
    for(let e of sk){
        str2 = str2 + `<li>${e.value}</li>`;
    }
    document.getElementById("skillsT").innerHTML = str2;

    //awards
    let awt = document.getElementsByClassName("awardsField");
    let str3 = "";
    for(let e of awt){
        str3 = str3 + `<li>${e.value}</li>`;
    }
    document.getElementById("awardsT").innerHTML = str3;


    // for image
    let file = document.getElementById("imgField").files[0];
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function(){
        document.getElementById("imgT").src = reader.result;
    }

    document.getElementById("form").style.display='none';
    document.getElementById("BtnGenerateCV").style.display='none';

    document.getElementById("cv-template").style.display='grid';
}

function printCV(){
    document.getElementById("print").style.visibility='hidden';
    document.getElementById("send").style.visibility='hidden';
    window.print();
    document.getElementById("print").style.visibility='visible';
    document.getElementById("send").style.visibility='visible';
}
