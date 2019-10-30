<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>ajax</title>
  <style>
	.main-content{
		width:600px;
		margin:0 auto;
		padding:20px;
	}
	.form{width:100%;}
	.form input{
		width:100%;
		border:none;
		margin:0;
		font-size:20px;
	}
	.form .anim{
		width:100%;
		height:3px;
		background-color:#000;
		position:relative;
	}
	.form .anim::after{
		position:absolute;left:0;top:0;
		content:'';
		width:0%;height:100%;
		background-color:#08f;
		transition:1s;
		z-index:1;
	}
	.form input:focus ~::after{
		width:100%;
	}
	.content{width:100%;margin-top:20px;}
	.content div{
		font-size:20px;
		margin-top:5px;
	}
	.infos{color:#08f;}
  </style>
</head>
<body>
	<div class='main-content'>
		<h1>Student information</h1>
		<div class="form">
			<input type="number" id="stu-num" placeholder='Student name' onfocusout='add()'>
			<div class='anim'>&nbsp;</div>
		</div>
		<div class="content">
			<div>Name :<span class="infos"></span></div>
			<div>Age :<span class="infos"></span></div>
		</div>
	</div>
	<script>
		var infos=document.getElementsByClassName('infos');
		var num=document.getElementById('stu-num');
		var add=()=>{
			var con=new XMLHttpRequest();
			con.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if(this.responseText){
						var I=JSON.parse(this.responseText);
						infos[0].innerHTML=I.name;
						infos[1].innerHTML=I.age;
					}else{
						infos[0].innerHTML='undefined';
						infos[1].innerHTML='undefined';
					}
				}
			};
			con.open("POST", `./DB.php?num=${num.value}`, true);
			con.send();
		}
	</script>
</body>
</html>
