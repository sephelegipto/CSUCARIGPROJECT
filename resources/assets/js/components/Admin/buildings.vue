<template>

  	<div id="app">
		      <div class="card">
                            <div class="content">
                                <div class="row">                            
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                           	  <h6>Buildings</h6>
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

								<td class="text-xs-left">{{ props.item.BuildingCode }}</td>
								<td class="text-xs-left">{{ props.item.BuildingDescription }}</td>													
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
        { text: "Building Code", value: "BuildingCode" },
        { text: "Building Title", value: "BuildingDescription" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .get("/building")
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>