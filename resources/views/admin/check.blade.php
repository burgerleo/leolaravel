<!DOCTYPE html>
<head>
<script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>{{$title}}</title>
</head>
<body>
<h1>查看全部</h1>
<hr class="style3">
<!-- {{$token}} -->
	<form action="/" method="post" id = 'form1' name = "form1">
		<p>帳號</p><input type="text" name="email" value="@gmail.com" >
		<p>密碼</p><input type="number" name="password" id="password" value="">
	</form>
	<br>
	<button type="bubmit" id = 'btn1'>Send!</button>

	<br>
	<br>
	<button type="bubmit" id = 'btn2'>測試用按鈕!</button>
</body>
</html>
<script type="text/javascript">
$(function () {
	var title = '{{$title}}';
	// var ck=$("input[name='password']").val();
	var token = "{{$token}}";
	$("#btn1").bind("click",function(){
		var ck = $("#password").val()
		// if(!$("form")[0].checkValidity()) return;
		$.ajax({
			async:false,
			type:"get",
			url:"http://localhost/leolaravel/public/api/v1/lessons/"+ck,
			// data: $("#form1").serialize(),
			dataType:"json",
			headers: {
				    'Authorization': 'Bearer '+token
				  },
			success:function(data){
				console.log(data);
				alert(data.date.title);
				$('#btn2').after(data.date.title);
			},
			error:function(request,error){
				alert(error + " : " + request.responseText);				
			}
		});


	});
	$("#btn2").bind("click",function(){
		var ck = $("#password").val()
	    // alert("Value: " + $("#test").val());
		console.log(ck);
		alert(ck);
	});
});




</script>