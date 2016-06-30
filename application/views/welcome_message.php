<html>
	<head>
		<title>台北市動物收留</title>
		<meta charset="utf-8">
		<style>
			
			body{
				background-color:#FFFDE1;
			}
		
			.red{
				color:red
			}
			
			.ax{
				border:3px #99CEFF dashed;
				background-color:#D8FFFB;
				color:#5D94FF;
				font-family:Microsoft JhengHei;
				font-weight:bold;
				font-size=5%;
				display:inline-block;
				display:inline;
				width:auto;
				
			}
			.darkblue
			{
				background-color:#FFCCDE;
				color:#1F4AAB;
			}

			
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#btnJSON1").click(function(){
					
					
					var url = "CI/index.php/opendataAPI/List/" 
						 + $("#txtOffset1").val()+  "/"+ $("#txtCount1").val() ;
					$.ajax({
						url: url,
//						data: $('#sentToBack').serialize(),
						type:"GET",
						dataType:'json',

						success: function(data){
							var html = "<table class='ax' cellpadding='10' border='1' >";
							html +="<tr class='darkblue'><td style='width:20px'>編號</td><td>名稱</td><td>性別</td><td>動物種類</td><td>體型</td><td>年齡</td><td>品種</td><td>進所原因</td><td>收容編號</td><td>晶片號碼</td><td>絕育否</td><td>毛色</td><td>描述</td><td>位置</td><td>聯絡電話</td><td>聯絡email</td><td>可否與其他孩童相處</td><td>可否與其他動物相處</td><td>體重</td><td>圖片</td></tr>";
							$.each(data, function(key, val) {
								if(val.Name=="")	
									val.Name = "<span class='red'>未命名</span>";
								
								if(val.ChipNum=="")
									val.ChipNum = "<span class='red'>x</span>";
								
								if(val.Bodyweight="")
									val.Bodyweight = "<span class='red'>x</span>";
									
							   html += "<tr><td>" + (key+1) + '</td><td>' + val.Name + '</td><td>' + val.Sex + '</td><td>' + val.Type +'</td><td>' + val.Build +'</td><td>'+val.Age+'</td><td>' + val.Variety+'</td><td>' + val.Reason + '</td><td>'+val.AcceptNum + '</td><td>'+val.ChipNum+'</td><td>' +val.IsSterilization+ '</td><td>'+val.HairType+'</td><td>' +val.Note+ '</td><td>'+val.Resettlement+'</td><td>' +val.Phone+ '</td><td>'+val.Email+'</td><td>'+val.ChildreAnlong + '</td><td>'+val.AnimalAnlong+ '</td><td>'+val.Bodyweight+ "</td><td><img src='"+val.ImageName+"' height='100' width='100'></td></tr>";
							});
							html += '</table>';
							$('#result').html(html);
						},

						 error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError); 
						 }
					});
			
				});
				$("#btnJSON2").click(function(){
					
					var temp ;
					switch($("#txtField2").val())
					{
						case "1":
							temp="Name";
							break;
							
						case "2":
							temp="Sex";
							break;
							
						case "3":
							temp="Type";
							break;
							
						case "4":
							temp="Build";
							break;
							
						case "5":
							temp="Age";
							break;
							
						case "6":
							temp="Variety";
							break;
							
						case "7":
							temp="Reason";
							break;
							
						case "8":
							temp="AcceptNum";
							break;
							
						case "9":
							temp="ChipNum";
							break;
							
						case "10":
							temp="IsSterilization";
							break;
							
						case "11":
							temp="HairType";
							break;
							
						case "12":
							temp="Note";
							break;
							
						case "13":
							temp="Resettlement";
							break;
							
						case "14":
							temp="Phone";
							break;
							
						case "15":
							temp="Email";
							break;
							
						case "16":
							temp="ChildreAnlong";
							break;
							
						case "17":
							temp="AnimalAnlong";
							break;
							
						case "18":
							temp="Bodyweight";
							break;
							
						case "19":
							temp="ImageName";
							break;
							
						default:
							temp = $("#txtField2").val();
							break;
							
							
					}
					console.log($("#txtField2").val());
					
					
					var url = "http://114.35.237.112/CI/index.php/EnternalAPI/List/";
					$.ajax({
						url: url,
						type:"POST",
						data:{
							txtField2:temp,
							txtCount2:$("#txtCount2").val(),
							txtOffset2:$("#txtOffset2").val()						
						},
						dataType:'json',

						success: function(data){
							$('#result').html();
							var html = "<table class='ax' cellpadding='10' border='1'><tr class='darkblue'><td></td><td>";	
							html += (temp+"</td></tr>");
							$.each(data, function(key, val) {
								
								if(val.Name=="")	
									val.Name = "<span class='red'>未命名</span>";
							    html += '<tr><td>' + (key+1) + '</td>';
								for (var prop in val){
									
									if(prop=="ImageName")
										html += ("<td><img src='"+val[prop]+"' height='100' width='100'></td>");
									else
										html += '<td>' + val[prop] + '</td>';
								}		
								html += '</tr>';
							});
							//html += data ;
							html += '</table>';
							console.log("success");
							$('#result').html(html);
						},

						 error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError); 
						 }
					});
				});

				$("#btnJSON3").click(function(){
					var temp2 ;
					switch($("#txtField3").val())
					{
						case "1":
							temp2="Name";
							break;
							
						case "2":
							temp2="Sex";
							break;
							
						case "3":
							temp2="Type";
							break;
							
						case "4":
							temp2="Build";
							break;
							
						case "5":
							temp2="Age";
							break;
							
						case "6":
							temp2="Variety";
							break;
							
						case "7":
							temp2="Reason";
							break;
							
						case "8":
							temp2="AcceptNum";
							break;
							
						case "9":
							temp2="ChipNum";
							break;
							
						case "10":
							temp2="IsSterilization";
							break;
							
						case "11":
							temp2="HairType";
							break;
							
						case "12":
							temp2="Note";
							break;
							
						case "13":
							temp2="Resettlement";
							break;
							
						case "14":
							temp2="Phone";
							break;
							
						case "15":
							temp2="Email";
							break;
							
						case "16":
							temp2="ChildreAnlong";
							break;
							
						case "17":
							temp2="AnimalAnlong";
							break;
							
						case "18":
							temp2="Bodyweight";
							break;
							
						case "19":
							temp2="ImageName";
							break;

						default:
							temp2 = $("#txtField3").val();
							break;	
							
					}
					console.log(temp2);
					var url = "http://jellyfish.kh.usc.edu.tw/a0228382/CI/index.php/opendataAPI/Search/";
					$.ajax({
						url: url,
						type:"POST",
						data:{
							txtKey3:$("#txtKey3").val(),
							txtField3:temp2					
						},
						dataType:'json',

						success: function(data){
							$('#result').html();
							
							var html = "<table class='ax' cellpadding='10' border='1'>";
							html +="<tr class='darkblue'><td>名稱</td><td>性別</td><td>動物種類</td><td>體型</td><td>年齡</td><td>品種</td><td>進所原因</td><td>收容編號</td><td>晶片號碼</td><td>絕育否</td><td>毛色</td><td>描述</td><td>位置</td><td>聯絡電話</td><td>聯絡email</td><td>可否與其他孩童相處</td><td>可否與其他動物相處</td><td>體重</td><td>圖片</td></tr>";
							
							if(data=="")
							{
								html+= "</table></hr><h1 class='red' align='center'>查無資料</h2></hr>";
							}
							for(var i = 0 ; i < data.length;i++)
							{
								html += "<tr>";
								for(var k in data[i])
								{
									if(k=="ImageName")
										html += ("<td><img src='"+data[i][k]+"' height='100' width='100'></td>");
									else
										html += ("<td>"+data[i][k]+"</td>");
								}
								html += "</tr>";
							}
							//html += data ;
							html += '</table>';
							
							$('#result').html(html);
						},

						 error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError); 
						 }
					});
				});
				
				$("#btnJSON4").click(function(){
					
					var temp3 ;
					switch($("#txtField4").val())
					{
						case "1":
							temp3="Name";
							break;
							
						case "2":
							temp3="Sex";
							break;
							
						case "3":
							temp3="Type";
							break;
							
						case "4":
							temp3="Build";
							break;
							
						case "5":
							temp3="Age";
							break;
							
						case "6":
							temp3="Variety";
							break;
							
						case "7":
							temp3="Reason";
							break;
							
						case "8":
							temp3="AcceptNum";
							break;
							
						case "9":
							temp3="ChipNum";
							break;
							
						case "10":
							temp3="IsSterilization";
							break;
							
						case "11":
							temp3="HairType";
							break;
							
						case "12":
							temp3="Note";
							break;
							
						case "13":
							temp3="Resettlement";
							break;
							
						case "14":
							temp3="Phone";
							break;
							
						case "15":
							temp3="Email";
							break;
							
						case "16":
							temp3="ChildreAnlong";
							break;
							
						case "17":
							temp3="AnimalAnlong";
							break;
							
						case "18":
							temp3="Bodyweight";
							break;
							
						case "19":
							temp3="ImageName";
							break;

						default:
							temp3 = $("#txtField4").val();
							break;	
							
					}
					console.log(temp3);
					
					var url = "http://jellyfish.kh.usc.edu.tw/a0228382/CI/index.php/opendataAPI/Delete/";
					$.ajax({
						url: url,
						type:"POST",
						data:{
							txtKey4:$("#txtKey4").val(),
							txtField4:temp3
													
						},
						dataType:'json',

						success: function(data){
							$('#result').html();
							//var html = '<table border="1">';	
							var html = "<h2 class='red' align='center'>刪除了欄位("+temp3+")是"+$('#txtKey4').val()+",共";	
							/*html +='<tr><td>編號</td><td>名稱</td><td>性別</td><td>動物種類</td><td>體型</td><td>年齡</td><td>品種</td><td>進所原因</td><td>收容編號</td><td>晶片號碼</td><td>絕育否</td><td>毛色</td><td>描述</td><td>位置</td><td>聯絡電話</td><td>聯絡email</td><td>可否與其他孩童相處</td><td>可否與其他動物相處</td><td>體重</td><td>圖片</td></tr>';
							$.each(data, function(key, val) {
								
								if(val.Name=="")	
									val.Name = "<span class='red'>未命名</span>";
								
								if(val.ChipNum=="")
									val.ChipNum = "<span class='red'>x</span>";
								
							   html += '<tr><td>' + (key+1) + '</td>';
								for (var prop in val){
									html += '<td>' + val[prop] + '</td>';
								}		
								html += '</tr>';
							});
							//html += data ;
							html += '</table>';*/
							html +=( data +"筆資料</h2>");
							
							console.log("success");
							$('#result').html(html);
						},

						 error:function(xhr, ajaxOptions, thrownError){ 
							alert(xhr.status); 
							alert(thrownError); 
						 }
					});
				});
				
			});
		</script>
	</head>
	<body>
	<h1 align='center'><a href="http://data.taipei/opendata/datalist/datasetMeta?oid=6a3e862a-e1cb-4e44-b989-d35609559463">台北市動物收留</a></h1>
	1.請輸入要顯示的資料：開始筆數<input type="text" id="txtOffset1" value="1">
	總筆數<input type="text" id="txtCount1" value="10">
	<button id="btnJSON1">顯示資料</button><br>
	<fieldset width='500px'>
		<legend>List_get 說明</legend>
		<ul>
			<li>開始筆數：number</li>
			<li>總筆數：number</li>
		</ul>
	</fieldset><br>
	2.請輸入要顯示的資料，指定顯示欄位：開始筆數：<input type="text" id="txtOffset2" value="1">
	總筆數：<input type="text" id="txtCount2" value="10">
	欄位：<input type="text" id="txtField2" value="Name">
	<button id="btnJSON2">顯示資料</button><br>
	
		<fieldset width='500px'>
		<legend>List_post 說明</legend>
		<ul>
			<li>開始筆數：number</li>
			<li>總筆數：number</li>
			<li><b>欄位指定(可輸入欄位代號或欄位名稱)：String or number</b><br><br><div>1.Name(名稱)、2.Sex(性別)、3.Type(動物種類)、4.Build(體型)、5.Age(年齡)、6.Variety(品種)、7.Reason(進所原因)、8.AcceptNum(收容編號)、9.ChipNum(晶片號碼)、10.IsSterilization(絕育否)、11.HairType(毛色)、12.Note(描述)、13.Resettlement(位置)、14.Phone(聯絡電話)、15.Email(聯絡email)、16.ChildreAnlong(可否與其他孩童相處)、17.AnimalAnlong(可否與其他動物相處)、18.Bodyweight(體重)、19.ImageName(圖片) </div></ul>
		</ul>
	</fieldset><br>
	3.請輸入要查詢的資料：<input type="text" id="txtKey3" value="努特">
	欄位：<input type="text" id="txtField3" value="Name">
	<button id="btnJSON3">顯示資料</button><br>
	
		<fieldset width='500px'>
		<legend>Search_post 說明</legend>
		<ul>
			<li>欲搜尋的資料：String</li>
			<li><b>欄位指定(可輸入欄位代號或欄位名稱)：String or number</b><br><br><div>1.Name(名稱)、2.Sex(性別)、3.Type(動物種類)、4.Build(體型)、5.Age(年齡)、6.Variety(品種)、7.Reason(進所原因)、8.AcceptNum(收容編號)、9.ChipNum(晶片號碼)、10.IsSterilization(絕育否)、11.HairType(毛色)、12.Note(描述)、13.Resettlement(位置)、14.Phone(聯絡電話)、15.Email(聯絡email)、16.ChildreAnlong(可否與其他孩童相處)、17.AnimalAnlong(可否與其他動物相處)、18.Bodyweight(體重)、19.ImageName(圖片) </div></ul>
		</ul>
	</fieldset><br>
	4.請輸入要刪除的資料：<input type="text" id="txtKey4" value="努特">
	欄位：<input type="text" id="txtField4" value="Name">
	<button id="btnJSON4">顯示刪除筆數</button><br>
	
		<fieldset width='500px'>
		<legend>Delete_post 說明</legend>
		<ul>
			<li>欲刪除的資料：String</li>
			<li><b>欄位指定(可輸入欄位代號或欄位名稱)：String or number</b><br><br><div>1.Name(名稱)、2.Sex(性別)、3.Type(動物種類)、4.Build(體型)、5.Age(年齡)、6.Variety(品種)、7.Reason(進所原因)、8.AcceptNum(收容編號)、9.ChipNum(晶片號碼)、10.IsSterilization(絕育否)、11.HairType(毛色)、12.Note(描述)、13.Resettlement(位置)、14.Phone(聯絡電話)、15.Email(聯絡email)、16.ChildreAnlong(可否與其他孩童相處)、17.AnimalAnlong(可否與其他動物相處)、18.Bodyweight(體重)、19.ImageName(圖片) </div></ul>
		</ul>
	</fieldset><br>
	<hr>
	<div id="result"></div>
	
