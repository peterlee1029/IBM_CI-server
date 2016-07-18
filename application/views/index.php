<html ng-app="main">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I-push</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <link href="css/form.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

  </head>
  <body ng-controller="controll as ctrl">
	<script>
		var url = $(location).attr('href') + 'index.php/';

//		var url = "http://192.168.3.112/IBM_CI/index.php/";
		console.log(url + ' click me.');
		$(function(){
			$(window).scroll(function() {
					$('#gotop').fadeIn("fast");
					$('#gotool').fadeIn("fast");
					$('#goback').fadeIn("fast");
					$('#logout').fadeIn("fast");
			});
			$('#a1').click(function(){
				$('#tool').fadeOut('fast');
				$('#skill').fadeToggle('fast');
			
			});
			$('#a2').click(function(){
				$('#skill').fadeOut('fast');
				$('#tool').fadeToggle('fast');
			});
		});
		angular.module('main',[]).controller('controll',['$http',function($http){
			var self=this;
			self.prepage=[false,false,false,false,false,false,false,false];
			self.page=[true,false,false,false,false,false,false,false];
			self.arr1=[];//學生排名
			self.arr2=[];//公司排名
			self.skill=[];
			self.list;
			self.result1=true;
			self.result2=false;
			self.result3=true;
			self.result4=false;
			self.result5=false;
			self.result6=true;
			self.result7=false;
			self.detail;
			self.major;
			self.team;
			self.lo=false;
			self.price=[];
			self.arr=[];
			self.seardata=[];
			self.popcomp=function(school){
				self.major=school;
					var data={
						major:school
					};
				$http.post(url + 'EnternalAPI/popular',data).
						success(function (data, status, headers, config) {
							self.price=[];
							self.arr1=[];
							angular.forEach(data,function(item){
								self.arr1.push(item);
							});
						}).
						error(function (data, status, headers, config) {
						//alert("dddddddddd");
					});
					self.getpricemethod(self.major);
			};
			
					
			self.loginout=function(){
				document.location.href="index.html";
				
			};
			self.goback=function(){
							for(var i=0;i<self.page.length;i++){
								
										if(self.page[i]==true && (i==6)){
											self.page[i]=false;
											self.page[4]=true;
											
										}else if (self.page[i]==true && i==0) {
											self.page[i]=false;
											self.page[0]=true;
										}else if(self.page[i]==true && i==4){
											self.page[i]=false;
											self.page[0]=true;
										}else if(self.page[i]==true && i==7){
											self.page[i]=false;
											self.page[2]=true;
										
										}
										else if(self.page[i]==true){
											self.page[i]=false;
											self.page[i-1]=true;
										};
										
								
							}
			};
			self.submit=function(){

					if($('#male').is(':checked')){
						self.user.gender=$('#male').val();
					}
					if($('#female').is(':checked')){
						self.user.gender=$('#female').val();
					}
					var data={
						name:self.user.username,
						password:self.user.password,
						identify:self.user.gender
					};
					console.log('click me.');
					$http.post(url + 'EnternalAPI/checklogin', data).
						success(function (data, status, headers, config) {
							console.log('click me.success');
							if(data.res==1){
								if(data.iden=='student'){
									
									
								
									
									
								for(var i=0;i<self.page.length;i++){
									self.prepage[i]=self.page[i];
								}
									for(var i=0;i<self.page.length;i++){
										self.page[i]=false;
									}
									self.page[1]=true;
								}else {
									self.major='資訊管理學系';
									self.popcomp(self.major);
									self.getpricemethod(self.major);
									for(var i=0;i<self.page.length;i++){
										self.prepage[i]=self.page[i];
									}
									for(var i=0;i<self.page.length;i++){
										self.page[i]=false;
									}
									self.page[4]=true;
								}
								
							}else{
								alert('輸入帳密有錯 請重新輸入');
								document.location.href="index.html";
							}
						}).
						error(function (data, status, headers, config) {
						alert(data.res);
					});
					console.log('after click me.');
			};
			self.gofb=function(url){
				document.location.href="https://www.facebook.com/"+url+"?fref=ts";
			};
			self.showd=function(ss,major){
				alert(major);
				var arr=[];
				var data={
						keys:ss,
						maj:major
					};
					$http.post(url + 'EnternalAPI/companydetail', data).
						success(function (data, status, headers, config) {

							self.detail=data['data'];
							self.team=data['tedata'];
							for(var i=0;i<self.page.length;i++){
								self.prepage[i]=self.page[i];
							}
							for(var i=0;i<self.page.length;i++){
									self.page[i]=false;
							}
							self.page[3]=true;
							
						}).
						error(function (data, status, headers, config) {
						alert("err");
					});
			
			};
			self.searchdata1=function(school){
				var input=$('#keywordsearch').val();
				var data={
					keys:input,
					major:school
				};
				$http.post(url + 'EnternalAPI/searchforname',data).success(function(data,status,headers,config){
					
							self.detail=data['data'];
							self.team=data['tedata'];
							for(var i=0;i<self.page.length;i++){
									self.prepage[i]=self.page[i];
							}
							for(var i=0;i<self.page.length;i++){
								self.page[i]=false;
							}
							self.page[6]=true;
					
					
					
				}).error(function(data,status,headers,config){
					alert("err");
				});
			};
			self.getpricemethod=function(school){
					var data={
						major:school
					};
				$http.post(url + 'EnternalAPI/catchprice',data).
						success(function (data, status, headers, config) {
							self.price=[];
							angular.forEach(data,function(item){
								self.price.push(item);
							});
						}).
						error(function (data, status, headers, config) {
						//alert("dddddddddd");
					});
				
			};
			self.showcompany=function(ss,pageselect,school){
			
				
				var data={
						keys:ss,
						maj:school
					};
					$http.post(url + 'EnternalAPI/companydetail', data).
						success(function (data, status, headers, config) {
								self.detail=data['data'];
								self.team=data['tedata'];
							//	alert("sss");
								for(var i=0;i<self.page.length;i++){
									self.prepage[i]=self.page[i];
								}
								for(var i=0;i<self.page.length;i++){
									self.page[i]=false;
								}
								if(pageselect=="comp"){
									self.page[6]=true;
								}else{
									self.page[3]=true;
								}
								
								
						}).
						error(function (data, status, headers, config) {
					  // called asynchronously if an error occurs
					  // or server returns response with an error status.
						alert("err");
					});
			};	
			self.aaa=function(){
				alert("aaa");
			};
			self.click=function(school){
					
					var arr=[];
					self.major=school;
					var data={
						major:school
						
					};
					self.lo=true;
					$http.post(url + 'EnternalAPI/select', data).
						success(function (data, status, headers, config) {
							angular.forEach(data,function(item){
								arr.push(item);
							});
							self.stupop(self.major);
							self.popcomp(self.major);
							for(var i=0;i<self.page.length;i++){
								self.prepage[i]=self.page[i];
							}
							for(var i=0;i<self.page.length;i++){
								self.page[i]=false;
							}
							self.page[2]=true;
							self.list=arr;
							self.lo=false;
						}).
						error(function (data, status, headers, config) {
						alert(data.res);
					});
			};
			self.showresult1=function(){
				self.result1=true;
				self.result2=false;
			};
			self.showresult2=function(){
				self.result1=false;
				self.result2=true;
			};
			self.stupop=function(school){
				var data={
						major:school
					};
				$http.post(url + 'EnternalAPI/popular',data).
						success(function (data, status, headers, config) {
							self.arr2=[];
							angular.forEach(data,function(item){
								console.log(item);
								self.arr2.push(item);
							});
						}).
						error(function (data, status, headers, config) {
						alert("error");
					});
				
				
			};
			self.stusortpage=function(){
				self.result3=true;
				self.result4=false;
			}
			self.stuall=function(){
				self.result3=false;
				self.result4=true;
			
			};
			
			self.searchstugo=function(school){
				var keyword=$('#search').val();
				var d=$('#day').val();
				
				if(d =="tue"){
						var data={
							keys:keyword,
							major:school
						};
						$http.post(url + 'EnternalAPI/searchforname',data).success(function(data,status,headers,config){
							
									self.detail=data['data'];
									self.team=data['tedata'];
									for(var i=0;i<self.page.length;i++){
											self.prepage[i]=self.page[i];
									}
									for(var i=0;i<self.page.length;i++){
										self.page[i]=false;
									}
									
									self.page[3]=true;
							
							
							
						}).error(function(data,status,headers,config){
							alert("err");
						});
				}else if(d=="mon"){
						var data={
							keys:keyword,
							major:school
						};
						$http.post(url + 'EnternalAPI/searchprojectname',data).
					success(function(data,status,headers,config){
						self.seardata=[];
						angular.forEach(data,function(item){
							self.seardata.push(item);
							for(var i=0;i<self.page.length;i++){
								self.prepage[i]=self.page[i];
							}
							for(var i=0;i<self.page.length;i++){
									self.page[i]=false;
							}
							self.page[7]=true;
						});
					}).error(function(data,status,headers,config){
						alert("err");
					
					});
				
				}
			
			};
			
			self.searchcompgo=function(school){
				var keyword=$('#searchcomp').val();
				var d=$('#day6').val();
				if(d =="tue"){
						var data={
							keys:keyword,
							major:school
						};
						$http.post(url + 'EnternalAPI/searchforname',data).success(function(data,status,headers,config){
							
									self.detail=data['data'];
									self.team=data['tedata'];
									for(var i=0;i<self.page.length;i++){
											self.prepage[i]=self.page[i];
									}
									for(var i=0;i<self.page.length;i++){
										self.page[i]=false;
									}
									self.page[6]=true;
							
							
							
						}).error(function(data,status,headers,config){
							alert("err");
						});
				}else if(d=="mon"){
						var data={
							keys:keyword,
							major:school
						};
						$http.post(url + 'EnternalAPI/searchprojectname',data).
					success(function(data,status,headers,config){
							self.seardata=[];
						angular.forEach(data,function(item){
							self.seardata.push(item);
							for(var i=0;i<self.page.length;i++){
								self.prepage[i]=self.page[i];
							}
							for(var i=0;i<self.page.length;i++){
									self.page[i]=false;
							}
							self.page[5]=true;
						});
					}).error(function(data,status,headers,config){
						alert("err");
					
					});
				
				}
			
			};
			self.tenpop=function(){
				self.result6=true;
				self.result7=false;
			};
			self.getprice=function(){
				self.result6=false;
				self.result7=true;
			};
			
			self.showskill=function(school){
				var data={
							major:school
						};
						$http.post(url + 'EnternalAPI/showSkill',data).
					success(function(data,status,headers,config){
						self.skill=[];
						angular.forEach(data,function(item){
							self.skill.push(item);
						});
					}).error(function(data,status,headers,config){
						alert("err");
					});
			}
			
			self.showtool=function(school){
				var data={
							major:school
						};
						$http.post(url + 'EnternalAPI/showtool',data).
					success(function(data,status,headers,config){
						self.skill=[];
						angular.forEach(data,function(item){
							self.skill.push(item);
						});
					}).error(function(data,status,headers,config){
						alert("err");
					});
			}
		}]);
	</script>
	 <div data-role="page" >
		<div data-role="header" data-position="fixed">
		
		</div>
		<div ng-show="ctrl.lo" class="process">
			讀取中
		</div>
		<div ng-show="ctrl.page[0]" >
			<div >
			<img class='img' width='100%' height='200px' src='img/LOGO2.png' />
			
			</div>
			<form class="form-container">
			  <div class="form-title">帳號</div>
			  <input type="text" name="fname" class="form-field" placeholder="學生請輸入學號 企業請輸入帳號" ng-model="ctrl.user.username">
			  <div class="form-title">密碼</div>
			  <input type="text" class="form-field"  name="fname" placeholder="請輸入密碼" ng-model="ctrl.user.password">
			   <fieldset data-role="controlgroup">
				<div class="form-title"><legend>身分別</legend></div>
				  <label for="male" >學生</label>
				  <input type="radio" name="gender" id="male" value="student" ng-model="ctrl.user.gender" />
				  <label for="female">企業</label>
				  <input type="radio" name="gender" id="female" value="company" ng-model="ctrl.user.gender" /> 
			  </fieldset>
			    <label for="red" >記住我</label>
				<input type="checkbox" name="favcolor" id="red" value="記住我" style="text-align:center">
			 <input type="button"  class="submit-button" value="登入" id="bt1" ng-click="ctrl.submit()"/>
			</form>
		</div>
		<div ng-show="ctrl.page[1]">
			<center><table>
				<tr>
					<td><a href="#" ng-click="ctrl.click('應用英文學系')"><img src="img/DAE.png" class="imgcir" ></img></td>
					<td><a href="#"  ng-click="ctrl.click('資訊模擬與設計學系')"><img src="img/CSD.png" class="imgcir"></img></td>
				</tr>
				<tr>
					<td><a href="#"  ng-click="ctrl.click('應用中文學系')"><img src="img/DCH.png" class="imgcir" ></img></td>
					<td><a href="#"  ng-click="ctrl.click('會計暨稅務學系')"><img src="img/at.png" class="imgcir" ></img></td>
				</tr>
				<tr>
					<td><a href="#" ng-click="ctrl.click('金融管理學系')"><img src="img/dfo.png" class="imgcir" ></img></td>
					<td><a href="#" ng-click="ctrl.click('服飾設計與經營學系')"><img src="img/FDM.png" class="imgcir" ></img></td>
				</tr>
				<tr>
					<td><a href="#" ng-click="ctrl.click('時尚設計學系')"><img src="img/FDSC.png" class="imgcir" ></img></td>
					<td><a href="#" ng-click="ctrl.click('國際企業管理學系')"><img src="img/ibm.png" class="imgcir" ></img></td>
				</tr>
				<tr>
					<td><a href="#" ng-click="ctrl.click('資訊管理學系')"><img src="img/IMD.png" class="imgcir" ></img></td>
					<td><a href="#" ng-click="ctrl.click('資訊科技與通訊學系')"><img src="img/ITC.png" class="imgcir" ></img></td>
				</tr>
				<tr>
					<td><a href="#" ng-click="ctrl.click('國際貿易學系')"><img src="img/trade.png" class="imgcir" ></img></td>
					<td><a href="#" ng-click="ctrl.click('觀光管理學系')"><img src="img/tmd.png" class="imgcir" ></img></td>
				</tr>
				<tr>
					<td><img src="img/rmd.png" class="imgcir" ng-click="ctrl.click('休閒產業管理學系')"></img></td>
					<td><img src="img/mmd.png" class="imgcir" ng-click="ctrl.click('行銷管理學系')"></img></td>
				</tr>
				<tr>
					<td><a href="#" ng-click="ctrl.click('應用日文學系')"><img src="img/jp.png" class="imgcir" ></img></td>
					
				</tr>
			</table></center>
			
		</div>
		<div ng-show="ctrl.page[2]">
				
					<table>
						
						<tr>
							<td style="width:15%">
								<a href="#myPopup5" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" style="text-decoration:none;text-align:center;">條件</a>

								<div data-role="popup" id="myPopup5">
								  <select name="day" id="day" data-native-menu="false">
								  <option value="mon">專題名稱</option>
								  <option value="tue">成員姓名</option>	  
								</select>
								</div>
							</td>
							<td style="width:75%">
								<input type="search" name="search" id="search" placeholder="Search for content..."/>
							</td>
							<td >
								<a href="#" ng-click="ctrl.searchstugo(ctrl.major)" style="text-decoration:none;text-align:center;margin-top:20px;"><p style="font-size:30px">GO</p></a>
							</td>
						</tr>
					</table>
						
					
					
				<div data-role="navbar">
				  <ul>
					<li><a href="#" data-icon="clock" ng-click="ctrl.stusortpage()">熱門搜尋</a></li>
					<li><a href="#" data-icon="eye" ng-click="ctrl.stuall()">全部專題</a></li>
				  </ul>
				</div>
				<div ng-show="ctrl.result3" id="result3">
					<div ng-repeat="item2 in ctrl.arr2">
					<ul id="list" data-role="listview">
						<li><a href="#" ng-click="ctrl.showd(item2.na,ctrl.major)"><img src="img/{{item2.p_date}}.png"/><h2>{{item2.na}}</h2><p class="fontcolor">{{item2.desc}}</p><p class="fontcolor">{{item2.type}}</p><span class="ui-li-count">{{item2.p_count}}</span></a></li>
					</ul>
					</div>
				</div>
				
				
				<div ng-show="ctrl.result4" id="result4">
					<div ng-repeat="item in ctrl.list">
						 <ul data-role="listview" >    
							  <li><a href="#" ng-click="ctrl.showd(item.name,ctrl.major)"><img src="img/{{item.date}}.png"/><h2>{{item.name}}</h2><p class="fontcolor">{{item.desc}}</p><p class="fontcolor">{{item.type}}</p></a></li>
						</ul>
					</div>
				
				</div>
				
				
		
		</div>
		<div ng-show="ctrl.page[3]">
					<div data-role="navbar">
					<ul>
						<li><a href="#" data-icon="Information" ng-click="ctrl.showresult1()">作品簡介區</a></li>
						<li><a href="#" data-icon="user" ng-click="ctrl.showresult2()">團隊資料</a></li>
					  </ul>
					
					</div>
					<div ng-show="ctrl.result1" class="show-container">
						<div class="show-title-big">作品簡介區</div>
						<table >
						<tr>
							<td>
								<div class="show-title">專題名稱</div>
							</td>
						  </tr>
						 <tr>
							<td>
								{{ctrl.detail[0].name}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">專題組長</div>
						
							</td>
						  </tr>
						  <tr>
							<td>
								{{ctrl.detail[0].leader}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">指導教授</div>
							
							</td>
						  </tr>
						  <tr>
							<td>
								{{ctrl.detail[0].teacher}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">專題描述</div>
								
							</td>
							</tr>
							<tr>
							<td>
								{{ctrl.detail[0].description}}<hr/>
							</td>
						  </tr>
						  </tr>
						</table>
					</div>
					<div ng-show="ctrl.result2" class="show-container">
						<div class="show-title-big">團隊資料區</div>
						<div ng-repeat="de in ctrl.team">
						<table>
							<tr>
								<td><img src="https://graph.facebook.com/{{de.uid}}/picture?width=140&height=140" class="imgstyle"/></td>
								<td>
									<div class="show-title">姓名</div>
									
								
								
									{{de.fb_name}}
									
								
									<div class="show-title">Email</div>
								
								
									{{de.email}}
									
								
									<div class="show-title">FB主頁</div>
								
								
									<a href="#" ng-click="ctrl.gofb(de.uid)">連結請按此</a>
								</td>
							</tr>
						</table>
						<hr/>
						
					</div>
					
			</div>
		</div>
		<div ng-show="ctrl.page[4]">
										<div id="gotop"><a style="text-decoration:none;color:white;color: #725129;
   text-shadow: #fdf2e4 0 1px 0;" href="#" id="a1" ng-click="ctrl.showskill(ctrl.major)">職場技能</a></div>
										<div id="skill" style="margin-left:20px">
											<h2>職場技能</h2>
											<ul data-role="listview" d ng-repeat="it in ctrl.skill">
						
													 <p style="font-size:16px">{{it.skill}}</p>
													<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
								  
								
											
											</ul>
										</div>
										<div id="gotool"><a style="text-decoration:none;color:white; color: #725129;
   text-shadow: #fdf2e4 0 1px 0;" href="#" id="a2" ng-click="ctrl.showtool(ctrl.major)">擅長工具</a></div>
										<div id="tool" >
											<h2>擅長工具</h2>
											<ul data-role="listview" d ng-repeat="it in ctrl.skill">
						
													 <p style="font-size:16px">{{it.tool}}</p>
													<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
								  
								
											
											</ul>
										</div>
										
										<div class="ui-content">
										<p class="form-title" style="text-align:right;">人才分類</p>
										<a href="#myPopup7" data-rel="popup" data-role="button" class="companyselect">{{ctrl.major}}</a>
											<div data-role="popup" id="myPopup7">
												<a href="#" data-role="button" ng-click="ctrl.popcomp('資訊管理學系')">資訊管理</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('時尚設計學系')">時尚設計</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('資訊模擬與設計學系')">資訊模擬與設計學系</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('會計暨稅務學系')">會計暨稅務</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('金融管理學系')">金融管理</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('服飾設計與經營學系')">服飾設計與經營學系</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('國際企業管理學系')">國際企業管理</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('資訊科技與通訊學系')">資訊科技與通訊學系</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('國際貿易學系')">國際貿易</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('觀光管理學系')">觀光管理</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('休閒產業管理學系')">休閒產業管理</a>
												<a href="#" data-role="button" ng-click="ctrl.popcomp('行銷管理學系')">行銷管理</a>
											</div>
										</div><hr/>
						
					<!--<select name="day" id="day6" data-native-menu="false">
											  <option value="應用英文學系" ng-click="ctrl.popcomp('應用英文學系')">應用英文學系</option>
											  <option value="資訊模擬與設計學系" ng-click="ctrl.popcomp('資訊模擬與設計學系')">資訊模擬與設計學系</option>
											  <option value="會計暨稅務學系" ng-click="ctrl.popcomp('會計暨稅務學系')">會計暨稅務學系</option>
											  <option value="金融管理學系" ng-click="ctrl.popcomp('金融管理學系')">金融管理學系</option>
											  <option value="服飾設計與經營學系" ng-click="ctrl.popcomp('服飾設計與經營學系')">服飾設計與經營學系</option>
											  <option value="時尚設計學系" ng-click="ctrl.aaa()">時尚設計學系</option>
											  <option value="國際企業管理學系" ng-click="ctrl.popcomp('國際企業管理學系')">國際企業管理學系</option>
											  <option value="資訊管理學系" ng-click="ctrl.popcomp('資訊管理學系')">資訊管理學系</option>
											  <option value="資訊科技與通訊學系" ng-click="ctrl.popcomp('資訊科技與通訊學系')">資訊科技與通訊學系</option>
											  <option value="國際貿易學系" ng-click="ctrl.popcomp('國際貿易學系')">國際貿易學系</option>
											  <option value="觀光管理學系" ng-click="ctrl.popcomp('觀光管理學系')">觀光管理學系</option>
											  <option value="休閒產業管理學系" ng-click="ctrl.popcomp('休閒產業管理學系')">休閒產業管理學系</option>
											 <option value="行銷管理學系" ng-click="ctrl.popcomp('行銷管理學系')">行銷管理學系</option>
											</select>		
						-->
						
						
					
						 
						
				
				
					<table>
						
									<tr>
										<td style="width:15%">
											<a href="#myPopup6" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all" style="text-decoration:none;text-align:center;">條件</a>

											<div data-role="popup" id="myPopup6">
											  <select name="day" id="day6" data-native-menu="false">
											  <option value="mon">專題名稱</option>
											  <option value="tue">成員姓名</option>	  
											</select>
											</div>
										</td>
										<td style="width:75%">
											<input type="search" name="search" id="searchcomp" placeholder="Search for content..."/>
										</td>
										<td >
											<a href="#" ng-click="ctrl.searchcompgo(ctrl.major)" style="text-decoration:none;text-align:center;margin-top:20px;"><p style="font-size:30px">GO</p></a>
										</td>
									</tr>
					</table>
					<div data-role="navbar">
					<ul>
						<li><a href="#" data-icon="Information" ng-click="ctrl.tenpop()">十大熱門選項</a></li>
						<li><a href="#" data-icon="user" ng-click="ctrl.getprice()">獲獎專題</a></li>
					  </ul>
					
					</div>
					<div ng-show="ctrl.result6">
					 <ul data-role="listview" d ng-repeat="it in ctrl.arr1">
						
							 <li><a href="#" ng-click="ctrl.showcompany(it.na,'comp',ctrl.major)"><h2>{{it.na}}</h2><p class="fontcolor">{{it.desc}}</p><p class="fontcolor">{{it.type}}</p><span class="ui-li-count">{{it.p_count}}</span></a></li>
							<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
		  
		
					
					</ul>
					</div >
					<div ng-show="ctrl.result7">
						<ul data-role="listview" d ng-repeat="it in ctrl.price">
						
							 <li><a href="#" ng-click="ctrl.showcompany(it.na,'comp',ctrl.major)"><h2>{{it.na}}</h2><p class="fontcolor">獲獎:{{it.price}}</p></a></li>
							<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
		  
		
					
						</ul>
					</div>
				
		
		
		
		</div>
		<div ng-show="ctrl.page[5]">
			 <ul data-role="listview" data-inset="true" ng-repeat="it in ctrl.seardata">
							
							 <li><a href="#" ng-click="ctrl.showcompany(it.projectname,'comp',ctrl.major)">{{it.projectname}}</a></li>
							<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
		  
		
					
			</ul>
		
		</div>
		<div ng-show="ctrl.page[6]">
		
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-icon="Information" ng-click="ctrl.showresult1()">作品簡介區</a></li>
						<li><a href="#" data-icon="Information" ng-click="ctrl.showresult2()">團隊資料</a></li>
					  </ul>
					
					</div>
					<div ng-show="ctrl.result1" class="show-container">
						<div class="show-title-big">作品簡介區</div>
						<table >
						<tr>
							<td>
								<div class="show-title">專題名稱</div>
							</td>
						  </tr>
						 <tr>
							<td>
								{{ctrl.detail[0].name}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">專題組長</div>
						
							</td>
						  </tr>
						  <tr>
							<td>
								{{ctrl.detail[0].leader}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">指導教授</div>
							
							</td>
						  </tr>
						  <tr>
							<td>
								{{ctrl.detail[0].teacher}}<hr/>
							</td>
						  </tr>
						  <tr>
							<td>
								<div class="show-title">專題描述</div>
								
							</td>
							</tr>
							<tr>
							<td>
								{{ctrl.detail[0].description}}<hr/>
							</td>
						  </tr>
						  </tr>
						</table>
					</div>
					<div ng-show="ctrl.result2" class="show-container">
						<div class="show-title-big">團隊資料區</div>
						<div ng-repeat="de in ctrl.team">
						<table>
						<tr>
							<td><img src="https://graph.facebook.com/{{de.uid}}/picture?width=140&height=140" class="imgstyle"/></td>
							<td>
								<div class="show-title">姓名</div>
								
							
							
								{{de.fb_name}}
								
							
								<div class="show-title">Email</div>
							
							
								{{de.email}}
								
							
								<div class="show-title">FB主頁</div>
							
							
								<a href="#" ng-click="ctrl.gofb(de.uid)">連結請按此</a>
							</td>
						</tr>
						
						
						
							
								
						
						</table>
						<hr/>
						</div>
					
		</div>
		
		
		</div>
		<div ng-show="ctrl.page[7]">
			 <ul data-role="listview" data-inset="true" ng-repeat="it in ctrl.seardata">
							
							 <li><a href="#" ng-click="ctrl.showcompany(it.projectname,'stu',ctrl.major)">{{it.projectname}}</a></li>
							<!--<li><a href="#" ng-click="ctrl.showcompany(it.na)">{{it.na}}</a></li>-->
		  
		
					
			</ul>
		
		</div>
		<div id="goback"><a href="#" ng-click="ctrl.goback()"><img src="img/navigate-left.png" style="position:relative;top:0%;"/></div>
   <div id="logout"><a href="#" style="position:relative;top:00%;" ng-click="ctrl.loginout()"><img src="img/logout.png" style="position:relative;top:0%;"/></a></div>
		<!--<div data-role="footer" data-position="fixed">
			<a href="#" data-role="button" data-icon="arrow-l" ng-click="ctrl.goback()">上一頁</a>
			<a href="#" data-role="button" data-icon="delete" style="float:right"ng-click="ctrl.loginout()" >登出</a>
		</div>-->
	 </div>
  </body>
 
	
  

</html>