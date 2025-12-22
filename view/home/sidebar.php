<div class="col-md-4 mt-3">
    <div class="tt_notice4">
        <h3>নোটিশ বোর্ড</h3>
        <div class="notice_body">
            <ul>
                <?php
                    $sql = "SELECT id, title FROM notice ORDER BY id DESC LIMIT 6";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)){
                ?>
                <li>
                    <a href="?q=view_notice&notice=<?=encryptSt($row['id'])?>">
                        <img src="assets/img/icon/icons8-bell-48.png">
                        <span><?=$row['title']?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <div class="text-center all_notice">
                <a href="?q=notice-board">সকল নোটিশ</a>
            </div>
        </div>
    </div>
    <div>
        <a class="photo_link d-block" href="?q=admission">
            <img class="d-block w-100 mt-2" src="assets/img/options/student-information.jpg" alt="ভর্তির আবেদন ">
        </a>
        <a class="photo_link d-block" href="?q=teachers">
            <img class="d-block w-100 mt-2" src="assets/img/options/Teacher-info.jpg" alt="শিক্ষক ">
        </a>
        <a class="photo_link d-block" href="?q=stuff-information">
            <img class="d-block w-100 mt-2" src="assets/img/options/stuff-info.jpg" alt=" কর্মচারী ">
        </a>
        <a class="photo_link d-block" href="?q=managing-committee">
            <img class="d-block w-100 mt-2" src="assets/img/options/comitee.jpg" alt=" পরিচালনা পরিষদ ">
        </a>
    </div>
    <div class="prime_person mt-3">
        <div class="tt-card">
          <h3 class="name_of_des">প্রধান শিক্ষক </h3>
          <div class="tt-card-body text-center">
            <img class="person_image" src="<?=$h_teacher['img']?>" alt="<?=$h_teacher['name']?>">
            <h4 class="m-0 person_name"><?=$h_teacher['name']?></h4>
            <div class="mt-2 mb-2 divider"></div>
            <div class="social-icon">
                <a target="_blank" href="<?=$h_teacher['fb']?>">
                    <img src="assets/img/icon/icons8-facebook-48.png" alt="Facebook">
                </a>
                <a target="_blank" href="mailto:<?=$h_teacher['mail']?>">
                    <img src="assets/img/icon/icons8-gmail-48.png" alt="Gmail">
                </a>
                <a target="_blank" href="tel:<?=$h_teacher['phone']?>">
                    <img src="assets/img/icon/icons8-call-48.png" alt="Phone">
                </a>
                <a target="_blank" href="https://wa.me/<?=$h_teacher['whatsapp']?>">
                    <img src="assets/img/icon/icons8-whatsapp-48.png" alt="Whatsapp">
                </a>
            </div>
          </div>
        </div>
    </div>
    <div class="tt-card mt-3">
        <h3>আমাদের ফেসবুক পেইজ</h3>
        <div class="tt-card-body">
            <div class="quice_links text-center">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Ffacebook.com%2Fhshighschool%2F&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                    width="340" height="500" style="border:none;overflow:hidden" scrolling="no"
                    frameborder="0" allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    data-ruffle-polyfilled=""></iframe>
            </div>
        </div>
    </div>
</div>