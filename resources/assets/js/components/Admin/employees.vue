<template>
  	<div id="app">
		      <div class="card">
							<div class="content">
									<div class="row">                            
											<div class="col-xs-7">
													<div class="numbers">
																<h6>Employees</h6>
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
								<td class="text-xs-left">{{ props.item.EmployeeID }}</td>
								<td class="text-xs-left">{{ props.item.Salutation + " " + props.item.FirstName + " " + props.item.MiddleName + " " + props.item.LastName}}</td>
								<td class="text-xs-left">{{ props.item.PositionDescription }}</td>
								<td class="text-xs-left">{{ props.item.DepartmentDescription }}</td>
								<td class="text-xs-left">{{ props.item.Status }}</td>																
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
        { text: "EmployeeID", value: "EmployeeID" },
        { text: "Name", value: "FirstName" },
        { text: "Position", value: "PositionDescription" },
        { text: "Department", value: "DepartmentDescription" },
        { text: "Status", value: "Status" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .get("/employee")
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>