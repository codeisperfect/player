//Shifted code means : Don't use it in future

									var button={ // this Should be deleted.
										attrs:function(obj){
											var alla=obj.attributes;
											var attrso={};
											for(var i=0;i<alla.length;i++)
												attrso[alla[i].name]=alla[i].value;
											return attrso;
										},
										tosendattrs:function(obj,allattrs){
											var dontneed=["data-restext","data-waittext","data-res","data-wait","data-error","data-params","data-eparams", "data-loadingimg"];
											var sendparams={};
											for(var i in allattrs){
												if(i.substr(0,5)=="data-" && dontneed.indexOf(i)==-1 )
													sendparams[i.substr(5)]=allattrs[i];
											}
											return sendparams;
										},
										parse:function (d){
											try{
												return JSON.parse(d);
											}catch(e){
												mohit.alert("Unexpected error! ");
												return null;
											}
										},
										hasattr:function (allattrs,a){
											return (typeof(allattrs[a])!='undefined');
										},
										objhasattr:function (obj,a){
											return button.hasattr(button.attrs(obj),a);
										},
										sendreq:function(obj){
											var allattrs=this.attrs(obj);
											if(!button.hasattr(allattrs,"data-params"))
												var params=this.tosendattrs(obj,allattrs);
											else{
												eval("var params="+allattrs["data-params"]);
											}
											params['action']=allattrs["data-action"];
											obj.disabled=true;
											var prvvalue=obj.innerHTML;
											obj.innerHTML=(!button.hasattr(allattrs,"data-waittext"))?' ... ':(allattrs["data-waittext"]==''?prvvalue:allattrs["data-waittext"]);
											$.post(HOST+"actionv2.php",params,function(d,s){if(s=='success'){
												obj.disabled=false;
												var respo=button.parse(d);
												obj.innerHTML=prvvalue;
												if(respo){
													if(respo.ec<0){
														if(button.hasattr(allattrs,"data-error")){
															var ec=respo.ec;
															eval(allattrs["data-error"]);
														}
														else
															mohit.alert(ecn[respo.ec]);
													}
													else{
														obj.innerHTML=(typeof(allattrs["data-restext"])=='undefined')?prvvalue:allattrs["data-restext"];
														if(button.hasattr(allattrs,"data-res")){
															var data=respo.data;
															eval(allattrs["data-res"]);
														}
													}
												}
												
											}});
										},
										sendreq_v2:function(obj){
											var allattrs=this.attrs(obj);
											if(!button.hasattr(allattrs,"data-params"))
												var params=this.tosendattrs(obj,allattrs);
											else{
												eval("var params="+allattrs["data-params"]);
											}
											if(button.hasattr(allattrs,"data-eparams")){
												eval("var eparams="+allattrs["data-eparams"]);
												params=others.mergeifunset(params,eparams);
											}
											params['action']=allattrs["data-action"];
											obj.disabled=true;
											var prvvalue=obj.innerHTML;
											obj.innerHTML=(!button.hasattr(allattrs,"data-waittext"))?' ... ':(allattrs["data-waittext"]==''?prvvalue:allattrs["data-waittext"]);
											$.post(HOST+"actionv2.php",params,function(d,s){if(s=='success'){
												obj.disabled=false;
												var respo=button.parse(d);
												obj.innerHTML=prvvalue;
												if(respo){
													if(respo.ec<0){
														if(button.hasattr(allattrs,"data-error")){
															var ec=respo.ec;
															eval(allattrs["data-error"]);
														}
														else
															mohit.alert(ecn[respo.ec]);
													}
													else{
														obj.innerHTML=(typeof(allattrs["data-restext"])=='undefined')?prvvalue:allattrs["data-restext"];
														if(button.hasattr(allattrs,"data-res")){
															var data=respo.data;
															eval(allattrs["data-res"]);
														}
													}
												}
												
											}});
										},
										sendreq_v2_t2:function(obj){
											var allattrs=this.attrs(obj);
											if(!button.hasattr(allattrs,"data-params"))
												var params=this.tosendattrs(obj,allattrs);
											else{
												eval("var params="+allattrs["data-params"]);
											}
											if(button.hasattr(allattrs,"data-eparams")){
												eval("var eparams="+allattrs["data-eparams"]);
												params=others.mergeifunset(params,eparams);
											}
											params['action']=allattrs["data-action"];
											obj.disabled=true;
											var prvvalue=obj.innerHTML;
											obj.innerHTML=(!button.hasattr(allattrs,"data-waittext"))?' ... ':(allattrs["data-waittext"]==''?prvvalue:allattrs["data-waittext"]);
											$.post(HOST+"actionv2.php",params,function(d,s){if(s=='success'){
												obj.disabled=false;
												var respo=button.parse(d.split("\n")[0]);
												obj.innerHTML=prvvalue;
												if(respo){
													if(respo.ec<0){
														if(button.hasattr(allattrs,"data-error")){
															var ec=respo.ec;
															eval(allattrs["data-error"]);
														}
														else
															mohit.alert(ecn[respo.ec]);
													}
													else{
														obj.innerHTML=(typeof(allattrs["data-restext"])=='undefined')?prvvalue:allattrs["data-restext"];
														if(button.hasattr(allattrs,"data-res")){
															var data=respo.data;
															eval(allattrs["data-res"]);
														}
														if(button.hasattr(allattrs,"data-reshtml")){
															var data=d.substring(d.indexOf('\n')+1);
															eval(allattrs["data-reshtml"]);
														}
													}
												}
												
											}});
										},
										sendreq_v2_t3:function(params,call_back_data,call_back_html,adata){
											$.post(HOST+"actiondisp.php",params,function(d,s){if(s=='success'){
												var respo=button.parse(d.split("\n")[0]);
												if(respo){
													if(respo.ec<0){
														if(typeof(adata)!='undefined'){
															if(button.hasattr(adata,"data-error")){
																var ec=respo.ec;
																eval(allattrs["data-error"]);
															}
															else
																mohit.alert(ecn[respo.ec]);
														}
														else
															mohit.alert(ecn[respo.ec]);
													}
													else{
														if(call_back_data!=null)
															call_back_data(respo.data);
														if(call_back_html!=null){
															var data=d.substring(d.indexOf('\n')+1);
															call_back_html(data);
														}
													}
												}
											}});
										},
										sendreq_v2_t4:function(obj,call_back_data,call_back_html,adata){
											var allattrs=this.attrs(obj);
											if(!button.hasattr(allattrs,"data-params"))
												var params=this.tosendattrs(obj,allattrs);
											else{
												eval("var params="+allattrs["data-params"]);
											}
											if(button.hasattr(allattrs,"data-eparams")){
												eval("var eparams="+allattrs["data-eparams"]);
												params=others.mergeifunset(params,eparams);
											}
											params['action']=allattrs["data-action"];
											button.sendreq_v2_t3(params,call_back_data,call_back_html);
										},
										sendreq1:function (params,call_back,adata){
											$.post("actionv2.php",params,function(d,s){if(s=='success'){
												var respo=button.parse(d);
												if(respo){
													if(respo.ec<0){
														if(button.hasattr(adata,"data-error")) {
															var ec=respo.ec;
															eval(adata["data-error"]);
														}
														else
															mohit.alert(ecn[respo.ec]);
													}
													else if(call_back!=null)
														call_back(respo.data);
												}
												else
													mohit.alert("Unexpected Error");
											}});
										},
										selectme:function (obj){
											$(obj).repClass("btn-default","btn-primary");
											$(obj).siblings().repClass("btn-primary","btn-default");
											$(obj).parent().children("input[type=hidden]").val($(obj).attr("data-val"));
										},
									};


var form={
							sendreq:function(obj,bobj){
								if(bobj.disabled)
									return;
								var allattrs=button.attrs(obj);
								var allattrsb=button.attrs(bobj);

								var params=getFormInputs(obj,'action');
								params['action']=allattrs["data-action"];
								bobj.disabled=true;
								var prvvalue=bobj.innerHTML;
								bobj.innerHTML=(!button.hasattr(allattrsb,"data-waittext"))?' ... ':(allattrsb["data-waittext"]==''?prvvalue:allattrsb["data-waittext"]);
								$.post(HOST+"actionv2.php",params,function(d,s){if(s=='success'){
									bobj.disabled=false;
									var respo=button.parse(d);
									bobj.innerHTML=prvvalue;
									if(respo){
										if(respo.ec<0){
											if(button.hasattr(allattrs,"data-error")){
												var ec=respo.ec;
												eval(allattrs["data-error"]);
											}
											else
												mohit.alert(ecn[respo.ec]);
										}
										else{
											bobj.innerHTML=(typeof(allattrsb["data-restext"])=='undefined')?prvvalue:allattrsb["data-restext"];
											if(button.hasattr(allattrs,"data-res")){
												var data=respo.data;
												eval(allattrs["data-res"]);
											}
										}
									}
									
								}});
							},
							sendreq1:function(obj,bobj){
								if(bobj.disabled)
									return;
								var allattrs=button.attrs(obj);
								var allattrsb=button.attrs(bobj);

								var params=getFormInputs(obj,'action');
								if(button.hasattr(allattrs,'data-param')){
									eval("var addparam="+allattrs['data-param']);
									others.mergeifunset(params,addparam);
								}

								params['action']=allattrs["data-action"];
								bobj.disabled=true;
								var prvvalue=bobj.innerHTML;
								bobj.innerHTML=(!button.hasattr(allattrsb,"data-waittext"))?' ... ':(allattrsb["data-waittext"]==''?prvvalue:allattrsb["data-waittext"]);
								$.post(HOST+"actionv2.php",params,function(d,s){if(s=='success'){
									bobj.disabled=false;
									var respo=button.parse(d);
									bobj.innerHTML=prvvalue;
									if(respo){
										if(respo.ec<0){
											if(button.hasattr(allattrs,"data-error")){
												var ec=respo.ec;
												eval(allattrs["data-error"]);
											}
											else
												mohit.alert(ecn[respo.ec]);
										}
										else{
											bobj.innerHTML=(typeof(allattrsb["data-restext"])=='undefined')?prvvalue:allattrsb["data-restext"];
											if(button.hasattr(allattrs,"data-res")){
												var data=respo.data;
												eval(allattrs["data-res"]);
											}
										}
									}
									
								}});
							},
							req:function(obj){
								form.sendreq1(obj, $(obj).find("button[type=submit]")[0]);
								return false;
							},
	valid:{
		is:function (obj){
			var errorlist=[];
			var objlist=[];
			var inputs=['INPUT','TEXTAREA','SELECT'];
			var problem=false;
			for(i=0;i<inputs.length;i++){
				var ilist=$(obj).find(inputs[i]);
				for(j=0;j<ilist.length;j++){
					if(checkValidInput.isChecked( ilist[j]  ) ){
						$(ilist[j]).parent().removeClass("has-error");
					}
					else{
						$(ilist[j]).parent().addClass("has-error");
						var errormsg=$(ilist[j]).attr("data-unfilled") || $(ilist[j]).attr("name") ;
						objlist.push(ilist[j]);
						errorlist.push(errormsg);
						if(!problem)
							$(ilist[j]).focus();
						problem=true;
					}
				}
			}
			return [errorlist,objlist];
		},
		action:function(obj, type){
			var temp=form.valid.is(obj);
			var errors=temp[0];
			var objlist=temp[1];
			if(errors.length>0){
				if(type==1){
					for(var i=0; i<errors.length; i++){
						objlist[i].setCustomValidity(errors[i]);
					}
				}
				else{
					for(var i=0;i<errors.length;i++){
						errors[i]=(i+1)+". "+errors[i];
					}
					var dispmsg="You have to fill:<br>"+errors.join("<br>");
					success.push(dispmsg,true);
				}
			}
			return !(errors.length>0);
		},
		action1:function(obj){
			return form.valid.action(obj,1);
		},
		action2:function(obj){
			return form.valid.action(obj);
		}
	}
};

var div={
	setblock:function(obj){
		$(obj).attr("data-blocked","true");
	},
	isblock:function(obj){
		return ($(obj).attr("data-blocked")=="true");
	},
	setunblock:function(obj){
		$(obj).attr("data-blocked","false");
	},
	reload:function(obj,call_back_data,adata){
		button.sendreq_v2_t4(obj,call_back_data,function(d){
			$(obj).html(d);
		},adata);
	},
	load:function(obj, isloadold, isappendold, call_back_data, call_back_html, loadingselector) {
		if(div.isblock(obj))
			return -1;
		if( (isloadold==1 && $(obj).attr("data-minl")==0) || (isloadold==0 && $(obj).attr("data-maxl")==0) )
			return -2;
		div.setblock(obj);
		loading.show(loadingselector);
		if(isappendold==null)
			isappendold=isloadold;
		$(obj).attr("data-isloadold",isloadold);
		button.sendreq_v2_t4(obj,function(d){
			var replacearr=["min", "max", "minl", "maxl"];
			for(var i=0; i<replacearr.length; i++){
				$(obj).attr("data-"+replacearr[i], d[replacearr[i]]);
			}
			if(call_back_data!=null)
				call_back_data(d);
			loading.hide(loadingselector);
		},function(d){
			if(isappendold==1)
				$(obj).prepend(d);
			else if(isappendold==0)
				$(obj).append(d);
			else if(isappendold==-1)
				$(obj).html(d);
			div.setunblock(obj);
			if(call_back_html!=null){
				call_back_html(d);
			}
		});
	},
	reload_autoscroll: function(obj, data_maxl, call_back_data, call_back_html, selector) {
		if(data_maxl==null)
			data_maxl=$(obj).attr("data-ignoreloadonce");
		if(typeof(data_maxl) == "number" )
			$(obj).attr({"data-max":0, "data-maxl":data_maxl});
		else
			$(obj).attr(data_maxl);
		div.load(obj, 1, -1, call_back_data, call_back_html, selector);
	},
};



var selects={
	arraytooptionlist:function(arr,text){
		var outp="";
		outp+="<option value='' >"+text+"</option>";
		for(var i=0;i<arr.length;i++)
			outp+="<option>"+arr[i]+"</option>";
		return outp;
	}
};


var textarea={
	resize:function(obj){
		var battrs=button.attrs(obj);
		// if(!button.hasattr(battrs,"data-minrows"))
		// 	battrs["data-minrows"]=3;
		// if(!button.hasattr(battrs,"data-maxrows"))
		// 	battrs["data-maxrows"]=10;
		// if(27+20*(obj.rows)<obj.scrollHeight && battrs["data-maxrows"] > obj.rows  ){
		// 	obj.rows++;
		// }
	},
	resizeorg:function(obj){
		var battrs=button.attrs(obj);
		if(!button.hasattr(battrs,"data-minrows"))
			battrs["data-minrows"]=3;
		if(!button.hasattr(battrs,"data-maxrows"))
			battrs["data-maxrows"]=10;
		if(27+20*(obj.rows)<obj.scrollHeight && battrs["data-maxrows"] > obj.rows  ){
			obj.rows++;
		}
	}
};



var validation={
	"isnull":function (st){
		for(var i=0;i<st.length;i++){
			if(!(st[i]==' ' || st[i]=='\n' || st[i]=='\t'))
				return false;
		}
		return true;
	}
};





var others={
	keys:function(arr){
		outp=[];
		for(i in arr){
			outp.push(i);
		}
		return outp;
	},
	timeleft:function(t){
		var seconds=Math.floor(t)%60;
		var minutes=Math.floor(t/60)%60;
		var hours=Math.floor(t/3600)%24;
		var days=Math.floor(t/(3600*24));
		return {days:days,hours:hours,minutes:minutes,seconds:seconds};
	},
	timelefttext:function(tl){
		var outp="";
		var keys=others.keys(tl);
		for(var i=0;i<4;i++){
			if(tl[keys[i]]!=0)
				outp+=tl[keys[i]]+" "+keys[i]+(i==3?"":",");
		}
		outp+="";
		return outp;
	},
	setifunset:function(data,key,val){
		if(typeof(data[key])=='undefined')
			data[key]=val;
	},
	mergeifunset:function(dict1,dict2){
		for(i in dict2){
			if(typeof(dict1[i]=='undefined'))
				dict1[i]=dict2[i];
		}
		return dict1;
	},
	mergeforce:function (dict1,dict2){
		for(i in dict2){
			dict1[i]=dict2[i];
		}
		return dict1;
	},
};

function timenow(){
	return Math.floor(new Date().getTime()/1000);
}



var inpmultiple={
	setvalue:function(obj){
		var superparent=$(obj).parent().parent().parent();
        var allcbox=superparent.find('input[type=checkbox]');
        var outp=[];
        for(i=1;i<allcbox.length;i++){
			if(allcbox[i].checked)
				outp.push(i);
        }
        superparent.find("input[type=hidden]").val(outp.join("-"));
	}
};


function selectAll(obj){
	allcbox=$(obj).parent().parent().parent().find('input[type=checkbox]');
	for(i=0;i<allcbox.length;i++){
		if($(allcbox[i]).parent().parent()[0].style.display!="none")
			allcbox[i].checked=obj.checked;
		else
			allcbox[i].checked=false;
	}
}



String.prototype.bound = function (n) {
	if(this.length<=n)
		return this;
	else
		return this.substr(0,n-2)+".."
};

$.prototype.repClass=function(oldc,newc){
	this.removeClass(oldc);
	this.addClass(newc);
};


function extend(jobj,cfunc){
	var clist=jobj.children();
	if(clist.length>0){
		jobj.append(clist[0].outerHTML);
		clist=jobj.children();
		for(var i=0;i<clist.length;i++){
			if(cfunc!=null){
				cfunc(clist[i],i);
			}
//			$(clist[i]).find("input").attr("placeholder","Option "+(i+1) );
		}
	}
}

function remove(list1,e,fsatis){
	var outp=[];
	for(var i=0;i<list1.length;i++){
		if( (fsatis==null && list1[i]!=e) || (fsatis!=null && fsatis(list1[i],e))  ){
			outp.push(list1[i]);
		}
	}
	return outp;
}


function doforall(list1,f){
	for(var i=0;i<list1.length;i++){
		f(list1[i]);
	}
}

function time(ms){
	var tms=new Date().getTime();
	if(ms==null)
		return Math.floor(tms/1000.0);
	else
		return tms;
}




setifunset=function(data,key,val){
	if(typeof(data[key])=='undefined')
		data[key]=val;
}

mergeifunset=function(dict1,dict2){
	for(i in dict2){
		setifunset(dict1,i,dict2[i]);
	}
}

String.prototype.myreplace=function(findstr,repstr){
	var regex=new RegExp(findstr,'g');
	return this.replace(regex,repstr);
}

String.prototype.replaceall = function (repdict){
	var inp=this;
	for(var i in repdict){
		inp=inp.myreplace(i,repdict[i]);
	}
	return inp;
};


function htmlspecialchars(str) {
	return str.replaceall({"&":"&amp;", '"':"&quot;", "'":"&#039;", "<":"&lt;", ">":"&gt;"});
}



function smilymsg(inp){
	inp=htmlspecialchars(inp);
	inp=inp.replaceall({"\n":"<br>","\t":"&nbsp;&nbsp;&nbsp;","  ":"&nbsp;&nbsp;"});
	return inp;
}



var success={
	id:0,
	opentime:{},
	hideafter:3000,//milli seconds
	push:function(msg,convert){
		var sid=success.id;
		success.opentime[sid]=time("m");
		if(convert==null){
			msg=smilymsg(msg);
		}
		else if(convert==false){

		}
		var addnew='<div id="alert_'+sid+'" class="success-msg" style="display:none;" ><span onclick="success.closeme($(this).parent());" class="closePopup closeSuccess" >&times;</span>'+msg+'</div>';
		$("#success_alerts").append(addnew);
		alobj=$("#alert_"+sid);
		alobj.fadeIn(function(){
			setTimeout(function(){
				success.cleaner();
			},success.hideafter);
		});
		success.id++;
	},
	closeme:function(alobj){
		alobj.fadeOut(function(){
			alobj.remove();
		});
	},
	cleaner:function(){
		var ot=success.opentime;
		var zombies=[];
		for(var i in ot){
			if(time("m")-ot[i]>success.hideafter){
				success.closeme($("#alert_"+i));
				zombies.push(i);
			}
		}
		for(var i in zombies){
			if($("#alert_"+i).length<1){
				delete success.opentime[i];
			}
		}
	}
};


function mylib() {
	function textareainc(obj){
		var allattrs=button.attrs(obj);
		mergeifunset(allattrs,{'data-maxrows':5});
		if($(obj).outerHeight() < obj.scrollHeight + parseFloat($(obj).css("borderTopWidth")) + parseFloat($(obj).css("borderBottomWidth"))) {
			if($(obj).attr("rows")<allattrs["data-maxrows"])
				$(obj).attr("rows",1+parseInt($(obj).attr("rows")));
		};
	}
	$("textarea.autoinc").on("keyup keydown",function(){
		textareainc(this);
	});
	var valid={
		resetinp:function (){
			$("input").on("kepup keydown ", function(e){
				if(e.keyCode!=9 && e.keyCode!=13 ){
					this.setCustomValidity("");
				}
			});
		}
	};
	var hovercss = {
		onmousein: function(obj, selector, cssprop) {
			selector.css(cssprop);
		},
		onmousein: function(obj, selector, cssprop) {
			selector.css(cssprop);
		},
		hovercss: function (obj, cssv, selector) {
			if(selector == null) {
				selector = $(obj).find(".edit");
			}
		}
	};
	var ajaxload = {
		loadonce: function(){
			doforall($(".loadonce"), function(inp){
				ajax.divreload(inp);
			});
		}
	};
	var editform = {

	}

	ajaxload.loadonce();
	valid.resetinp();
}



function hasgoodchar(inp){
	var uselesschar=" \t\n";
	for(var i=0;i<inp.length;i++){
		if(uselesschar.indexOf(inp[i])==-1)
			return true;
	}
	return false;
}


function haskey(arr, key) {
	return (key in arr);
}


var ms = {
	changesym: function(obj, slist) {
		if(slist == null)
			slist = ["keyboard_arrow_down", "keyboard_arrow_up"];
		var elm = $(obj).children();
		var curicon = slist.indexOf(elm.children().html());
		var newicon = ((curicon+1)%slist.length);
		elm.html(mt.icon(slist[newicon]));
	},
	changescreen: function(obj, id1, id2) {
		hs_toggle([id1, id2], 700);
		ms.changesym(obj);
	},
	changetab: function (tid) {
		$("#"+tid).click();
	}

};


var loading = {
	show: function(selector) {
		$(selector).css("visibility", "visible");
	},
	hide: function(selector) {
		$(selector).css("visibility", "hidden");
	}
};




var getattrs = function(obj){
	var alla=obj.attributes;
	var attrso={};
	for(var i=0;i<alla.length;i++)
		attrso[alla[i].name]=alla[i].value;
	return attrso;
};


function definput(arr) {
	var defvals = [];
	for(var i in arr) {
		var setvstr = "";
		if(arr[i] === null) {
			setvstr = "null";
		} else if(typeof arr[i] === 'string') {
			setvstr = "String("+arr[i].toSource()+")";
		} else if(typeof arr[i] === 'object') {
			setvstr = arr[i].toSource();
		} else{
			setvstr = ""+arr[i];
		}
		defvals.push("if(typeof "+i+" === 'undefined') {"  +i+" = "+setvstr+"; }");
	}
	return defvals.join(";");
}

function f_mf_elm(key, val, custom) {//map & filter function element type

}


function map(inplist ,func, custom) {
	eval(definput({"custom":{}}));
	mergeifunset(custom, {"isindexed": false, "ismapkey": false, 'convvals': false});
	var outp = {};
	for(var i in inplist) {
		var val = inplist[i];
		if(custom["ismapkey"] )
			outp[ func(i) ] = val;
		else
			outp[(custom["isindexed"]?val:i)] = func(val, i);
	}
	return (custom["convvals"]  ? arrvalues(outp): outp);
}

function filter(inplist ,func, custom) {
	eval(definput({"custom":{}}));
	mergeifunset(custom, {"ismapkey": false, 'convvals': false});
	var outp = {};
	for(var i in inplist) {
		var val = inplist[i];
		var decider = false;
		if( custom["ismapkey"] )
			decider = func(i) ;
		else
			decider = func(val, i);
		if(decider)
			outp[i] = val;
	}
	return (custom["convvals"]  ? arrvalues(outp): outp);
}

function arrvalues(arr, iskey){
	eval(definput({"iskey": false}));
	outp = [];
	for(var i in arr) {
		outp.push((iskey ? i:arr[i]));
	}
	return outp;
}

function split(inpstr, delm, limit) {//this function is not complete. Need to find time and complete.
	eval(definput({"limit": -1, "delm": " "}));
	var outp = [];
	while(limit-- ) {
		var tempoutp = inpstr.split(delm)[0];
		outp.push(tempoutp);
		var shouldibreak = (tempoutp.length == inpstr.length);
		inpstr = inpstr.substr(tempoutp.length + delm.length);
		if(shouldibreak)
			break;
	}
	if(false){};
	return outp;
}


var ajax = {
	url:"actionv2.php",
	filterattrs: function(attrs) {
		var dontneed=["data-restext","data-waittext","data-res","data-wait","data-error","data-params","data-eparams", "data-loadingimg"];//need to correct it.
		return map(filter(attrs, function(inp){
			return (inp.substr(0, 5) == 'data-' && !inl(inp, dontneed));
		}, {"ismapkey": true}), f('inp.substr(5)'), {"ismapkey": true});
	},
	parse:function (d){
		var jsonline = d.split("\n")[0];
		try{
			json_outp = JSON.parse(jsonline);
		} catch(e) {
			return null;
		}
		return {"json": json_outp, "html": d.substr(jsonline.length+1)};
	},
	sendreq: function(params, data_action, errorh) {
		eval(definput({"data_action": f(), "errorh": fno("mohit.alert(ecn[ec])", "ec") } ));
		$.post(HOST+ajax.url, params, function(d,s){if(s=='success'){
			respo = ajax.parse(d, errorh);
			if(respo){
				if( respo.json.ec < 0 ) {
					errorh(respo.json.ec);
				} else {
					data_action(respo.json, respo.html);
				}
			} else {
				errorh("Unexpected Error!", 0);
			}
		}});
	},
	caleparams:function(allattrs, obj, inpparams) {
		eval(definput({obj: null, inpparams: {} }));
		eval("var isattr = " + f('haskey(allattrs, inp)', true));
		eval("var isdattr = " + f('isattr("data-"+inp)', true));
		var params = ajax.filterattrs(allattrs);
		if(isdattr( "eparams" )) {
			eval("var eparams="+allattrs["data-eparams"]);
			mergeifunset(params,eparams);
		}
		mergeifunset(params, inpparams);
		if(obj != null) {
			mergeifunset(params, getFormInputs(obj));
		}
		return params;
	},
	actionbutton: function(isprv) {
		eval(definput({isprv: true}));
		var prvafter = [function (obj, allattrs) {
			obj.disabled = true;
			var store = {};
			store["innerHTML"] = obj.innerHTML;
			mergeifunset(allattrs, {"data-waittext":" ... "});
			if(allattrs["data-waittext"]!="") {
				obj.innerHTML=allattrs["data-waittext"];
			}
			return store;
		}, function(obj, allattrs, prvstore, json_data, html_data) {
			obj.disabled = false;
			mergeifunset( allattrs, {"data-restext": prvstore["innerHTML"], "data-reloaddiv": null});
			if(allattrs["data-waittext"]!=""){
				obj.innerHTML = allattrs["data-restext"];
			}
			if(allattrs["data-reloaddiv"] !== null) {
				ajax.divreload($(allattrs["data-reloaddiv"])[0]);
			}
			if(haskey(allattrs, "data-res")) {
				var data = json_data;
				eval(allattrs["data-res"]);
			}
		}];
		return prvafter[1-isprv];
	},
	sendreq_t2: function(obj, data_action) {

	},
	buttonreq: function(obj, addaction, eparams){
		eval(definput({addaction: f(), eparams:{}}));
		var allattrs = getattrs(obj);
		var store = ajax.actionbutton()(obj, allattrs);
		ajax.sendreq( ajax.caleparams(allattrs, null, eparams), function(json, html){
			ajax.actionbutton(false)(obj, allattrs, store, json, html);
			addaction(json, html);
		});
	},
	formreq: function(obj, bobj, addaction, eparams){
		eval(definput({bobj: $(obj).find("button[type=submit]")[0], addaction: f(), eparams:{} }));
		var allattrs = getattrs(obj);
		var store = ajax.actionbutton()(bobj, allattrs);
		ajax.sendreq( ajax.caleparams(allattrs, obj, eparams), function(json, html){
			ajax.actionbutton(false)(bobj, allattrs, store, json, html);
			addaction( json, html );
		});
		return false;
	},
	divreload: function(obj) {
		var allattrs = getattrs(obj);
		var imgs = allattrs["data-loadingimg"];
		loading.show(imgs);
		seched_loader
		ajax.sendreq( ajax.caleparams( allattrs), function(json, html) {
			obj.innerHTML = html;
			loading.hide(imgs);
		});
	}
};

var saver = {
	f1: function(action) {
		if(action === undefined) 
			var eparams = {};
		else
			var eparams = {"action": action};
		return eparams;
	}
};


var breq = function(obj, action){
	return ajax.buttonreq(obj, undefined, saver.f1(action));
}
var freq = function(obj, action) {
	return ajax.formreq(obj, undefined, undefined, saver.f1(action));
}

function rit(val, istrue, elseval) {
	eval(definput({"istrue": true, "elseval": ""}));
	return (istrue ? val:elseval);
}


function f(inpstr, istext) {
	eval(definput({istext: false}));
	return fno(rit("return "+inpstr+" ;", typeof inpstr !== 'undefined', ""), rit("inp, index", typeof inpstr !== 'undefined', ""), istext);
}

function fno(inpstr, args, istext) {
	eval(definput({"args": "", inpstr: "", istext: false}));
	var code = "function("+args+"){"+inpstr+"}";
	if(istext) {
		return code;
	} else {
		eval("var temp = "+code);
		return temp;
	}
}

function inl(elm, lst) {
	return (lst.indexOf(elm) != -1);
}
