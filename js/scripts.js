
var postcount  = 5;
var postcount2 = 5;
var postcount3 = 5;
var postcount4 = 5;
var postcount5 = 5;
var postcount6 = 5;
var postcount7 = 5;

  function delPost(id){
  $.ajax({url: "data/deletepost.php?id="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
    function delBookMark(id){
  $.ajax({url: "data/deletebookmark.php?id="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
  
    function delPostC(id){
  $.ajax({url: "data/deletepost2.php?id="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
  
    function likePostC(id,nlikes){
  $.ajax({url: "data/likeclasspost.php?id="+id, success: function(result){
		if(result=='<div id="resultinner" class="alert alert-success" > <strong>Success!</strong> Successfully liked the post.</div>'){nlikes=nlikes+1;}
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#likediv2-"+id).html('<span id="likeicon-'+id+'"  style="color: rgb(222, 12, 12); font-size: 20px;" onclick="unlikePostC('+"'"+id+"',"+nlikes+');this.style.color='+"'rgb(107, 101, 101)'"+';" class="glyphicon glyphicon-heart">'+nlikes+'</span>');
	}});
  
  }
  
      function unlikePostC(id,nlikes){
  $.ajax({url: "data/unlikeclasspost.php?id="+id, success: function(result){
		if(result=='<div id="resultinner" class="alert alert-success" > <strong>Success!</strong> Successfully unliked the post.</div>'){nlikes=nlikes-1;}
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#likediv2-"+id).html('<span id="likeicon-'+id+'"  style="color: rgb(107, 101, 101); font-size: 20px;" onclick="likePostC('+"'"+id+"',"+nlikes+');this.style.color='+"'rgb(222, 12, 12)'"+';" class="glyphicon glyphicon-heart">'+nlikes+'</span>');
	}});
  
  }
  
  function likePost(id,nlikes){
  $.ajax({url: "data/likepost.php?id="+id, success: function(result){
		if(result=='<div id="resultinner" class="alert alert-success" > <strong>Success!</strong> Successfully liked the post.</div>'){nlikes=nlikes+1;}
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#likediv-"+id).html('<span id="likeicon-'+id+'"  style="color: rgb(222, 12, 12); font-size: 20px;" onclick="unlikePost('+"'"+id+"',"+nlikes+');this.style.color='+"'rgb(107, 101, 101)'"+';" class="glyphicon glyphicon-heart">'+nlikes+'</span>');
	}});
  
  }
  
  function unlikePost(id,nlikes){
  $.ajax({url: "data/unlikepost.php?id="+id, success: function(result){
		if(result=='<div id="resultinner" class="alert alert-success" > <strong>Success!</strong> Successfully unliked the post.</div>'){nlikes=nlikes-1;}
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#likediv-"+id).html('<span id="likeicon-'+id+'"  style="color: rgb(107, 101, 101); font-size: 20px;" onclick="likePost('+"'"+id+"',"+nlikes+');this.style.color='+"'rgb(222, 12, 12)'"+';" class="glyphicon glyphicon-heart">'+nlikes+'</span>');
	}});
  
  }
  
    function loadMoreMessages(){
   var contnt="";
	 contnt=document.getElementById("loading").innerHTML;
	 document.getElementById("loading").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount;$x<postcount+6;$x++){
  document.getElementById("msg-"+$x).style.display="block";
  }
  postcount=postcount+6;
  document.getElementById("loading").innerHTML=contnt;
  }, 1000);
  }
  
  function loadMoreNotifications(){
   var contnt="";
	 contnt=document.getElementById("loading").innerHTML;
	 document.getElementById("loading").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount;$x<postcount+6;$x++){
  document.getElementById("not-"+$x).style.display="block";
  }
  postcount=postcount+6;
  document.getElementById("loading").innerHTML=contnt;
  }, 1000);
  }
   function loadMoreFollowers(){
   var contnt="";
	 contnt=document.getElementById("loading").innerHTML;
	 document.getElementById("loading").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount1;$x<postcount1+9;$x++){
  document.getElementById("fo1-"+$x).style.display="block";
  }
  postcount1=postcount1+9;
  document.getElementById("loading").innerHTML=contnt;
  }, 1000);
  }
  
     function loadMoreFollowers2(){
   var contnt="";
	 contnt=document.getElementById("loading2").innerHTML;
	 document.getElementById("loading2").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount2;$x<postcount2+9;$x++){
  document.getElementById("fo12-"+$x).style.display="block";
  }
  postcount2=postcount2+9;
  document.getElementById("loading2").innerHTML=contnt;
  }, 1000);
  }
  
       function loadMoreClasses(){
   var contnt="";
	 contnt=document.getElementById("loading3").innerHTML;
	 document.getElementById("loading3").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount3;$x<postcount3+9;$x++){
  document.getElementById("cls-"+$x).style.display="block";
  }
  postcount3=postcount3+9;
  document.getElementById("loading3").innerHTML=contnt;
  }, 1000);
  }
     function loadMoreMembers(){
	 var contnt="";
	 contnt=document.getElementById("loading").innerHTML;
	 document.getElementById("loading").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount4;$x<postcount4+9;$x++){
  document.getElementById("mem-"+$x).style.display="block";
  }
  postcount4=postcount4+9;
  document.getElementById("loading").innerHTML=contnt;
  }, 1000);
  }
  
       function loadMoreClasses(){
	 var contnt="";
	 contnt=document.getElementById("loading").innerHTML;
	 document.getElementById("loading").innerHTML='<center><img src="img/loading.gif" style="width:50px;height:50px;"/></center>';
	 setTimeout(
  function() 
  {
  for($x=postcount;$x<postcount+9;$x++){
  document.getElementById("cls-"+$x).style.display="block";
  }
  postcount=postcount+9;
  document.getElementById("loading").innerHTML=contnt;
  }, 1000);
  }
  
    function followUser(){
  $.ajax({url: "data/followuser.php?user="+user, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#follow").html('<button type="button" class="btn btn-info" onclick="unfollowUser();">- UnFollow</button>');
	}});
  
  }
  
      function makePa(){
  $.ajax({url: "data/updateparentid.php?parentid="+user, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
        function remPa(){
  $.ajax({url: "data/updateparentid.php?parentid=", success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
  
      function followUser2(user2){
  $.ajax({url: "data/followuser.php?user="+user2, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#follow").html('<button type="button" class="btn btn-info" onclick="unfollowUser();">- UnFollow</button>');
	}});
  
  }
  
      function joinClass(id){
  $.ajax({url: "data/joinclass.php?class="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#joinclass").html('<button type="button" class="btn btn-info" onclick="leaveClass('+"'"+id+"'"+');">Leave Class</button>');
	}});
  
  }
  
      function leaveClass(id){
  $.ajax({url: "data/leaveclass.php?class="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#joinclass").html('<button type="button" class="btn btn-info" onclick="joinClass('+"'"+id+"'"+');">Join Class</button>');
	}});
  
  }

  function deleteClass(id){
	 $.ajax({url: "data/deleteclass.php?class="+id, success: function(result){
		window.top.location="home.php";
	}});
  
  }
        function unfollowUser2(user2){
  $.ajax({url: "data/unfollow.php?user="+user2, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#follow").html('<button type="button" class="btn btn-info" onclick="followUser();">+ Follow</button>');
	}});
  
  }
      function unfollowUser(){
  $.ajax({url: "data/unfollow.php?user="+user, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
		$("#follow").html('<button type="button" class="btn btn-info" onclick="followUser();">+ Follow</button>');
	}});
  
  }
  
        function removeUserC(user2,id){
  $.ajax({url: "data/removeuserc.php?user="+user2+"&id="+id, success: function(result){
		$("#results").html(result);
		$("#resultinner").fadeOut(5000);
	}});
  
  }
  
function loadGeneralS(){
  $("#settings").html('<center><img src="img/loading.gif" /></center>');
  $.ajax({url: "data/generals.php", success: function(result){
$("#settings").html(result);
	}});
	}
	
function loadPrivacyS(){
  $("#settings").html('<center><img src="img/loading.gif" /></center>');
  $.ajax({url: "data/privacys.php", success: function(result){
$("#settings").html(result);
	}});
	}
	
function loadSecurityS(){
  $("#settings").html('<center><img src="img/loading.gif" /></center>');
  $.ajax({url: "data/securitys.php", success: function(result){
$("#settings").html(result);
	}});
	}
	function loadbookMarks(){
  $("#bookmarks").html('<center><img src="img/loading.gif" /></center>');
  $.ajax({url: "data/getbookmarks.php", success: function(result){
$("#bookmarks").html(result);
	}});
	}
	function updateSettings(){
	var datee=$("#datepicker").datepicker('getDate');
	 datee=$.datepicker.formatDate('yy-m-d', new Date(datee));
	
		 $.post("data/updategeneral.php",
    {
        dob: datee,
        whatsup: document.getElementById("whatsup").value,
		about: document.getElementById("desc").value,
		country: document.getElementById("country").value
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
    });
	}
	
		function updateSettings2(){

		 $.post("data/updateprivacy.php",
    {
        email: document.getElementById("email").value,
		mobile: document.getElementById("mobile").value,
		address: document.getElementById("address").value
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
    });
	}
	
			function updateSettings3(){

		 $.post("data/updatepass.php",
    {
        cpass: document.getElementById("cpass").value,
		npass: document.getElementById("npass").value
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
    });
	}
		function addBM(){
	
	 $.post("data/addbookmark.php",
    {
        link: document.getElementById("burl").value
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
		loadbookMarks();
    });
	
	}
			function addMsg(){
	
	 $.post("data/addmsg.php",
    {
        content: document.getElementById("contentmsg").value,
		user: usrid
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
    });
	
	}

	
	function updateAssignment(){
	var datee=$("#assd").datepicker('getDate');
	 datee=$.datepicker.formatDate('yy-m-d', new Date(datee));
	
		 $.post("data/updateassignment.php",
    {
        datee: datee,
        id: document.getElementById("classidmain").value,
		onoff: document.getElementById("asson").checked
    },
    function(data, status){
        $("#results").html(data);
		$("#resultinner").fadeOut(5000);
    });
	}
	