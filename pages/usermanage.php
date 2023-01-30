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
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;" onclick="users()">Users</button>
			<button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;"onclick="addmembers()">Add Admin / Staff Member</button> 
		</div>
	</div>
</div>

<div id="profile">
<section class="contact-section spad">
    <div class="container">
		<div class="contact-title">
			<h4>Add Admin / Staff Member</h4>
		</div>
        
            
                
						<!-- Register Section Begin -->
				<div class="register-login-section spad">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 offset-lg-3">
								<div class="register-form">
									<h2>Register</h2>
									<form method="POST">
										<div class="group-input">
											<label for="fname">First Name *</label>
											<input type="text" id="fname" required>
										</div>
										<div class="group-input">
											<label for="lname">Last Name *</label>
											<input type="text" id="lname" required>
										</div>
										<div class="group-input">
											<label for="username">User Name *</label>
											<input type="text" id="username" required>
										</div>
										<div class="group-input">
											<label for="password">Password *</label>
											<input type="password" id="password" required>
										</div>
										<div class="group-input">
											<label for="password">Confirm Password *</label>
											<input type="password" id="password2" required>
										</div>
										<div class="group-input">
											<label for="nic">NIC *</label>
											<input type="text" id="nic" required>
										</div>
										<div class="group-input">
											<label for="username">Address no. *</label>
											<input type="text" id="adno" required>
										</div>
										<div class="group-input">
											<label for="username">Street *</label>
											<input type="text" id="adstreet" required>
										</div>
										<div class="group-input">
											<label for="username">Town *</label>
											<input type="text" id="adtown" required>
										</div>
										<div class="group-input">
											<label for="username">Telephone *</label>
											<input type="text" id="telephone" required>
										</div>
										<div class="group-input">
											<label for="username">Email *</label>
											<input type="text" id="email" required>
										</div>
										<div class="group-input">
											<label for="username">Type</label>
											<select  id="type">
												<option value="staff">Staff Member</option>
												<option value="admin">Admin</option>
											</select>
										</div>
										
										<button class="site-btn register-btn" id="register">Register</button>
										<!-- <input type="button"  class="site-btn register-btn" id="register" value="register"> -->
										<div class="group-input">
										<input type="reset" value="Clear" style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;">
										
										</div>
										<div class="group-input">
											<label style="color: red" id="status"></label>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Register Form Section End -->
            
        
    </div>
</section>

</div>







<div id="users">
	
<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
	<div class='modal-dialog modal-dialog-centered' role='document'>
		<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLongTitle'>User Details</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
				<section class="contact-section spad">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="contact-widget">
										<div class="ci-text">
											<span>User Name:</span>
											<p id="username">s</p>
										</div><br>
										<div class="ci-text">
											<span>Name:</span>
											<p>First name: <input  type="text" id="name_first"></p>
											<p>Last name: <input type="text" id="name_last"></p>
										</div><br>
										<div class="ci-text">
											<span>NIC:</span>
											<p id="nic">s</p>
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
											<p id="country">s</p>
										</div><br>
										<div class="ci-text">
											<span>Email:</span>
											<p id="email">s</p>
										</div><br>
										<div class="ci-text">
											<p style="color: red" id="updatedstatus"></p>
										</div><br>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button type='button' class='btn btn-primary' onclick="feedback()" data-dismiss='modal'>Save</button>
			</div>
		</div>
	</div>
</div>


	<section class="contact-section spad">
		<div class="container">
			<div class="contact-title">
				<h4>Users</h4>
			</div>
		</div>
	
<div style="display: flex; justify-content: center; align-items: center">
	<div class="product-tab">
		<div class="tab-item">
			<ul class="nav" role="tablist">
				<li>
					<a class="active" data-toggle="tab" href="#tab-1" role="tab" onclick="getusers('customer')">Customers</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-2" role="tab" onclick="getusers('admin')">Admin</a>
				</li>
				<li>
					<a data-toggle="tab" href="#tab-3" role="tab" onclick="getusers('staff')">Staff</a>
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

	var customer="customer";
	var admin="admin";
	var staff="staff";

	$(document).ready(getusers('customer'));
	
	function getusers(type){
		$.ajax({
			url: "../DAO/usermanageDAO.php",
			data: {
				type: type
			},
			dataType:"JSON",
			success:function(obj){
				
				var show="";
				show += "<thead>";
                show += "<tr>";
				show += "<th>User ID</th>";
				show += "<th>Name</th>";
				show += "<th>Telephone</th>";
				show += "<th>Email</th>";
				show += "<th></th>";
				show += "<th></th>";
				show += "</tr>";
				show += "</thead>";
				show += "<tbody>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
					  
						show += "<tr>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["userid"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["name"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["tp"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>";
								show += "<h5>"+ obj[key]["email"] +"</h5>";
							show += "</td>";
							show += "<td class='qua-col first-row'>" + "<button style='border: none;color: white;padding: 15px 32px;text-align: center;background-color: #555555;' data-toggle='modal' data-target='#exampleModalCenter' onclick='viewuser("+ obj[key]["userid"] +")'>VIEW</button>"+"</td>";
							show += "<td class='qua-col first-row '>" + "<button style='border: none;color: white;padding: 15px 32px;text-align: center;background-color: red;' onclick='deleteuser("+ obj[key]["userid"] + ","+ obj[key]["type"] + ")'>DELETE</button>"+"</td>";
						show += "</tr>";
						
					}
				}
				show += "</tbody>";
				$("#show").html(show);
				$("#caption").html("Customers");
			}
		})
		return false;
	}


	
	
	
	function viewuser(id) {
		$.ajax({
			url: "../DAO/userDAO.php",
			data: {
				id: id
			},
			dataType:"JSON",
			success:function(data){
				document.getElementById("username").value =(data.username);
				document.getElementById("nic").value =(data.nic);
				document.getElementById("user_country").value =(data.user_country);
				document.getElementById("email").value =(data.email);
				
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
	

	
	function deleteuser(userid,type){
		var deleteuser=true;
		$.ajax({
			url: "../DAO/usermanageDAO.php",
			data: {
				deleteuser: deleteuser,
				userid: userid
			},
			success:function(data){
				if(type=="customer"){
					$(document).ready(getusers(type));
				}else if(type=="admin"){
					$(document).ready(getusers(type));
				}else{
					$(document).ready(getusers(type));
				}		
			}
		})
		return false;
		
	}
	
</script>

<script >
	$("#register").click(function(){
		var fname= $("#fname").val();
		var lname= $("#lname").val();
		var username= $("#username").val();
		var password= $("#password").val();
		var adno= $("#adno").val();
		var adstreet= $("#adstreet").val();
		var adtown= $("#adtown").val();
		var telephone= $("#telephone").val();
		var email= $("#email").val();
		var nic= $("#nic").val();
		var type= $("#type").val();
		console.log(fname); 
		$.ajax({
			url: "../DAO/registerDAO.php",
			data: {
				fname: fname,
				lname: lname,
				username: username,
				password: password,
				adno: adno,
				adstreet: adstreet,
				adtown: adtown,
				telephone: telephone,
				email: email,
				nic: nic,
				type: type
			},
			
			success:function(data){
				$("#status").html(data);
			}
		})
		return false;
	}) 
</script>




<script>
document.getElementById("users").style.display = "block";
document.getElementById("profile").style.display = "none";


function users() {
	document.getElementById("profile").style.display = "none";
 	document.getElementById("users").style.display = "block";
}
function addmembers() {
  	document.getElementById("profile").style.display = "block";
 	document.getElementById("users").style.display = "none";
}
</script>

<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.zoom.min.js"></script>
    <script src="../js/jquery.dd.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>