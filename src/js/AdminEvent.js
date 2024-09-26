var DeleteUser = document.querySelector(".DeleteUser")
var AddForm = document.querySelector(".AddForm")
var EditForm = document.querySelector(".EditForm")
var DeleteForm = document.querySelector(".DeleteForm")
var AddFormP = document.querySelector(".AddFormP")
var DeleteFormP = document.querySelector(".DeleteFormP")
var EditFormP = document.querySelector(".EditFormP")

var IdUser = document.querySelector("#IdUser")


var InputEditFormId = document.querySelector("#InputEditCategoryId")
var InputEditFormName = document.querySelector("#InputEditCategoryName")
var InputDeleteFormId = document.querySelector("#InputDeleteCategoryId")
var InputDeleteFormName = document.querySelector("#InputDeleteCategoryName")


var IpDeletePID = document.querySelector("#IdDeleteP")
var NameDeletePID = document.querySelector("#NameDeleteP")
var IdEditP = document.querySelector("#IdEditP")

var btnNav = document.querySelector(".btnNav")

function toggleShowDeleteU(Id){
  DeleteUser.classList.toggle("show")
    if(Id)
    {
      IdUser.value=Id
      Id =""
    }else{
      IdUser.value=""
    }
  }

function toggleShowAddC(){
AddForm.classList.toggle("show")
}
function toggleShowEditC(Id,Name){
  EditForm.classList.toggle("show")
  if(Id)
  {
    InputEditFormId.value=Id
    InputEditFormName.value=Name
    Id =""
  }else{
    InputEditFormId.value="Id"
    InputEditFormName.value="Name"
  }
}
function toggleShowDeleteC(Id,Name){
    DeleteForm.classList.toggle("show")
    if(Id)
    {
      InputDeleteFormId.value=Id
      InputDeleteFormName.value=Name
      Id =""
    }else{
      InputDeleteFormId.value="Id"
      InputDeleteFormName.value="Name"
    }
}


function toggleShowAddP(){
  AddFormP.classList.toggle("show")
}

function toggleShowDeleteP(Id){
  DeleteFormP.classList.toggle("show")
  if(Id)
  {
    IpDeletePID.value=Id
    Id =""
  }else{
    IpDeletePID.value="Id"
  }
}

function toggleShowEditP(Id){
  EditFormP.classList.toggle("show")
  if(Id!=""){
    IdEditP.value=Id
    Id = ""
  }else{
    IdEditP.value="Id"
  }
}


 function changeNav(){
   // btnNav.classList.remove("active")
   alert("Hello")
 }