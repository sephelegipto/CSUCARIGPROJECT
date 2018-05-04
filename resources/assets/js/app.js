 require('./bootstrap');

 window.Vue = require('vue');

 import Vue from 'vue'
 import VueRouter from 'vue-router'

 Vue.use(VueRouter)

 //#######################################################################
 //############################ S I D E B A R ############################
 let facultysidebar = require('./components/Sidebar/faculty.vue') 
 let adminsidebar = require('./components/Sidebar/adminsidebar.vue') 
 let facultyprofile = require('./components/Faculty/profile.vue') 

 //#######################################################################
 //############################### P D S #################################
 let personaldatasheet = require('./components/Faculty/personaldatasheet.vue') 
 let cseligibility = require('./components/Faculty/pds/cseligibility.vue') 
 let educationalbackground = require('./components/Faculty/pds/educationalbackground.vue') 
 let familybackground = require('./components/Faculty/pds/familybackground.vue') 
 let learninganddevelopment = require('./components/Faculty/pds/learninganddevelopment.vue') 
 let otherinformation = require('./components/Faculty/pds/otherinformation.vue') 
 let otherquestion = require('./components/Faculty/pds/otherquestion.vue') 
 let reference = require('./components/Faculty/pds/reference.vue') 
 let voluntarilywork = require('./components/Faculty/pds/voluntarilywork.vue') 
 let workexperience = require('./components/Faculty/pds/workexperience.vue') 
 //#######################################################################
 //############################A D M I N #################################
 let studentsadmin = require('./components/Admin/students.vue')
 let buildingsadmin = require('./components/Admin/buildings.vue')
 let collegesadmin = require('./components/Admin/colleges.vue')
 let coursesadmin = require('./components/Admin/courses.vue')
 let curriculumsadmin = require('./components/Admin/curriculums.vue')
 let employeesadmin = require('./components/Admin/employees.vue')

 //#######################################################################
 //########################## R O U T E S ################################
 const routes = [


 {	path: '/personaldatasheet', component: personaldatasheet },
 {	path: '/facultyprofile', component: facultyprofile },
 {  path: '/dashboard', redirect: '/facultyprofile'},
 //########################################################################
 //########################### P D S#######################################
 { 	path: '/personalinformation',component: personaldatasheet },
 {  path: '/cseligibility', component: cseligibility},
 {  path: '/educationalbackground', component: educationalbackground},
 {  path: '/familybackground', component: familybackground},
 {  path: '/learninganddevelopment', component: learninganddevelopment},
 {  path: '/otherinformation', component: otherinformation},
 {  path: '/otherquestion', component: otherquestion},
 {  path: '/reference', component: reference},
 {  path: '/voluntarilywork', component: voluntarilywork},
 {  path: '/workexperience', component: workexperience},
 //########################################################################
 //############################ A D M I N #################################

 {  path: '/studentsadmin', component: studentsadmin},
 {  path: '/buildingsadmin', component: buildingsadmin},
 {  path: '/collegesadmin', component: collegesadmin},
 {  path: '/coursesadmin', component: coursesadmin},
 {  path: '/curriculumsadmin', component: curriculumsadmin},
 {  path: '/employeesadmin', component: employeesadmin},


 ]


 const router = new VueRouter({
 	// mode: 'history',
  routes // short for `routes: routes`
})


 const app = new Vue({
 	el: '#app',
 	router,
 	components:{facultysidebar, adminsidebar}
 });
