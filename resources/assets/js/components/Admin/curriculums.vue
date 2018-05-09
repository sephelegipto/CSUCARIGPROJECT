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
							:items="lists">
	
							<template slot="items" slot-scope="props" @click="openCurriculum(props)">
                <td>  

                    <a>
                        <span>
                          <i class="has-text-primary fa fa-list-ol" aria-hidden="true" @click="openCurriculumInfo(props)"></i>
                       </span>
                   </a>
                </td>
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
                <Show :openmodal='showActive' ></Show>
					</div>      
     
</template>
<script>
let Show = require("./CurriculumInfo.vue");
export default {
  components: { Show },
  data() {
    return {
      showActive: "",
      headers: [
        { text: "Action", value: "" },
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
  },
  methods: {
    openCurriculumInfo(props) {
      $("#myModal").modal("show");
      console.log(props);
      this.addActive = "is-active";
    }
  }
};
</script>