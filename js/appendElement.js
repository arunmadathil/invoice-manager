var increment=0;
window.saveInputs = function ()
{
return  true;
}

function date()
{
		 if(document.getElementById("userIdType").value =="")
		 {
		 document.getElementById("userIdType").className = document.getElementById("userIdType").className + "error";
		 }

}
function removeElement(divId)
{
	var mainDiv = document.getElementById("inputFields");
	increment--;
	var getdivId = document.getElementById("divId");
	sessionStorage.setItem('count', increment);
	mainDiv.removeChild(divId);
	findTotal();
}
function addElements()
{	
		increment++;	
		var divClass = document.createElement("div");
		divClass.setAttribute("id","divId"+increment);
		divClass.style.margin ="10px 0 0 0";
		divClass.style.display ="inline-block";
		var parentDiv = document.getElementById('inputFields');
		divClass.innerHTML = "<div class='col-md-5 form-group' ><input type='text' class='form-control' id = 'textId"+increment+"' name = 'itemName[]' value = '' placeholder='Add items.' /></div>" +
		"<div class='col-md-2 form-group' ><input type='text' min='0'class='form-control' id = 'priceId"+increment+"' name = 'itemPrice[]' value = '' onkeyup ='findTotal()' placeholder='0.00' required/> </div>"+
		"<div class='col-md-2 form-group' ><input type='text' min='1' class='form-control' id = 'quaId"+increment+"' name = 'itemQua[]' onkeyup ='findTotal()'value = '' placeholder='0' required/> </div>"+
		"<div class='col-md-2 form-group' ><input type='text' min='1' class='form-control' id = 'disId"+increment+"' onkeyup ='findTotal()' name = 'itemDis[]' value = '' placeholder='0.00%' required/> </div>"+
		"<div class=' col-md-1 form-group'><button type='button' class ='btn btn-danger' onclick='removeElement(divId"+increment+")'>-</button></div>";
		parentDiv.appendChild(divClass);
		parentDiv.insertBefore(divClass,document.getElementById('formSubmit'));
		sessionStorage.setItem('count', increment);
}
function findTotal()
{
	var count=0;
	var discount =0;
	var discountTotal = 0;
	var myForm = document.getElementById('myForm');
	var getPrice = myForm.elements['itemPrice[]'];
	var getQuantity  = myForm.elements['itemQua[]'];
	var getDis  = myForm.elements['itemDis[]'];
	var price = document.getElementById("itemprice").value;
	var tax = document.getElementById("tax").value;
	
	discountTotal = ((price*document.getElementById("itemQua").value) /100 )*document.getElementById("itemDis").value;
	var sum1 =  price * document.getElementById("itemQua").value;
	(getPrice.length ===undefined) ?  count =1 : count = getPrice.length;
	var sum =0;
	for(var ind=1;ind <count;ind++)
	{
		sum = sum +(getPrice[ind].value * getQuantity[ind].value);
		discount = discount+((getPrice[ind].value*getQuantity[ind].value)/100)*getDis[ind].value;
	}	
	discountTotal = discount+discountTotal;
	sum = sum+sum1;
	var sub = sum-discountTotal;
	isNaN(sum)? document.getElementById('sum').value = "N/A" : document.getElementById('sum').value =sum.toFixed(2);
	isNaN(sub )? document.getElementById('subt').value = "N/A" : document.getElementById('subt').value =(sub ).toFixed(2);
	isNaN(discountTotal)? document.getElementById('disc').value = "N/A" : document.getElementById('disc').value =(discountTotal).toFixed(2);
	var grand = sub +(sub/100)*tax; 
	isNaN(discountTotal)? document.getElementById('grandt').innerHTML = "N/A" : document.getElementById('grandt').innerHTML =(grand).toFixed(2);
}
