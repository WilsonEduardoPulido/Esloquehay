
				
				<div>
					<div class="container-fluid">
				
						<div class="justify-content-center">
				
				
				
				
							<div class="row m-1  d-flex ">
				
								<div class="  col-12">
								  
										<!--------LINICIO LINKS TABS -------->
										<ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
					
					
											<li class="nav-item" role="presentation">
												<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
													data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
													aria-selected="true">Gestion De Devoluciones</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
													data-bs-target="#pills-profile" type="button" role="tab"
													aria-controls="pills-profile" aria-selected="false">Restaurar Devoluciones</button>
											</li>
					
					
					
										   
					
					
					
					
					
										</ul>
					
					
					
										<div class="tab-content " id="pills-tabContent">
											<!----------- INICIO CONTENEDOR 1  ------------->
					
											<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
												aria-labelledby="pills-home-tab" tabindex="0">
												@include('livewire.devoluciones.TablaPrincipalDevoluciones')
											</div>
											<!----------- FIN CONTENEDOR 1  ------------->
					
											<!----------- INICIO CONTENEDOR 2  ------------->
											<div class="tab-pane fade" id="pills-profile" role="tabpanel"
												aria-labelledby="pills-profile-tab" tabindex="0">
												@include('livewire.devoluciones.TablaDevolucionesEliminadas')
											</div>
											<!----------- FIN CONTENEDOR 2  ------------->
					
					
											<!----------- INICIO CONTENEDOR 3  ------------->
					
					
					
					
											<!----------- FIN  CONTENEDOR 3  ------------->
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
									
					
					
										
					
					
									</div>
								</div>
				
							  
								
								
				
								
							</div>
						   
						</div>
						@include('livewire.devoluciones.modales')
					</div>
				</div>
				