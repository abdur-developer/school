<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ক্রেডিটস - আমার ওয়েবসাইট</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts for Bengali -->
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Hind Siliguri', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f6fa 0%, #e3e8ff 100%);
            min-height: 100vh;
            padding-bottom: 50px;
        }
        
        .credit-section {
            padding: 10px 0;
        }
        
        .profile-container {
            position: relative;
            margin: 0 auto 30px;
            width: 180px;
        }
        
        .profile-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 8px solid white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
        }
        
        .profile-img:hover {
            transform: scale(1.05);
        }
        
        .profile-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: #0d6efd;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
        
        .credit-name {
            font-size: 32px;
            font-weight: 700;
            margin-top: 20px;
            color: #333;
        }
        
        .credit-title {
            color: #0d6efd;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .credit-text {
            color: #555;
            font-size: 17px;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 30px;
        }
        
        .heart-icon {
            color: #ff4757;
            animation: heartbeat 1.5s infinite;
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #0d6efd;
            display: inline-block;
        }
        
        .gallery-container {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            height: 250px;
            margin-bottom: 25px;
        }
        
        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover .gallery-img {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 20px 15px 15px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
            transform: translateY(0);
        }
        
        .friend-location {
            font-weight: 600;
            font-size: 18px;
        }
        
        .back-button {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 17px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }
        
        .back-button:hover {
            background: #0b5ed7;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
            color: white;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-img {
                width: 150px;
                height: 150px;
            }
            
            .credit-name {
                font-size: 28px;
            }
            
            .credit-title {
                font-size: 18px;
            }
            
            .credit-text {
                font-size: 16px;
            }
            
            .gallery-item {
                height: 220px;
            }
        }
    </style>    

    <style>
        .whatsapp-button {
            position: fixed;
            width: 68px;
            height: 68px;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #25d366, #128C7E);
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 36px;
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 3px solid white;
        }

        .whatsapp-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .whatsapp-button:hover::before {
            left: 100%;
        }

        .whatsapp-button:hover {
            transform: translateY(-8px) scale(1.08);
            box-shadow: 0 12px 25px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-button:active {
            transform: translateY(-4px) scale(1.04);
            transition: 0.1s;
        }

        .whatsapp-button i {
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Notification badge */
        .whatsapp-notification {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 22px;
            height: 22px;
            background: #ff3b30;
            color: white;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
            border: 2px solid white;
            z-index: 1;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 59, 48, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 59, 48, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 59, 48, 0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .whatsapp-button {
                width: 62px;
                height: 62px;
                bottom: 25px;
                right: 25px;
                font-size: 32px;
            }
            
            .whatsapp-notification {
                width: 20px;
                height: 20px;
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            .whatsapp-button {
                width: 58px;
                height: 58px;
                bottom: 20px;
                right: 20px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>    
    <section class="credit-section">
        <a href="https://wa.me/8801709409266?text=from+hdsdhs+school+website" target="_blank" class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
            <div class="whatsapp-notification">1</div>
        </a>
        <div class="container">
            <!-- Profile Section -->
            <div class="text-center">
                <div class="profile-container">
                    <img src="fnd/me.jpeg" alt="আব্দুর রহমানের ছবি" class="profile-img">
                    <div class="profile-badge">
                        <i class="fas fa-crown"></i>
                    </div>
                </div>
                
                <h1 class="credit-name">আব্দুর রহমান</h1>
                <h3 class="credit-title">অ্যাপ ও ওয়েব ডেভেলপার</h3>
                
                <p class="credit-text">
                    আমার স্কুলের ওয়েবসাইট নিজে বানিয়ে ফেলেছি! 😍 এই ছোট্ট প্রজেক্টটা আমার কাছে অনেক বড় স্বপ্ন ছিল। আজ পূরণ হলো। গর্বে বুক ভরে গেছে।<i class="fas fa-heart heart-icon"></i>
                </p>
            </div>
            
            <!-- Gallery Section -->
            <div class="text-center mt-5">
                <h2 class="section-title">
                    <i class="fas fa-images me-2"></i>বন্ধুদের সাথে স্মরণীয় মুহূর্ত
                </h2>
                
                <div class="gallery-container">
                    <div class="row">
                        <?php
                        // Sample data for friends' photos
                        $friends = [
                            [
                                'image' => 'img_1.jpg',
                                'location' => 'অনেক দিন পর দেখা'
                            ],
                            [
                                'image' => 'img_2.jpg',
                                'location' => 'অ্যাডমিট কার্ড দেওয়ার দিন'
                            ],
                            [
                                'image' => 'img_3.jpg',
                                'location' => 'খেলাধুলার পরে'
                            ],
                            [
                                'image' => 'img_4.jpg',
                                'location' => 'শেষের দিন গুলো'
                            ],
                            [
                                'image' => 'img_5.jpg',
                                'location' => 'শিক্ষা সফরে'
                            ],
                            [
                                'image' => 'img_6.jpg',
                                'location' => 'ক্লাস শেষে মজা'
                            ],
                            [
                                'image' => 'img_7.jpg',
                                'location' => '২১ শে ফেব্রুয়ারি'
                            ],
                            [
                                'image' => 'img_8.jpg',
                                'location' => 'কালী মেলায়'
                            ],
                            [
                                'image' => 'img_9.jpg',
                                'location' => 'শিক্ষা সফরে'
                            ],
                            [
                                'image' => 'img_10.jpg',
                                'location' => 'অ্যাডমিট দেওয়ার দিন'
                            ],
                            [
                                'image' => 'img_11.jpg',
                                'location' => 'শিক্ষা সফরে'
                            ],
                            [
                                'image' => 'img_12.jpg',
                                'location' => 'ইফতার পার্টি'
                            ],
                            [
                                'image' => 'img_13.jpg',
                                'location' => 'বিদায়ের দিন'
                            ],
                            [
                                'image' => 'img_14.jpg',
                                'location' => 'বিদায়ের দিন'
                            ],
                            [
                                'image' => 'img_15.jpg',
                                'location' => 'পরীক্ষা শেষে'
                            ]
                        ];

                        foreach ($friends as $friend):
                        ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-item">
                                    <img src="fnd/<?= $friend['image']; ?>"  class="gallery-img">
                                    <div class="gallery-overlay">
                                        <div class="friend-location">
                                            <i class="fas fa-map-marker-alt me-1"></i><?= $friend['location']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Back to Website Button -->
            <div class="text-center mt-5">
                <a href="../" class="back-button">
                    <i class="fas fa-arrow-left"></i> মূল ওয়েবসাইটে ফিরে যান
                </a>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simple animation for gallery items when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });
            
            galleryItems.forEach(item => {
                item.style.opacity = 0;
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(item);
            });
            
            // Add click event to profile image
            const profileImg = document.querySelector('.profile-img');
            profileImg.addEventListener('click', function() {
                alert('ধন্যবাদ! এই ওয়েবসাইটটি তৈরি করতে পেরে আমি খুব আনন্দিত।');
            });
        });
    </script>

</body>
</html>