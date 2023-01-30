<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>



	

<div style="margin-top: 50px">
	<div class="breacrumb-section">
		<div class="container">
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="orderdetails()">ORDER DETAILS</button>
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;"onclick="profiledetails()">PROFILE DETAILS</button> 
		</div>
	</div>
</div>

<div id="profile">
<section class="contact-section spad">
    <div class="container">
		<div class="contact-title">
			<h4>My Profile</h4>
		</div>
        <div class="row">
            <div class="col-lg-6">
                
                <div class="contact-widget">
                    <div class="cw-item">
						<div class="ci-text">
							<span>User Name:</span>
							<p id="username"></p>
						</div><br>
						<div class="ci-text">
							<span>Name:</span>
							<p>First name: <input  type="text" id="name_first"></p>
							<p>Last name: <input type="text" id="name_last"></p>
						</div><br>
						<div class="ci-text">
							<span>NIC:</span>
							<p id="nic"></p>
						</div><br>
						<div class="ci-text">
							<span>Telephone:</span>
							<p><input type="text" id="tp"></p>
						</div><br>
					
						<div class="ci-text">
							<span>Address:</span>
							<p><input type="text" id="address_no"></p>
							<p><input type="text" id="address_street"></p>
							<p><input type="text" id="address_town"></p>
						</div><br>
						
						<div class="ci-text">
							<span>Country:</span>
							<p id="country"></p>
						</div><br>
						<div class="ci-text">
							<span>Email:</span>
							<p id="email"></p>
						</div><br>
						<div class="ci-text">
							<p style="color: red" id="updatedstatus"></p>
						</div><br>
						<div class="ci-text">
							<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #e7ab3c;margin-left: 30px;" onclick="updateuser()">Save</button> 
							<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #b3000f;margin-left: 30px;" onclick="deleteuser()">Delete Account</button>
						</div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>







<div id="orders">
	



	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Order Details</h4>
			</div>
		</div>
	
<div style="display: flex; justify-content: center; align-items: center">
	<div class="product-tab">
		<div class="tab-item">
			<ul class="nav" role="tablist">
				<li>
					<a class="active" data-toggle="tab" href="#tab-1" role="tab" onclick="neworders()">New</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-2" role="tab" onclick="shipped()">SHIPPED</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-3" role="tab" onclick="received()">Complete</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-4" role="tab" onclick="canceled()">CANCELED</a>
				</li>
			</ul>
		</div>
	</div>	
</div>		
	
<section class="shopping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 id="caption"></h4>
				<div class="cart-table">
					<table id="show">
					</table>
				</div>
				
			</div>
		</div>
	</div>
</section>
		
</div>

<script>
	$(document).ready(neworders);
	var status='';
	function neworders(){
		status="pending";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='shiporder("+ obj[key]["orderid"] +")'>SHIP</a>"+"</td>";
                            show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}

 
	function shipped(){
		status="shipped";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							
                            show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}


	function received(){
		status="received";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
							
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}
	
	
	function canceled(){
		status="canceled";
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th class='p-name'>Product Details</th>";
				show += "<th class='p-name'>Customer Details</th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["orderid"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["productdetails"] +"</h5>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["shippingdetails"] +"</h5>";
							show += "</td>";
                            
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("New Orders");
			}
		})
		return false;
	}
	
	
	
	
	function cancelorder(orderid) {
		var operation="cancel";
		var orderid = orderid;
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(neworders);
				
			}
		})
		return false;
	}
	
    

	
	function shiporder(orderid) {
		var operation="ship";
		var orderid = orderid;
		$.ajax({
			url: "../DAO/ordersmanageDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(neworders);
				
			}
		})
		return false;
	}
	

	
	$(document).ready(user);
	function user() {
		$.ajax({
			url: "../DAO/userDAO.php",
			
			dataType:"JSON",
			success:function(data){
				$('#username').html(data.username);
				$('#nic').html(data.nic);
				$('#country').html(data.user_country);
				$('#email').html(data.email);
				
				
				document.getElementById("name_first").value =(data.name_first);
				document.getElementById("name_last").value = (data.name_last);
				document.getElementById("address_no").value = (data.address_no);
				document.getElementById("address_street").value = (data.address_street);
				document.getElementById("address_town").value = (data.address_town);
				document.getElementById("tp").value = (data.tp);
			}
		})
		return false;
	}
	
	function updateuser() {
		var fname = document.getElementById("name_first").value ;
		var lname = document.getElementById("name_last").value;
		var adrno = document.getElementById("address_no").value;
		var adrstreet = document.getElementById("address_street").value;
		var adrtown = document.getElementById("address_town").value;
		var tpno = document.getElementById("tp").value;
		$.ajax({
			url: "../DAO/userDAO.php",
			data: {
				fname: fname,
				lname: lname,
				adrno: adrno,
				adrstreet: adrstreet,
				adrtown: adrtown,
				tpno: tpno
			},
			success:function(data){
				$(document).ready(user);
				$("#updatedstatus").html('Updated successful!');
				
			}
		})
		return false;
	}
	
	function deleteuser() {
		if (confirm("Are You sure to delete your account!")) {
			window.location.href = "index.php";
			$.ajax({
				url: "../DAO/userDAO.php",
				data: {
					deleteuser: deleteuser
				},
				success:function(data){
					//window.location.href = "index.php";
					
				}
			})
			return false;
		}
	}
	 
</script>

<script>
document.getElementById("orders").style.display = "block";
document.getElementById("profile").style.display = "none";


function orderdetails() {
	document.getElementById("profile").style.display = "none";
 	document.getElementById("orders").style.display = "block";
}
function profiledetails() {
  	document.getElementById("profile").style.display = "block";
 	document.getElementById("orders").style.display = "none";
}
</script>