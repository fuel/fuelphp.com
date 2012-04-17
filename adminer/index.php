<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 3.3.4
*/error_reporting(6135);$Ub=!ereg('^(unsafe_raw)?$',ini_get("filter.default"));if($Ub||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$_f=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($_f){$$X=$_f;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERAAAAAAETMzEQAAAAATERExAAAAABMRETEAAAAAExERMQAAAAATERExAAAAABMRETEAAAAAEzMzMREREQATERExEhEhABEzMxEhEREAAREREhERIRAAAAARIRESEAAAAAESEiEQAAAAABEREQAAAAAAAAAAD//9UAwP/VAIB/AACAf/AAgH+kAIB/gACAfwAAgH8AAIABAACAAf8AgAH/AMAA/wD+AP8A/wAIAf+B1QD//9UA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:1em 0 0;}form{margin:0;}table{margin:1em 20px 0 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:.8em .5em 0 0;border:1px solid #999;}p{margin:.8em 20px 0 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tbody tr:hover td,tbody tr:hover th{background:#eee;}pre{margin:1em 0 0;}input[type=image]{vertical-align:middle;}.loading{cursor:progress;}.loading #loader{display:inline;}.version{color:#777;font-size:67%;}.js .hidden,.nojs .jsonly{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.error b{background:#fff;font-weight:normal;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:1em 20px 0 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.js .checked td,.js .checked th{background:#ddf;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}.options select{width:20ex;width:auto\\9;}.active{font-weight:bold;}.sqlarea{width:98%;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#loader{display:none;position:fixed;top:2px;right:2px;z-index:1;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;-moz-user-select:none;-webkit-user-select:none;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}.rtl h2{margin:0 -18px 20px 0;}.rtl p,.rtl table,.rtl .error,.rtl .message{margin:1em 0 0 20px;}.rtl #content{margin:2em 21em 0 0;padding:10px 0 20px 20px;}.rtl #breadcrumb{left:auto;right:21em;margin:0 -18px 0 0;}.rtl #lang,.rtl #menu{left:auto;right:0;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}.nowrap td,.nowrap th,td.nowrap{white-space:normal;}}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");?>
function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date;}
function verifyVersion(){cookie('adminer_version=0',1);var script=document.createElement('script');script.src=location.protocol+'//www.adminer.org/version.php';document.body.appendChild(script);}
function selectValue(select){var selected=select.options[select.selectedIndex];return((selected.attributes.value||{}).specified?selected.value:selected.text);}
function trCheck(el){var tr=el.parentNode.parentNode;tr.className=tr.className.replace(/(^|\s)checked(\s|$)/,'$2')+(el.checked?' checked':'');}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;trCheck(elems[i]);}}}
function tableCheck(){var tables=document.getElementsByTagName('table');for(var i=0;i<tables.length;i++){if(/(^|\s)checkable(\s|$)/.test(tables[i].className)){var trs=tables[i].getElementsByTagName('tr');for(var j=0;j<trs.length;j++){trCheck(trs[j].firstChild.firstChild);}}}}
function formUncheck(id){var el=document.getElementById(id);el.checked=false;trCheck(el);}
function formChecked(el,name){var checked=0;var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var click=(!window.getSelection||getSelection().isCollapsed);var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^table$/i.test(el.tagName)){return;}
if(/^(a|input|textarea)$/i.test(el.tagName)){click=false;}
el=el.parentNode;}
el=el.firstChild.firstChild;if(click){el.click&&el.click();el.onclick&&el.onclick();}
trCheck(el);}
function setHtml(id,html){var el=document.getElementById(id);if(el){if(html==undefined){el.parentNode.innerHTML='&nbsp;';}else{el.innerHTML=html;}}}
function nodePosition(el){var pos=0;while(el=el.previousSibling){pos++;}
return pos;}
function pageClick(href,page,event){if(!isNaN(page)&&page){href+=(page!=1?'&page='+(page-1):'');if(!ajaxSend(href)){location.href=href;}}}
function selectAddRow(field){field.onchange=function(){};var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[\d+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[\d+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);}
function ajaxAbort(){ajaxRequest.onreadystatechange=null;if(ajaxRequest.abort){ajaxRequest.abort();}}
function bodyKeydown(event,button){var target=event.target||event.srcElement;if(event.keyCode==27&&!event.shiftKey&&!event.ctrlKey&&!event.altKey&&!event.metaKey){ajaxAbort();document.body.className=document.body.className.replace(/ loading/g,'');onblur=function(){};if(originalFavicon){replaceFavicon(originalFavicon);}}
if(event.ctrlKey&&(event.keyCode==13||event.keyCode==10)&&!event.altKey&&!event.metaKey&&/select|textarea|input/i.test(target.tagName)){target.blur();if(!ajaxForm(target.form,(button?button+'=1':''))){if(button){target.form[button].click();}else{target.form.submit();}}
return false;}
return true;}
function editingKeydown(event){if((event.keyCode==40||event.keyCode==38)&&event.ctrlKey&&!event.altKey&&!event.metaKey){var target=event.target||event.srcElement;var sibling=(event.keyCode==40?'nextSibling':'previousSibling');var el=target.parentNode.parentNode[sibling];if(el&&(/^tr$/i.test(el.tagName)||(el=el[sibling]))&&/^tr$/i.test(el.tagName)&&(el=el.childNodes[nodePosition(target.parentNode)])&&(el=el.childNodes[nodePosition(target)])){el.focus();}
return false;}
if(event.shiftKey&&!bodyKeydown(event,'insert')){eventStop(event);return false;}
return true;}
function functionChange(select){var input=select.form[select.name.replace(/^function/,'fields')];if(selectValue(select)){if(input.origMaxLength===undefined){input.origMaxLength=input.maxLength;}
input.removeAttribute('maxlength');}else if(input.origMaxLength>=0){input.maxLength=input.origMaxLength;}}
function ajax(url,callback,data){var request=(window.XMLHttpRequest?new XMLHttpRequest():(window.ActiveXObject?new ActiveXObject('Microsoft.XMLHTTP'):false));if(request){request.open((data?'POST':'GET'),url);if(data){request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}
request.setRequestHeader('X-Requested-With','XMLHttpRequest');request.onreadystatechange=function(){if(request.readyState==4){callback(request);}};request.send(data);}
return request;}
function ajaxSetHtml(url){return ajax(url,function(request){if(request.status){var data=eval('('+request.responseText+')');for(var key in data){setHtml(key,data[key]);}}});}
var originalFavicon;function replaceFavicon(href){var favicon=document.getElementById('favicon');if(favicon){favicon.href=href;favicon.parentNode.appendChild(favicon);}}
var ajaxRequest={};function ajaxSend(url,data,popState,noscroll){if(!history.pushState){return false;}
ajaxAbort();onblur=function(){if(!originalFavicon){originalFavicon=(document.getElementById('favicon')||{}).href;}
replaceFavicon(document.getElementById('loader').firstChild.src);};document.body.className+=' loading';ajaxRequest=ajax(url,function(request){var title=request.getResponseHeader('X-AJAX-Title');if(title){document.title=decodeURIComponent(title);}
var redirect=request.getResponseHeader('X-AJAX-Redirect');if(redirect){return ajaxSend(redirect,'',popState);}
onblur=function(){};if(originalFavicon){replaceFavicon(originalFavicon);}
if(!popState){if(data||url!=location.href){history.pushState(data,'',url);}}
if(!noscroll&&!/&order/.test(url)){scrollTo(0,0);}
setHtml('content',(request.status?request.responseText:'<p class="error">'+noResponse));document.body.className=document.body.className.replace(/ loading/g,'');var content=document.getElementById('content');var scripts=content.getElementsByTagName('script');var length=scripts.length;for(var i=0;i<length;i++){var script=document.createElement('script');script.text=scripts[i].text;content.appendChild(script);}
var as=document.getElementById('menu').getElementsByTagName('a');var href=location.href.replace(/(&(sql=|dump=|(select|table)=[^&]*)).*/,'$1');for(var i=0;i<as.length;i++){as[i].className=(href==as[i].href?'active':'');}
var dump=document.getElementById('dump');if(dump){var match=/&(select|table)=([^&]+)/.exec(href);dump.href=dump.href.replace(/[^=]+$/,'')+(match?match[2]:'');}
if(window.jush){jush.highlight_tag('code',0);}},data);return ajaxRequest;}
onpopstate=function(event){if((ajaxRequest.send||event.state)&&!/#/.test(location.href)){ajaxSend(location.href,(event.state&&confirm(areYouSure)?event.state:''),1);}else{ajaxRequest.send=true;}};function ajaxForm(form,data,noscroll){if((/&(database|scheme|create|view|sql|user|dump|call)=/.test(location.href)&&!/\./.test(data))||(form.onsubmit&&form.onsubmit()===false)){return false;}
var params=[];for(var i=0;i<form.elements.length;i++){var el=form.elements[i];if(/file/i.test(el.type)&&el.value){return false;}else if(el.name&&(!/checkbox|radio|submit|file/i.test(el.type)||el.checked)){params.push(encodeURIComponent(el.name)+'='+encodeURIComponent(/select/i.test(el.tagName)?selectValue(el):el.value));}}
if(data){params.push(data);}
if(form.method=='post'){return ajaxSend((/\?/.test(form.action)?form.action:location.href),params.join('&'),false,noscroll);}
return ajaxSend((form.action||location.href).replace(/\?.*/,'')+'?'+params.join('&'),'',false,noscroll);}
function selectDblClick(td,event,text){if(/input|textarea/i.test(td.firstChild.tagName)){return;}
var original=td.innerHTML;var input=document.createElement(text?'textarea':'input');input.onkeydown=function(event){if(!event){event=window.event;}
if(event.keyCode==27&&!(event.ctrlKey||event.shiftKey||event.altKey||event.metaKey)){td.innerHTML=original;}};var pos=event.rangeOffset;var value=td.firstChild.alt||td.textContent||td.innerText;input.style.width=Math.max(td.clientWidth-14,20)+'px';if(text){var rows=1;value.replace(/\n/g,function(){rows++;});input.rows=rows;}
if(value=='\u00A0'||td.getElementsByTagName('i').length){value='';}
if(document.selection){var range=document.selection.createRange();range.moveToPoint(event.clientX,event.clientY);var range2=range.duplicate();range2.moveToElementText(td);range2.setEndPoint('EndToEnd',range);pos=range2.text.length;}
td.innerHTML='';td.appendChild(input);input.focus();if(text==2){return ajax(location.href+'&'+encodeURIComponent(td.id)+'=',function(request){if(request.status){input.value=request.responseText;input.name=td.id;}});}
input.value=value;input.name=td.id;input.selectionStart=pos;input.selectionEnd=pos;if(document.selection){var range=document.selection.createRange();range.moveEnd('character',-input.value.length+pos);range.select();}}
function bodyClick(event,db,ns){if(event.button||event.shiftKey||event.altKey||event.metaKey){return;}
if(event.getPreventDefault?event.getPreventDefault():event.returnValue===false||event.defaultPrevented){return false;}
var el=event.target||event.srcElement;if(/^a$/i.test(el.parentNode.tagName)){el=el.parentNode;}
if(/^a$/i.test(el.tagName)&&!/:|#|&download=/i.test(el.getAttribute('href'))&&/[&?]username=/.test(el.href)&&!event.ctrlKey){var match=/&db=([^&]*)/.exec(el.href);var match2=/&ns=([^&]*)/.exec(el.href);return!(db==(match?decodeURIComponent(match[1]):'')&&ns==(match2?decodeURIComponent(match2[1]):'')&&ajaxSend(el.href));}
if(/^input$/i.test(el.tagName)&&/image|submit/.test(el.type)){if(event.ctrlKey){el.form.target='_blank';}else{return!ajaxForm(el.form,(el.name?encodeURIComponent(el.name)+(el.type=='image'?'.x':'')+'=1':''),el.type=='image');}}
return true;}
function eventStop(event){if(event.stopPropagation){event.stopPropagation();}else{event.cancelBubble=true;}}
var jushRoot=location.protocol + '//www.adminer.org/static/';function bodyLoad(version){if(history.state!==undefined){onpopstate(history);}
if(jushRoot){var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank" rel="noreferrer"';jush.urls.sql_sqlset=jush.urls.sql[0]=jush.urls.sqlset[0]=jush.urls.sqlstatus[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';var pgsql='http://www.postgresql.org/docs/'+version+'/static/';jush.urls.pgsql_pgsqlset=jush.urls.pgsql[0]=pgsql+'$key';jush.urls.pgsqlset[0]=pgsql+'runtime-config-$key.html#GUC-$1';jush.style(jushRoot+'jush.css');if(window.jushLinks){jush.custom_links=jushLinks;}
jush.highlight_tag('code',0);}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
function loginDriver(driver){var trs=driver.parentNode.parentNode.parentNode.rows;for(var i=1;i<trs.length;i++){trs[i].className=(/sqlite/.test(driver.value)?'hidden':'');}}
function textareaKeydown(target,event){if(!event.shiftKey&&!event.altKey&&!event.ctrlKey&&!event.metaKey){if(event.keyCode==9){if(target.setSelectionRange){var start=target.selectionStart;var scrolled=target.scrollTop;target.value=target.value.substr(0,start)+'\t'+target.value.substr(target.selectionEnd);target.setSelectionRange(start+1,start+1);target.scrollTop=scrolled;return false;}else if(target.createTextRange){document.selection.createRange().text='\t';return false;}}
if(event.keyCode==27){var els=target.form.elements;for(var i=1;i<els.length;i++){if(els[i-1]==target){els[i].focus();break;}}
return false;}}
return true;}
var added='.',rowCount;function delimiterEqual(val,a,b){return(val==a+'_'+b||val==a+b||val==a+b.charAt(0).toUpperCase()+b.substr(1));}
function idfEscape(s){return s.replace(/`/,'``');}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var candidate;var val=field.value;for(var i=opts.length;i--;){var match=/(.+)`(.+)/.exec(opts[i].value);if(!match){if(candidate&&i==opts.length-2&&val==opts[candidate].value.replace(/.+`/,'')&&name=='fields[1]'){return;}
break;}
var table=match[1];var column=match[2];var tables=[table,table.replace(/s$/,''),table.replace(/es$/,'')];for(var j=0;j<tables.length;j++){table=tables[j];if(val==column||val==table||delimiterEqual(val,table,column)||delimiterEqual(val,column,table)){if(candidate){return;}
candidate=i;break;}}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/(\d+)(\.\d+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}
if(el.name==name+'[on_delete]'){el.className=(/`/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){field.onchange=function(){};var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);}
function indexesAddRow(field){field.onchange=function(){};var parent=field.parentNode.parentNode;var row=parent.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[\d+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');for(var i=0;i<inputs.length;i++){inputs[i].name=inputs[i].name.replace(/indexes\[\d+/,'$&1');inputs[i].value='';}
parent.parentNode.appendChild(row);}
function indexesChangeColumn(field,prefix){var columns=field.parentNode.parentNode.getElementsByTagName('select');var names=[];for(var i=0;i<columns.length;i++){var value=selectValue(columns[i]);if(value){names.push(value);}}
field.form[field.name.replace(/\].*/,'][name]')].value=prefix+names.join('_');}
function indexesAddColumn(field,prefix){field.onchange=function(){indexesChangeColumn(field,prefix);};var select=field.form[field.name.replace(/\].*/,'][type]')];if(!select.selectedIndex){select.selectedIndex=3;select.onchange();}
var column=field.parentNode.cloneNode(true);select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[\d+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[\d+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange();}
var that,x,y;function schemaMousedown(el,event){if((event.which?event.which:event.button)==1){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((/^refs/.test(divs[i].id)?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-.+$/,'refl$1'));var top1=top+divs[i].offsetTop/em;var top2=top+div2.offsetTop/em;if(divs[i].parentNode!=div2.parentNode){top2+=ref[0]-top;line.getElementsByTagName('div')[0].style.height=Math.abs(top1-top2)+'em';}
line.style.left=(left+left1)+'em';line.style.top=Math.min(top1,top2)+'em';lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev,db){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
s=encodeURIComponent(s.substr(1));var link=document.getElementById('schema-link');link.href=link.href.replace(/[^=]+$/,'')+s;cookie('adminer_schema-'+db+'='+s,30);}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;case"loader.gif":echo
base64_decode("R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==");break;}}exit;}function
connection(){global$e;return$e;}function
adminer(){global$b;return$b;}function
idf_unescape($oc){$Dc=substr($oc,-1);return
str_replace($Dc.$Dc,$Dc,substr($oc,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
remove_slashes($be,$Ub=false){if(get_magic_quotes_gpc()){while(list($x,$X)=each($be)){foreach($X
as$_c=>$W){unset($be[$x][$_c]);if(is_array($W)){$be[$x][stripslashes($_c)]=$W;$be[]=&$be[$x][stripslashes($_c)];}else{$be[$x][stripslashes($_c)]=($Ub?$W:stripslashes($W));}}}}}function
bracket_escape($oc,$wa=false){static$nf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($oc,($wa?array_flip($nf):$nf));}function
h($P){return
htmlspecialchars(str_replace("\0","",$P),ENT_QUOTES);}function
nbsp($P){return(trim($P)!=""?h($P):"&nbsp;");}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($C,$Y,$Fa,$Bc="",$rd="",$zc=false){static$s=0;$s++;$I="<input type='checkbox' name='$C' value='".h($Y)."'".($Fa?" checked":"").($rd?' onclick="'.h($rd).'"':'').($zc?" class='jsonly'":"")." id='checkbox-$s'>";return($Bc!=""?"<label for='checkbox-$s'>$I".h($Bc)."</label>":$I);}function
optionlist($ud,$ze=null,$Ef=false){$I="";foreach($ud
as$_c=>$W){$vd=array($_c=>$W);if(is_array($W)){$I.='<optgroup label="'.h($_c).'">';$vd=$W;}foreach($vd
as$x=>$X){$I.='<option'.($Ef||is_string($x)?' value="'.h($x).'"':'').(($Ef||is_string($x)?(string)$x:$X)===$ze?' selected':'').'>'.h($X);}if(is_array($W)){$I.='</optgroup>';}}return$I;}function
html_select($C,$ud,$Y="",$qd=true){if($qd){return"<select name='".h($C)."'".(is_string($qd)?' onchange="'.h($qd).'"':"").">".optionlist($ud,$Y)."</select>";}$I="";foreach($ud
as$x=>$X){$I.="<label><input type='radio' name='".h($C)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";}return$I;}function
confirm($Xa="",$Ke=false){return" onclick=\"".($Ke?"eventStop(event); ":"")."return confirm('".'Are you sure?'.($Xa?" (' + $Xa + ')":"")."');\"";}function
print_fieldset($s,$Ic,$Jf=false,$rd=""){echo"<fieldset><legend><a href='#fieldset-$s' onclick=\"".h($rd)."return !toggle('fieldset-$s');\">$Ic</a></legend><div id='fieldset-$s'".($Jf?"":" class='hidden'").">\n";}function
bold($Aa){return($Aa?" class='active'":"");}function
odd($I=' class="odd"'){static$r=0;if(!$I){$r=-1;}return($r++%
2?$I:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($x,$X=null){static$Vb=true;if($Vb){echo"{";}if($x!=""){echo($Vb?"":",")."\n\t\"".addcslashes($x,"\r\n\"\\").'": '.(isset($X)?'"'.addcslashes($X,"\r\n\"\\").'"':'undefined');$Vb=false;}else{echo"\n}\n";$Vb=true;}}function
ini_bool($sc){$X=ini_get($sc);return(eregi('^(on|true|yes)$',$X)||(int)$X);}function
sid(){static$I;if(!isset($I)){$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));}return$I;}function
q($P){global$e;return$e->quote($P);}function
get_vals($G,$Ma=0){global$e;$I=array();$H=$e->query($G);if(is_object($H)){while($J=$H->fetch_row()){$I[]=$J[$Ma];}}return$I;}function
get_key_vals($G,$f=null){global$e;if(!is_object($f)){$f=$e;}$I=array();$H=$f->query($G);if(is_object($H)){while($J=$H->fetch_row()){$I[$J[0]]=$J[1];}}return$I;}function
get_rows($G,$f=null,$i="<p class='error'>"){global$e;$Ta=(is_object($f)?$f:$e);$I=array();$H=$Ta->query($G);if(is_object($H)){while($J=$H->fetch_assoc()){$I[]=$J;}}elseif(!$H&&!is_object($f)&&$i&&defined("PAGE_HEADER")){echo$i.error()."\n";}return$I;}function
unique_array($J,$u){foreach($u
as$t){if(ereg("PRIMARY|UNIQUE",$t["type"])){$I=array();foreach($t["columns"]as$x){if(!isset($J[$x])){continue
2;}$I[$x]=$J[$x];}return$I;}}$I=array();foreach($J
as$x=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$x)){$I[$x]=$X;}}return$I;}function
where($Z){global$w;$I=array();foreach((array)$Z["where"]as$x=>$X){$I[]=idf_escape(bracket_escape($x,1)).(($w=="sql"&&ereg('\\.',$X))||$w=="mssql"?" LIKE ".exact_value(addcslashes($X,"%_\\")):" = ".exact_value($X));}foreach((array)$Z["null"]as$x){$I[]=idf_escape($x)." IS NULL";}return
implode(" AND ",$I);}function
where_check($X){parse_str($X,$Ea);remove_slashes(array(&$Ea));return
where($Ea);}function
where_link($r,$Ma,$Y,$sd="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($Ma)."&where%5B$r%5D%5Bop%5D=".urlencode((isset($Y)?$sd:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
cookie($C,$Y){global$ba;$Gd=array($C,(ereg("\n",$Y)?"":$Y),time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0){$Gd[]=true;}return
call_user_func_array('setcookie',$Gd);}function
restart_session(){if(!ini_bool("session.use_cookies")){session_start();}}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($ob,$N,$V){global$pb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($pb))."|username|".session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($ob!="server"||$N!=""?urlencode($ob)."=".urlencode($N)."&":"")."username=".urlencode($V).($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($_,$Vc=null){if(isset($Vc)){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',(isset($_)?$_:$_SERVER["REQUEST_URI"]))][]=$Vc;}if(isset($_)){if($_==""){$_=".";}header((is_ajax()?"X-AJAX-Redirect":"Location").": $_");exit;}}function
query_redirect($G,$_,$Vc,$ge=true,$Kb=true,$Qb=false){global$e,$i,$b;if($Kb){$Qb=!$e->query($G);}$Ge="";if($G){$Ge=$b->messageQuery("$G;");}if($Qb){$i=error().$Ge;return
false;}if($ge){redirect($_,$Vc.$Ge);}return
true;}function
queries($G=null){global$e;static$ee=array();if(!isset($G)){return
implode(";\n",$ee);}$ee[]=(ereg(';$',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G);return$e->query($G);}function
apply_queries($G,$Ye,$Gb='table'){foreach($Ye
as$R){if(!queries("$G ".$Gb($R))){return
false;}}return
true;}function
queries_redirect($_,$Vc,$ge){return
query_redirect(queries(),$_,$Vc,$ge,false,!$ge);}function
remove_from_uri($Fd=""){return
substr(preg_replace("~(?<=[?&])($Fd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($D,$cb){return" ".($D==$cb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D":"")).'">'.($D+1)."</a>");}function
get_file($x,$hb=false){$Sb=$_FILES[$x];if(!$Sb||$Sb["error"]){return$Sb["error"];}$I=file_get_contents($hb&&ereg('\\.gz$',$Sb["name"])?"compress.zlib://$Sb[tmp_name]":($hb&&ereg('\\.bz2$',$Sb["name"])?"compress.bzip2://$Sb[tmp_name]":$Sb["tmp_name"]));if($hb){$He=substr($I,0,3);if(function_exists("iconv")&&ereg("^\xFE\xFF|^\xFF\xFE",$He,$me)){$I=iconv("utf-16","utf-8",$I);}elseif($He=="\xEF\xBB\xBF"){$I=substr($I,3);}}return$I;}function
upload_error($i){$Tc=($i==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($i?'Unable to upload a file.'.($Tc?" ".sprintf('Maximum allowed file size is %sB.',$Tc):""):'File does not exist.');}function
repeat_pattern($E,$Jc){return
str_repeat("$E{0,65535}",$Jc/65535)."$E{0,".($Jc
%
65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($P,$Jc=80,$Oe=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$Jc).")($)?)u",$P,$A)){preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Jc).")($)?)",$P,$A);}return
h($A[1]).$Oe.(isset($A[2])?"":"<i>...</i>");}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($be,$pc=array()){while(list($x,$X)=each($be)){if(is_array($X)){foreach($X
as$_c=>$W){$be[$x."[$_c]"]=$W;}}elseif(!in_array($x,$pc)){echo'<input type="hidden" name="'.h($x).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$l){foreach($l["source"]as$X){$I[$X][]=$l;}}return$I;}function
enum_input($U,$ta,$j,$Y,$_b=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$j["length"],$Oc);$I=(isset($_b)?"<label><input type='$U'$ta value='$_b'".((is_array($Y)?in_array($_b,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Oc[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Fa=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$I.=" <label><input type='$U'$ta value='".($r+1)."'".($Fa?' checked':'').'>'.h($b->editVal($X,$j)).'</label>';}return$I;}function
input($j,$Y,$n){global$vf,$b,$w;$C=h(bracket_escape($j["field"]));echo"<td class='function'>";$oe=($w=="mssql"&&$j["auto_increment"]);if($oe&&!$_POST["save"]){$n=null;}$o=(isset($_GET["select"])||$oe?array("orig"=>'original'):array())+$b->editFunctions($j);$ta=" name='fields[$C]'";if($j["type"]=="enum"){echo
nbsp($o[""])."<td>".$b->editInput($_GET["edit"],$j,$ta,$Y);}else{$Vb=0;foreach($o
as$x=>$X){if($x===""||!$X){break;}$Vb++;}$qd=($Vb?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($j["field"])))."]']; if ($Vb > f.selectedIndex) f.selectedIndex = $Vb;\"":"");$ta.=$qd;echo(count($o)>1?html_select("function[$C]",$o,!isset($n)||in_array($n,$o)||isset($o[$n])?$n:"","functionChange(this);"):nbsp(reset($o))).'<td>';$uc=$b->editInput($_GET["edit"],$j,$ta,$Y);if($uc!=""){echo$uc;}elseif($j["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$j["length"],$Oc);foreach($Oc[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Fa=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$r]' value='".(1<<$r)."'".($Fa?' checked':'')."$qd>".h($b->editVal($X,$j)).'</label>';}}elseif(ereg('blob|bytea|raw|file',$j["type"])&&ini_bool("file_uploads")){echo"<input type='file' name='fields-$C'$qd>";}elseif(ereg('text|lob',$j["type"])){echo"<textarea ".($w!="sqlite"||ereg("\n",$Y)?"cols='50' rows='12'":"cols='30' rows='1' style='height: 1.2em;'")."$ta>".h($Y).'</textarea>';}else{$Uc=(!ereg('int',$j["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$j["length"],$A)?((ereg("binary",$j["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$j["unsigned"]?1:0)):($vf[$j["type"]]?$vf[$j["type"]]+($j["unsigned"]?0:1):0));echo"<input value='".h($Y)."'".($Uc?" maxlength='$Uc'":"").(ereg('char|binary',$j["type"])&&$Uc>20?" size='40'":"")."$ta>";}}}function
process_input($j){global$b;$oc=bracket_escape($j["field"]);$n=$_POST["function"][$oc];$Y=$_POST["fields"][$oc];if($j["type"]=="enum"){if($Y==-1){return
false;}if($Y==""){return"NULL";}return+$Y;}if($j["auto_increment"]&&$Y==""){return
null;}if($n=="orig"){return($j["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($j["field"]):false);}if($n=="NULL"){return"NULL";}if($j["type"]=="set"){return
array_sum((array)$Y);}if(ereg('blob|bytea|raw|file',$j["type"])&&ini_bool("file_uploads")){$Sb=get_file("fields-$oc");if(!is_string($Sb)){return
false;}return
q($Sb);}return$b->processInput($j,$Y,$n);}function
search_tables(){global$b,$e;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$ac=false;foreach(table_status()as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$e->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if($H->fetch_row()){if(!$ac){echo"<ul>\n";$ac=true;}echo"<li><a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n";}}}echo($ac?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_headers($nc,$cd=false){global$b;$I=$b->dumpHeaders($nc,$cd);$Dd=$_POST["output"];if($Dd!="text"){header("Content-Disposition: attachment; filename=".friendly_url($nc!=""?$nc:(SERVER!=""?SERVER:"localhost")).".$I".($Dd!="file"&&!ereg('[^0-9a-z]',$Dd)?".$Dd":""));}session_write_close();return$I;}function
dump_csv($J){foreach($J
as$x=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X===""){$J[$x]='"'.str_replace('"','""',$X).'"';}}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($n,$Ma){return($n?($n=="unixepoch"?"DATETIME($Ma, '$n')":($n=="count distinct"?"COUNT(DISTINCT ":strtoupper("$n("))."$Ma)"):$Ma);}function
password_file(){$lb=ini_get("upload_tmp_dir");if(!$lb){if(function_exists('sys_get_temp_dir')){$lb=sys_get_temp_dir();}else{$Tb=@tempnam("","");if(!$Tb){return
false;}$lb=dirname($Tb);unlink($Tb);}}$Tb="$lb/adminer.key";$I=@file_get_contents($Tb);if($I){return$I;}$cc=@fopen($Tb,"w");if($cc){$I=md5(uniqid(mt_rand(),true));fwrite($cc,$I);fclose($cc);}return$I;}function
is_mail($xb){$sa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$nb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$E="$sa+(\\.$sa+)*@($nb?\\.)+$nb";return
preg_match("(^$E(,\\s*$E)*\$)i",$xb);}function
is_url($P){$nb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($nb?\\.)+$nb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P,$A)?strtolower($A[1]):"");}global$b,$e,$pb,$vb,$Db,$i,$o,$hc,$ba,$tc,$w,$ca,$Cc,$pd,$Me,$T,$pf,$vf,$Bf,$ga;if(!$_SERVER["REQUEST_URI"]){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];}if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!=""){$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";}$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_name("adminer_sid");$Gd=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0){$Gd[]=true;}call_user_func_array('session_set_cookie_params',$Gd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Ub);if(function_exists("set_magic_quotes_runtime")){set_magic_quotes_runtime(false);}@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'en';}function
lang($of,$id){$Qd=($id==1?0:1);return
sprintf($of[$Qd],$id);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){global$b;$Qd=array_search("",$b->operators);if($Qd!==false){unset($b->operators[$Qd]);}}function
dsn($sb,$V,$Nd,$Jb='auth_error'){set_exception_handler($Jb);parent::__construct($sb,$V,$Nd);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($G,$wf=false){$H=parent::query($G);if(!$H){$Eb=$this->errorInfo();$this->error=$Eb[2];return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){return$this->_result->nextRowset();}function
result($G,$j=0){$H=$this->query($G);if(!$H){return
false;}$J=$H->fetch();return$J[$j];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",$J->flags)?63:0);return$J;}}}$pb=array();$pb=array("server"=>"MySQL")+$pb;if(!defined("DRIVER")){$Td=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($N,$V,$Nd){mysqli_report(MYSQLI_REPORT_OFF);list($lc,$Pd)=explode(":",$N,2);$I=@$this->real_connect(($N!=""?$lc:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$Nd!=""?$Nd:ini_get("mysqli.default_pw")),null,(is_numeric($Pd)?$Pd:ini_get("mysqli.default_port")),(!is_numeric($Pd)?$Pd:null));if($I){if(method_exists($this,'set_charset')){$this->set_charset("utf8");}else{$this->query("SET NAMES utf8");}}return$I;}function
result($G,$j=0){$H=$this->query($G);if(!$H){return
false;}$J=$H->fetch_array();return$J[$j];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$error,$_link,$_result;function
connect($N,$V,$Nd){$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$Nd"!=""?$Nd:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset')){mysql_set_charset("utf8",$this->_link);}else{$this->query("SET NAMES utf8");}}else{$this->error=mysql_error();}return(bool)$this->_link;}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($fb){return
mysql_select_db($fb,$this->_link);}function
query($G,$wf=false){$H=@($wf?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));if(!$H){$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$j=0){$H=$this->query($G);if(!$H||!$H->num_rows){return
false;}return
mysql_result($H->_result,0,$j);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$Nd){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$Nd);$this->query("SET NAMES utf8");return
true;}function
select_db($fb){return$this->query("USE ".idf_escape($fb));}function
query($G,$wf=false){$this->setAttribute(1000,!$wf);return
parent::query($G,$wf);}}}function
idf_escape($oc){return"`".str_replace("`","``",$oc)."`";}function
table($oc){return
idf_escape($oc);}function
connect(){global$b;$e=new
Min_DB;$bb=$b->credentials();if($e->connect($bb[0],$bb[1],$bb[2])){$e->query("SET sql_quote_show_create = 1, autocommit = 1");return$e;}$I=$e->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($L=iconv("windows-1250","utf-8",$I))>strlen($I)){$I=$L;}return$I;}function
get_databases($Wb=true){global$e;$I=&get_session("dbs");if(!isset($I)){if($Wb){restart_session();ob_flush();flush();}$I=get_vals($e->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");}return$I;}function
limit($G,$Z,$y,$kd=0,$Ae=" "){return" $G$Z".(isset($y)?$Ae."LIMIT $y".($kd?" OFFSET $kd":""):"");}function
limit1($G,$Z){return
limit($G,$Z,1);}function
db_collation($h,$c){global$e;$I=null;$Ya=$e->result("SHOW CREATE DATABASE ".idf_escape($h),1);if(preg_match('~ COLLATE ([^ ]+)~',$Ya,$A)){$I=$A[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Ya,$A)){$I=$c[$A[1]][-1];}return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(ereg("YES|DEFAULT",$J["Support"])){$I[]=$J["Engine"];}}return$I;}function
logged_user(){global$e;return$e->result("SELECT USER()");}function
tables_list(){global$e;return
get_key_vals("SHOW".($e->server_info>=5?" FULL":"")." TABLES");}function
count_tables($g){$I=array();foreach($g
as$h){$I[$h]=count(get_vals("SHOW TABLES IN ".idf_escape($h)));}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_")):""))as$J){if($J["Engine"]=="InnoDB"){$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$J["Comment"]);}if(!isset($J["Rows"])){$J["Comment"]="";}if($C!=""){return$J;}$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return!isset($S["Rows"]);}function
fk_support($S){return
eregi("InnoDB|IBMDB2I",$S["Engine"]);}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$J["Type"],$A);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($J["Default"]!=""||ereg("char",$A[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$J["Extra"],$A)?$A[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(explode(",",$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($R,$f=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$f)as$J){$I[$J["Key_name"]]["type"]=($J["Key_name"]=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?"INDEX":"UNIQUE")));$I[$J["Key_name"]]["columns"][]=$J["Column_name"];$I[$J["Key_name"]]["lengths"][]=$J["Sub_part"];}return$I;}function
foreign_keys($R){global$e,$pd;static$E='`(?:[^`]|``)+`';$I=array();$Za=$e->result("SHOW CREATE TABLE ".table($R),1);if($Za){preg_match_all("~CONSTRAINT ($E) FOREIGN KEY \\(((?:$E,? ?)+)\\) REFERENCES ($E)(?:\\.($E))? \\(((?:$E,? ?)+)\\)(?: ON DELETE ($pd))?(?: ON UPDATE ($pd))?~",$Za,$Oc,PREG_SET_ORDER);foreach($Oc
as$A){preg_match_all("~$E~",$A[2],$Ee);preg_match_all("~$E~",$A[5],$bf);$I[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Ee[0]),"target"=>array_map('idf_unescape',$bf[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$I;}function
view($C){global$e;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$e->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"]){$I[$J["Charset"]][-1]=$J["Collation"];}else{$I[$J["Charset"]][]=$J["Collation"];}}ksort($I);foreach($I
as$x=>$X){asort($I[$x]);}return$I;}function
information_schema($h){global$e;return($e->server_info>=5&&$h=="information_schema");}function
error(){global$e;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$e->error));}function
exact_value($X){return
q($X)." COLLATE utf8_bin";}function
create_database($h,$Ka){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($h).($Ka?" COLLATE ".q($Ka):""));}function
drop_databases($g){set_session("dbs",null);return
apply_queries("DROP DATABASE",$g,'idf_escape');}function
rename_database($C,$Ka){if(create_database($C,$Ka)){$ne=array();foreach(tables_list()as$R=>$U){$ne[]=table($R)." TO ".idf_escape($C).".".table($R);}if(!$ne||queries("RENAME TABLE ".implode(", ",$ne))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$va=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$t){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$t["columns"],true)){$va="";break;}if($t["type"]=="PRIMARY"){$va=" UNIQUE";}}}return" AUTO_INCREMENT$va";}function
alter_table($R,$C,$k,$Xb,$Pa,$Bb,$Ka,$ua,$Kd){$ra=array();foreach($k
as$j){$ra[]=($j[1]?($R!=""?($j[0]!=""?"CHANGE ".idf_escape($j[0]):"ADD"):" ")." ".implode($j[1]).($R!=""?" $j[2]":""):"DROP ".idf_escape($j[0]));}$ra=array_merge($ra,$Xb);$Ie="COMMENT=".q($Pa).($Bb?" ENGINE=".q($Bb):"").($Ka?" COLLATE ".q($Ka):"").($ua!=""?" AUTO_INCREMENT=$ua":"").$Kd;if($R==""){return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$ra)."\n) $Ie");}if($R!=$C){$ra[]="RENAME TO ".table($C);}$ra[]=$Ie;return
queries("ALTER TABLE ".table($R)."\n".implode(",\n",$ra));}function
alter_indexes($R,$ra){foreach($ra
as$x=>$X){$ra[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"").$X[2]);}return
queries("ALTER TABLE ".table($R).implode(",",$ra));}function
truncate_tables($Ye){return
apply_queries("TRUNCATE TABLE",$Ye);}function
drop_views($If){return
queries("DROP VIEW ".implode(", ",array_map('table',$If)));}function
drop_tables($Ye){return
queries("DROP TABLE ".implode(", ",array_map('table',$Ye)));}function
move_tables($Ye,$If,$bf){$ne=array();foreach(array_merge($Ye,$If)as$R){$ne[]=table($R)." TO ".idf_escape($bf).".".table($R);}return
queries("RENAME TABLE ".implode(", ",$ne));}function
copy_tables($Ye,$If,$bf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($Ye
as$R){$C=($bf==DB?table("copy_$R"):idf_escape($bf).".".table($R));if(!queries("DROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R))){return
false;}}foreach($If
as$R){$C=($bf==DB?table("copy_$R"):idf_escape($bf).".".table($R));$Hf=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Hf[select]")){return
false;}}return
true;}function
trigger($C){if($C==""){return
array();}$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_")))as$J){$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$e,$Db,$tc,$vf;$pa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$uf="((".implode("|",array_merge(array_keys($vf),$pa)).")(?:\\s*\\(((?:[^'\")]*|$Db)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$E="\\s*(".($U=="FUNCTION"?"":$tc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$uf";$Ya=$e->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$E\\s*,?)*)\\)".($U=="FUNCTION"?"\\s*RETURNS\\s+$uf":"")."\\s*(.*)~is",$Ya,$A);$k=array();preg_match_all("~$E\\s*,?~is",$A[1],$Oc,PREG_SET_ORDER);foreach($Oc
as$Fd){$C=str_replace("``","`",$Fd[2]).$Fd[3];$k[]=array("field"=>$C,"type"=>strtolower($Fd[5]),"length"=>preg_replace_callback("~$Db~s",'normalize_enum',$Fd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Fd[8] $Fd[7]"))),"full_type"=>$Fd[4],"inout"=>strtoupper($Fd[1]),"collation"=>strtolower($Fd[9]),);}if($U!="FUNCTION"){return
array("fields"=>$k,"definition"=>$A[11]);}return
array("fields"=>$k,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
begin(){return
queries("BEGIN");}function
insert_into($R,$O){return
queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")");}function
insert_update($R,$O,$Wd){foreach($O
as$x=>$X){$O[$x]="$x = $X";}$Cf=implode(", ",$O);return
queries("INSERT INTO ".table($R)." SET $Cf ON DUPLICATE KEY UPDATE $Cf");}function
last_id(){global$e;return$e->result("SELECT LAST_INSERT_ID()");}function
explain($e,$G){return$e->query("EXPLAIN $G");}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xe){return
true;}function
create_sql($R,$ua){global$e;$I=$e->result("SHOW CREATE TABLE ".table($R),1);if(!$ua){$I=preg_replace('~ AUTO_INCREMENT=\\d+~','',$I);}return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($fb){return"USE ".idf_escape($fb);}function
trigger_sql($R,$Q){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_")),null,"-- ")as$J){$I.="\n".($Q=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($J["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";}return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
support($Rb){global$e;return!ereg("scheme|sequence|type".($e->server_info<5.1?"|event|partitioning".($e->server_info<5?"|view|routine|trigger":""):""),$Rb);}$w="sql";$vf=array();$Me=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),)as$x=>$X){$vf+=$X;$Me[$x]=array_keys($X);}$Bf=array("unsigned","zerofill","unsigned zerofill");$td=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");$o=array("char_length","date","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","upper");$hc=array("avg","count","count distinct","group_concat","max","min","sum");$vb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1/hex","date|time"=>"now",),array("int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ga="3.3.4";class
Adminer{var$operators;function
name(){return"<a href='http://www.adminer.org/' id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_session("pwds"));}function
permanentLogin(){return
password_file();}function
database(){return
DB;}function
databases($Wb=true){return
get_databases($Wb);}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){global$pb;echo'<table cellspacing="0">
<tr><th>System<td>',html_select("driver",$pb,DRIVER,"loginDriver(this);"),'<tr><th>Server<td><input name="server" value="',h(SERVER),'" title="hostname[:port]">
<tr><th>Username<td><input id="username" name="username" value="',h($_GET["username"]);?>">
<tr><th>Password<td><input type="password" name="password">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
username.focus();
username.form['driver'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".'Login'."'>\n",checkbox("permanent",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($Mc,$Nd){return
true;}function
tableName($Te){return
h($Te["Name"]);}function
fieldName($j,$wd=0){return'<span title="'.h($j["full_type"]).'">'.h($j["field"]).'</span>';}function
selectLinks($Te,$O=""){echo'<p class="tabs">';$Lc=array("select"=>'Select data',"table"=>'Show structure');if(is_view($Te)){$Lc["view"]='Alter view';}else{$Lc["create"]='Alter table';}if(isset($O)){$Lc["edit"]='New item';}foreach($Lc
as$x=>$X){echo" <a href='".h(ME)."$x=".urlencode($Te["Name"]).($x=="edit"?$O:"")."'".bold(isset($_GET[$x])).">$X</a>";}echo"\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Se){return
array();}function
backwardKeysPrint($xa,$J){}function
selectQuery($G){global$w;return"<p><a href='".h(remove_from_uri("page"))."&amp;page=last' title='".'Last page'."'>&gt;&gt;</a> <code class='jush-$w'>".h(str_replace("\n"," ",$G))."</code> <a href='".h(ME)."sql=".urlencode($G)."'>".'Edit'."</a></p>\n";}function
rowDescription($R){return"";}function
rowDescriptions($K,$Yb){return$K;}function
selectVal($X,$z,$j){$I=($X!="<i>NULL</i>"&&ereg("char|binary",$j["type"])&&!ereg("var",$j["type"])?"<code>$X</code>":$X);if(ereg('blob|bytea|raw|file',$j["type"])&&!is_utf8($X)){$I=lang(array('%d byte','%d bytes'),strlen(html_entity_decode($X,ENT_QUOTES)));}return($z?"<a href='$z'>$I</a>":$I);}function
editVal($X,$j){return(ereg("binary",$j["type"])?reset(unpack("H*",$X)):$X);}function
selectColumnsPrint($M,$d){global$o,$hc;print_fieldset("select",'Select',$M);$r=0;$ec=array('Functions'=>$o,'Aggregation'=>$hc);foreach($M
as$x=>$X){$X=$_GET["columns"][$x];echo"<div>".html_select("columns[$r][fun]",array(-1=>"")+$ec,$X["fun"]),"(<select name='columns[$r][col]'><option>".optionlist($d,$X["col"],true)."</select>)</div>\n";$r++;}echo"<div>".html_select("columns[$r][fun]",array(-1=>"")+$ec,"","this.nextSibling.nextSibling.onchange();"),"(<select name='columns[$r][col]' onchange='selectAddRow(this);'><option>".optionlist($d,null,true)."</select>)</div>\n","</div></fieldset>\n";}function
selectSearchPrint($Z,$d,$u){print_fieldset("search",'Search',$Z);foreach($u
as$r=>$t){if($t["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$t["columns"]))."</i>) AGAINST"," <input name='fulltext[$r]' value='".h($_GET["fulltext"][$r])."'>",checkbox("boolean[$r]",1,isset($_GET["boolean"][$r]),"BOOL"),"<br>\n";}}$r=0;foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($d,$X["col"],true)."</select>",html_select("where[$r][op]",$this->operators,$X["op"]),"<input name='where[$r][val]' value='".h($X["val"])."'></div>\n";$r++;}}echo"<div><select name='where[$r][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".'anywhere'.")".optionlist($d,null,true)."</select>",html_select("where[$r][op]",$this->operators,"="),"<input name='where[$r][val]' onchange='selectAddRow(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($wd,$d,$u){print_fieldset("sort",'Sort',$wd);$r=0;foreach((array)$_GET["order"]as$x=>$X){if(isset($d[$X])){echo"<div><select name='order[$r]'><option>".optionlist($d,$X,true)."</select>",checkbox("desc[$r]",1,isset($_GET["desc"][$x]),'descending')."</div>\n";$r++;}}echo"<div><select name='order[$r]' onchange='selectAddRow(this);'><option>".optionlist($d,null,true)."</select>","<label><input type='checkbox' name='desc[$r]' value='1'>".'descending'."</label></div>\n";echo"</div></fieldset>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input name='limit' size='3' value='".h($y)."'>","</div></fieldset>\n";}function
selectLengthPrint($ef){if(isset($ef)){echo"<fieldset><legend>".'Text length'."</legend><div>",'<input name="text_length" size="3" value="'.h($ef).'">',"</div></fieldset>\n";}}function
selectActionPrint(){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return
true;}function
selectEmailPrint($yb,$d){}function
selectColumnsProcess($d,$u){global$o,$hc;$M=array();$q=array();foreach((array)$_GET["columns"]as$x=>$X){if($X["fun"]=="count"||(isset($d[$X["col"]])&&(!$X["fun"]||in_array($X["fun"],$o)||in_array($X["fun"],$hc)))){$M[$x]=apply_sql_function($X["fun"],(isset($d[$X["col"]])?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$hc)){$q[]=$M[$x];}}}return
array($M,$q);}function
selectSearchProcess($k,$u){global$w;$I=array();foreach($u
as$r=>$t){if($t["type"]=="FULLTEXT"&&$_GET["fulltext"][$r]!=""){$I[]="MATCH (".implode(", ",array_map('idf_escape',$t["columns"])).") AGAINST (".q($_GET["fulltext"][$r]).(isset($_GET["boolean"][$r])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$Sa=" $X[op]";if(ereg('IN$',$X["op"])){$qc=process_length($X["val"]);$Sa.=" (".($qc!=""?$qc:"NULL").")";}elseif(!$X["op"]){$Sa.=$X["val"];}elseif($X["op"]=="LIKE %%"){$Sa=" LIKE ".$this->processInput($k[$X["col"]],"%$X[val]%");}elseif(!ereg('NULL$',$X["op"])){$Sa.=" ".$this->processInput($k[$X["col"]],$X["val"]);}if($X["col"]!=""){$I[]=idf_escape($X["col"]).$Sa;}else{$La=array();foreach($k
as$C=>$j){if(is_numeric($X["val"])||!ereg('int|float|double|decimal',$j["type"])){$C=idf_escape($C);$La[]=($w=="sql"&&ereg('char|text|enum|set',$j["type"])&&!ereg('^utf8',$j["collation"])?"CONVERT($C USING utf8)":$C);}}$I[]=($La?"(".implode("$Sa OR ",$La)."$Sa)":"0");}}}return$I;}function
selectOrderProcess($k,$u){$I=array();foreach((array)$_GET["order"]as$x=>$X){if(isset($k[$X])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)){$I[]=(isset($k[$X])?idf_escape($X):$X).(isset($_GET["desc"][$x])?" DESC":"");}}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$Yb){return
false;}function
messageQuery($G){global$w;static$Xa=0;restart_session();$s="sql-".($Xa++);$jc=&get_session("queries");if(strlen($G)>1e6){$G=ereg_replace('[\x80-\xFF]+$','',substr($G,0,1e6))."\n...";}$jc[$_GET["db"]][]=$G;return" <a href='#$s' onclick=\"return !toggle('$s');\">".'SQL command'."</a><div id='$s' class='hidden'><pre><code class='jush-$w'>".shorten_utf8($G,1000).'</code></pre><p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($jc[$_GET["db"]])-1)).'">'.'Edit'.'</a></div>';}function
editFunctions($j){global$vb;$I=($j["null"]?"NULL/":"");foreach($vb
as$x=>$o){if(!$x||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($o
as$E=>$X){if(!$E||ereg($E,$j["type"])){$I.="/$X";}}if($x&&!ereg('set|blob|bytea|raw|file',$j["type"])){$I.="/=";}}}return
explode("/",$I);}function
editInput($R,$j,$ta,$Y){if($j["type"]=="enum"){return(isset($_GET["select"])?"<label><input type='radio'$ta value='-1' checked><i>".'original'."</i></label> ":"").($j["null"]?"<label><input type='radio'$ta value=''".(isset($Y)||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$ta,$j,$Y,0);}return"";}function
processInput($j,$Y,$n=""){if($n=="="){return$Y;}$C=$j["field"];$I=($j["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$Y)?$Y:q($Y));if(ereg('^(now|getdate|uuid)$',$n)){$I="$n()";}elseif(ereg('^current_(date|timestamp)$',$n)){$I=$n;}elseif(ereg('^([+-]|\\|\\|)$',$n)){$I=idf_escape($C)." $n $I";}elseif(ereg('^[+-] interval$',$n)){$I=idf_escape($C)." $n ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$Y)?$Y:$I);}elseif(ereg('^(addtime|subtime|concat)$',$n)){$I="$n(".idf_escape($C).", $I)";}elseif(ereg('^(md5|sha1|password|encrypt|hex)$',$n)){$I="$n($I)";}if(ereg("binary",$j["type"])){$I="unhex($I)";}return$I;}function
dumpOutput(){$I=array('text'=>'open','file'=>'save');if(function_exists('gzencode')){$I['gz']='gzip';}if(function_exists('bzcompress')){$I['bz2']='bzip2';}return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpTable($R,$Q,$yc=false){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Q){dump_csv(array_keys(fields($R)));}}elseif($Q){$Ya=create_sql($R,$_POST["auto_increment"]);if($Ya){if($Q=="DROP+CREATE"){echo"DROP ".($yc?"VIEW":"TABLE")." IF EXISTS ".table($R).";\n";}if($yc){$Ya=preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$Ya);}echo($Q!="CREATE+ALTER"?$Ya:($yc?substr_replace($Ya," OR REPLACE",6,0):substr_replace($Ya," IF NOT EXISTS",12,0))).";\n\n";}if($Q=="CREATE+ALTER"&&!$yc){$G="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".q($R)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$k=array();$oa="";foreach(get_rows($G)as$J){$ib=$J["COLUMN_DEFAULT"];$J["default"]=(isset($ib)?q($ib):"NULL");$J["after"]=q($oa);$J["alter"]=escape_string(idf_escape($J["COLUMN_NAME"])." $J[COLUMN_TYPE]".($J["COLLATION_NAME"]?" COLLATE $J[COLLATION_NAME]":"").(isset($ib)?" DEFAULT ".($ib=="CURRENT_TIMESTAMP"?$ib:$J["default"]):"").($J["IS_NULLABLE"]=="YES"?"":" NOT NULL").($J["EXTRA"]?" $J[EXTRA]":"").($J["COLUMN_COMMENT"]?" COMMENT ".q($J["COLUMN_COMMENT"]):"").($oa?" AFTER ".idf_escape($oa):" FIRST"));echo", ADD $J[alter]";$k[]=$J;$oa=$J["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $G;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($k
as$J){echo"
				WHEN ".q($J["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $J[alter]', IF(
						_column_default <=> $J[default] AND _is_nullable = '$J[IS_NULLABLE]' AND _collation_name <=> ".(isset($J["COLLATION_NAME"])?"'$J[COLLATION_NAME]'":"NULL")." AND _column_type = ".q($J["COLUMN_TYPE"])." AND _extra = '$J[EXTRA]' AND _column_comment = ".q($J["COLUMN_COMMENT"])." AND after = $J[after]
					, '', ', MODIFY $J[alter]'));";}echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".table($R)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}}function
dumpData($R,$Q,$G){global$e,$w;$Qc=($w=="sqlite"?0:1048576);if($Q){if($_POST["format"]=="sql"&&$Q=="TRUNCATE+INSERT"){echo
truncate_sql($R).";\n";}if($_POST["format"]=="sql"){$k=fields($R);}$H=$e->query($G,1);if($H){$vc="";$Ca="";while($J=$H->fetch_assoc()){if($_POST["format"]!="sql"){if($Q=="table"){dump_csv(array_keys($J));$Q="INSERT";}dump_csv($J);}else{if(!$vc){$vc="INSERT INTO ".table($R)." (".implode(", ",array_map('idf_escape',array_keys($J))).") VALUES";}foreach($J
as$x=>$X){$J[$x]=(isset($X)?(ereg('int|float|double|decimal|bit',$k[$x]["type"])?$X:q($X)):"NULL");}$L=implode(",\t",$J);if($Q=="INSERT+UPDATE"){$O=array();foreach($J
as$x=>$X){$O[]=idf_escape($x)." = $X";}echo"$vc ($L) ON DUPLICATE KEY UPDATE ".implode(", ",$O).";\n";}else{$L=($Qc?"\n":" ")."($L)";if(!$Ca){$Ca=$vc.$L;}elseif(strlen($Ca)+4+strlen($L)<$Qc){$Ca.=",$L";}else{echo"$Ca;\n";$Ca=$vc.$L;}}}}if($_POST["format"]=="sql"&&$Q!="INSERT+UPDATE"&&$Ca){$Ca.=";\n";echo$Ca;}}elseif($_POST["format"]=="sql"){echo"-- ".str_replace("\n"," ",$e->error)."\n";}}}function
dumpHeaders($nc,$cd=false){$Dd=$_POST["output"];$Ob=($_POST["format"]=="sql"?"sql":($cd?"tar":"csv"));header("Content-Type: ".($Dd=="bz2"?"application/x-bzip":($Dd=="gz"?"application/x-gzip":($Ob=="tar"?"application/x-tar":($Ob=="sql"||$Dd!="file"?"text/plain":"text/csv")."; charset=utf-8"))));if($Dd=="bz2"){ob_start('bzcompress',1e6);}if($Dd=="gz"){ob_start('gzencode',1e6);}return$Ob;}function
homepage(){echo'<p>'.($_GET["ns"]==""?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($bd){global$ga,$e,$T,$w,$pb;echo'<h1>
',$this->name(),' <span class="version">',$ga,'</span>
<a href="http://www.adminer.org/#download" id="version">',(version_compare($ga,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($bd=="auth"){$Vb=true;foreach((array)$_SESSION["pwds"]as$ob=>$Ce){foreach($Ce
as$N=>$Ff){foreach($Ff
as$V=>$Nd){if(isset($Nd)){if($Vb){echo"<p onclick='eventStop(event);'>\n";$Vb=false;}echo"<a href='".h(auth_url($ob,$N,$V))."'>($pb[$ob]) ".h($V.($N!=""?"@$N":""))."</a><br>\n";}}}}}else{$g=$this->databases();echo'<form action="" method="post">
<p class="logout">
';if(DB==""||!$bd){echo"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])).">".'SQL command'."</a>\n";if(support("dump")){echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Dump'."</a>\n";}}echo'<input type="submit" name="logout" value="Logout" onclick="eventStop(event);">
<input type="hidden" name="token" value="',$T,'">
</p>
</form>
<form action="">
<p>
';hidden_fields_get();echo($g?html_select("db",array(""=>"(".'database'.")")+$g,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">'),'<input type="submit" value="Use"',($g?" class='hidden'":""),' onclick="eventStop(event);">
';if($bd!="db"&&DB!=""&&$e->select_db(DB)){if($_GET["ns"]!==""&&!$bd){echo'<p><a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create new table'."</a>\n";$Ye=tables_list();if(!$Ye){echo"<p class='message'>".'No tables.'."\n";}else{$this->tablesPrint($Ye);$Lc=array();foreach($Ye
as$R=>$U){$Lc[]=preg_quote($R,'/');}echo"<script type='text/javascript'>\n","var jushLinks = { $w: [ '".js_escape(ME)."table=\$&', /\\b(".implode("|",$Lc).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X){echo"jushLinks.$X = jushLinks.$w;\n";}echo"</script>\n";}}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':""))),"</p></form>\n";}}function
tablesPrint($Ye){echo"<p id='tables'>\n";foreach($Ye
as$R=>$U){echo'<a href="'.h(ME).'select='.urlencode($R).'"'.bold($_GET["select"]==$R).">".'select'."</a> ",'<a href="'.h(ME).'table='.urlencode($R).'"'.bold($_GET["table"]==$R)." title='".'Show structure'."'>".$this->tableName(array("Name"=>$R))."</a><br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if(!isset($b->operators)){$b->operators=$td;}function
page_header($hf,$i="",$Ba=array(),$if=""){global$ca,$b,$e,$pb;header("Content-Type: text/html; charset=utf-8");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}$jf=$hf.($if!=""?": ".h($if):"");$kf=strip_tags($jf.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());if(is_ajax()){header("X-AJAX-Title: ".rawurlencode($kf));}else{echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$kf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=3.3.4";?>">
<script type="text/javascript">
var areYouSure = 'Resend POST data?';
var noResponse = 'No response from server.';
</script>
<script type="text/javascript" src="<?php echo
h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=3.3.4",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=3.3.4",'" id="favicon">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs"',($_POST?"":" onclick=\"return bodyClick(event, '".h(js_escape(DB)."', '".js_escape($_GET["ns"]))."');\"");echo' onkeydown="bodyKeydown(event);" onload="bodyLoad(\'',(is_object($e)?substr($e->server_info,0,3):""),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion();"),'">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="loader"><img src="',h(preg_replace("~\\?.*~","",ME))."?file=loader.gif&amp;version=3.3.4",'" alt=""></div>
<div id="content">
';}if(isset($Ba)){$z=substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$pb[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~(db|ns)=[^&]*&~','',ME),0,-1);$N=(SERVER!=""?h(SERVER):'Server');if($Ba===false){echo"$N\n";}else{echo"<a href='".($z?h($z):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ba))){echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';}if(is_array($Ba)){if($_GET["ns"]!=""){echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';}foreach($Ba
as$x=>$X){$kb=(is_array($X)?$X[1]:$X);if($kb!=""){echo'<a href="'.h(ME."$x=").urlencode(is_array($X)?$X[0]:$X).'">'.h($kb).'</a> &raquo; ';}}}echo"$hf\n";}}echo"<h2>$jf</h2>\n";restart_session();$Df=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Zc=$_SESSION["messages"][$Df];if($Zc){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Zc)."</div>\n";unset($_SESSION["messages"][$Df]);}$g=&get_session("dbs");if(DB!=""&&$g&&!in_array(DB,$g,true)){$g=null;}if($i){echo"<div class='error'>$i</div>\n";}define("PAGE_HEADER",1);}function
page_footer($bd=""){global$b;if(!is_ajax()){echo'</div>

<div id="menu">
';$b->navigation($bd);echo'</div>
';}}function
int32($B){while($B>=2147483648){$B-=4294967296;}while($B<=-2147483649){$B+=4294967296;}return(int)$B;}function
long2str($W,$Kf){$L='';foreach($W
as$X){$L.=pack('V',$X);}if($Kf){return
substr($L,0,end($W));}return$L;}function
str2long($L,$Kf){$W=array_values(unpack('V*',str_pad($L,4*ceil(strlen($L)/4),"\0")));if($Kf){$W[]=strlen($L);}return$W;}function
xxtea_mx($Of,$Nf,$Qe,$_c){return
int32((($Of>>5&0x7FFFFFF)^$Nf<<2)+(($Nf>>3&0x1FFFFFFF)^$Of<<4))^int32(($Qe^$Nf)+($_c^$Of));}function
encrypt_string($Le,$x){if($Le==""){return"";}$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Le,true);$B=count($W)-1;$Of=$W[$B];$Nf=$W[0];$F=floor(6+52/($B+1));$Qe=0;while($F-->0){$Qe=int32($Qe+0x9E3779B9);$ub=$Qe>>2&3;for($Ed=0;$Ed<$B;$Ed++){$Nf=$W[$Ed+1];$dd=xxtea_mx($Of,$Nf,$Qe,$x[$Ed&3^$ub]);$Of=int32($W[$Ed]+$dd);$W[$Ed]=$Of;}$Nf=$W[0];$dd=xxtea_mx($Of,$Nf,$Qe,$x[$Ed&3^$ub]);$Of=int32($W[$B]+$dd);$W[$B]=$Of;}return
long2str($W,false);}function
decrypt_string($Le,$x){if($Le==""){return"";}$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Le,false);$B=count($W)-1;$Of=$W[$B];$Nf=$W[0];$F=floor(6+52/($B+1));$Qe=int32($F*0x9E3779B9);while($Qe){$ub=$Qe>>2&3;for($Ed=$B;$Ed>0;$Ed--){$Of=$W[$Ed-1];$dd=xxtea_mx($Of,$Nf,$Qe,$x[$Ed&3^$ub]);$Nf=int32($W[$Ed]-$dd);$W[$Ed]=$Nf;}$Of=$W[$B];$dd=xxtea_mx($Of,$Nf,$Qe,$x[$Ed&3^$ub]);$Nf=int32($W[0]-$dd);$W[0]=$Nf;$Qe=int32($Qe-0x9E3779B9);}return
long2str($W,true);}$e='';$T=$_SESSION["token"];if(!$_SESSION["token"]){$_SESSION["token"]=rand(1,1e6);}$Od=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$Od[$x]=$X;}}if(isset($_POST["server"])){session_regenerate_id();$_SESSION["pwds"][$_POST["driver"]][$_POST["server"]][$_POST["username"]]=$_POST["password"];if($_POST["permanent"]){$x=base64_encode($_POST["driver"])."-".base64_encode($_POST["server"])."-".base64_encode($_POST["username"]);$Yd=$b->permanentLogin();$Od[$x]="$x:".base64_encode($Yd?encrypt_string($_POST["password"],$Yd):"");cookie("adminer_permanent",implode(" ",$Od));}if(count($_POST)==($_POST["permanent"]?5:4)||DRIVER!=$_POST["driver"]||SERVER!=$_POST["server"]||$_GET["username"]!==$_POST["username"]){redirect(auth_url($_POST["driver"],$_POST["server"],$_POST["username"]));}}elseif($_POST["logout"]){if($T&&$_POST["token"]!=$T){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","dbs","queries")as$x){set_session($x,null);}$x=base64_encode(DRIVER)."-".base64_encode(SERVER)."-".base64_encode($_GET["username"]);if($Od[$x]){unset($Od[$x]);cookie("adminer_permanent",implode(" ",$Od));}redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($Od&&!$_SESSION["pwds"]){session_regenerate_id();$Yd=$b->permanentLogin();foreach($Od
as$x=>$X){list(,$Ha)=explode(":",$X);list($ob,$N,$V)=array_map('base64_decode',explode("-",$x));$_SESSION["pwds"][$ob][$N][$V]=decrypt_string(base64_decode($Ha),$Yd);}}function
auth_error($Ib=null){global$e,$b,$T;$De=session_name();$i="";if(!$_COOKIE[$De]&&$_GET[$De]&&ini_bool("session.use_only_cookies")){$i='Session support must be enabled.';}elseif(isset($_GET["username"])){if(($_COOKIE[$De]||$_GET[$De])&&!$T){$i='Session expired, please login again.';}else{$Nd=&get_session("pwds");if(isset($Nd)){$i=h($Ib?$Ib->getMessage():(is_string($e)?$e:'Invalid credentials.'));$Nd=null;}}}page_header('Login',$i,null);echo"<form action='' method='post' onclick='eventStop(event);'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("driver","server","username","password","permanent"));echo"</div>\n","</form>\n";page_footer("auth");}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$Td)),false);page_footer("auth");exit;}$e=connect();}if(is_string($e)||!$b->login($_GET["username"],get_session("pwds"))){auth_error();exit;}$T=$_SESSION["token"];if(isset($_POST["server"])&&$_POST["token"]){$_POST["token"]=$T;}$i=($_POST?($_POST["token"]==$T?"":'Invalid CSRF token. Send the form again.'):($_SERVER["REQUEST_METHOD"]!="POST"?"":sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.','"post_max_size"')));function
connect_error(){global$b,$e,$T,$i,$pb;$g=array();if(DB!=""){page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$i){queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));}page_header('Select database',$i,false);echo"<p><a href='".h(ME)."database='>".'Create new database'."</a>\n";foreach(array('privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$x=>$X){if(support($x)){echo"<a href='".h(ME)."$x='>$X</a>\n";}}echo"<p>".sprintf('%s version: %s through PHP extension %s',$pb[DRIVER],"<b>$e->server_info</b>","<b>$e->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";if($_GET["refresh"]){set_session("dbs",null);}$g=$b->databases();if($g){$ye=support("scheme");$c=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);'>\n","<thead><tr><td>&nbsp;<th>".'Database'."<td>".'Collation'."<td>".'Tables'."</thead>\n";foreach($g
as$h){$re=h(ME)."db=".urlencode($h);echo"<tr".odd()."><td>".checkbox("db[]",$h,in_array($h,(array)$_POST["db"])),"<th><a href='$re'>".h($h)."</a>","<td><a href='$re".($ye?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>".nbsp(db_collation($h,$c))."</a>","<td align='right'><a href='$re&amp;schema=' id='tables-".h($h)."' title='".'Database schema'."'>?</a>","\n";}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","<p><input type='submit' name='drop' value='".'Drop'."'".confirm("formChecked(this, /db/)",1).">\n";echo"<input type='hidden' name='token' value='$T'>\n","<a href='".h(ME)."refresh=1' onclick='eventStop(event);'>".'Refresh'."</a>\n","</form>\n";}}page_footer("db");if($g){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=connect');</script>\n";}}if(isset($_GET["status"])){$_GET["variables"]=$_GET["status"];}if(!(DB!=""?$e->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect")){if(DB!=""){set_session("dbs",null);}connect_error();exit;}function
select($H,$f=null,$mc=""){$Lc=array();$u=array();$d=array();$_a=array();$vf=array();odd('');for($r=0;$J=$H->fetch_row();$r++){if(!$r){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($v=0;$v<count($J);$v++){$j=$H->fetch_field();$C=$j->name;$yd=$j->orgtable;$xd=$j->orgname;if($mc){$Lc[$v]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));}elseif($yd!=""){if(!isset($u[$yd])){$u[$yd]=array();foreach(indexes($yd,$f)as$t){if($t["type"]=="PRIMARY"){$u[$yd]=array_flip($t["columns"]);break;}}$d[$yd]=$u[$yd];}if(isset($d[$yd][$xd])){unset($d[$yd][$xd]);$u[$yd][$xd]=$v;$Lc[$v]=$yd;}}if($j->charsetnr==63){$_a[$v]=true;}$vf[$v]=$j->type;$C=h($C);echo"<th".($yd!=""||$j->name!=$xd?" title='".h(($yd!=""?"$yd.":"").$xd)."'":"").">".($mc?"<a href='$mc".strtolower($C)."' target='_blank' rel='noreferrer'>$C</a>":$C);}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$x=>$X){if(!isset($X)){$X="<i>NULL</i>";}elseif($_a[$x]&&!is_utf8($X)){$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";}elseif(!strlen($X)){$X="&nbsp;";}else{$X=h($X);if($vf[$x]==254){$X="<code>$X</code>";}}if(isset($Lc[$x])&&!$d[$Lc[$x]]){if($mc){$z=$Lc[$x].urlencode($J[array_search("table=",$Lc)]);}else{$z="edit=".urlencode($Lc[$x]);foreach($u[$Lc[$x]]as$Ia=>$v){$z.="&where".urlencode("[".bracket_escape($Ia)."]")."=".urlencode($J[$v]);}}$X="<a href='".h(ME.$z)."'>$X</a>";}echo"<td>$X";}}echo($r?"</table>":"<p class='message'>".'No rows.')."\n";}function
referencable_primary($_e){$I=array();foreach(table_status()as$Ue=>$R){if($Ue!=$_e&&fk_support($R)){foreach(fields($Ue)as$j){if($j["primary"]){if($I[$Ue]){unset($I[$Ue]);break;}$I[$Ue]=$j;}}}}return$I;}function
textarea($C,$Y,$K=10,$La=80){echo"<textarea name='$C' rows='$K' cols='$La' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>";if(is_array($Y)){foreach($Y
as$X){echo
h($X)."\n\n\n";}}else{echo
h($Y);}echo"</textarea>";}function
format_time($He,$Ab){return" <span class='time'>(".sprintf('%.3f s',max(0,array_sum(explode(" ",$Ab))-array_sum(explode(" ",$He)))).")</span>";}function
edit_type($x,$j,$c,$m=array()){global$Me,$vf,$Bf,$pd;echo'<td><select name="',$x,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist((!$j["type"]||isset($vf[$j["type"]])?array():array($j["type"]))+$Me+($m?array('Foreign keys'=>$m):array()),$j["type"]),'</select>
<td><input name="',$x,'[length]" value="',h($j["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td class="options">',"<select name='$x"."[collation]'".(ereg('(char|text|enum|set)$',$j["type"])?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($c,$j["collation"]).'</select>',($Bf?"<select name='$x"."[unsigned]'".(!$j["type"]||ereg('(int|float|double|decimal)$',$j["type"])?"":" class='hidden'").'><option>'.optionlist($Bf,$j["unsigned"]).'</select>':''),($m?"<select name='$x"."[on_delete]'".(ereg("`",$j["type"])?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$pd),$j["on_delete"])."</select> ":" ");}function
process_length($Jc){global$Db;return(preg_match("~^\\s*(?:$Db)(?:\\s*,\\s*(?:$Db))*\\s*\$~",$Jc)&&preg_match_all("~$Db~",$Jc,$Oc)?implode(",",$Oc[0]):preg_replace('~[^0-9,+-]~','',$Jc));}function
process_type($j,$Ja="COLLATE"){global$Bf;return" $j[type]".($j["length"]!=""?"(".process_length($j["length"]).")":"").(ereg('int|float|double|decimal',$j["type"])&&in_array($j["unsigned"],$Bf)?" $j[unsigned]":"").(ereg('char|text|enum|set',$j["type"])&&$j["collation"]?" $Ja ".q($j["collation"]):"");}function
process_field($j,$tf){return
array(idf_escape(trim($j["field"])),process_type($tf),($j["null"]?" NULL":" NOT NULL"),(isset($j["default"])?" DEFAULT ".(($j["type"]=="timestamp"&&eregi('^CURRENT_TIMESTAMP$',$j["default"]))||($j["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$j["default"]))?$j["default"]:q($j["default"])):""),($j["on_update"]?" ON UPDATE $j[on_update]":""),(support("comment")&&$j["comment"]!=""?" COMMENT ".q($j["comment"]):""),($j["auto_increment"]?auto_increment():null),);}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$x=>$X){if(ereg("$x|$X",$U)){return" class='$x'";}}}function
edit_fields($k,$c,$U="TABLE",$qa=0,$m=array(),$Qa=false){global$tc;echo'<thead><tr class="wrap">
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($U=="TABLE"?'Column name':'Parameter name'),'<td>Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Length
<td>Options
';if($U=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">AI</acronym>
<td',($_POST["defaults"]?"":" class='hidden'"),'>Default values
',(support("comment")?"<td".($Qa?"":" class='hidden'").">".'Comment':"");}echo'<td>',"<input type='image' name='add[".(support("move_col")?0:count($k))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.4' alt='+' title='".'Add next'."'>",'<script type="text/javascript">row_count = ',count($k),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($k
as$r=>$j){$r++;$zd=$j[($_POST?"orig":"field")];$mb=(isset($_POST["add"][$r-1])||(isset($j["field"])&&!$_POST["drop_col"][$r]))&&(support("drop_col")||$zd=="");echo'<tr',($mb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$r][inout]",explode("|",$tc),$j["inout"]):""),'<th>';if($mb){echo'<input name="fields[',$r,'][field]" value="',h($j["field"]),'" onchange="',($j["field"]!=""||count($k)>1?"":"editingAddRow(this, $qa); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$r,'][orig]" value="',h($zd),'">
';edit_type("fields[$r]",$j,$c,$m);if($U=="TABLE"){echo'<td>',checkbox("fields[$r][null]",1,$j["null"]),'<td><input type="radio" name="auto_increment_col" value="',$r,'"';if($j["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }">
<td<?php echo($_POST["defaults"]?"":" class='hidden'"),'>',checkbox("fields[$r][has_default]",1,$j["has_default"]),'<input name="fields[',$r,'][default]" value="',h($j["default"]),'" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($Qa?"":" class='hidden'")."><input name='fields[$r][comment]' value='".h($j["comment"])."' maxlength='255'>":"");}echo"<td>",(support("move_col")?"<input type='image' name='add[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.4' alt='+' title='".'Add next'."' onclick='return !editingAddRow(this, $qa, 1);'>&nbsp;"."<input type='image' name='up[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=3.3.4' alt='^' title='".'Move up'."'>&nbsp;"."<input type='image' name='down[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=3.3.4' alt='v' title='".'Move down'."'>&nbsp;":""),($zd==""||support("drop_col")?"<input type='image' name='drop_col[$r]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=3.3.4' alt='x' title='".'Remove'."' onclick='return !editingRemoveRow(this);'>":""),"\n";}}function
process_fields(&$k){ksort($k);$kd=0;if($_POST["up"]){$Dc=0;foreach($k
as$x=>$j){if(key($_POST["up"])==$x){unset($k[$x]);array_splice($k,$Dc,0,array($j));break;}if(isset($j["field"])){$Dc=$kd;}$kd++;}}if($_POST["down"]){$ac=false;foreach($k
as$x=>$j){if(isset($j["field"])&&$ac){unset($k[key($_POST["down"])]);array_splice($k,$kd,0,array($ac));break;}if(key($_POST["down"])==$x){$ac=$j;}$kd++;}}$k=array_values($k);if($_POST["add"]){array_splice($k,key($_POST["add"]),0,array(array()));}}function
normalize_enum($A){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($A[0][0].$A[0][0],$A[0][0],substr($A[0],1,-1))),'\\'))."'";}function
grant($p,$ae,$d,$od){if(!$ae){return
true;}if($ae==array("ALL PRIVILEGES","GRANT OPTION")){return($p=="GRANT"?queries("$p ALL PRIVILEGES$od WITH GRANT OPTION"):queries("$p ALL PRIVILEGES$od")&&queries("$p GRANT OPTION$od"));}return
queries("$p ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$d, ",$ae).$d).$od);}function
drop_create($qb,$Ya,$_,$Yc,$Wc,$Xc,$C){if($_POST["drop"]){return
query_redirect($qb,$_,$Yc,true,!$_POST["dropped"]);}$rb=$C!=""&&($_POST["dropped"]||queries($qb));$ab=queries($Ya);if(!queries_redirect($_,($C!=""?$Wc:$Xc),$ab)&&$rb){redirect(null,$Yc);}return$rb;}function
tar_file($Tb,$Ua){$I=pack("a100a8a8a8a12a12",$Tb,644,0,0,decoct(strlen($Ua)),decoct(time()));$Ga=8*32;for($r=0;$r<strlen($I);$r++){$Ga+=ord($I{$r});}$I.=sprintf("%06o",$Ga)."\0 ";return$I.str_repeat("\0",512-strlen($I)).$Ua.str_repeat("\0",511-(strlen($Ua)+511)%
512);}function
ini_bytes($sc){$X=ini_get($sc);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}session_cache_limiter("");if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false){session_write_close();}$pd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Db="'(?:''|[^'\\\\]|\\\\.)*+'";$tc="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["download"])){$a=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$e->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($a)," WHERE ".where($_GET),1));exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$k=fields($a);if(!$k){$i=error();}$S=($k?table_status($a):array());page_header(($k&&is_view($S)?'View':'Table').": ".h($a),$i);$b->selectLinks($S);$Pa=$S["Comment"];if($Pa!=""){echo"<p>".'Comment'.": ".h($Pa)."\n";}if($k){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($k
as$j){echo"<tr".odd()."><th>".h($j["field"]),"<td title='".h($j["collation"])."'>".h($j["full_type"]).($j["null"]?" <i>NULL</i>":"").($j["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($j["default"])?" [<b>".h($j["default"])."</b>]":""),(support("comment")?"<td>".nbsp($j["comment"]):""),"\n";}echo"</table>\n";if(!is_view($S)){echo"<h3>".'Indexes'."</h3>\n";$u=indexes($a);if($u){echo"<table cellspacing='0'>\n";foreach($u
as$C=>$t){ksort($t["columns"]);$Xd=array();foreach($t["columns"]as$x=>$X){$Xd[]="<i>".h($X)."</i>".($t["lengths"][$x]?"(".$t["lengths"][$x].")":"");}echo"<tr title='".h($C)."'><th>$t[type]<td>".implode(", ",$Xd)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";if(fk_support($S)){echo"<h3>".'Foreign keys'."</h3>\n";$m=foreign_keys($a);if($m){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'.($w!="sqlite"?"<td>&nbsp;":"")."</thead>\n";foreach($m
as$C=>$l){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$l["source"]))."</i>","<td><a href='".h($l["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($l["db"]),ME):($l["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($l["ns"]),ME):ME))."table=".urlencode($l["table"])."'>".($l["db"]!=""?"<b>".h($l["db"])."</b>.":"").($l["ns"]!=""?"<b>".h($l["ns"])."</b>.":"").h($l["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$l["target"]))."</i>)","<td>".nbsp($l["on_delete"])."\n","<td>".nbsp($l["on_update"])."\n";if($w!="sqlite"){echo'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.'Alter'.'</a>';}}echo"</table>\n";}if($w!="sqlite"){echo'<p><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support("trigger")){echo"<h3>".'Triggers'."</h3>\n";$sf=triggers($a);if($sf){echo"<table cellspacing='0'>\n";foreach($sf
as$x=>$X){echo"<tr valign='top'><td>$X[0]<td>$X[1]<th>".h($x)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($x))."'>".'Alter'."</a>\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),DB.($_GET["ns"]?".$_GET[ns]":""));$Ve=array();$We=array();$C="adminer_schema";$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE[($_COOKIE["$C-".DB]?"$C-".DB:$C)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Oc,PREG_SET_ORDER);foreach($Oc
as$r=>$A){$Ve[$A[1]]=array($A[2],$A[3]);$We[]="\n\t'".js_escape($A[1])."': [ $A[2], $A[3] ]";}$lf=0;$za=-1;$xe=array();$ke=array();$Hc=array();foreach(table_status()as$S){if(!isset($S["Engine"])){continue;}$Qd=0;$xe[$S["Name"]]["fields"]=array();foreach(fields($S["Name"])as$C=>$j){$Qd+=1.25;$j["pos"]=$Qd;$xe[$S["Name"]]["fields"][$C]=$j;}$xe[$S["Name"]]["pos"]=($Ve[$S["Name"]]?$Ve[$S["Name"]]:array($lf,0));foreach($b->foreignKeys($S["Name"])as$X){if(!$X["db"]){$Fc=$za;if($Ve[$S["Name"]][1]||$Ve[$X["table"]][1]){$Fc=min(floatval($Ve[$S["Name"]][1]),floatval($Ve[$X["table"]][1]))-1;}else{$za-=.1;}while($Hc[(string)$Fc]){$Fc-=.0001;}$xe[$S["Name"]]["references"][$X["table"]][(string)$Fc]=array($X["source"],$X["target"]);$ke[$X["table"]][$S["Name"]][(string)$Fc]=$X["target"];$Hc[(string)$Fc]=true;}}$lf=max($lf,$xe[$S["Name"]]["pos"][0]+2.5+$Qd);}echo'<div id="schema" style="height: ',$lf,'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {',implode(",",$We)."\n",'};
var em = document.getElementById(\'schema\').offsetHeight / ',$lf,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($xe
as$C=>$R){echo"<div class='table' style='top: ".$R["pos"][0]."em; left: ".$R["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>";foreach($R["fields"]as$j){$X='<span'.type_class($j["type"]).' title="'.h($j["full_type"].($j["null"]?" NULL":'')).'">'.h($j["field"]).'</span>';echo"<br>".($j["primary"]?"<i>$X</i>":$X);}foreach((array)$R["references"]as$cf=>$le){foreach($le
as$Fc=>$he){$Gc=$Fc-$Ve[$C][1];$r=0;foreach($he[0]as$Ee){echo"\n<div class='references' title='".h($cf)."' id='refs$Fc-".($r++)."' style='left: $Gc"."em; top: ".$R["fields"][$Ee]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Gc)."em;'></div></div>";}}}foreach((array)$ke[$C]as$cf=>$le){foreach($le
as$Fc=>$d){$Gc=$Fc-$Ve[$C][1];$r=0;foreach($d
as$bf){echo"\n<div class='references' title='".h($cf)."' id='refd$Fc-".($r++)."' style='left: $Gc"."em; top: ".$R["fields"][$bf]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=3.3.4'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Gc)."em;'></div></div>";}}}echo"\n</div>\n";}foreach($xe
as$C=>$R){foreach((array)$R["references"]as$cf=>$le){foreach($le
as$Fc=>$he){$ad=$lf;$Sc=-10;foreach($he[0]as$x=>$Ee){$Rd=$R["pos"][0]+$R["fields"][$Ee]["pos"];$Sd=$xe[$cf]["pos"][0]+$xe[$cf]["fields"][$he[1][$x]]["pos"];$ad=min($ad,$Rd,$Sd);$Sc=max($Sc,$Rd,$Sd);}echo"<div class='references' id='refl$Fc' style='left: $Fc"."em; top: $ad"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Sc-$ad)."em;'></div></div>\n";}}}echo'</div>
<p><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST){$Wa="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$x){$Wa.="&$x=".urlencode($_POST[$x]);}cookie("adminer_export",substr($Wa,1));$Ob=dump_headers(($a!=""?$a:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));$xc=($_POST["format"]=="sql");if($xc){echo"-- Adminer $ga ".$pb[DRIVER]." dump

".($w!="sql"?"":"SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".q($e->result("SELECT @@time_zone")).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

");}$Q=$_POST["db_style"];$g=array(DB);if(DB==""){$g=$_POST["databases"];if(is_string($g)){$g=explode("\n",rtrim(str_replace("\r","",$g),"\n"));}}foreach((array)$g
as$h){if($e->select_db($h)){if($xc&&ereg('CREATE',$Q)&&($Ya=$e->result("SHOW CREATE DATABASE ".idf_escape($h),1))){if($Q=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($h).";\n";}echo($Q=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$Ya):$Ya).";\n";}if($xc){if($Q){echo
use_sql($h).";\n\n";}if(in_array("CREATE+ALTER",array($Q,$_POST["table_style"]))){echo"SET @adminer_alter = '';\n\n";}$Cd="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$se){foreach(get_rows("SHOW $se STATUS WHERE Db = ".q($h),null,"-- ")as$J){$Cd.=($Q!='DROP+CREATE'?"DROP $se IF EXISTS ".idf_escape($J["Name"]).";;\n":"").$e->result("SHOW CREATE $se ".idf_escape($J["Name"]),2).";;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$Cd.=($Q!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"").$e->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3).";;\n\n";}}if($Cd){echo"DELIMITER ;;\n\n$Cd"."DELIMITER ;\n\n";}}if($_POST["table_style"]||$_POST["data_style"]){$If=array();foreach(table_status()as$S){$R=(DB==""||in_array($S["Name"],(array)$_POST["tables"]));$db=(DB==""||in_array($S["Name"],(array)$_POST["data"]));if($R||$db){if(!is_view($S)){if($Ob=="tar"){ob_start();}$b->dumpTable($S["Name"],($R?$_POST["table_style"]:""));if($db){$b->dumpData($S["Name"],$_POST["data_style"],"SELECT * FROM ".table($S["Name"]));}if($xc&&$_POST["triggers"]&&$R&&($sf=trigger_sql($S["Name"],$_POST["table_style"]))){echo"\nDELIMITER ;;\n$sf\nDELIMITER ;\n";}if($Ob=="tar"){echo
tar_file((DB!=""?"":"$h/")."$S[Name].csv",ob_get_clean());}elseif($xc){echo"\n";}}elseif($xc){$If[]=$S["Name"];}}}foreach($If
as$Hf){$b->dumpTable($Hf,$_POST["table_style"],true);}if($Ob=="tar"){echo
pack("x512");}}if($Q=="CREATE+ALTER"&&$xc){$G="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $G;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";foreach(get_rows($G)as$J){$Pa=q($J["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$J["TABLE_COMMENT"]):$J["TABLE_COMMENT"]);echo"
				WHEN ".q($J["TABLE_NAME"])." THEN
					".(isset($J["ENGINE"])?"IF _engine != '$J[ENGINE]' OR _table_collation != '$J[TABLE_COLLATION]' OR _table_comment != $Pa THEN
						ALTER TABLE ".idf_escape($J["TABLE_NAME"])." ENGINE=$J[ENGINE] COLLATE=$J[TABLE_COLLATION] COMMENT=$Pa;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($Q,$_POST["table_style"]))&&$xc){echo"SELECT @adminer_alter;\n";}}}if($xc){echo"-- ".$e->result("SELECT NOW()")."\n";}exit;}page_header('Export',"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$gb=array('','USE','DROP+CREATE','CREATE');$Xe=array('','DROP+CREATE','CREATE');$eb=array('','TRUNCATE+INSERT','INSERT');if($w=="sql"){$gb[]='CREATE+ALTER';$Xe[]='CREATE+ALTER';$eb[]='INSERT+UPDATE';}parse_str($_COOKIE["adminer_export"],$J);if(!$J){$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");}if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($w=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$gb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'Routines'):"").(support("event")?checkbox("events",1,$J["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Xe,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$J["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$eb,$J["data_style"]),'</table>
<p><input type="submit" value="Export">

<table cellspacing="0">
';$Vd=array();if(DB!=""){$Fa=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$Fa onclick='formCheck(this, /^tables\\[/);'>".'Tables'."</label>","<th style='text-align: right;'><label>".'Data'."<input type='checkbox' id='check-data'$Fa onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$If="";foreach(table_status()as$S){$C=$S["Name"];$Ud=ereg_replace("_.*","",$C);$Fa=($a==""||$a==(substr($a,-1)=="%"?"$Ud%":$C));$Xd="<tr><td>".checkbox("tables[]",$C,$Fa,$C,"formUncheck('check-tables');");if(is_view($S)){$If.="$Xd\n";}else{echo"$Xd<td align='right'><label>".($S["Engine"]=="InnoDB"&&$S["Rows"]?"~ ":"").$S["Rows"].checkbox("data[]",$C,$Fa,"","formUncheck('check-data');")."</label>\n";}$Vd[$Ud]++;}echo$If;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Database'."</label></thead>\n";$g=$b->databases();if($g){foreach($g
as$h){if(!information_schema($h)){$Ud=ereg_replace("_.*","",$h);echo"<tr><td>".checkbox("databases[]",$h,$a==""||$a=="$Ud%",$h,"formUncheck('check-databases');")."</label>\n";$Vd[$Ud]++;}}}else{echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}}echo'</table>
</form>
';$Vb=true;foreach($Vd
as$x=>$X){if($x!=""&&$X>1){echo($Vb?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$x%")."'>".h($x)."</a>";$Vb=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');$H=$e->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$p=$H;if(!$H){$H=$e->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($p?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th>&nbsp;</thead>\n";while($J=$H->fetch_assoc()){echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'Edit'."</a>\n";}if(!$p||DB!=""){echo"<tr".odd()."><td><input name='user'><td><input name='host' value='localhost'><td><input type='submit' value='".'Edit'."'>\n";}echo"</table>\n","</form>\n",'<p><a href="'.h(ME).'user=">'.'Create user'."</a>";}elseif(isset($_GET["sql"])){if(!$i&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$kc=&get_session("queries");$jc=&$kc[DB];if(!$i&&$_POST["clear"]){$jc=array();redirect(remove_from_uri("history"));}page_header('SQL command',$i);if(!$i&&$_POST){$cc=false;$G=$_POST["query"];if($_POST["webfile"]){$cc=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$G=($cc?fread($cc,1e6):false);}elseif($_FILES&&$_FILES["sql_file"]["error"]!=UPLOAD_ERR_NO_FILE){$G=get_file("sql_file",true);}if(is_string($G)){if(function_exists('memory_get_usage')){@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));}if($G!=""&&strlen($G)<1e6){$F=$G.(ereg(";[ \t\r\n]*\$",$G)?"":";");if(!$jc||end($jc)!=$F){$jc[]=$F;}}$Fe="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";if(!ini_bool("session.use_cookies")){session_write_close();}$jb=";";$kd=0;$_b=true;$f=connect();if(is_object($f)&&DB!=""){$f->select_db(DB);}$Oa=0;$Fb=array();$Hd='[\'"'.($w=="sql"?'`#':($w=="sqlite"?'`[':($w=="mssql"?'[':''))).']|/\\*|-- |$'.($w=="pgsql"?'|\\$[^$]*\\$':'');$mf=microtime();parse_str($_COOKIE["adminer_export"],$ka);$tb=$b->dumpFormat();unset($tb["sql"]);while($G!=""){if(!$kd&&preg_match("~^$Fe*DELIMITER\\s+(.+)~i",$G,$A)){$jb=$A[1];$G=substr($G,strlen($A[0]));}else{preg_match('('.preg_quote($jb)."|$Hd)",$G,$A,PREG_OFFSET_CAPTURE,$kd);$ac=$A[0][0];if(!$ac&&$cc&&!feof($cc)){$G.=fread($cc,1e5);}else{$kd=$A[0][1]+strlen($ac);if(!$ac&&rtrim($G)==""){break;}if($ac&&$ac!=$jb){while(preg_match('('.($ac=='/*'?'\\*/':($ac=='['?']':(ereg('^-- |^#',$ac)?"\n":preg_quote($ac)."|\\\\."))).'|$)s',$G,$A,PREG_OFFSET_CAPTURE,$kd)){$L=$A[0][0];if(!$L&&$cc&&!feof($cc)){$G.=fread($cc,1e5);}else{$kd=$A[0][1]+strlen($L);if($L[0]!="\\"){break;}}}}else{$_b=false;$F=substr($G,0,$A[0][1]);$Oa++;$Xd="<pre id='sql-$Oa'><code class='jush-$w'>".shorten_utf8(trim($F),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$Xd;ob_flush();flush();}$He=microtime();if($e->multi_query($F)&&is_object($f)&&preg_match("~^$Fe*USE\\b~isU",$F)){$f->query($F);}do{$H=$e->store_result();$Ab=microtime();$ff=format_time($He,$Ab).(strlen($F)<1000?" <a href='".h(ME)."sql=".urlencode(trim($F))."'>".'Edit'."</a>":"");if($e->error){echo($_POST["only_errors"]?$Xd:""),"<p class='error'>".'Error in query'.": ".error()."\n";$Fb[]=" <a href='#sql-$Oa'>$Oa</a>";if($_POST["error_stops"]){break
2;}}elseif(is_object($H)){select($H,$f);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n","<p>".($H->num_rows?lang(array('%d row','%d rows'),$H->num_rows):"").$ff;$s="export-$Oa";$Nb=", <a href='#$s' onclick=\"return !toggle('$s');\">".'Export'."</a><span id='$s' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ka["output"])." ".html_select("format",$tb,$ka["format"])."<input type='hidden' name='query' value='".h($F)."'>"." <input type='submit' name='export' value='".'Export'."' onclick='eventStop(event);'><input type='hidden' name='token' value='$T'></span>\n";if($f&&preg_match("~^($Fe|\\()*SELECT\\b~isU",$F)&&($Mb=explain($f,$F))){$s="explain-$Oa";echo", <a href='#$s' onclick=\"return !toggle('$s');\">EXPLAIN</a>$Nb","<div id='$s' class='hidden'>\n";select($Mb,$f,($w=="sql"?"http://dev.mysql.com/doc/refman/".substr($e->server_info,0,3)."/en/explain-output.html#explain_":""));echo"</div>\n";}else{echo$Nb;}echo"</form>\n";}}else{if(preg_match("~^$Fe*(CREATE|DROP|ALTER)$Fe+(DATABASE|SCHEMA)\\b~isU",$F)){restart_session();set_session("dbs",null);session_write_close();}if(!$_POST["only_errors"]){echo"<p class='message' title='".h($e->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$e->affected_rows)."$ff\n";}}$He=$Ab;}while($e->next_result());$G=substr($G,$kd);$kd=0;}}}}if($_b){echo"<p class='message'>".'No commands to execute.'."\n";}elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$Oa-count($Fb)).format_time($mf,microtime())."\n";}elseif($Fb&&$Oa>1){echo"<p class='error'>".'Error in query'.": ".implode("",$Fb)."\n";}}else{echo"<p class='error'>".upload_error($G)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
<p>';$F=$_GET["sql"];if($_POST){$F=$_POST["query"];}elseif($_GET["history"]=="all"){$F=$jc;}elseif($_GET["history"]!=""){$F=$jc[$_GET["history"]];}textarea("query",$F,20);echo($_POST?"":"<script type='text/javascript'>document.getElementsByTagName('textarea')[0].focus();</script>\n"),"<p>".(ini_bool("file_uploads")?'File upload'.': <input type="file" name="sql_file"'.($_FILES&&$_FILES["sql_file"]["error"]!=4?'':' onchange="this.form[\'only_errors\'].checked = true;"').'> (&lt; '.ini_get("upload_max_filesize").'B)':'File uploads are disabled.'),'<p>
<input type="submit" value="Execute" title="Ctrl+Enter">
<input type="hidden" name="token" value="',$T,'">
',checkbox("error_stops",1,$_POST["error_stops"],'Stop on error')."\n",checkbox("only_errors",1,$_POST["only_errors"],'Show only errors')."\n";print_fieldset("webfile",'From server',$_POST["webfile"],"document.getElementById('form')['only_errors'].checked = true; ");$Ra=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$x=>$X){if(extension_loaded($X)){$Ra[]=".$x";}}echo
sprintf('Webserver file %s',"<code>adminer.sql".($Ra?"[".implode("|",$Ra)."]":"")."</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";if($jc){print_fieldset("history",'History',$_GET["history"]!="");foreach($jc
as$x=>$X){echo'<a href="'.h(ME."sql=&history=$x").'">'.'Edit'."</a> <code class='jush-$w'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$X)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$Cf=(isset($_GET["select"])?$_POST["edit"]:$Z);$k=fields($a);foreach($k
as$C=>$j){if(!isset($j["privileges"][$Cf?"update":"insert"])||$b->fieldName($j)==""){unset($k[$C]);}}if($_POST&&!$i&&!isset($_GET["select"])){$_=$_POST["referer"];if($_POST["insert"]){$_=($Cf?null:$_SERVER["REQUEST_URI"]);}elseif(!ereg('^.+&select=.+$',$_)){$_=ME."select=".urlencode($a);}if(isset($_POST["delete"])){query_redirect("DELETE".limit1("FROM ".table($a)," WHERE $Z"),$_,'Item has been deleted.');}else{$O=array();foreach($k
as$C=>$j){$X=process_input($j);if($X!==false&&$X!==null){$O[idf_escape($C)]=($Cf?"\n".idf_escape($C)." = $X":$X);}}if($Cf){if(!$O){redirect($_);}query_redirect("UPDATE".limit1(table($a)." SET".implode(",",$O),"\nWHERE $Z"),$_,'Item has been updated.');}else{$H=insert_into($a,$O);$Ec=($H?last_id():0);queries_redirect($_,sprintf('Item%s has been inserted.',($Ec?" $Ec":"")),$H);}}}$Ue=$b->tableName(table_status($a));page_header(($Cf?'Edit':'Insert'),$i,array("select"=>array($a,$Ue)),$Ue);$J=null;if($_POST["save"]){$J=(array)$_POST["fields"];}elseif($Z){$M=array();foreach($k
as$C=>$j){if(isset($j["privileges"]["select"])){$M[]=($_POST["clone"]&&$j["auto_increment"]?"'' AS ":(ereg("enum|set",$j["type"])?"1*".idf_escape($C)." AS ":"")).idf_escape($C);}}$J=array();if($M){$K=get_rows("SELECT".limit(implode(", ",$M)." FROM ".table($a)," WHERE $Z",(isset($_GET["select"])?2:1)));$J=(isset($_GET["select"])&&count($K)!=1?null:reset($K));}}if($J===false){echo"<p class='error'>".'No rows.'."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';if($k){echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($k
as$C=>$j){echo"<tr><th>".$b->fieldName($j);$ib=$_GET["set"][bracket_escape($C)];$Y=(isset($J)?($J[$C]!=""&&ereg("enum|set",$j["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$Cf&&$j["auto_increment"]?"":(isset($_GET["select"])?false:(isset($ib)?$ib:$j["default"]))));if(!$_POST["save"]&&is_string($Y)){$Y=$b->editVal($Y,$j);}$n=($_POST["save"]?(string)$_POST["function"][$C]:($Cf&&$j["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:(isset($Y)?'':'NULL'))));if($j["type"]=="timestamp"&&$Y=="CURRENT_TIMESTAMP"){$Y="";$n="now";}input($j,$Y,$n);echo"\n";}echo"</table>\n";}echo'<p>
';if($k){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Cf?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n";}}echo($Cf?"<input type='submit' name='delete' value='".'Delete'."' onclick=\"return confirm('".'Are you sure?'."');\">\n":($_POST||!$k?"":"<script type='text/javascript'>document.getElementById('form').getElementsByTagName('td')[1].firstChild.focus();</script>\n"));if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["create"])){$a=$_GET["create"];$Id=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$je=referencable_primary($a);$m=array();foreach($je
as$Ue=>$j){$m[str_replace("`","``",$Ue)."`".str_replace("`","``",$j["field"])]=$Ue;}$Ad=array();$Bd=array();if($a!=""){$Ad=fields($a);$Bd=table_status($a);}if($_POST&&!$_POST["fields"]){$_POST["fields"]=array();}if($_POST&&!$i&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){query_redirect("DROP TABLE ".table($a),substr(ME,0,-1),'Table has been dropped.');}else{$k=array();$Xb=array();ksort($_POST["fields"]);$_d=reset($Ad);$oa="FIRST";foreach($_POST["fields"]as$x=>$j){$l=$m[$j["type"]];$tf=(isset($l)?$je[$l]:$j);if($j["field"]!=""){if(!$j["has_default"]){$j["default"]=null;}$ib=eregi_replace(" *on update CURRENT_TIMESTAMP","",$j["default"]);if($ib!=$j["default"]){$j["on_update"]="CURRENT_TIMESTAMP";$j["default"]=$ib;}if($x==$_POST["auto_increment_col"]){$j["auto_increment"]=true;}$ce=process_field($j,$tf);if($ce!=process_field($_d,$_d)){$k[]=array($j["orig"],$ce,$oa);}if(isset($l)){$Xb[idf_escape($j["field"])]=($a!=""?"ADD":" ")." FOREIGN KEY (".idf_escape($j["field"]).") REFERENCES ".table($m[$j["type"]])." (".idf_escape($tf["field"]).")".(ereg("^($pd)\$",$j["on_delete"])?" ON DELETE $j[on_delete]":"");}$oa="AFTER ".idf_escape($j["field"]);}elseif($j["orig"]!=""){$k[]=array($j["orig"]);}if($j["orig"]!=""){$_d=next($Ad);}}$Kd="";if(in_array($_POST["partition_by"],$Id)){$Ld=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$x=>$X){$Y=$_POST["partition_values"][$x];$Ld[]="\nPARTITION ".idf_escape($X)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Kd.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($Ld?" (".implode(",",$Ld)."\n)":($_POST["partitions"]?" PARTITIONS ".(+$_POST["partitions"]):""));}elseif($a!=""&&support("partitioning")){$Kd.="\nREMOVE PARTITIONING";}$Vc='Table has been altered.';if($a==""){cookie("adminer_engine",$_POST["Engine"]);$Vc='Table has been created.';}$C=trim($_POST["name"]);queries_redirect(ME."table=".urlencode($C),$Vc,alter_table($a,$C,$k,$Xb,$_POST["Comment"],($_POST["Engine"]&&$_POST["Engine"]!=$Bd["Engine"]?$_POST["Engine"]:""),($_POST["Collation"]&&$_POST["Collation"]!=$Bd["Collation"]?$_POST["Collation"]:""),($_POST["Auto_increment"]!=""?+$_POST["Auto_increment"]:""),$Kd));}}page_header(($a!=""?'Alter table':'Create table'),$i,array("table"=>$a),$a);$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($vf["int"])?"int":(isset($vf["integer"])?"integer":"")))),"partition_names"=>array(""),);if($_POST){$J=$_POST;if($J["auto_increment_col"]){$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;}process_fields($J["fields"]);}elseif($a!=""){$J=$Bd;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"]){$J["Auto_increment"]="";}foreach($Ad
as$j){$j["has_default"]=isset($j["default"]);if($j["on_update"]){$j["default"].=" ON UPDATE $j[on_update]";}$J["fields"][]=$j;}if(support("partitioning")){$dc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$e->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $dc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$J["partition_names"]=array();$J["partition_values"]=array();foreach(get_rows("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $dc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION")as$ve){$J["partition_names"][]=$ve["PARTITION_NAME"];$J["partition_values"][]=$ve["PARTITION_DESCRIPTION"];}$J["partition_names"][]="";}}$c=collations();$Pe=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($Pe&&count($J["fields"])>$Pe){echo"<p class='error'>".h(sprintf('Maximum number of allowed fields exceeded. Please increase %s and %s.','suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}$Cb=engines();foreach($Cb
as$Bb){if(!strcasecmp($Bb,$J["Engine"])){$J["Engine"]=$Bb;break;}}echo'
<form action="" method="post" id="form">
<p>
Table name: <input name="name" maxlength="64" value="',h($J["name"]),'">
';if($a==""&&!$_POST){?><script type='text/javascript'>document.getElementById('form')['name'].focus();</script><?php }echo($Cb?html_select("Engine",array(""=>"(".'engine'.")")+$Cb,$J["Engine"]):""),' ',($c&&!ereg("sqlite|mssql",$w)?html_select("Collation",array(""=>"(".'collation'.")")+$c,$J["Collation"]):""),' <input type="submit" value="Save">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$Qa=($_POST?$_POST["comments"]:$J["Comment"]!="");if(!$_POST&&!$Qa){foreach($J["fields"]as$j){if($j["comment"]!=""){$Qa=true;break;}}}edit_fields($J["fields"],$c,"TABLE",$Pe,$m,$Qa);echo'</table>
<p>
Auto Increment: <input name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
<label class="jsonly"><input type="checkbox" name="defaults" value="1"',($_POST["defaults"]?" checked":""),' onclick="columnShow(this.checked, 5);">Default values</label>
',(support("comment")?checkbox("comments",1,$Qa,'Comment',"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();",true).' <input id="Comment" name="Comment" value="'.h($J["Comment"]).'" maxlength="60"'.($Qa?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="Save">
';if($_GET["create"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
';if(support("partitioning")){$Jd=ereg('RANGE|LIST',$J["partition_by"]);print_fieldset("partition",'Partition by',$J["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$Id,$J["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($J["partition"]),'">)
Partitions: <input name="partitions" size="2" value="',h($J["partitions"]),'"',($Jd||!$J["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($Jd?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($J["partition_names"]as$x=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'"'.($x==count($J["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($J["partition_values"][$x]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$rc=array("PRIMARY","UNIQUE","INDEX");$S=table_status($a);if(eregi("MyISAM|M?aria",$S["Engine"])){$rc[]="FULLTEXT";}$u=indexes($a);if($w=="sqlite"){unset($rc[0]);unset($u[""]);}if($_POST&&!$i&&!$_POST["add"]){$ra=array();foreach($_POST["indexes"]as$t){$C=$t["name"];if(in_array($t["type"],$rc)){$d=array();$Kc=array();$O=array();ksort($t["columns"]);foreach($t["columns"]as$x=>$Ma){if($Ma!=""){$Jc=$t["lengths"][$x];$O[]=idf_escape($Ma).($Jc?"(".(+$Jc).")":"");$d[]=$Ma;$Kc[]=($Jc?$Jc:null);}}if($d){$Lb=$u[$C];if($Lb){ksort($Lb["columns"]);ksort($Lb["lengths"]);if($t["type"]==$Lb["type"]&&array_values($Lb["columns"])===$d&&(!$Lb["lengths"]||array_values($Lb["lengths"])===$Kc)){unset($u[$C]);continue;}}$ra[]=array($t["type"],$C,"(".implode(", ",$O).")");}}}foreach($u
as$C=>$Lb){$ra[]=array($Lb["type"],$C,"DROP");}if(!$ra){redirect(ME."table=".urlencode($a));}queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$ra));}page_header('Indexes',$i,array("table"=>$a),$a);$k=array_keys(fields($a));$J=array("indexes"=>$u);if($_POST){$J=$_POST;if($_POST["add"]){foreach($J["indexes"]as$x=>$t){if($t["columns"][count($t["columns"])]!=""){$J["indexes"][$x]["columns"][]="";}}$t=end($J["indexes"]);if($t["type"]||array_filter($t["columns"],'strlen')||array_filter($t["lengths"],'strlen')){$J["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($J["indexes"]as$x=>$t){$J["indexes"][$x]["name"]=$x;$J["indexes"][$x]["columns"][]="";}$J["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>Index Type<th>Column (length)<th>Name</thead>
';$v=1;foreach($J["indexes"]as$t){echo"<tr><td>".html_select("indexes[$v][type]",array(-1=>"")+$rc,$t["type"],($v==count($J["indexes"])?"indexesAddRow(this);":1))."<td>";ksort($t["columns"]);$r=1;foreach($t["columns"]as$x=>$Ma){echo"<span>".html_select("indexes[$v][columns][$r]",array(-1=>"")+$k,$Ma,($r==count($t["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".js_escape($w=="sql"?"":$_GET["indexes"]."_")."');"),"<input name='indexes[$v][lengths][$r]' size='2' value='".h($t["lengths"][$x])."'> </span>";$r++;}echo"<td><input name='indexes[$v][name]' value='".h($t["name"])."'>\n";$v++;}echo'</table>
<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add next"></noscript>
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$i&&!isset($_POST["add_x"])){restart_session();$C=trim($_POST["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($C),'Database has been renamed.',rename_database($C,$_POST["collation"]));}else{$g=explode("\n",str_replace("\r","",$C));$Ne=true;$Dc="";foreach($g
as$h){if(count($g)==1||$h!=""){if(!create_database($h,$_POST["collation"])){$Ne=false;}$Dc=$h;}}queries_redirect(ME."db=".urlencode($Dc),'Database has been created.',$Ne);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($C).(eregi('^[a-z0-9_]+$',$_POST["collation"])?" COLLATE $_POST[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$i,array(),DB);$c=collations();$C=DB;$Ja=null;if($_POST){$C=$_POST["name"];$Ja=$_POST["collation"];}elseif(DB!=""){$Ja=db_collation(DB,$c);}elseif($w=="sql"){foreach(get_vals("SHOW GRANTS")as$p){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$p,$A)&&$A[1]){$C=stripcslashes(idf_unescape("`$A[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input id="name" name="name" value="'.h($C).'" maxlength="64">')."\n".($c?html_select("collation",array(""=>"(".'collation'.")")+$c,$Ja):"");?>
<script type='text/javascript'>document.getElementById('name').focus();</script>
<input type="submit" value="Save">
<?php
if(DB!=""){echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";}elseif(!$_POST["add_x"]&&$_GET["db"]==""){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.3.4' alt='+' title='".'Add next'."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header('Call'.": ".h($da),$i);$se=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$qc=array();$Cd=array();foreach($se["fields"]as$r=>$j){if(substr($j["inout"],-3)=="OUT"){$Cd[$r]="@".idf_escape($j["field"])." AS ".idf_escape($j["field"]);}if(!$j["inout"]||substr($j["inout"],0,2)=="IN"){$qc[]=$r;}}if(!$i&&$_POST){$Da=array();foreach($se["fields"]as$x=>$j){if(in_array($x,$qc)){$X=process_input($j);if($X===false){$X="''";}if(isset($Cd[$x])){$e->query("SET @".idf_escape($j["field"])." = $X");}}$Da[]=(isset($Cd[$x])?"@".idf_escape($j["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Da).")";echo"<p><code class='jush-$w'>".h($G)."</code> <a href='".h(ME)."sql=".urlencode($G)."'>".'Edit'."</a>\n";if(!$e->multi_query($G)){echo"<p class='error'>".error()."\n";}else{$f=connect();if(is_object($f)){$f->select_db(DB);}do{$H=$e->store_result();if(is_object($H)){select($H,$f);}else{echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$e->affected_rows)."\n";}}while($e->next_result());if($Cd){select($e->query("SELECT ".implode(", ",$Cd)));}}}echo'
<form action="" method="post">
';if($qc){echo"<table cellspacing='0'>\n";foreach($qc
as$x){$j=$se["fields"][$x];$C=$j["field"];echo"<tr><th>".$b->fieldName($j);$Y=$_POST["fields"][$C];if($Y!=""){if($j["type"]=="enum"){$Y=+$Y;}if($j["type"]=="set"){$Y=array_sum($Y);}}input($j,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];if($_POST&&!$i&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".table($a)."\nDROP ".($w=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]),ME."table=".urlencode($a),'Foreign key has been dropped.');}else{$Ee=array_filter($_POST["source"],'strlen');ksort($Ee);$bf=array();foreach($Ee
as$x=>$X){$bf[$x]=$_POST["target"][$x];}query_redirect("ALTER TABLE ".table($a).($_GET["name"]!=""?"\nDROP ".($w=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$Ee)).") REFERENCES ".table($_POST["table"])." (".implode(", ",array_map('idf_escape',$bf)).")".(ereg("^($pd)\$",$_POST["on_delete"])?" ON DELETE $_POST[on_delete]":"").(ereg("^($pd)\$",$_POST["on_update"])?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($a),($_GET["name"]!=""?'Foreign key has been altered.':'Foreign key has been created.'));$i='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$i";}}page_header('Foreign key',$i,array("table"=>$a),$a);$J=array("table"=>$a,"source"=>array(""));if($_POST){$J=$_POST;ksort($J["source"]);if($_POST["add"]){$J["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$J["target"]=array();}}elseif($_GET["name"]!=""){$m=foreign_keys($a);$J=$m[$_GET["name"]];$J["source"][]="";}$Ee=array_keys(fields($a));$bf=($a===$J["table"]?$Ee:array_keys(fields($J["table"])));$ie=array();foreach(table_status()as$C=>$S){if(fk_support($S)){$ie[]=$C;}}echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo'Target table:
',html_select("table",$ie,$J["table"],"this.form['change-js'].value = '1'; if (!ajaxForm(this.form)) this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th>Source<th>Target</thead>
';$v=0;foreach($J["source"]as$x=>$X){echo"<tr>","<td>".html_select("source[".(+$x)."]",array(-1=>"")+$Ee,$X,($v==count($J["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$x)."]",$bf,$J["target"][$x]);$v++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$pd),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$pd),$J["on_update"]),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$rb=false;if($_POST&&!$i){$C=trim($_POST["name"]);$rb=drop_create("DROP VIEW ".table($a),"CREATE VIEW ".table($C)." AS\n$_POST[select]",($_POST["drop"]?substr(ME,0,-1):ME."table=".urlencode($C)),'View has been dropped.','View has been altered.','View has been created.',$a);}page_header(($a!=""?'Alter view':'Create view'),$i,array("table"=>$a),$a);$J=$_POST;if(!$J&&$a!=""){$J=view($a);$J["name"]=$a;}echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($J["name"]),'" maxlength="64">
<p>';textarea("select",$J["select"]);echo'<p>
';if($rb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$wc=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Je=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$i){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');}elseif(in_array($_POST["INTERVAL_FIELD"],$wc)&&isset($Je[$_POST["STATUS"]])){$we="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".q($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".q($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".q($_POST["ENDS"]):""):"AT ".q($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$we.($aa!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$we)."\n".$Je[$_POST["STATUS"]]." COMMENT ".q($_POST["EVENT_COMMENT"]).rtrim(" DO\n$_POST[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$i);$J=$_POST;if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" maxlength="64">
<tr><th>Start<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th>End<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>Every<td><input name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$wc,$J["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$Je,$J["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$se=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$te=routine_languages();$rb=false;if($_POST&&!$i&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$O=array();$k=(array)$_POST["fields"];ksort($k);foreach($k
as$j){if($j["field"]!=""){$O[]=(ereg("^($tc)\$",$j["inout"])?"$j[inout] ":"").idf_escape($j["field"]).process_type($j,"CHARACTER SET");}}$rb=drop_create("DROP $se ".idf_escape($da),"CREATE $se ".idf_escape(trim($_POST["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"").(in_array($_POST["language"],$te)?" LANGUAGE $_POST[language]":"").rtrim("\n$_POST[definition]",";").";",substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$i);$c=get_vals("SHOW CHARACTER SET");sort($c);$J=array("fields"=>array());if($_POST){$J=$_POST;$J["fields"]=(array)$J["fields"];process_fields($J["fields"]);}elseif($da!=""){$J=routine($da,$se);$J["name"]=$da;}echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($J["name"]),'" maxlength="64">
',($te?'Language'.": ".html_select("language",$te,$J["language"]):""),'<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$c,$se);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$J["returns"],$c);}echo'</table>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}if($rb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$rf=trigger_options();$qf=array("INSERT","UPDATE","DELETE");$rb=false;if($_POST&&!$i&&in_array($_POST["Timing"],$rf["Timing"])&&in_array($_POST["Event"],$qf)&&in_array($_POST["Type"],$rf["Type"])){$gf=" $_POST[Timing] $_POST[Event]";$od=" ON ".table($a);$rb=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]).($w=="pgsql"?$od:""),"CREATE TRIGGER ".idf_escape($_POST["Trigger"]).($w=="mssql"?$od.$gf:$gf.$od).rtrim(" $_POST[Type]\n$_POST[Statement]",";").";",ME."table=".urlencode($a),'Trigger has been dropped.','Trigger has been altered.','Trigger has been created.',$_GET["name"]);}page_header(($_GET["name"]!=""?'Alter trigger'.": ".h($_GET["name"]):'Create trigger'),$i,array("table"=>$a));$J=$_POST;if(!$J){$J=trigger($_GET["name"])+array("Trigger"=>$a."_bi");}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$rf["Timing"],$J["Timing"],"if (/^".preg_quote($a,"/")."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".js_escape($a)."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Event<td>',html_select("Event",$qf,$J["Event"],"this.form['Timing'].onchange();"),'<tr><th>Type<td>',html_select("Type",$rf["Type"],$J["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($J["Trigger"]),'" maxlength="64">
<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}if($rb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["user"])){$fa=$_GET["user"];$ae=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Va){$ae[$Va][$J["Privilege"]]=$J["Comment"];}}$ae["Server Admin"]+=$ae["File access on server"];$ae["Databases"]["Create routine"]=$ae["Procedures"]["Create routine"];unset($ae["Procedures"]["Create routine"]);$ae["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X){$ae["Columns"][$X]=$ae["Tables"][$X];}unset($ae["Server Admin"]["Usage"]);foreach($ae["Tables"]as$x=>$X){unset($ae["Databases"][$x]);}$fd=array();if($_POST){foreach($_POST["objects"]as$x=>$X){$fd[$X]=(array)$fd[$X]+(array)$_POST["grants"][$x];}}$fc=array();$md="";if(isset($_GET["host"])&&($H=$e->query("SHOW GRANTS FOR ".q($fa)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$A)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$A[1],$Oc,PREG_SET_ORDER)){foreach($Oc
as$X){if($X[1]!="USAGE"){$fc["$A[2]$X[2]"][$X[1]]=true;}if(ereg(' WITH GRANT OPTION',$J[0])){$fc["$A[2]$X[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$A)){$md=$A[1];}}}if($_POST&&!$i){$nd=(isset($_GET["host"])?q($fa)."@".q($_GET["host"]):"''");$gd=q($_POST["user"])."@".q($_POST["host"]);$Md=q($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $nd",ME."privileges=",'User has been dropped.');}else{$ab=false;if($nd!=$gd){$ab=queries(($e->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $gd IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $Md");$i=!$ab;}elseif($_POST["pass"]!=$md||!$_POST["hashed"]){queries("SET PASSWORD FOR $gd = ".($_POST["hashed"]?$Md:"PASSWORD($Md)"));}if(!$i){$pe=array();foreach($fd
as$jd=>$p){if(isset($_GET["grant"])){$p=array_filter($p);}$p=array_keys($p);if(isset($_GET["grant"])){$pe=array_diff(array_keys(array_filter($fd[$jd],'strlen')),$p);}elseif($nd==$gd){$ld=array_keys((array)$fc[$jd]);$pe=array_diff($ld,$p);$p=array_diff($p,$ld);unset($fc[$jd]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$jd,$A)&&(!grant("REVOKE",$pe,$A[2]," ON $A[1] FROM $gd")||!grant("GRANT",$p,$A[2]," ON $A[1] TO $gd"))){$i=true;break;}}}if(!$i&&isset($_GET["host"])){if($nd!=$gd){queries("DROP USER $nd");}elseif(!isset($_GET["grant"])){foreach($fc
as$jd=>$pe){if(preg_match('~^(.+)(\\(.*\\))?$~U',$jd,$A)){grant("REVOKE",array_keys($pe),$A[2]," ON $A[1] FROM $gd");}}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$i);if($ab){$e->query("DROP USER $gd");}}}page_header((isset($_GET["host"])?'Username'.": ".h("$fa@$_GET[host]"):'Create user'),$i,array("privileges"=>array('','Privileges')));if($_POST){$J=$_POST;$fc=$fd;}else{$J=$_GET+array("host"=>$e->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$md;if($md!=""){$J["hashed"]=true;}$fc[(DB!=""&&!isset($_GET["host"])?idf_escape(addcslashes(DB,"%_")):"").".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($J["host"]),'">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($J["user"]),'">
<tr><th>Password<td><input id="pass" name="pass" value="',h($J["pass"]),'">
';if(!$J["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$J["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($e->server_info,0,3)."/en/grant.html#priv_level' target='_blank' rel='noreferrer'>".'Privileges'."</a>";$r=0;foreach($fc
as$jd=>$p){echo'<th>'.($jd!="*.*"?"<input name='objects[$r]' value='".h($jd)."' size='10'>":"<input type='hidden' name='objects[$r]' value='*.*' size='10'>*.*");$r++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Va=>$kb){foreach((array)$ae[$Va]as$Zd=>$Pa){echo"<tr".odd()."><td".($kb?">$kb<td":" colspan='2'").' lang="en" title="'.h($Pa).'">'.h($Zd);$r=0;foreach($fc
as$jd=>$p){$C="'grants[$r][".h(strtoupper($Zd))."]'";$Y=$p[strtoupper($Zd)];if($Va=="Server Admin"&&$jd!=(isset($fc["*.*"])?"*.*":".*")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";}else{echo"<td align='center'><input type='checkbox' name=$C value='1'".($Y?" checked":"").($Zd=="All privileges"?" id='grants-$r-all'":($Zd=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$r-all');\"")).">";}$r++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$i){$Ac=0;foreach((array)$_POST["kill"]as$X){if(queries("KILL ".(+$X))){$Ac++;}}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$Ac),$Ac||!$_POST["kill"]);}page_header('Process list',$i);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" class="nowrap checkable">
';$r=-1;foreach(process_list()as$r=>$J){if(!$r){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"")."<th>".implode("<th>",array_keys($J))."</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J["Id"],0):"");foreach($J
as$x=>$X){echo"<td>".(($w=="sql"?$x=="Info"&&$X!="":$x=="current_query"&&$X!="<IDLE>")?"<code class='jush-$w'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'Edit'.'</a>':nbsp($X));}echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($r+1)."/".sprintf('%d in total',$e->result("SELECT @@max_connections")),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$T,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status($a);$u=indexes($a);$k=fields($a);$m=column_foreign_keys($a);if($S["Oid"]=="t"){$u[]=array("type"=>"PRIMARY","columns"=>array("oid"));}parse_str($_COOKIE["adminer_import"],$la);$qe=array();$d=array();$ef=null;foreach($k
as$x=>$j){$C=$b->fieldName($j);if(isset($j["privileges"]["select"])&&$C!=""){$d[$x]=html_entity_decode(strip_tags($C));if(ereg('text|lob',$j["type"])){$ef=$b->selectLengthProcess();}}$qe+=$j["privileges"];}list($M,$q)=$b->selectColumnsProcess($d,$u);$Z=$b->selectSearchProcess($k,$u);$wd=$b->selectOrderProcess($k,$u);$y=$b->selectLimitProcess();$dc=($M?implode(", ",$M):($S["Oid"]=="t"?"oid, ":"")."*")."\nFROM ".table($a);$gc=($q&&count($q)<count($M)?"\nGROUP BY ".implode(", ",$q):"").($wd?"\nORDER BY ".implode(", ",$wd):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$zf=>$J){echo$e->result("SELECT".limit(idf_escape(key($J))." FROM ".table($a)," WHERE ".where_check($zf).($Z?" AND ".implode(" AND ",$Z):"").($wd?" ORDER BY ".implode(", ",$wd):""),1));}exit;}if($_POST&&!$i){$Mf="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$Wd=$Af=null;foreach($u
as$t){if($t["type"]=="PRIMARY"){$Wd=array_flip($t["columns"]);$Af=($M?$Wd:array());break;}}foreach((array)$Af
as$x=>$X){if(in_array(idf_escape($x),$M)){unset($Af[$x]);}}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Af===array()){$Lf=$Z;if(is_array($_POST["check"])){$Lf[]="($Mf)";}$G="SELECT $dc".($Lf?"\nWHERE ".implode(" AND ",$Lf):"").$gc;}else{$xf=array();foreach($_POST["check"]as$X){$xf[]="(SELECT".limit($dc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X).$gc,1).")";}$G=implode(" UNION ALL ",$xf);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$m)){if($_POST["save"]||$_POST["delete"]){$H=true;$ma=0;$G=table($a);$O=array();if(!$_POST["delete"]){foreach($d
as$C=>$X){$X=process_input($k[$C]);if($X!==null){if($_POST["clone"]){$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}elseif($X!==false){$O[]=idf_escape($C)." = $X";}}}$G.=($_POST["clone"]?" (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a):" SET\n".implode(",\n",$O));}if($_POST["delete"]||$O){$Na="UPDATE";if($_POST["delete"]){$Na="DELETE";$G="FROM $G";}if($_POST["clone"]){$Na="INSERT";$G="INTO $G";}if($_POST["all"]||($Af===array()&&$_POST["check"])||count($q)<count($M)){$H=queries($Na." $G".($_POST["all"]?($Z?"\nWHERE ".implode(" AND ",$Z):""):"\nWHERE $Mf"));$ma=$e->affected_rows;}else{foreach((array)$_POST["check"]as$X){$H=queries($Na.limit1($G,"\nWHERE ".where_check($X)));if(!$H){break;}$ma+=$e->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(array('%d item has been affected.','%d items have been affected.'),$ma),$H);}elseif(!$_POST["import"]){if(!$_POST["val"]){$i='Double click on a value to modify it.';}else{$H=true;$ma=0;foreach($_POST["val"]as$zf=>$J){$O=array();foreach($J
as$x=>$X){$x=bracket_escape($x,1);$O[]=idf_escape($x)." = ".(ereg('char|text',$k[$x]["type"])||$X!=""?$b->processInput($k[$x],$X):"NULL");}$G=table($a)." SET ".implode(", ",$O);$Lf=" WHERE ".where_check($zf).($Z?" AND ".implode(" AND ",$Z):"");$H=queries("UPDATE".(count($q)<count($M)?" $G$Lf":limit1($G,$Lf)));if(!$H){break;}$ma+=$e->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ma),$H);}}elseif(is_string($Sb=get_file("csv_file",true))){cookie("adminer_import","output=".urlencode($la["output"])."&format=".urlencode($_POST["separator"]));$H=true;$La=array_keys($k);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Sb,$Oc);$ma=count($Oc[0]);begin();$Ae=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));foreach($Oc[0]as$x=>$X){preg_match_all("~((\"[^\"]*\")+|[^$Ae]*)$Ae~",$X.$Ae,$Pc);if(!$x&&!array_diff($Pc[1],$La)){$La=$Pc[1];$ma--;}else{$O=array();foreach($Pc[1]as$r=>$Ia){$O[idf_escape($La[$r])]=($Ia==""&&$k[$La[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Ia))));}$H=insert_update($a,$O,$Wd);if(!$H){break;}}}if($H){queries("COMMIT");}queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ma),$H);queries("ROLLBACK");}else{$i=upload_error($Sb);}}}$Ue=$b->tableName($S);page_header('Select'.": $Ue",$i);session_write_close();$O=null;if(isset($qe["insert"])){$O="";foreach((array)$_GET["where"]as$X){if(count($m[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!ereg('[_%]',$X["val"])))){$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}}$b->selectLinks($S,$O);if(!$d){echo"<p class='error'>".'Unable to select the table'.($k?".":": ".error())."\n";}else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$d);$b->selectSearchPrint($Z,$d,$u);$b->selectOrderPrint($wd,$d,$u);$b->selectLimitPrint($y);$b->selectLengthPrint($ef);$b->selectActionPrint();echo"</form>\n";$D=$_GET["page"];if($D=="last"){$bc=$e->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));$D=floor(max(0,$bc-1)/$y);}$G="SELECT".limit((+$y&&$q&&count($q)<count($M)&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").$dc,($Z?"\nWHERE ".implode(" AND ",$Z):"").$gc,($y!=""?+$y:null),($D?$y*$D:0),"\n");echo$b->selectQuery($G);$H=$e->query($G);if(!$H){echo"<p class='error'>".error()."\n";}else{if($w=="mssql"){$H->seek($y*$D);}$zb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($D&&$w=="oracle"){unset($J["RNUM"]);}$K[]=$J;}if($_GET["page"]!="last"){$bc=(+$y&&$q&&count($q)<count($M)?($w=="sql"?$e->result(" SELECT FOUND_ROWS()"):$e->result("SELECT COUNT(*) FROM ($G) x")):count($K));}if(!$K){echo"<p class='message'>".'No rows.'."\n";}else{$ya=$b->backwardKeys($a,$Ue);echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$q&&$M?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'edit'."</a>");$ed=array();$o=array();reset($M);$fe=1;foreach($K[0]as$x=>$X){if($S["Oid"]!="t"||$x!="oid"){$X=$_GET["columns"][key($M)];$j=$k[$M?($X?$X["col"]:current($M)):$x];$C=($j?$b->fieldName($j,$fe):"*");if($C!=""){$fe++;$ed[$x]=$C;$Ma=idf_escape($x);echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x).($wd[0]==$Ma||$wd[0]==$x||(!$wd&&count($q)<count($M)&&$q[0]==$Ma)?'&desc%5B0%5D=1':'')).'">'.(!$M||$X?apply_sql_function($X["fun"],$C):h(current($M)))."</a>";}$o[$x]=$X["fun"];next($M);}}$Kc=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$x=>$X){$Kc[$x]=max($Kc[$x],min(40,strlen(utf8_decode($X))));}}}echo($ya?"<th>".'Relations':"")."</thead>\n";foreach($b->rowDescriptions($K,$m)as$B=>$J){$yf=unique_array($K[$B],$u);$zf="";foreach($yf
as$x=>$X){$zf.="&".(isset($X)?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$q&&$M?"":"<td>".checkbox("check[]",substr($zf,1),in_array(substr($zf,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($q)<count($M)||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$zf)."'>".'edit'."</a>"));foreach($J
as$x=>$X){if(isset($ed[$x])){$j=$k[$x];if($X!=""&&(!isset($zb[$x])||$zb[$x]!="")){$zb[$x]=(is_mail($X)?$ed[$x]:"");}$z="";$X=$b->editVal($X,$j);if(!isset($X)){$X="<i>NULL</i>";}else{if(ereg('blob|bytea|raw|file',$j["type"])&&$X!=""){$z=h(ME.'download='.urlencode($a).'&field='.urlencode($x).$zf);}if($X===""){$X="&nbsp;";}elseif($ef!=""&&ereg('text|blob',$j["type"])&&is_utf8($X)){$X=shorten_utf8($X,max(0,+$ef));}else{$X=h($X);}if(!$z){foreach((array)$m[$x]as$l){if(count($m[$x])==1||end($l["source"])==$x){$z="";foreach($l["source"]as$r=>$Ee){$z.=where_link($r,$l["target"][$r],$K[$B][$Ee]);}$z=h(($l["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($l["db"]),ME):ME).'select='.urlencode($l["table"]).$z);if(count($l["source"])==1){break;}}}}if($x=="COUNT(*)"){$z=h(ME."select=".urlencode($a));$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$yf)){$z.=h(where_link($r++,$W["col"],$W["val"],$W["op"]));}}foreach($yf
as$_c=>$W){$z.=h(where_link($r++,$_c,$W));}}}if(!$z){if(is_mail($X)){$z="mailto:$X";}if($de=is_url($J[$x])){$z=($de=="http"&&$ba?$J[$x]:"$de://www.adminer.org/redirect/?url=".urlencode($J[$x]));}}$s=h("val[$zf][".bracket_escape($x)."]");$Y=$_POST["val"][$zf][bracket_escape($x)];$ic=h(isset($Y)?$Y:$J[$x]);$Nc=strpos($X,"<i>...</i>");$wb=is_utf8($X)&&$K[$B][$x]==$J[$x]&&!$o[$x];$df=ereg('text|lob',$j["type"]);echo(($_GET["modify"]&&$wb)||isset($Y)?"<td>".($df?"<textarea name='$s' cols='30' rows='".(substr_count($J[$x],"\n")+1)."'>$ic</textarea>":"<input name='$s' value='$ic' size='$Kc[$x]'>"):"<td id='$s' ondblclick=\"".($wb?"selectDblClick(this, event".($Nc?", 2":($df?", 1":"")).")":"alert('".h('Use edit link to modify this value.')."')").";\">".$b->selectVal($X,$z,$j));}}if($ya){echo"<td>";}$b->backwardKeysPrint($ya,$K[$B]);echo"</tr>\n";}echo"</table>\n",(!$q&&$M?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($K||$D){$Hb=true;if($_GET["page"]!="last"&&+$y&&count($q)>=count($M)&&($bc>=$y||$D)){$bc=found_rows($S,$Z);if($bc<max(1e4,2*($D+1)*$y)){ob_flush();flush();$bc=$e->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));}else{$Hb=false;}}echo"<p class='pages'>";if(+$y&&$bc>$y){$Rc=floor(($bc-1)/$y);echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Page'."', '".($D+1)."'), event); return false;\">".'Page'."</a>:",pagination(0,$D).($D>5?" ...":"");for($r=max(1,$D-4);$r<min($Rc,$D+5);$r++){echo
pagination($r,$D);}echo($D+5<$Rc?" ...":"").($Hb?pagination($Rc,$D):' <a href="'.h(remove_from_uri()."&page=last").'">'.'last'."</a>");}echo" (".($Hb?"":"~ ").lang(array('%d row','%d rows'),$bc).") ".checkbox("all",1,0,'whole result')."\n";if($b->selectCommandPrint()){echo'<fieldset><legend>Edit</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Double click on a value to modify it.'.'" class="jsonly"');?>>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure? (' + (this.form['all'].checked ? <?php echo$bc,' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';}$Zb=$b->dumpFormat();if($Zb){print_fieldset("export",'Export');$Dd=$b->dumpOutput();echo($Dd?html_select("output",$Dd,$la["output"])." ":""),html_select("format",$Zb,$la["format"])," <input type='submit' name='export' value='".'Export'."' onclick='eventStop(event);'>\n","</div></fieldset>\n";}}if($b->selectImportPrint()){print_fieldset("import",'Import',!$K);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$la["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","<input type='hidden' name='token' value='$T'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($zb,'strlen'),$d);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$Ie=isset($_GET["status"]);page_header($Ie?'Status':'Variables');$Gf=($Ie?show_status():show_variables());if(!$Gf){echo"<p class='message'>".'No rows.'."\n";}else{echo"<table cellspacing='0'>\n";foreach($Gf
as$x=>$X){echo"<tr>","<th><code class='jush-".$w.($Ie?"status":"set")."'>".h($x)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Re=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$S){$s=js_escape($S["Name"]);json_row("Comment-$s",nbsp($S["Comment"]));if(!is_view($S)){foreach(array("Engine","Collation")as$x){json_row("$x-$s",nbsp($S[$x]));}foreach($Re+array("Auto_increment"=>0,"Rows"=>0)as$x=>$X){if($S[$x]!=""){$X=number_format($S[$x],0,'.',',');json_row("$x-$s",($x=="Rows"&&$S["Engine"]=="InnoDB"&&$X?"~ $X":$X));if(isset($Re[$x])){$Re[$x]+=($S["Engine"]!="InnoDB"||$x!="Data_free"?$S[$x]:0);}}elseif(array_key_exists($x,$S)){json_row("$x-$s");}}}}foreach($Re
as$x=>$X){json_row("sum-$x",number_format($X,0,'.',','));}json_row("");}else{foreach(count_tables($b->databases())as$h=>$X){json_row("tables-".js_escape($h),$X);}json_row("");}exit;}else{$af=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($af&&!$i&&!$_POST["search"]){$H=true;$Vc="";if($w=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"])){queries("SET foreign_key_checks = 0");}if($_POST["truncate"]){if($_POST["tables"]){$H=truncate_tables($_POST["tables"]);}$Vc='Tables have been truncated.';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Vc='Tables have been moved.';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Vc='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"]){$H=drop_views($_POST["views"]);}if($H&&$_POST["tables"]){$H=drop_tables($_POST["tables"]);}$Vc='Tables have been dropped.';}elseif($w!="sql"){$H=($w=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Vc='Tables have been optimized.';}elseif($_POST["tables"]&&($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"]))))){while($J=$H->fetch_assoc()){$Vc.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}}queries_redirect(substr(ME,0,-1),$Vc,$H);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$i,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3>".'Tables and views'."</h3>\n";$Ze=tables_list();if(!$Ze){echo"<p class='message'>".'No tables.'."\n";}else{echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Search'."'>\n";if($_POST["search"]&&$_POST["query"]!=""){search_tables();}echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">','<th>'.'Table','<td>'.'Engine','<td>'.'Collation','<td>'.'Data Length','<td>'.'Index Length','<td>'.'Data Free','<td>'.'Auto Increment','<td>'.'Rows',(support("comment")?'<td>'.'Comment':''),"</thead>\n";foreach($Ze
as$C=>$U){$Hf=(isset($U)&&!eregi("table",$U));echo'<tr'.odd().'><td>'.checkbox(($Hf?"views[]":"tables[]"),$C,in_array($C,$af,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($C).'" title="'.'Show structure'.'">'.h($C).'</a>';if($Hf){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.'Alter view'.'">'.'View'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$x=>$z){echo($z?"<td align='right'><a href='".h(ME."$z[0]=").urlencode($C)."' id='$x-".h($C)."' title='$z[1]'>?</a>":"<td id='$x-".h($C)."'>&nbsp;");}}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('%d in total',count($Ze)),"<td>".nbsp($w=="sql"?$e->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$x){echo"<td align='right' id='sum-$x'>&nbsp;";}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n";if(!information_schema(DB)){echo"<p>".(ereg('^(sql|sqlite|pgsql)$',$w)?($w!="sqlite"?"<input type='submit' value='".'Analyze'."'> ":"")."<input type='submit' name='optimize' value='".'Optimize'."'> ":"").($w=="sql"?"<input type='submit' name='check' value='".'Check'."'> <input type='submit' name='repair' value='".'Repair'."'> ":"")."<input type='submit' name='truncate' value='".'Truncate'."'".confirm("formChecked(this, /tables/)")."> <input type='submit' name='drop' value='".'Drop'."'".confirm("formChecked(this, /tables|views/)",1).">\n";$g=(support("scheme")?schemas():$b->databases());if(count($g)!=1&&$w!="sqlite"){$h=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($g?html_select("target",$g,$h):'<input name="target" value="'.h($h).'">')," <input type='submit' name='move' value='".'Move'."' onclick='eventStop(event);'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."' onclick='eventStop(event);'>":""),"\n";}echo"<input type='hidden' name='token' value='$T'>\n";}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.'Create table'."</a>\n";if(support("view")){echo'<a href="'.h(ME).'view=">'.'Create view'."</a>\n";}if(support("routine")){echo"<h3>".'Routines'."</h3>\n";$ue=routines();if($ue){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td>&nbsp;</thead>\n";odd('');foreach($ue
as$J){echo'<tr'.odd().'>','<th><a href="'.h(ME).($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["ROUTINE_NAME"]).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["ROUTINE_NAME"]).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p>'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a> ':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("event")){echo"<h3>".'Events'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."</thead>\n";foreach($K
as$J){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.h($J["Name"])."</a>","<td>".($J["Execute at"]?'At given time'."<td>".$J["Execute at"]:'Every'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]";}echo"</table>\n";}echo'<p><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Ze){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}}page_footer();