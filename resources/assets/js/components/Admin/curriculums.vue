<template>

  	<div id="app">
		      <div class="card">
                            <div class="content">
                                <div class="row">                            
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                           	  <h6>Curriculums</h6>
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
								<td class="text-xs-left">{{ props.item.CurriculumCode }}</td>
								<td class="text-xs-left">{{ props.item.EntryYear }}</td>
								<td class="text-xs-left">{{ props.item.CourseTitle }}</td>
								<td class="text-xs-left">{{ props.item.CollegeDescription }}</td>
								<td class="text-xs-left">{{ props.item.MajorDescription }}</td>
								<td class="text-xs-left">{{ props.item.NoOfYears }}</td>
								<td class="text-xs-left">{{ props.item.EducationLevel }}</td>
																				
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
        { text: "Code", value: "CurriculumCode" },
        { text: "Entry Year", value: "EntryYear" },
        { text: "Course Title", value: "CourseTitle" },
        { text: "College Description", value: "CollegeDescription" },
        { text: "Major Description", value: "MajorDescription" },
        { text: "Years", value: "NoOfYears" },
        { text: "Education Level", value: "EducationLevel" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .get("/curriculum")
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>