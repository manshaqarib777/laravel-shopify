const file = document.getElementById("profile-thumb-input");
const formData = document.getElementById("formData");
const coverFile = document.getElementById("profile-cover-input");
const formCoverData = document.getElementById("formCoverData");

if(file !== null) {
    file.addEventListener("change",(e)=>{
        fileLength = file.files;
        if(fileLength.length > 0){
            formData.submit();
        }
    });
}

if(coverFile !== null) {
    coverFile.addEventListener("change",(e)=>{
        fileLength = coverFile.files;
        if(fileLength.length > 0){
            formCoverData.submit();
        }
    });
}

function languageChange(e){
    window.location.href=e.value;
}

