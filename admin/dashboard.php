<?php
  session_start();

  if (isset($_SESSION['admin']))
  {
    $pageTitle = 'dashboard - overview';
    include 'init.php';
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1 ");
    $stmt->execute(array($_SESSION['id']));
    $admin = $stmt->fetch();

    ?>
      <div class="dashboard lf-pd" id="dashboard" style="margin-top:40px !important">
        <div class="container cnt-spc">
          <div class="row justify-content-start">

            <div class="col-md-4">
              <div class="row">
                <?php
                $stmt = $conn->prepare("SELECT * FROM consultation  ");
                $stmt->execute();
                $total = $stmt->rowCount();

                $va = " ";
                $stmt = $conn->prepare("SELECT * FROM consultation WHERE repons = ?  ");
                $stmt->execute(array($va));
                $norepons = $stmt->rowCount();


                $va2 =
                $stmt = $conn->prepare("SELECT * FROM consultation WHERE repons != ''  ");
                $stmt->execute();
                $repons = $stmt->rowCount();


                 ?>
                <div class="col-md-12">
                  <div class="borx" style="margin-top:30px">
                      <h4>pending message</h4>


                      <div class="animated-progress progress-blue">
                             <span data-progress="<?php   echo ($norepons * 100 ) / $total; ?>"></span>
                           </div>
                           <p class="dsret"><?php echo $norepons ?></p>
                           <svg width="256" height="256" viewBox="0 0 256 256" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M80.0395 211.07L64.057 239.907" stroke="var(--mainColor)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M175.961 211.07L191.943 239.907" stroke="var(--mainColor)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M128 223.922C180.972 223.922 223.915 180.979 223.915 128.007C223.915 75.0346 180.972 32.092 128 32.092C75.0276 32.092 32.085 75.0346 32.085 128.007C32.085 180.979 75.0276 223.922 128 223.922Z" stroke="" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M35.2944 102.439C27.9308 96.9195 22.3106 89.3983 19.1045 80.7726C15.8984 72.1468 15.2416 62.7808 17.2127 53.792C19.1837 44.8032 23.6993 36.5714 30.2207 30.0787C36.742 23.5859 44.9936 19.1066 53.991 17.175C62.9883 15.2435 72.3514 15.9414 80.963 19.1854C89.5745 22.4294 97.0709 28.0826 102.558 35.4703" stroke="" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M128 32.0925L128 16.1067" stroke="var(--mainColor)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M128 80.0498V128.007" stroke="var(--mainColor)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M128 128.007L161.911 161.918" stroke="var(--mainColor)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M220.706 102.439C228.069 96.9195 233.689 89.3983 236.896 80.7726C240.102 72.1468 240.758 62.7808 238.787 53.792C236.816 44.8032 232.301 36.5714 225.779 30.0786C219.258 23.5859 211.007 19.1066 202.009 17.175C193.012 15.2435 183.649 15.9414 175.037 19.1854C166.426 22.4294 158.929 28.0826 153.442 35.4703" stroke="" stroke-width="16" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>


                  </div>
                </div>
                <div class="col-md-12">
                  <div class="borx">

                           <h4>Questions have been answered</h4>

                           <div class="animated-progress progress-green">
                             <span data-progress="<?php   echo ($repons * 100 ) / $total; ?>"></span>
                           </div>
             <p class="dsret"><?php echo $repons ?></p>
             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M7.483 5.25999C6.92769 5.32151 6.40929 5.5683 6.01143 5.96054C5.61356 6.35278 5.35942 6.86761 5.29 7.42199C4.93435 10.463 4.93435 13.535 5.29 16.576C5.35921 17.1305 5.61326 17.6456 6.01114 18.0381C6.40903 18.4305 6.92754 18.6774 7.483 18.739C10.46 19.072 13.54 19.072 16.517 18.739C17.0723 18.6772 17.5906 18.4302 17.9882 18.0378C18.3859 17.6453 18.6398 17.1304 18.709 16.576C18.965 14.391 19.037 12.19 18.925 9.99599C18.9236 9.96793 18.9281 9.93989 18.9383 9.9137C18.9485 9.88752 18.964 9.86376 18.984 9.84399L20.022 8.80399C20.0487 8.77671 20.0828 8.75774 20.12 8.74935C20.1573 8.74097 20.1961 8.74354 20.232 8.75675C20.2678 8.76996 20.299 8.79325 20.3219 8.82381C20.3448 8.85437 20.3584 8.8909 20.361 8.92899C20.5571 11.5355 20.5028 14.1548 20.199 16.751C19.984 18.587 18.509 20.026 16.683 20.231C13.5705 20.576 10.4295 20.576 7.317 20.231C5.49 20.026 4.015 18.587 3.801 16.751C3.4317 13.5938 3.4317 10.4042 3.801 7.24699C4.015 5.40999 5.491 3.97199 7.317 3.76699C10.4295 3.42195 13.5705 3.42195 16.683 3.76699C17.3121 3.83764 17.9154 4.05702 18.443 4.40699C18.4666 4.42286 18.4862 4.44382 18.5006 4.46831C18.515 4.4928 18.5237 4.5202 18.5261 4.5485C18.5285 4.57681 18.5246 4.60529 18.5145 4.63185C18.5044 4.65841 18.4885 4.68238 18.468 4.70199L17.665 5.50499C17.6324 5.53667 17.5905 5.557 17.5455 5.56295C17.5004 5.56889 17.4547 5.56014 17.415 5.53799C17.1362 5.38841 16.8314 5.29338 16.517 5.25799C13.5149 4.92523 10.4851 4.92523 7.483 5.25799V5.25999Z" fill="black"/>
             <path d="M21.03 6.03C21.1037 5.96134 21.1628 5.87854 21.2038 5.78654C21.2448 5.69454 21.2668 5.59523 21.2686 5.49452C21.2704 5.39382 21.2518 5.29379 21.2141 5.2004C21.1764 5.10701 21.1203 5.02218 21.049 4.95096C20.9778 4.87974 20.893 4.8236 20.7996 4.78588C20.7062 4.74816 20.6062 4.72963 20.5055 4.73141C20.4048 4.73319 20.3055 4.75523 20.2135 4.79622C20.1215 4.83721 20.0387 4.89631 19.97 4.97L11.5 13.44L9.03 10.97C8.96134 10.8963 8.87854 10.8372 8.78654 10.7962C8.69454 10.7552 8.59523 10.7332 8.49452 10.7314C8.39382 10.7296 8.29379 10.7482 8.2004 10.7859C8.10701 10.8236 8.02218 10.8797 7.95096 10.951C7.87974 11.0222 7.8236 11.107 7.78588 11.2004C7.74816 11.2938 7.72963 11.3938 7.73141 11.4945C7.73319 11.5952 7.75523 11.6945 7.79622 11.7865C7.83721 11.8785 7.89631 11.9613 7.97 12.03L10.97 15.03C11.1106 15.1705 11.3013 15.2493 11.5 15.2493C11.6988 15.2493 11.8894 15.1705 12.03 15.03L21.03 6.03Z" fill="black"/>
             </svg>

                  </div>
                </div>
              </div>
            </div>

                <div class="col-md-3">
                  <div class="box">
                    <div class="icon money-icon">
                      <svg width="30" height="auto" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7.28396 9.90375C7.98108 9.50966 8.52809 8.89583 8.83958 8.15808C9.15107 7.42034 9.2095 6.60022 9.00576 5.82576C8.80201 5.05131 8.34755 4.36612 7.71334 3.87718C7.07912 3.38824 6.30086 3.12307 5.50005 3.12307C4.69924 3.12307 3.92098 3.38824 3.28676 3.87718C2.65255 4.36612 2.19809 5.05131 1.99434 5.82576C1.79059 6.60022 1.84903 7.42034 2.16052 8.15808C2.472 8.89583 3.01902 9.50966 3.71614 9.90375C2.4938 10.2939 1.43232 11.0726 0.693143 12.1214C0.66479 12.1616 0.644646 12.2071 0.63386 12.2551C0.623074 12.3032 0.621859 12.3529 0.630283 12.4014C0.638707 12.4499 0.656606 12.4963 0.682957 12.5379C0.709308 12.5795 0.743596 12.6156 0.783862 12.6439C0.824129 12.6723 0.869586 12.6924 0.917637 12.7032C0.965689 12.714 1.01539 12.7152 1.06392 12.7068C1.11244 12.6983 1.15882 12.6804 1.20043 12.6541C1.24203 12.6277 1.27804 12.5935 1.30639 12.5532C1.77937 11.8803 2.4073 11.3312 3.13717 10.9521C3.86703 10.573 4.6774 10.3751 5.49984 10.375C6.32229 10.375 7.13267 10.5729 7.86256 10.9519C8.59245 11.331 9.22043 11.8801 9.69346 12.5529C9.72181 12.5931 9.75782 12.6274 9.79943 12.6538C9.84104 12.6801 9.88742 12.698 9.93595 12.7064C9.98447 12.7148 10.0342 12.7136 10.0822 12.7028C10.1303 12.692 10.1757 12.6719 10.216 12.6435C10.2562 12.6152 10.2905 12.5792 10.3169 12.5376C10.3432 12.4959 10.3611 12.4496 10.3695 12.401C10.378 12.3525 10.3767 12.3028 10.3659 12.2548C10.3552 12.2067 10.335 12.1613 10.3066 12.121C9.56748 11.0724 8.50613 10.2939 7.28396 9.90375V9.90375ZM2.62502 6.75C2.62502 6.18138 2.79363 5.62552 3.10954 5.15273C3.42545 4.67994 3.87447 4.31145 4.3998 4.09384C4.92514 3.87624 5.50321 3.81931 6.0609 3.93024C6.6186 4.04117 7.13087 4.31499 7.53295 4.71707C7.93503 5.11914 8.20884 5.63142 8.31978 6.18911C8.43071 6.74681 8.37377 7.32488 8.15617 7.85021C7.93857 8.37555 7.57007 8.82456 7.09728 9.14047C6.62449 9.45638 6.06864 9.625 5.50002 9.625C4.73779 9.62414 4.00702 9.32096 3.46804 8.78198C2.92906 8.243 2.62588 7.51223 2.62502 6.75V6.75ZM15.3111 12.6436C15.2708 12.6719 15.2254 12.6921 15.1773 12.7029C15.1293 12.7137 15.0796 12.7149 15.031 12.7065C14.9825 12.698 14.9361 12.6801 14.8945 12.6538C14.8529 12.6274 14.8169 12.5931 14.7886 12.5529C14.315 11.8807 13.6869 11.332 12.9572 10.953C12.2275 10.574 11.4174 10.3758 10.5951 10.375C10.4957 10.375 10.4003 10.3355 10.33 10.2652C10.2597 10.1948 10.2201 10.0995 10.2201 10C10.2201 9.90054 10.2597 9.80516 10.33 9.73483C10.4003 9.66451 10.4957 9.625 10.5951 9.625C11.0057 9.62457 11.4114 9.53622 11.785 9.36587C12.1585 9.19553 12.4913 8.94716 12.7608 8.63746C13.0304 8.32776 13.2304 7.96393 13.3476 7.57043C13.4648 7.17694 13.4963 6.76292 13.4401 6.35622C13.3838 5.94952 13.2411 5.55959 13.0216 5.21265C12.8021 4.86571 12.5108 4.56982 12.1673 4.34488C11.8238 4.11995 11.4362 3.97118 11.0304 3.9086C10.6246 3.84601 10.2102 3.87106 9.81489 3.98206C9.71915 4.009 9.61663 3.9968 9.52988 3.94814C9.44313 3.89949 9.37927 3.81837 9.35233 3.72262C9.32539 3.62688 9.3376 3.52436 9.38625 3.43761C9.4349 3.35086 9.51602 3.287 9.61177 3.26006C10.4648 3.01936 11.3765 3.09958 12.1743 3.48555C12.9722 3.87152 13.601 4.53648 13.9418 5.35467C14.2826 6.17287 14.3118 7.08759 14.0238 7.92584C13.7359 8.76409 13.1507 9.46778 12.3791 9.90381C13.6012 10.2939 14.6626 11.0725 15.4018 12.1211C15.459 12.2024 15.4816 12.3031 15.4646 12.4011C15.4476 12.4991 15.3924 12.5863 15.3111 12.6436V12.6436Z" fill="#8094ae"/>
                      </svg>
                    </div>

                    <?php
                      $stmt = $conn->prepare("SELECT * FROM users");
                      $stmt ->execute();
                      $tt = $stmt->rowCount();
                     ?>
                    <span class="nbr"><?php echo $tt ?></span>
                                        <p> users</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="box">
                    <div class="icon users-icon">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.825 22L7.45 14.975L2 10.25L9.2 9.625L12 3L14.8 9.625L22 10.25L16.55 14.975L18.175 22L12 18.275L5.825 22Z" fill="black"/>
                      </svg>



                    </div>
<?php


$stmt = $conn->prepare("SELECT * FROM condidate  ");
$stmt->execute();
$no = $stmt->rowCount();
 ?>
                    <span class="nbr"><?php echo $no ?></span>
                                        <p> condidate</p>
                  </div>
                </div>

                                <div class="col-md-3">
                                  <div class="box">
                                    <div class="icon users-icon">
                                      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M16 30L7.56401 20.051C7.44679 19.9016 7.33079 19.7513 7.21601 19.6C5.77499 17.7018 4.99652 15.3832 5.00001 13C5.00001 10.0826 6.15894 7.28473 8.22184 5.22183C10.2847 3.15893 13.0826 2 16 2C18.9174 2 21.7153 3.15893 23.7782 5.22183C25.8411 7.28473 27 10.0826 27 13C27.0035 15.3821 26.2254 17.6996 24.785 19.597L24.784 19.6C24.784 19.6 24.484 19.994 24.439 20.047L16 30ZM8.81201 18.395C8.81401 18.395 9.04601 18.703 9.09901 18.769L16 26.908L22.91 18.758C22.954 18.703 23.188 18.393 23.189 18.392C24.3662 16.8411 25.0023 14.947 25 13C25 10.6131 24.0518 8.32387 22.364 6.63604C20.6761 4.94821 18.387 4 16 4C13.6131 4 11.3239 4.94821 9.63605 6.63604C7.94822 8.32387 7.00001 10.6131 7.00001 13C6.99791 14.9482 7.63479 16.8434 8.81301 18.395H8.81201Z" fill="black"/>
                                      <path d="M21 18H19V10H13V18H11V10C11.0005 9.46973 11.2114 8.96133 11.5864 8.58637C11.9613 8.21141 12.4697 8.00053 13 8H19C19.5303 8.00053 20.0387 8.21141 20.4136 8.58637C20.7886 8.96133 20.9995 9.46973 21 10V18Z" fill="black"/>
                                      <path d="M15 16H17V18H15V16Z" fill="black"/>
                                      <path d="M15 12H17V14H15V12Z" fill="black"/>
                                      </svg>


                                    </div>
                                    <?php

                                    $stmt = $conn->prepare("SELECT * FROM election  ");
                                    $stmt->execute();
                                    $yes = $stmt->rowCount();
                                     ?>
                                    <span class="nbr"><?php echo $yes ?></span>
                                    <p> election</p>

                                  </div>
                                </div>
                                <?php
                                $stmt = $conn->prepare("SELECT * FROM notifications WHERE status = 0");
                                $stmt ->execute();
                                $all = $stmt->fetchAll();
                                $t = $stmt->rowCount();
                                 ?>
                <div class="col-md-12">
                  <div class="content-header">
                    <span class="dashboard-overview" >  notifications <span><?php echo $t ?></span> </span>
                  </div>
                </div>
                <?php

                  if ($t >0)
                  {
                    foreach ($all as $a)
                    {
                      ?>
                      <div class="col-md-10">
                        <div class="noti">
                          <div class="row">
                            <div class="col-md-1">
                                <a href="califi.php?page=deletenoti&id=<?php echo $a['id'] ?>" class="fas fa-times"></a>
                            </div>
                            <div class="col-md-9" style="text-align:left">
                              <?php
                                if ($a['type'] == 0)
                                {
                                  ?>
            <h3> You have new message: <strong><?php echo $a['fname'] ?></strong> </h3>
                                  <?php
                                }

                               ?>
                               <p><?php $text = strip_tags($a['content']); echo mb_strimwidth($text, 0, 120, "...")  ?></p>
                            </div>

                            <div class="col-md-2">
                                <span><?php echo $a['created'] ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  }else {
                    ?>
                    <p style="padding:20px;background:#f1f1f1;display:block;width:100%;text-align:left"> There are no new notifications for today</p>
                    <?php
                  }
                 ?>



          </div>
        </div>
      </div>
    <?php
    include $tpl . 'footer.php';
  }else {
    header('location: index.php');

  }

 ?>