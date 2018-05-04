<template>
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">

                <img src="images/csu.png" alt="">

            </a>

        </div>

        <ul class="nav">
           <li id="employee">
            <router-link to="/studentsadmin">
                <i class="ti-user"></i>
                <p>Students</p>
            </router-link>
        </li>
        <li id="employee">
            <router-link to="/employeesadmin">
                <i class="ti-user"></i>
                <p>Employees</p>
            </router-link>
        </li>
         <li id="employee">
            <router-link to="/collegesadmin">
                <i class="ti-user"></i>
                <p>Colleges</p>
            </router-link>
        </li>
         <li id="employee">
            <router-link to="/buildingsadmin">
                <i class="ti-user"></i>
                <p>Buildings</p>
            </router-link>
        </li>
         <li id="employee">
            <router-link to="/coursesadmin">
                <i class="ti-user"></i>
                <p>Courses</p>
            </router-link>
        </li>
         <li id="employee">
            <router-link to="/curriculumsadmin">
                <i class="ti-user"></i>
                <p>Curriculums</p>
            </router-link>
        </li>

    </ul>



</div>
</template>