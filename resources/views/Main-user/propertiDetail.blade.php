<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Detail - Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="bg-gray-50">

<!-- Header -->
<header class="bg-red-900 text-white py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-8">
            <h1 class="text-xl font-bold">Beranda</h1>
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="hover:text-gray-300 transition-colors">Properti</a>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="search" placeholder="Cari lelang..."
                       class="bg-white text-gray-800 px-4 py-2 pr-10 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-red-300">
                <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <button class="bg-white text-red-900 px-4 py-2 rounded-full font-medium hover:bg-gray-100 transition-colors">
                Contact Us
            </button>
        </div>
    </div>
</header>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column - Property Images and Details -->
        <div class="lg:col-span-2">
            <!-- Main Property Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <!-- Image Gallery Section -->
                <div class="relative">
                    <!-- Main Image Container -->
                    <div class="relative w-full h-96 bg-black rounded-lg overflow-hidden">
                        <div class="swiper mySwiperMain w-full h-full">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide flex items-center justify-center">
                                    <img src="https://placehold.co/800x400/e2e8f0/64748b?text=Property+Image+1"
                                         alt="Property Image 1"
                                         class="object-none" />
                                </div>
                                <div class="swiper-slide flex items-center justify-center">
                                    <img src="https://placehold.co/800x400/f1f5f9/475569?text=Property+Image+2"
                                         alt="Property Image 2"
                                         class="object-none" />
                                </div>
                                <div class="swiper-slide flex items-center justify-center">
                                    <img src="https://placehold.co/800x400/f8fafc/334155?text=Property+Image+3"
                                         alt="Property Image 3"
                                         class="object-none" />
                                </div>
                                <div class="swiper-slide flex items-center justify-center">
                                    <img src="https://placehold.co/800x400/e2e8f0/64748b?text=Property+Image+4"
                                         alt="Property Image 4"
                                         class="object-none" />
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="swiper-button-prev !text-white !bg-black !bg-opacity-50 hover:!bg-opacity-70 !rounded-full !w-10 !h-10 !left-4 transition-all duration-200 after:!text-base after:!font-bold"></div>
                            <div class="swiper-button-next !text-white !bg-black !bg-opacity-50 hover:!bg-opacity-70 !rounded-full !w-10 !h-10 !right-4 transition-all duration-200 after:!text-base after:!font-bold"></div>

                            <!-- Image Counter -->
                            <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white text-sm px-3 py-1 rounded-full">
                                <span class="swiper-counter">1 / 4</span>
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail Navigation -->
                    <div class="mt-4">
                        <div class="swiper mySwiperThumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                    <img src="https://placehold.co/80x80/e2e8f0/64748b?text=1"
                                         alt="Thumbnail 1"
                                         class="object-none border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg" />
                                </div>
                                <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                    <img src="https://placehold.co/80x80/f1f5f9/475569?text=2"
                                         alt="Thumbnail 2"
                                         class="object-none border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg" />
                                </div>
                                <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                    <img src="https://placehold.co/80x80/f8fafc/334155?text=3"
                                         alt="Thumbnail 3"
                                         class="object-none border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg" />
                                </div>
                                <div class="swiper-slide !w-20 !h-20 cursor-pointer flex items-center justify-center bg-black rounded-lg">
                                    <img src="https://placehold.co/80x80/e2e8f0/64748b?text=4"
                                         alt="Thumbnail 4"
                                         class="object-none border-2 border-transparent hover:border-red-500 transition-all duration-200 rounded-lg" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Details -->
                <div class="p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Alamat</h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>

                    <!-- QR Code Section -->
                    <div class="mb-6">
                        <div class="w-24 h-24 bg-red-300 rounded flex items-center justify-center">
                            <span class="text-white font-bold text-xl">QR</span>
                        </div>
                    </div>

                    <!-- Additional Info Grid -->
                    <div class="grid grid-cols-3 gap-4 mb-6">
                        @for($i = 1; $i <= 6; $i++)
                        <div class="bg-gray-200 h-12 rounded flex items-center justify-center">
                            <span class="text-gray-400 text-sm">Info {{ $i }}</span>
                        </div>
                        @endfor
                    </div>

                    <!-- Point of Interest -->
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Point of Interest</h3>
                    <div class="space-y-3">
                        @for($i = 1; $i <= 4; $i++)
                        <div class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-3">
                            <span class="text-gray-600">Point of Interest {{ $i }}</span>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Property Info and Contact -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Property Code and Status (NEW LAYOUT) -->
            <div class="flex flex-row gap-8 mb-8">
                <div class="flex flex-col gap-4 flex-1 max-w-md">
                    <!-- Kode Aset Row -->
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center min-h-[48px]">
                        <span class="text-base font-semibold text-gray-900 ml-2">Kode Aset :</span>
                        <span class="flex-1 mx-4 text-base font-normal text-gray-900 whitespace-nowrap overflow-hidden text-ellipsis">uuuuuuuuuuu</span>
                    </div>
                    <!-- Kondisi Row -->
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center min-h-[48px]">
                        <span class="text-base font-semibold text-gray-900 ml-2">Kondisi :</span>
                        <span class="flex-1 mx-4 text-base font-normal text-gray-900 whitespace-nowrap overflow-hidden text-ellipsis">uuuuuuuuuuu</span>
                        <button type="button" class="w-7 h-7 flex items-center justify-center bg-red-800 text-white text-base font-bold rounded ml-2" title="Info tentang kondisi">?</button>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-white rounded-xl p-4 shadow-md border-2 border-yellow-200 flex items-center gap-2 min-w-[140px]">
                        <span class="text-base font-semibold text-gray-900">Share</span>
                        <i class="fas fa-share-alt text-lg text-gray-900"></i>
                    </div>
                </div>
            </div>

            <!-- Price Card -->
            <div class="bg-white rounded-xl p-6 shadow-md border-2 border-yellow-200 flex flex-col items-center text-center">
                <div class="text-yellow-700 text-lg font-semibold mb-1">Limit Lelang</div>
                <div class="text-gray-500 text-xl mb-1 line-through font-semibold">Rp. 1.234.567.890</div>
                <div class="text-orange-700 text-4xl md:text-5xl font-extrabold mt-1 mb-1">Rp. 987.654.321,-</div>
            </div>

            <!-- Auction Schedule -->
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Jadwal Lelang</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Hari, Tanggal</label>
                        <input type="text" value="Tanggal - Tanggal"
                               class="w-full bg-yellow-100 border border-yellow-300 rounded-lg px-3 py-2 text-sm" readonly>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Lokasi Lelang</label>
                        <input type="text" value="Tanggal - Tanggal"
                               class="w-full bg-yellow-100 border border-yellow-300 rounded-lg px-3 py-2 text-sm" readonly>
                    </div>
                </div>
            </div>

            <!-- Contact Person -->
            <div class="bg-white rounded-xl p-6 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Person</h3>

                <div class="space-y-4">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="border border-yellow-300 rounded-lg p-4">
                        <!-- Contact Name (blurred) -->
                        <div class="flex items-center mb-2">
                            <div class="w-20 h-4 bg-gray-800 rounded blur-sm"></div>
                        </div>
                        <!-- Phone Number -->
                        <div class="text-gray-700 font-medium">08123456789</div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-red-900 text-white py-12 mt-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Description -->
            <div class="md:col-span-1">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-full mr-2"></div>
                    <span class="font-bold text-lg">logoipsum</span>
                </div>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="flex space-x-3 mt-4">
                    <a href="#" class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-blue-400 rounded flex items-center justify-center hover:bg-blue-500 transition-colors">
                        <i class="fab fa-twitter text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-pink-600 rounded flex items-center justify-center hover:bg-pink-700 transition-colors">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-blue-800 rounded flex items-center justify-center hover:bg-blue-900 transition-colors">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </a>
                </div>
                <p class="text-xs text-gray-400 mt-4">© 2021 - All rights reserved.</p>
            </div>

            <!-- Quick Links Column 1 -->
            <div>
                <h4 class="font-semibold mb-4">Take a tour</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Features</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Partners</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Product</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Support</a></li>
                </ul>
            </div>

            <!-- Quick Links Column 2 -->
            <div>
                <h4 class="font-semibold mb-4">Our Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Agents</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Media</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="font-semibold mb-4">Subscribe</h4>
                <p class="text-sm text-gray-300 mb-4">Subscribe to get latest property, blog, news from us</p>
                <div class="flex">
                    <input type="email" placeholder="Enter your email"
                           class="flex-1 px-3 py-2 rounded-l-lg border-0 text-gray-800 text-sm focus:outline-none">
                    <button class="bg-blue-600 px-4 py-2 rounded-r-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Initialize thumbnail swiper
    var thumbSwiper = new Swiper('.mySwiperThumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            640: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 12
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 15
            }
        }
    });

    // Initialize main swiper
    var mainSwiper = new Swiper('.mySwiperMain', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: thumbSwiper,
        },
        on: {
            slideChange: function () {
                // Update counter
                const counter = document.querySelector('.swiper-counter');
                if (counter) {
                    counter.textContent = `${this.activeIndex + 1} / ${this.slides.length}`;
                }

                // Update thumbnail active state
                const thumbnails = document.querySelectorAll('.mySwiperThumbs .swiper-slide img');
                thumbnails.forEach((thumb, index) => {
                    if (index === this.activeIndex) {
                        thumb.classList.add('!border-red-500');
                        thumb.classList.remove('border-transparent');
                    } else {
                        thumb.classList.remove('!border-red-500');
                        thumb.classList.add('border-transparent');
                    }
                });
            }
        }
    });

    // Set initial active thumbnail
    document.addEventListener('DOMContentLoaded', function() {
        const firstThumbnail = document.querySelector('.mySwiperThumbs .swiper-slide:first-child img');
        if (firstThumbnail) {
            firstThumbnail.classList.add('!border-red-500');
            firstThumbnail.classList.remove('border-transparent');
        }
    });
</script>

</body>
</html>