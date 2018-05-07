<template>

  	<div id="app">
		      <div class="card">
                            <div class="content">
                                <div class="row">                            
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                           	  <h6>Courses</h6>
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
								<td class="text-xs-left">{{ props.item.CourseCode }}</td>
								<td class="text-xs-left">{{ props.item.CourseTitle }}</td>
								<td class="text-xs-left">{{ props.item.MajorCode }}</td>
								<td class="text-xs-left">{{ props.item.MajorDescription }}</td>
								<td class="text-xs-left">{{ props.item.CollegeCode }}</td>
								<td class="text-xs-left">{{ props.item.CollegeDescription }}</td>													
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
        { text: "Course Code", value: "CourseCode" },
        { text: "Course Title", value: "CourseTitle" },
        { text: "Major Code", value: "MajorCode" },
        { text: "Major Description", value: "MajorDescription" },
        { text: "College Code", value: "CollegeCode" },
        { text: "College Description", value: "CollegeDescription" }
      ],
      lists: []
    };
  },

  mounted() {
    axios
      .get("/course")
      .then(response => (this.lists = response.data))
      .catch(error => (this.errors = error.response.data.errors));
  }
};
</script>