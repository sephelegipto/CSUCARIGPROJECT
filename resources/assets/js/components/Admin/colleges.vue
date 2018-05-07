<template>
  	<div id="app">
		      <div class="card">
							<div class="content">
									<div class="row">                            
											<div class="col-xs-7">
													<div class="numbers">
																<h6>Colleges</h6>
													</div>
											</div>
									</div>							
							</div>
					</div>
							<v-app id="inspire">
							<v-data-table
							:headers="headers"
							:items="lists"
						
							>
							
							<template slot="items" slot-scope="props">						
								<td class="text-xs-left">{{ props.item.CollegeCode }}</td>
								<td class="text-xs-left">{{ props.item.CollegeDescription }}</td>
								<td class="text-xs-left">{{ props.item.CollegeHead }}</td>																				
							</template>
							<template slot="pageText" slot-scope="props">
								Showing {{ props.pageStart }} - {{ props.pageStop }} of {{ props.itemsLength }}
							</template>
							</v-data-table>
						</v-app>
					</div>
</template>
<script>
export default {
  data() {
    return {
      headers: [
        { text: "College Code", value: "CollegeCode" },
        { text: "College Description", value: "FirstName" },
        { text: "College Head", value: "PositionDescription" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .get("/college")
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>