<!--Sidebar menu item-->

 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           
			<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#master"><i class="fa fa-sitemap fa"></i> Master <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="master" class="collapse">
							<li><a href="term_add.php" class="glyphicon glyphicon-eye-open"> Terms</a></li>
							<li><a href="class_add.php" class="glyphicon glyphicon-eye-open"> Classes</a></li>
							<li><a href="stream_add.php" class="glyphicon glyphicon-eye-open"> Streams</a></li>
							<li><a href="subject_add_o.php" class="glyphicon glyphicon-eye-open"> O-Level Subjects</a></li>
							<li><a href="subject_add_a.php" class="glyphicon glyphicon-eye-open"> A-Level Subjects</a></li>
							<li><a href="grading.php" class="glyphicon glyphicon-eye-open"> O-level Grades</a></li>
							<li><a href="gradinga.php" class="glyphicon glyphicon-eye-open"> A-level Grades</a></li>
							<!--li><a href="teacher_comments.php" class="glyphicon glyphicon-eye-open"> Teacher Comments</a></li>
							<li><a href="hteacher_comments.php" class="glyphicon glyphicon-eye-open"> HeadTeacher Comments</a></li-->		  
                            <li><a href="comment_report.php" class="glyphicon glyphicon-eye-open">&nbsp;Report Comment</a></li>
							<li><a href="settings.php" class="glyphicon glyphicon-eye-open">&nbsp;Settings</a></li>
							<!--li><a href="under_development.php" class="glyphicon glyphicon-plus">&nbsp;ClassTeacher Comment</a></li-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demon"><i class="fa fa-sitemap fa"></i> Class <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demon" class="collapse">
							<li><a href="processAdd_room.php" class="glyphicon glyphicon-plus">&nbsp;Add Class</a></li>
                            <li><a href="view_room.php" class="glyphicon glyphicon-eye-open">&nbsp;View Class</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#teacher"><i class="fa fa-sitemap fa"></i> Teachers <i class="fa fa-fw fa-caret-down"></i></a>
                        <!--ul class="dropdown-menu"-->
                        <ul id="teacher" class="collapse">
							<li><a href="teacher_add.php" class="glyphicon glyphicon-plus">&nbsp;Add Teacher</a></li>
                            <li><a href="teacher_view.php" class="glyphicon glyphicon-eye-open">&nbsp;Teachers List</a></li>
                            <li><a href="class_teachers.php" class="glyphicon glyphicon-eye-open">&nbsp;Class Teachers</a></li>
                            <li><a href="subject_teachers.php" class="glyphicon glyphicon-eye-open">&nbsp;Subject Teachers</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users fa-lg"></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
							<li><a href="register.php" class="glyphicon glyphicon-plus">&nbsp;Add Student</a></li>
                            <li><a href="tenant_room.php" class="glyphicon glyphicon-eye-open">&nbsp;View Student</a></li>
							<li><a href="student_promote.php" class="glyphicon glyphicon-pencil">&nbsp;Promote/Demote</a></li>
                        </ul>
                    </li>
                    <!--added a report item on the menu -->
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#exams"><i class="fa fa-users fa-lg"></i> Clearance <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="exams" class="collapse">
							<li><a href="examination_clearance.php" class="glyphicon glyphicon-list-alt">&nbsp;Exam Cards</a></li>
							<li><a href="fees_clearance.php" class="glyphicon glyphicon-list-alt">&nbsp;Fees Clearance</a></li>
                            
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#marks"><i class="fa fa-sitemap fa"></i> Marks <i class="fa fa-fw fa-caret-down"></i></a>
                        <!--ul class="dropdown-menu"-->
                        <ul id="marks" class="collapse">
							<li><a href="marks_olevel.php" class="glyphicon glyphicon-eye-open">&nbsp;Enter O-Level Marks</a></li>
                            <li><a href="marks_alevel.php" class="glyphicon glyphicon-eye-open">&nbsp;Enter A-Level Marks</a></li>
                            <li><a href="marks_view.php" class="glyphicon glyphicon-eye-open">&nbsp;View O-Level Marks</a></li>
                            <li><a href="marks_view_alevel.php" class="glyphicon glyphicon-eye-open">&nbsp;View A-Level Marks</a></li>
                            <li><a href="marksheet_olevel.php" class="glyphicon glyphicon-eye-open">&nbsp;Marksheet O-Level </a></li>
                            <li><a href="marksheet_alevel.php" class="glyphicon glyphicon-eye-open">&nbsp;Marksheet A-Level </a></li>
                            <!-- li><a href="report4.php" class="glyphicon glyphicon-eye-open">&nbsp;Edit Marks</a></li -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-users fa-lg"></i> Report <i class="fa fa-fw fa-caret-down"></i></a>
                        <!--ul class="dropdown-menu"-->
                        <ul id="demo1" class="collapse">
                            <li><a href="report_olevel_mini.php" class="glyphicon glyphicon-eye-open">&nbsp;O-Level Mini</a></li>
                            <li><a href="report_olevel_progressive.php" class="glyphicon glyphicon-eye-open">&nbsp;O-Level Progressive</a></li>
                            <li><a href="report_alevel_mini.php" class="glyphicon glyphicon-eye-open">&nbsp;A-Level Mini</a></li>
                            <li><a href="report_alevel_progressive.php" class="glyphicon glyphicon-eye-open">&nbsp;A-Level Progressive</a></li>
                            <li><a href="class_performance.php" class="glyphicon glyphicon-eye-open">&nbsp;O-Level Performance</a></li>
							<li><a href="under_development.php" class="glyphicon glyphicon-eye-open">&nbsp;Individual Report</a></li>
                            <!-- li><a href="under_development.php" class="glyphicon glyphicon-eye-open">&nbsp;Class Report</a></li-->
                            <!-- li><a href="under_development.php" class="glyphicon glyphicon-eye-open">&nbsp;Best Performance</a></li-->
                        </ul>
                    </li>
					<li><a href="tenant_log.php"><i class="glyphicon glyphicon-sort"></i> Student Logs</a></li>
                    <li><a href="about_us.php"><i class="glyphicon glyphicon-info-sign"></i> About Us</a></li>
						<!---->
                    
                    <!--li>
                        <a href="rental.php"><i class="glyphicon glyphicon-import"></i>&nbsp; Monthly Fees</a>
                    </li>
					<li>
                        <a href="water.php"><i class="glyphicon glyphicon-tint"></i>&nbsp;Admission Fee</a>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demow"><i class="glyphicon glyphicon-flash"></i> Security <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demow" class="collapse">
							<li>
                                <a href="electric_bill.php" class="glyphicon glyphicon-plus">&nbsp;Add Security</a>
                            </li>
                            <li>
                                <a href="electricity.php" class="glyphicon glyphicon-pencil">&nbsp;Edit Security</a>
                            </li>
                        </ul>
                    </li-->
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demor"><i class="glyphicon glyphicon-usd"></i> Trivial <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demor" class="collapse">
							<li>
                                <a href="under_development.php" class="glyphicon glyphicon-eye-open">&nbsp;Positon calculator</a>
                            </li>
                            <li>
                                <a href="test.php" class="glyphicon glyphicon-usd">&nbsp;Test</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
