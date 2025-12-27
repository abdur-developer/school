<header id="header" class="header_2">
  <div class="container tt_cont topbar">
    <div class="tt_boxed">
      <div class="main_header" style="background-image: url('assets/img/header-Image.jpg');">
          <div class="row align-items-center">
              <div class="col-2 text-start text-md-end ">
                <a href="./">
                  <img class="logo" src="assets/img/a_rahman/<?=$sys['logo']?>" alt="<?=$sys['name']?>"> 
                </a>
              </div>
              <div class="col-8">
                  <div class="header_information text-center">
                      <div class="title_conteiner">
                         <h1 id="marqueeText" class="header_title"><a href=""><?=$sys['name']?></a></h1>
                      </div> 
                      <div class="d-none d-md-block">
                        <h2></h2>
                        <h2><?=$sys['location']?></h2>
                        <h3>স্থাপিত :  <?=$sys['established']?> </h3>                     
                        <h4>School Code  : <?=$sys['school_code']?> | EIIN : <?=$sys['eiin']?> </h4>
                      </div>
                  </div>
              </div>
              <div class="col-2 text-end">  
                <img class="navbar-open" src="assets/img/icon/icons8-menu-48.png" alt="<?=$sys['name']?>">  
              </div>
          </div>
      </div> 
      <div class="menubar ">
        <div class=" d-flex align-items-center">
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link" href="<?=$sys['web_link']?>"> প্রচ্ছদ</a></li>
              <li class="dropdown"><a href="#"><span>আমাদের সম্পর্কে </span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="?q=h-teacher">প্রধান শিক্ষক  এর তথ্য</a></li>
                  <li><a href="?c=history">প্রতিষ্ঠানের ইতিহাস</a></li>
                  <li><a href="?q=managing-committee">পরিচালনা পর্ষদ</a></li>
                  <li><a href="?q=teachers">শিক্ষকদের তথ্য</a></li>
                  <li><a href="?q=stuff-information">কর্মচারীবৃন্দ</a></li>
                  <li><a href="?q=meritorious-student">কৃতি শিক্ষার্থী</a></li>
                </ul>
              </li> 
              <li><a class="nav-link" href="?q=student-information">শিক্ষার্থীর তথ্য </a></li>
              <li class="dropdown"><a href="#"><span>একাডেমিক তথ্য</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="?q=room-information">কক্ষ সংখ্যা</a></li>
                  <li><a href="?c=computer-use">কম্পিউটার-ব্যবহার</a></li> 
                  <li><a href="?q=entry-post-list">শূণ্যপদের তালিকা</a></li>
                  <li><a href="?q=publicholidays">ছুটির তালিকা</a></li>
                  <li><a href="?c=extracurricular">সহপাঠ</a></li>
                </ul>
              </li>
              <!-- <li><a href="?q=admission"><span>ভর্তি কার্যক্রম</span></a>  </li>  -->
              <li><a class="nav-link" href="?q=routine"> রুটিন</a></li>
              <li><a class="nav-link" href="?q=notice-board">নোটিশ </a></li>
              <li class="dropdown"><a href="#"><span>গ্যালারী</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="?q=photo-gallary">ছবি গ্যালারী</a></li>
                  <!-- <li><a href="?q=video-gallary">ভিডিও গ্যালারী</a></li> -->
                </ul>
              </li>
    
               <!-- <li><a class="nav-link" href="?q=post">সাম্প্রতিক খবর </a></li> -->
              <li><a class="nav-link" href="?c=contact">যোগাযোগ </a></li>
    
            </ul>
            <i class="d-none bi mobile-nav-toggle bi-x"></i>
          </nav>
        </div>
      </div>
    </div> 
  </div>
     <script>
        const marqueeText = document.getElementById("marqueeText");

        function checkOverflow() {
            if (marqueeText.scrollWidth > marqueeText.clientWidth) {
                marqueeText.classList.add("marquee");
            } else {
                marqueeText.classList.remove("marquee");
            }
        }

        // Check for overflow on page load and when the window is resized
        window.addEventListener("load", checkOverflow);
        window.addEventListener("resize", checkOverflow);
    </script>
</header>