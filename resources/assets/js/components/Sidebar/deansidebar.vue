<template>
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">

                <img src="images/csu.png" alt="">

            </a>

        </div>
        <ul class="nav">
           <li id="employee">
            <router-link to="/facultyprofile">
                <i class="ti-user"></i>
                <p>Profile</p>
            </router-link>
        </li>
           <li id="employee">
            <router-link to="/schedule">
                <i class="ti-user"></i>
                <p>Schedule</p>
            </router-link>
        </li>
        <li id="employee">
            <router-link to="/personaldatasheet">
                <i class="ti-user"></i>
                <p>Personal Data Sheet</p>
            </router-link>
        </li>
        

    </ul>



</div>
</template>