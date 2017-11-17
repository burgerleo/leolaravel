<!DOCTYPE html>
<head>
<script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>{{$title}}</title>
</head>
<body>
<h1>新增資料</h1>
<hr class="style3">
	<form action="/" method="post" id = 'form1' name = "form1">
		<p>標題</p><input type="text" name="title" value="" >
		<p>內容</p><input type="text" name="body" value="">
		<p>閱讀權限</p><input type="number" name="free" value="0" min = 0 max = 1>
	</form>
	<button type="bubmit" id = 'btn1'>Send!</button>
	<hr>
</body>
</html>
<script type="text/javascript">
$(function () {
	var token = "{{$token}}";
	$("#btn1").bind("click",function(){
		if(!$("form")[0].checkValidity()) return;
		$.ajax({
			async:false,
			type:"POST",
			url:"http://localhost/leolaravel/public/api/v1/lessons",
			data: $("#form1").serialize(),
			dataType:"json",
			headers: {
			    'Authorization': 'Bearer '+token
					},
			success:function(data, status, xhr){
				console.log(data);
				alert(data.status);
				$('input').val('');
			},
			error:function(request,error){
				console.log(request);
				alert(error + " : " + request.responseJSON.message);				
			}
		});
	});

});
</script>