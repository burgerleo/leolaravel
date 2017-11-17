<!DOCTYPE html>
<head>
<script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>{{$title}}</title>
</head>
<body>
<h1>登入測試頁</h1>
<hr class="style3">

	<form action="/" method="post" id = 'form1' name = "form1">
		<p>帳號</p><input type="text" name="email" value="e455285@gm.com" >
		<p>密碼</p><input type="text" name="password" value="123456">
	</form>
	<button type="bubmit" id = 'btn1'>Send!</button>
	<hr>
</body>
</html>
<script type="text/javascript">
$(function () {
	$("#btn1").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;
		$.ajax({
			async:false,
			type:"POST",
			url:"http://localhost/leolaravel/public/api/login",
			data: $("#form1").serialize(),
			dataType:"json",

			success:function(data, status, xhr){
				console.log(data);
				alert(data.token);
			},
			error:function(request,error){
				console.log(request);
				alert(error + " : " + request.responseText);				
			}
		});
	});

});
</script>