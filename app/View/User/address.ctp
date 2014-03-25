<div class="container">
			<div class="row" style="margin-top:50px;">				
				<div class="col-md-2" id="sidebar" style="margin-top:20px;">
					<div class="sidebar-nav">
						<?= 
							$this->element('sidebar_contact')
						?>			
					</div>					
				</div>

				<div class="col-md-10">
				<div class="col-md-10">
					<h3>Dirección</h3>
					<hr>
					<div class="main-address-container" class="container">
						<div class="row">
							<div class="col-md-6">
								<h3 style="color:black;">Universidad Central de Venezuela</h3>
								<p>Ciudad Universitaria, Los Chaguaramos </p>
								<p>Caracas, Venezuela.</p>
								<p><b>T </b> +51212-123133</p>
								<p> ucv@infoucv.com</p>
								
							</div>
							<div class="col-md-6">
								<div id="map_canvas" style="width:100%; height:300px"></div>
							</div>
						</div>
					</div>
				</div>	
						
				</div>	
			</div>
</div>
			

<script type="text/javascript">
		$(document).ready(function () {
			var mapOptions = {
			/*10.490196. 
			-66.892005
			*/
			  center: new google.maps.LatLng( 10.490196, -66.892005),
			  zoom: 15,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
		
			var map = new google.maps.Map(document.getElementById("map_canvas"),
				mapOptions);
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng( 10.490196, -66.892005),
				map: map,
				title: 'Universidad Central de Venezuela'
			});
		});
</script>
