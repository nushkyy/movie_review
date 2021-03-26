var nowid=6;
var nowname="Other";
var chatwith="";
function getChangePasswordContent(){
$("#content-ajax").html("<center><img src='img/loading.gif'/></center>");
$.ajax({url: "data/cpass.php", success: function(result){
$("#content-ajax").html(result);
 }});
}
function changePassword(){
$("#result-ajax").html("<div class='alert alert-info'><strong>Wait!</strong> <center><img style='width:25px;height:auto;' src='img/loading.gif'/></center></div>");
$.post("data/changepassword.php",
{
password1: document.getElementById("password1").value,
password2: document.getElementById("password2").value
},
function(data,status){
$("#result-ajax").html(data);
});
}
function updateMyProfile(){
$("#result-ajax").html("<div class='alert alert-info'><strong>Wait!</strong> <center><img style='width:25px;height:auto;' src='img/loading.gif'/></center></div>");
$.post("data/updateprofile.php",
{
email: document.getElementById("email").value,
country: document.getElementById("country").value
},
function(data,status){
$("#result-ajax").html(data);
});
}
function searchServices(){
$("#title-ajax").html("Custom Search");
$("#content-ajax").html("<center><img src='img/loading.gif'/></center>");
$.post("data/search.php",
{
search: document.getElementById("searchvalue").value
},
function(data,status){
$("#content-ajax").html(data);
});
}
function listServices(id,name){
nowid=id;
nowname=name;
$("#title-ajax").html(name);
$("#content-ajax").html("<center><img src='img/loading.gif'/></center>");
$.ajax({url: "listservices.php?id="+id, success: function(result){
$("#content-ajax").html(result);
 }});
}
function removeFilter(){
$.ajax({url: "data/removefilter.php", success: function(result){
listServices(nowid,nowname);
 }});
}

function addfilter(country){
$.ajax({url: "data/addfilter.php?id="+country, success: function(result){
listServices(nowid,nowname);
 }});
}
function listPackages(){
$("#title-ajax").html("Packages");
$("#content-ajax").html("<center><img src='img/loading.gif'/></center>");
$.ajax({url: "listpackages.php", success: function(result){
$("#content-ajax").html(result);
 }});
}

function getMessage(){
$("#content-ajax2").html("<center><img src='img/loading.gif'/></center>");
$.ajax({url: "data/sendmessage.php", success: function(result){
$("#content-ajax2").html(result);
 }});
}
function getMessages(id){
chatwith = id;
$("#content-ajax").html("<center><img src='img/loading.gif'/></center>");
$.ajax({url: "data/viewmessages.php?id="+id, success: function(result){
$("#content-ajax").html(result);
 }});
}
function sendmessage(){
$("#result-ajax").html("<div class='alert alert-info'><strong>Wait!</strong> <center><img style='width:25px;height:auto;' src='img/loading.gif'/></center></div>");
$.post("data/messagesend.php",
{
receiver: document.getElementById("receiver").value,
message: document.getElementById("message").value
},
function(data,status){
$("#result-ajax").html(data);
});
}
function sendmessage2(){
if(chatwith!=""){
$("#result-ajax").html("<div class='alert alert-info'><strong>Wait!</strong> <center><img style='width:25px;height:auto;' src='img/loading.gif'/></center></div>");
$.post("data/messagesend.php",
{
receiver: chatwith,
message: document.getElementById("message").value
},
function(data,status){
$("#result-ajax").html(data);
getMessages(chatwith);
});
}
}
function addToPackage(id,id2){
$.ajax({url: "data/addtopackage.php?id="+id+"&type="+id2, success: function(result){
location.href="checkout.php";
 }});

}

function deletePackage(id){
$.ajax({url: "data/deleteitem.php?id="+id, success: function(result){
location.reload(); 
 }});

}

function deleteService(id){
$.ajax({url: "data/deleteservice.php?id="+id, success: function(result){
location.reload(); 
 }});

}

function deletePack(id){
$.ajax({url: "data/deletepack.php?id="+id, success: function(result){
location.reload(); 
 }});

}