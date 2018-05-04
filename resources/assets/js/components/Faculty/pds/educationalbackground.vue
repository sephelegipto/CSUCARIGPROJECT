<template>
	<div class="container-fluid ">
		<div class="row">
			<div class="col-sm-12">
				<div class="card md-form">

					<div class="tab-content ">

						<ul id="tabs" class="nav nav-pills ">
							<li> 
								<router-link to="/personalinformation">
									Personal Information
								</router-link>
							</li>
							<li>
								<router-link to="/familybackground">
									Family Background
								</router-link>
							</li>
							<li class="active">
								<router-link to="/educationalbackground">
									Educational Background
								</router-link>
							</li>
							
							<li>
								<router-link to="/cseligibility">
									Civil Service Eligibility
								</router-link>
							</li>

							<li>
								<router-link to="/workexperience">
									Work Experience
								</router-link>
							</li>

							<li>
								<router-link to="/voluntarilywork">
									Voluntarily Work
								</router-link>
							</li>


							<li>
								<router-link to="/learninganddevelopment">
									Learning and Development
								</router-link>
							</li>
							<li>
								<router-link to="/otherinformation">
									Other Information
								</router-link>
							</li>
							<li>
								<router-link to="/otherquestion">
									Other Question
								</router-link>
							</li>
							<li>
								<router-link to="/reference">
									Reference and Other Information
								</router-link>
							</li>

							
							<li><a href="#tab11" data-toggle="tab">Export</a></li>

							
							


							


						</ul>

					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-sm-12">
					<div class="card md-form">
						<div class="tab-content">				
							<router-view class="view two" name="pds" keep-alive></router-view> 

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>