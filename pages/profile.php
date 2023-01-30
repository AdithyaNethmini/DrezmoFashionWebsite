<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <span>My Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>

	

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
	
<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
	<div class='modal-dialog modal-dialog-centered' role='document'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLongTitle'>Customer Feedback</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<textarea id='comment' rows='4' cols='50'>My opinion about this product</textarea><br>
				I give <input type='number' id='rate' min='1' max='5' value='1' style='width: 2em;'> &nbsp;&nbsp;/5 rate for this product.
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button type='button' class='btn btn-primary' onclick="feedback()" data-dismiss='modal'>Publish</button>
			</div>
		</div>
	</div>
</div>


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
					<a class="active" data-toggle="tab" href="#tab-1" role="tab" onclick="pending()">PENDING</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-2" role="tab" onclick="shipped()">SHIPPED</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-3" role="tab" onclick="received()">RECEIVED</a>
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
	$(document).ready(pending);
	var status='';
	function pending(){
		status="pending";
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='cancelorder("+ obj[key]["orderid"] +")'>CANCEL</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Pending Orders");
			}
		})
		return false;
	}


	function shipped(){
		status="shipped";
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='receiveorder("+ obj[key]["orderid"] +")'>RECEIVED</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Shipped Orders");
			}
		})
		return false;
	}


	function received(){
		status="received";
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							//show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' data-toggle='modal' data-target='#exampleModalCenter'>Feedback</a>"+"</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' data-toggle='modal' data-target='#exampleModalCenter' onclick='proid("+ obj[key]["proid"] +")'>Feedback</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Received Orders");
			}
		})
		return false;
	}
	
	
	function canceled(){
		status="canceled";
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				status: status
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>Order ID</th>";
				show += "<th>Image</th>";
				show += "<th class='p-name'>Details</th>";
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
							show += "<td class='cart-pic first-row'>";
								show += "<img src='img/products/"+ obj[key]["image"] +"' width='100'>";
							show += "</td>";
							show += "<td class='cart-title first-row'>";
								show += "<h5>"+ obj[key]["details"] +"</h5>";
							show += "</td>";
							show += "<td class='p-price first-row proceed-checkout'>" + "<a href='#' class='proceed-btn' onclick='deleteorder("+ obj[key]["orderid"] +")'>DELETE</a>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Canceled Orders");
			}
		})
		return false;
	}
	
	
	
	
	function cancelorder(orderid) {
		var operation="cancel";
		var orderid = orderid;
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(pending);
				
			}
		})
		return false;
	}
	
	function deleteorder(orderid) {
		var operation="delete";
		var orderid = orderid;
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(canceled);
				
			}
		})
		return false;
	}
	
	function receiveorder(orderid) {
		var operation="received";
		var orderid = orderid;
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				orderid: orderid,
				operation: operation
			},
			success:function(data){
				$(document).ready(shipped);
				
			}
		})
		return false;
	}
	
	
	var productid=0;
	function proid(proid){
		productid = proid;
	}	
		
	function feedback(){	
		var comment= document.getElementById("comment").value;
		var rate= document.getElementById("rate").value;
		
		
		$.ajax({
			url: "DAO/profileDAO.php",
			data: {
				comment: comment,
				rate: rate,
				productid:productid
			},
			success:function(data){
				$(document).ready(received);
				
			}
		})
		return false;
	}
	
	
	$(document).ready(user);
	function user() {
		$.ajax({
			url: "DAO/userDAO.php",
			
			dataType:"JSON",
			success:function(data){
				$('#username').html(data.username);
				$('#nic').html(data.nic);
				$('#country').html(data.user_country);
				$('#email').html(data.email);
				//$('#name_first').html(data.name_first);
				//$('#name_last').html(data.name_last);
				//$('#address_no').html(data.address_no);
				//$('#address_street').html(data.address_street);
				//$('#address_town').html(data.address_town);
				//$('#tp').html(data.tp);
				
				
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
			url: "DAO/userDAO.php",
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
				url: "DAO/userDAO.php",
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