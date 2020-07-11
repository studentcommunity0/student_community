<!-- This is a navbar for the php pages inside admin folder's sub folders  -->
<nav class="navbar navbar-expand-xl justify-content-between">
      <a class="navbar-brand" href="#">
        <a style="font-weight: bolder; color: #ffa801; font-size: 2em;">Intern-net</a>
      </a>
      <span class="student-community-side-nav-toggler" id="student-community-side-nav-toggler-id" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>            
      <div id="student-community-side-nav-id" class="student-community-side-nav">
        <a href="javascript:void(0)" class="sidenavbarclosebtn" onclick="closeNav()">&times;</a>
        <div class="sidenavbaritems">
            <a href="../../Admin/"><i class="fa fa-th-large "></i> Dashboard</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../../Admin/community/manage_community.php"><i class="fa fa-users"></i> Community</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../../Admin/events/manage_events.php"><i class="fa fa-calendar"></i> Events</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../../Admin/users/manage_users.php"><i class="fa fa-user-plus"></i> Users</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../../userRegister/userProfile.php"><i class="fa fa-user-circle"></i> Profile</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../../userRegister/login.php?logout=1"><i class="fa fa-sign-out "></i> logout</a>
        </div>
      </div>
    </nav>
