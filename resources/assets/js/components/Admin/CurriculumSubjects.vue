<template>

  	<div id="app">
		      <div class="card">
                            <div class="content">
                                <div class="row">                            
                                    <div>
                                        <div>
                                           	  <h6>Curriculum Subjects </h6> {{ this.$route.params.CourseTitle }} - Major in {{ this.$route.params.MajorDescription }}  
                                        </div>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
	
						<v-app id="inspire">
							<v-data-table
							:headers="headers"
							:items="lists"
disable-initial-sort=false
            	 :loading="loadingdata"
							>
							  <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>
							<template slot="items" slot-scope="props">
                <td class="text-xs-left">{{ props.item.SubjectYearDescription }}</td>	
                <td class="text-xs-left">{{ props.item.TermDescription }}</td>
								<td class="text-xs-left">{{ props.item.SubjectCode }}</td>
								<td class="text-xs-left">{{ props.item.SubjectDescription }}</td>		
                <td class="text-xs-left">{{ props.item.Units }}</td>	
                <td class="text-xs-left">{{ props.item.PreRequisiteCODE }}</td>	
                <td class="text-xs-left">{{ props.item.LabUnits }}</td>	
                <td class="text-xs-left">{{ props.item.LecUnits }}</td>	
                <td class="text-xs-left">{{ props.item.LabHours }}</td>	
                <td class="text-xs-left">{{ props.item.LecHours }}</td>		
        											
							</template>
				
							</v-data-table>
						</v-app>
					</div>
</template>
<script>
export default {
  data() {
    return {
      loadingdata: true,
      headers: [
        { text: "Year", value: "SubjectYearDescription" },
        { text: "Term", value: "TermDescription" },
        { text: "Subject Code", value: "SubjectCode" },
        { text: "Subject Description", value: "SubjectDescription" },
        { text: "Units", value: "Units" },
        { text: "Prerequisite", value: "Prerequisite" },
        { text: "Lab Units", value: "LabUnits" },
        { text: "Lec Units", value: "LecUnits" },
        { text: "Lab Hours", value: "LabHours" },
        { text: "Lec Hours", value: "LecHours" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .post("/curriculumsubj", { ID: this.$route.params.CurriculumCode })

      .then(
        response => ((this.lists = response.data), (this.loadingdata = false))
      )
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>