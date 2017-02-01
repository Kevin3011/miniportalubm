<nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div>Fendy <strong>Winata</strong></div>
                                <div class="user-text-online">
                                    6PTI2
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    
                    <li <?php if($thisPage == "Home") echo "class='selected'";?>>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Home</a>
                    </li>
                    <li <?php if($thisSection == "View") echo "class='active'";?>>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Jadwal<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="jadwal.php">Jadwal Kuliah</a>
                            </li>
                            <li>
                                <a href="jadwal-ujian.html">Jadwal Ujian</a>
                            </li>
                            <li>
                                <a href="list-absen.html">Lihat Presensi</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li <?php if($thisSection == "Add") echo "class='active'";?>>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li <?php if($thisPage == "Student") echo "class='selected'";?>>
                                <a href="add-student.php">Student</a>
                            </li>
                            <li <?php if($thisPage == "Course") echo "class='selected'";?>>
                                <a href="add-course.php">Course</a>
                            </li>
                            <li <?php if($thisPage == "Major") echo "class='selected'";?>>
                                <a href="add-major.php">Major</a>
                            </li>
                            <li <?php if($thisPage == "Message") echo "class='selected'";?>>
                                <a href="add-message.php">Message</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>