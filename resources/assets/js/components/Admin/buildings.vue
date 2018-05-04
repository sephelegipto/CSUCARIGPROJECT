<template>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">

				<div class="card" v-if="lists.nopermission">

					<div class="header">
						<h1 v-if="lists.nopermission">{{ lists.nopermission }}</h1>
						
					</div>
				</div>
				<div class="card" v-if="!lists.nopermission">

					<div class="header">
						<h4 class="title">Students</h4>
				
					</div>

					<div class="content table-responsive table-full-width">

						<table class="table is-hoverable">
							<thead>
								<tr>
									<th>Action</th>


									<th>Building Code</th>
									<th>Building Description</th>

								</tr>
							</thead>
							<tbody>
								<tr v-for="item,key in lists">
									<td>  

										<a>
											<span>
												<i class="has-text-info fa fa-edit" aria-hidden="true" @click="openUpdate(key)"></i>
											</span>
											<span>
												<i class="has-text-danger fa fa-trash" aria-hidden="true" @click="del(key,item.course_id)"></i>
											</span>
										</a>
									</td>
								
									<td @click="openUpdate(key)">{{ item.BuildingCode }}</td>
									<td @click="openUpdate(key)">{{ item.BuildingDescription }}</td>



								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>



		</div>
	</div>

</template>
<script>

export default{

	data(){
		return{
			lists:{}
		}
	},

	mounted(){
		axios.get('/building')
		.then((response)=>  this.lists = response.data)
		.catch((error) => this.errors = error.response.data.errors)

	}
}
</script>