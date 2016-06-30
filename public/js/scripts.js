$(document).ready(function(){
	var keyWord ="";
	// 列出所有資料庫清單
	$("#test").click(function(){		
		var url = "http://114.35.237.112/CI/index.php/EnternalAPI/List1/";
		$.ajax({
			url: url,
			type:"POST",
			/*data:{
				txtField2:temp,
				txtCount2:$("#txtCount2").val(),
				txtOffset2:$("#txtOffset2").val()						
			},*/
			dataType:'json',
			success: function(data){
				
				var html = "<table border='1'><tr>";	
				
				$.each(data, function(key, val) {
					
					for (var prop in val){
						html += '<td>' + val[prop] + '</td>';
					}		
					html += '</tr>';
				});
				//html += data ;
				html += '</table>';
				console.log("success");
				$('#detail').html(html);
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
				alert(xhr.status); 
				alert(thrownError); 
			 }
		});
		console.log("click already ..");
	});
	
	// 關鍵字查詢
	$('#query').click(function(){
		var url = "http://114.35.237.112/CI/index.php/EnternalAPI/Search/";
		$.ajax({
			url: url,
			type:"POST",
			data:{				
				key:$("#key").val()	,
				field:keyWord
			},
			dataType:'json',
			success: function(data){
				
				var html = "<table border='1'><tr>";	
				
				$.each(data, function(key, val) {
					
					for (var prop in val){
						html += '<td>' + val[prop] + '</td>';
					}		
					html += '</tr>';
				});
				//html += data ;
				html += '</table>';
				console.log("success");
				$('#detail').html(html);
			},

			 error:function(xhr, ajaxOptions, thrownError){ 
				alert(xhr.status); 
				alert(thrownError); 
			 }
		});
		console.log("click already ..");
		console.log($("#key").val());
		console.log($('#kw').find('searchword:selected').text());

	});
	
	// 左邊手風琴選單
	$(".yeardepartment").hide();
    $("#searchword li").click(function(){ 
		$('#keyword').text($(this).text());
	});
   
   	$(".yearlist").click(function(){
		//console.log($(this).index());
		if($(this).find(".yeardepartment").is(":visible")==true)
			$(".yeardepartment").slideUp();
		else {
			$(".yeardepartment").slideUp();
			$(this).find(".yeardepartment").slideDown();
		}
	});
	
	$('.yearlist').hover(function(){
		$(this).addClass('red');
		},function(){
		$(this).removeClass('red');
	});
	$('.yeardepartment').hover(function(){
		$(this).addClass('hover');
		},function(){
		$(this).removeClass('hover');
	});
	
	
	// 存入關鍵字
	$('.dropdown-menu li a').click(function(){
		keyWord = $(this).text();
		console.log(keyWord);
	});
	
});