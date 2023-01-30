<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>




	
	
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
				$("#caption").html("Transcections");
			}
		})
		return false;
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