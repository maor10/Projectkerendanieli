/*
How To Use :

first argument should be a string to be put as the modal title

divBuildFunction should be a function that takes 1 argument : the div modal body element. The function should build the div to be displayed as the modal body. Example :
showModal('title',function(myDiv) {
	var table = document.createElement("table");
	var tr1 = document.createElement("tr");
	var td1 = document.createElement("td");
	td1.innerHTML="<b>Email Type : </b> " + type;
	var td2 = document.createElement("td");
	td2.innerHTML="<b>Campaign Name : </b> " + em["Name"];
	var td3 = document.createElement("td");
	td3.innerHTML="<b>Sent By : </b> " + em["UserName"];
	var td4 = document.createElement("td");
	td4.innerHTML="<b>Date Sent : </b> " + em["DateSent"].substring(0,10);
	tr1.appendChild(td1);
	tr1.appendChild(td2);
	tr1.appendChild(td3);
	tr1.appendChild(td4);
	var tr2 = document.createElement("tr");
	var td5 = document.createElement("td");
	td5.setAttribute("colspan","4");
	td5.innerHTML=em["Body"];
	tr2.appendChild(td5);
	tr1.style.borderBottom="1px solid #E5E5E5";
	tr2.style.borderBottom="1px solid #E5E5E5";
	table.appendChild(tr1);
	table.appendChild(tr2);
	myDiv.appendChild(table);
}, ...);

Similarly, buttonBuildFunction is a function that takes 1 argument which is the div containing the buttons, to be used to add any other buttons to the modal. Example :
showModal('title',...,function(myDiv) {
	var bt2 = document.createElement("button");
	bt2.setAttribute('class',"btn btn-primary");
	bt2.innerHTML="Alert!";
	bt2.onclick = function() { alert('hi there!'); };
	myDiv.appendChild(bt2);
});
*/
function showModal(title,divBuildFunction,buttonBuildFunction) {
				var b = document.getElementsByTagName("body")[0];
				$("#ddialog").remove();
				var d1 = document.createElement("div");
				d1.setAttribute('class',"modal fade bs-example-modal-lg");
				d1.setAttribute('role','dialog');
				d1.setAttribute('id','ddialog');
				d1.setAttribute('aria-hidden','true');
				d1.setAttribute('tabindex','-1');
				var d2 = document.createElement("div");
				d2.setAttribute('class',"modal-dialog modal-lg");
				var d3 = document.createElement("div");
				d3.setAttribute('class',"modal-content");
				var d4_1 = document.createElement("div");
				d4_1.setAttribute('class',"modal-header");
				var bt = document.createElement("button");
				bt.setAttribute('class',"close");
				bt.setAttribute('data-dismiss',"modal");
				bt.innerHTML='<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
				var h4 = document.createElement("h4");
				h4.setAttribute("class","modal-title");
				h4.innerHTML=title;
				d4_1.appendChild(bt);
				d4_1.appendChild(h4);
				d4_1.style.borderTopLeftRadius="6px";
				d4_1.style.borderTopRightRadius="6px";
				d4_1.style.backgroundColor="#F5F5F5";
				var d4_2 = document.createElement("div");
				d4_2.setAttribute('class',"modal-body");
				divBuildFunction(d4_2);
				var d4_3 = document.createElement("div");
				d4_3.setAttribute('class',"modal-footer");
				var bt1 = document.createElement("button");
				bt1.setAttribute('class',"btn btn-default");
				bt1.setAttribute('data-dismiss',"modal");
				bt1.innerHTML="Close";
				d4_3.appendChild(bt1);
				buttonBuildFunction(d4_3);
				d3.appendChild(d4_1);
				d3.appendChild(d4_2);
				d3.appendChild(d4_3);
				d2.appendChild(d3);
				d1.appendChild(d2);
				b.appendChild(d1);
				$('#ddialog').modal('show');
}

function showModalWithoutCloseButton(title,divBuildFunction,buttonBuildFunction) {
				var b = document.getElementsByTagName("body")[0];
				$("#ddialog").remove();
				var d1 = document.createElement("div");
				d1.setAttribute('class',"modal fade bs-example-modal-lg");
				d1.setAttribute('role','dialog');
				d1.setAttribute('id','ddialog');
				d1.setAttribute('aria-hidden','true');
				d1.setAttribute('tabindex','-1');
				var d2 = document.createElement("div");
				d2.setAttribute('class',"modal-dialog modal-lg");
				var d3 = document.createElement("div");
				d3.setAttribute('class',"modal-content");
				var d4_1 = document.createElement("div");
				d4_1.setAttribute('class',"modal-header");
				var bt = document.createElement("button");
				bt.setAttribute('class',"close");
				bt.setAttribute('data-dismiss',"modal");
				bt.innerHTML='<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
				var h4 = document.createElement("h4");
				h4.setAttribute("class","modal-title");
				h4.innerHTML=title;
				d4_1.appendChild(bt);
				d4_1.appendChild(h4);
				d4_1.style.borderTopLeftRadius="6px";
				d4_1.style.borderTopRightRadius="6px";
				d4_1.style.backgroundColor="#F5F5F5";
				var d4_2 = document.createElement("div");
				d4_2.setAttribute('class',"modal-body");
				divBuildFunction(d4_2);
				var d4_3 = document.createElement("div");
				d4_3.setAttribute('class',"modal-footer");
				buttonBuildFunction(d4_3);
				d3.appendChild(d4_1);
				d3.appendChild(d4_2);
				d3.appendChild(d4_3);
				d2.appendChild(d3);
				d1.appendChild(d2);
				b.appendChild(d1);
				$('#ddialog').modal('show');
}