<?php
include 'config.php';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getSettingValue($mysqli, $setting)
{
    $query = $mysqli->prepare("SELECT value FROM tbl_appconfig WHERE setting = ?");
    $query->bind_param("s", $setting);
    $query->execute();
    $result = $query->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['value'];
    }
    return '';
}
$hotspotTitle = getSettingValue($mysqli, 'hotspot_title');
$description = getSettingValue($mysqli, 'description');
$phone = getSettingValue($mysqli, 'phone');
$company = getSettingValue($mysqli, 'CompanyName');
$color_scheme = getSettingValue($mysqli, 'color_scheme');
$appUrl       = APP_URL;


$phone = (substr($phone, 0, 1) == '+') ? str_replace('+', '', $phone) : $phone;
$phone = (substr($phone, 0, 1) == '0') ? preg_replace('/^0/', '254', $phone) : $phone;
$phone = (substr($phone, 0, 1) == '7') ? preg_replace('/^7/', '2547', $phone) : $phone;
$phone = (substr($phone, 0, 1) == '1') ? preg_replace('/^1/', '2541', $phone) : $phone;
$phone = (substr($phone, 0, 1) == '0') ? preg_replace('/^01/', '2541', $phone) : $phone;
$phone = (substr($phone, 0, 1) == '0') ? preg_replace('/^07/', '2547', $phone) : $phone;

$routerName = getSettingValue($mysqli, 'router_name');
$routerId = getSettingValue($mysqli, 'router_id');

$planQuery = "SELECT id, name_plan, price, validity, validity_unit FROM tbl_plans WHERE routers = ? AND type = 'Hotspot'";
$planStmt = $mysqli->prepare($planQuery);
$planStmt->bind_param("s", $routerName);
$planStmt->execute();
$planResult = $planStmt->get_result();



$htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{$description}">
    <title>{$company}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        * { font-family: system-ui, -apple-system, sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%); }
        .card-hover:hover { transform: translateY(-2px); transition: all 0.2s ease; }
        .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .floating { animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-8px); } }
        .slide-in { animation: slideIn 0.6s ease-out forwards; }
        @keyframes slideIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 640px) {
            .mobile-grid { grid-template-columns: 1fr 1fr; gap: 0.75rem; }
            .mobile-text { font-size: 0.875rem; }
            .mobile-padding { padding: 1rem; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
<header class="bg-blue-700 text-white shadow-xl sticky top-0 z-40">
    <div class="container mx-auto px-4 py-1">
        <div class="flex flex-col items-center justify-center text-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">{$company}</h1>
                </div>
            <div class="flex items-center gap-2 bg-green-500 rounded-full px-4 py-1">
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                <span class="text-white text-xs font-bold">ONLINE</span>
            </div>
        </div>
    </div>
</header>

<!-- Ad Ticker -->
<div style="background:#facc15; overflow:hidden; padding:6px 0; border-bottom:2px solid #eab308;">
  <div id="ticker-wrap" style="display:flex; align-items:center;">
    <div style="overflow:hidden; flex:1; mask-image:linear-gradient(to right,transparent,black 40px,black calc(100% - 40px),transparent); -webkit-mask-image:linear-gradient(to right,transparent,black 40px,black calc(100% - 40px),transparent);">
      <div id="ticker-inner" style="display:inline-flex; white-space:nowrap; will-change:transform;">
        <span class="ticker-msg"></span>
        <span class="ticker-msg"></span>
      </div>
    </div>
  </div>
</div>

<style>
  .ticker-msg {
    color: #1e3a8a;
    font-size: 16px;
    font-weight: 600;
    padding-right: 60px;
  }
</style>

<script>
(function(){
  const inner  = document.getElementById('ticker-inner');
  const spans  = document.querySelectorAll('.ticker-msg');
  let pos      = 0;
  let animating = false;

  // Fallback messages shown while loading or on error
  const fallback = [
    "Unlimited browsing today!",
    "Super-fast speeds on all packages, no throttling, no limits!",
    "Pay instantly with M-Pesa, connect in seconds!"
  ];

  function setTickerText(messages) {
        const text = messages.join("   â€¢   ");
        spans.forEach(el => el.textContent = text);
    }

  function startTicker() {
    if (animating) return;
    animating = true;
    function tick() {
      pos -= 0.6;
      const half = inner.scrollWidth / 2;
      if (Math.abs(pos) >= half) pos = 0;
      inner.style.transform = 'translateX(' + pos + 'px)';
      requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  async function fetchAds() {
    // Show fallback immediately so ticker isn't empty while loading
    //setTickerText(fallback);
    startTicker();

    try {
    const response = await fetch(
        '{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=ticker_ads',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        }
    );

    if (!response.ok) {
        throw new Error("Network error");
    }

    const text = await response.text();
    console.log("Response:", text);

    const data = JSON.parse(text);
    console.log("Parsed:", data);

    // Create ads array
    const ads = Array.isArray(data)
        ? data.filter(ad => Number(ad.status) === 1)
            .map(ad => ad.message)
        : [];

    if (ads.length > 0) {
        setTickerText(ads);
        pos = 0;
    }
    } catch (err) {
        console.error(err);
    }
  }

  fetchAds();
})();
</script>

<!-- Picture Ad Banner -->
<style>
  #ad-banner { display:none; position:relative; width:100%; max-width:720px; margin:8px auto 0; padding:0 12px; }
  #ad-banner .ad-frame {
    position:relative; width:100%; aspect-ratio:16/6; /* reserves space, no layout jump */
    border-radius:12px; overflow:hidden; background:#e5e7eb;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
  }
  #ad-banner img {
    position:absolute; inset:0; width:100%; height:100%; object-fit:cover;
    opacity:0; transition:opacity .6s ease;
  }
  #ad-banner img.active { opacity:1; }
  #ad-banner .ad-label {
    position:absolute; top:6px; left:6px; z-index:2;
    background:rgba(0,0,0,.55); color:#fff; font-size:10px; padding:2px 6px; border-radius:4px;
  }
  #ad-banner .ad-dots { position:absolute; bottom:6px; left:0; right:0; display:flex; justify-content:center; gap:5px; z-index:2; }
  #ad-banner .ad-dots span { width:6px; height:6px; border-radius:50%; background:rgba(255,255,255,.5); }
  #ad-banner .ad-dots span.active { background:#fff; }
</style>

<div id="ad-banner">
  <div class="ad-frame">
    <span class="ad-label">Ad</span>
    <div id="ad-slides"></div>
    <div class="ad-dots" id="ad-dots"></div>
  </div>
</div>

<script>
(function () {
  const banner = document.getElementById('ad-banner');
  const slidesBox = document.getElementById('ad-slides');
  const dotsBox = document.getElementById('ad-dots');
  const ROTATE_MS = 5000;

  // Fallback ads, used if the server returns nothing.
  // Leave the array empty ([]) to hide the banner when there are no ads.
  const fallbackAds = [
    // { image: 'https://yourdomain.co.ke/ads/promo1.jpg', link: 'https://wa.me/254795789363' }
  ];

  function render(ads) {
    if (!ads.length) return;
    slidesBox.innerHTML = '';
    dotsBox.innerHTML = '';

    ads.forEach((ad, i) => {
      const img = document.createElement('img');
      img.src = ad.image;
      img.alt = 'Advertisement';
      img.loading = 'eager';
      if (i === 0) img.classList.add('active');

      if (ad.link) {
        const a = document.createElement('a');
        a.href = ad.link;
        a.target = '_blank';
        a.rel = 'noopener';
        a.style.cssText = 'position:absolute;inset:0;display:block;';
        a.appendChild(img);
        slidesBox.appendChild(a);
      } else {
        slidesBox.appendChild(img);
      }

      const dot = document.createElement('span');
      if (i === 0) dot.classList.add('active');
      dotsBox.appendChild(dot);
    });

    banner.style.display = 'block';

    if (ads.length > 1) {
      let current = 0;
      const imgs = slidesBox.querySelectorAll('img');
      const dots = dotsBox.querySelectorAll('span');
      setInterval(() => {
        imgs[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (current + 1) % imgs.length;
        imgs[current].classList.add('active');
        dots[current].classList.add('active');
      }, ROTATE_MS);
    }
  }

  async function loadBannerAds() {
    try {
      const res = await fetch(
        '{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=plugin/CreateHotspotuser&type=banner_ads',
        { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({}) }
      );
      if (!res.ok) throw new Error('Network error');
      const data = await res.json();
      // Expected: [{ "image_url": "...", "link": "...", "status": 1 }, ...]
      const ads = Array.isArray(data)
        ? data.filter(a => Number(a.status) === 1 && a.image_url)
                .map(a => ({ image: a.image_url, link: a.link || '' }))
        : [];
      render(ads.length ? ads : fallbackAds);
    } catch (e) {
      console.error(e);
      render(fallbackAds);
    }
  }

  loadBannerAds();
})();
</script>

<div class="container mx-auto px-3 py-2">
    <div class="glass-effect rounded-xl overflow-hidden shadow-lg mb-3 slide-in">
        <div class="p-2">
            <div class="flex justify-center">
                <div class="flex flex-col items-center justify-center bg-gray-50 rounded-lg p-2 w-full max-w-sm">
                    <div class="text-center">
                        <p class="text-blue-600 font-bold text-base mb-0">24/7 Support</p>
                        <p class="text-gray-700 font-semibold">{$phone}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-6">
    <div class="text-center mb-6">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Choose Your Package</h2>
        <p class="text-gray-600 text-base">Select the perfect plan for you</p>
    </div>
    <div class="grid mobile-grid sm:grid-cols-3 md:grid-cols-4 gap-3" id="plansContainer">
<script>
async function fetchPlans() {
    try {
        const response = await fetch('{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=hotspot_plans', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ router_id: '{$routerId}' })
        });
        if (!response.ok) throw new Error('Network response was not ok');
        const dataPlan = await response.json();
        if (dataPlan.status === 'error') throw new Error(dataPlan.message);
        if (Array.isArray(dataPlan) && dataPlan.length > 0) {
            const plans = dataPlan
                .flatMap(router => router.plans_hotspot || [])
                .sort((a, b) => parseFloat(a.price) - parseFloat(b.price));

            // Share the same packages with the "Buy for TV" section
            window.allPlans = plans;
            if (window.renderTvPlans) window.renderTvPlans(plans);

            const colorSchemes = [
                { grad: 'from-blue-500 to-blue-600', bg: 'bg-blue-100', text: 'text-blue-800' },
                { grad: 'from-green-500 to-emerald-600', bg: 'bg-green-100', text: 'text-green-800' },
                { grad: 'from-purple-500 to-purple-600', bg: 'bg-purple-100', text: 'text-purple-800' },
            ];
            const plansContainer = document.getElementById('plansContainer');
            plansContainer.innerHTML = '';
            plans.forEach((plan, index) => {
                const colors = colorSchemes[index % colorSchemes.length];
                const isFree = parseFloat(plan.price) === 0;

                const planElement = document.createElement('div');
                planElement.className = 'w-full max-w-xs mx-auto mb-3';
                planElement.innerHTML = `
                    <div onclick='\${isFree
                            ? `handleFreeAccess(event, this.getAttribute("data-plan-id"), this.getAttribute("data-router-id"))`
                            : `handlePhoneNumberSubmission(event, this.getAttribute("data-plan-id"), this.getAttribute("data-router-id"))`
                        }; return false;'
                            data-plan-id='\${plan.planId}' data-router-id='\${plan.routerId}'
                         class='flex flex-col bg-white rounded-lg shadow-md hover:shadow-lg overflow-hidden transform transition-all duration-300 active:scale-95 cursor-pointer \${isFree ? 'border-2 border-dashed border-amber-400' : 'border border-gray-100'}'>

                        \${isFree ? `
                        <div class='relative bg-gradient-to-r from-amber-400 to-yellow-500 text-white py-2'>
                            <span class='absolute -top-0 -right-0 bg-white text-amber-500 text-[9px] font-extrabold px-1.5 py-0.5 rounded-bl-lg tracking-widest uppercase shadow-sm border border-amber-200'>
                                 FREE
                            </span>
                            <h2 class='text-xs sm:text-sm font-bold text-center px-2'>\${plan.planname}</h2>
                        </div>
                        ` : `
                        <div class='bg-gradient-to-r \${colors.grad} text-white py-2'>
                            <h2 class='text-xs sm:text-sm font-bold text-center px-2'>\${plan.planname}</h2>
                        </div>
                        `}

                        <div class='px-2 py-3 flex-grow \${isFree ? 'bg-amber-50' : colors.bg}'>
                            \${isFree ? `
                            <div class='flex justify-center mb-2'>
                                <span class='bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full border border-amber-300 tracking-wide'>
                                    No Payment Needed
                                </span>
                            </div>
                            ` : `
                            <p class='text-xl sm:text-2xl font-bold \${colors.text} mb-1 text-center'>
                                <span class='text-xs font-medium text-gray-700'>\${plan.currency}</span>
                                \${plan.price}
                            </p>
                            `}
                            <p class='text-xs text-gray-700 mb-2 text-center'>
                                <i class='far fa-clock mr-1'></i> \${plan.validity} \${plan.timelimit}
                            </p>
                            <div class='text-xs text-gray-600 text-center space-y-1'>
                                <div><i class='fas fa-wifi mr-1'></i>Unlimited Speed</div>
                                <div><i class='fas fa-shield-alt mr-1'></i>Secure Connection</div>
                            </div>
                        </div>

                        <div class='px-2 py-2 bg-white flex-shrink-0'>
                            \${isFree
                                ? `<button class='w-full bg-gradient-to-r from-amber-400 to-yellow-500 text-white font-bold py-2.5 px-3 rounded-lg text-xs sm:text-sm active:scale-95 transition-transform'>
                                        <i class='fas fa-bolt mr-1'></i> Connect Free
                                   </button>`
                                : `<button class='w-full bg-gradient-to-r \${colors.grad} text-white font-bold py-2.5 px-3 rounded-lg text-xs sm:text-sm active:scale-95 transition-transform'>
                                        <i class='fas fa-shopping-cart mr-1'></i> Buy Now
                                   </button>`
                            }
                        </div>
                    </div>
                `;
                plansContainer.appendChild(planElement);
            });
            const plansContainerElement = document.getElementById('plansContainer');
            if (plansContainerElement) {
                plansContainerElement.className = 'grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2 p-2';
            }
        } else {
            console.error('Invalid data format or empty response:', dataPlan);
        }
    } catch (error) {
        console.error('Error fetching plans:', error);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var lastTouchEnd = 0;
    document.addEventListener('touchend', function(e) {
        var now = (new Date()).getTime();
        if (now - lastTouchEnd <= 300) {
            e.preventDefault();
        }
        lastTouchEnd = now;
    }, false);
});
fetchPlans();
</script>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">

    <!-- ================= M-Pesa Reconnect ================= -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full">


        <div class="bg-white px-5 py-3">
            <h2 class="text-lg font-bold text-black text-center">
                Reconnect with Mpesa
            </h2>
        </div>


        <div class="p-5 flex-1 flex flex-col">
            <label for="mpesa_code" class="text-sm font-medium text-gray-700 mb-2">
                Paste M-Pesa Message
            </label>
            <input
                id="mpesa_code"
                name="mpesa_code"
                type="text"
                placeholder="TH90K4OSVI Confirmed..."
                class="w-full rounded-lg border bg-gray-50 px-4 py-3 focus:ring-2 focus:ring-green-500">
            <button
                onclick="redeemMpesa()"
                class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition">
                <i class="fas fa-sync-alt mr-2"></i>
                Reconnect Now
            </button>

            <p id="mpesaMessage" class="mt-3 text-center text-sm text-green-600"></p>

        </div>

    </div>

        <!-- ================ Username Reconnect ================= -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full">

        <div class="bg-white px-5 py-3">
            <h2 class="text-lg font-bold text-black text-center">
                Reconnect with Username
            </h2>
        </div>

        <div class="p-5 flex-1 flex flex-col">
            <form id="loginForm" action="$(link-login-only)" method="post">
                <input type="hidden" name="dst" value="$(link-orig)">
                <input type="hidden" name="popup" value="true">
                <label class="text-sm font-medium text-gray-700 mb-2 block">
                    Enter Username
                </label>
                <input
                    id="usernameInput"
                    name="username"
                    type="text"
                    placeholder="Enter Username"
                    class="w-full rounded-lg border bg-gray-50 px-4 py-3 focus:ring-2 focus:ring-blue-500">
                <input
                    id="passwordInput"
                    name="password"
                    type="hidden"
                    value="1234">
                <button
                    id="submitBtn"
                    type="button"
                    class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    <i class="fas fa-wifi mr-2"></i>
                    Connect Now
                </button>
            </form>
        </div>
    </div>

    <!-- ================= Voucher ================= -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-full">

        <div class="bg-white-600 px-5 py-3">
            <h2 class="text-lg font-bold text-black text-center">
                Redeem Voucher
            </h2>
        </div>
        <div class="p-5 flex-1 flex flex-col">

                <label class="text-sm font-medium text-gray-700 mb-2 block">
                    Enter Your Voucher Code
                </label>
            <input
                id="voucher_code_top"
                name="voucher_code"
                type="text"
                placeholder="Enter Voucher Code"
                class="w-full rounded-lg border bg-gray-50 px-4 py-3 focus:ring-2 focus:ring-purple-500">
            <button
                type="button"
                onclick="redeemVoucher('2','voucher_code_top')"
                class="mt-4 w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 rounded-lg transition">
                <i class="fas fa-ticket-alt mr-2"></i>
                Redeem Voucher
            </button>
            <p id="message_top" class="mt-3 text-center text-sm text-purple-600"></p>
        </div>
    </div>
</div>

<!-- ================= BUY FOR TV (MAC bypass) ================= -->
<section id="tvSection" class="container mx-auto px-3 mt-8">

    <!-- Collapsed teaser: shown first, opens the full section on click -->
    <div id="tvTeaser" class="bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer hover:shadow-xl transition-shadow"
         onclick="openTvSection()">
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white px-5 py-4 flex items-center justify-between">
            <div>
                <h2 class="text-lg md:text-xl font-bold">
                    <i class="fas fa-tv mr-2"></i>Buy for TV
                </h2>
            </div>
            <i class="fas fa-chevron-right text-slate-300"></i>
        </div>
    </div>

    <!-- Full section: hidden until the teaser above is clicked -->
    <div id="tvSectionBody" class="bg-white rounded-xl shadow-lg overflow-hidden" style="display:none;">
        <div class="bg-gradient-to-r from-slate-800 to-slate-900 text-white px-5 py-4 text-center relative">
            <button onclick="closeTvSection()" class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-white">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h2 class="text-xl md:text-2xl font-bold">
                <i class="fas fa-tv mr-2"></i>Buy for TV
            </h2>
            <p class="text-slate-300 text-sm mt-1">
                To activate for your TV first enter its MAC address below. You can find it in your TV's network settings.
                Then choose a package to activate for your TV.
            </p>
        </div>

        <div class="p-5">
            <label for="tvMacInput" class="text-sm font-medium text-gray-700 mb-2 block">
                TV MAC Address
            </label>
            <input
                id="tvMacInput"
                type="text"
                inputmode="text"
                autocomplete="off"
                autocapitalize="characters"
                maxlength="17"
                placeholder="AA:BB:CC:DD:EE:FF"
                class="w-full rounded-lg border bg-gray-50 px-4 py-3 font-mono tracking-wider uppercase focus:ring-2 focus:ring-slate-500">
            <p id="tvMacHint" class="mt-2 text-xs text-gray-500">
                12 characters (0-9, A-F). Colons are added for you.
            </p>

            <h3 class="text-base font-bold text-gray-800 mt-5 mb-2 text-center">Pick a package for your TV</h3>
            <div id="tvPlansContainer" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2">
                <p class="col-span-full text-center text-sm text-gray-500 py-4">
                    <i class="fas fa-spinner fa-spin mr-1"></i> Loading packages...
                </p>
            </div>
        </div>
    </div>
</section>
<script>
function openTvSection() {
    document.getElementById('tvTeaser').style.display = 'none';
    const body = document.getElementById('tvSectionBody');
    body.style.display = 'block';
    body.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
function closeTvSection() {
    document.getElementById('tvSectionBody').style.display = 'none';
    document.getElementById('tvTeaser').style.display = 'block';
}
</script>


<footer class="bg-gray-900 text-white py-6 mt-8">
    <div class="container mx-auto px-4">
        <div class="border-t border-gray-700 pt-4 text-center">
            <div class="flex justify-center space-x-4 mb-4">
                <a href="tel:{$phone}" class="bg-blue-600 hover:bg-blue-700 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-300">
                    <i class="fas fa-phone-alt text-sm"></i></a>
                <a href="https://wa.me/{$phone}" class="bg-green-600 hover:bg-green-700 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-300">
                    <i class="fab fa-whatsapp text-sm"></i></a>
                <a href="sms:{$phone}" class="bg-yellow-600 hover:bg-yellow-700 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-300">
                    <i class="fas fa-sms text-sm"></i></a>
            </div>
            <p class="text-gray-400 text-sm">&copy; {$company} . Powered by Umejipanga Solutions.</p>
        </div>
    </div>
</footer>

<script>
const formatPhoneNumber = (phone) => {
    phone = phone.replace(/^\+/, '').replace(/^0/, '254');
    return phone.match(/^(7|1)/) ? `254\${phone}` : phone;
};
const setCookie = (name, value, days = 7) => {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = `\${name}=\${value}; expires=\${date.toUTCString()}; path=/`;
};
const getCookie = (name) => {
    const match = document.cookie.match(new RegExp(`(?:^|; )\${name}=([^;]*)`));
    return match ? decodeURIComponent(match[1]) : null;
};
const generateAccountNumber = (length = 10) => {
    const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let accountNumber = "";
    for (let i = 0; i < length; i++) {
        accountNumber += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    setCookie('account_number', accountNumber);
    return accountNumber;
};
function getAccountNumberFromCookie() {
    return getCookie('account_number');
}
function setUsernameCookie(username) {
    if (username) setCookie('username', username);
}
function getUsernameFromCookie() {
    return getCookie('username');
}
function showVoucherSection() {
    const voucherSection = document.getElementById('voucherSection');
    voucherSection.style.display = voucherSection.style.display === 'none' ? 'block' : 'none';
}
document.addEventListener('DOMContentLoaded', () => {
    const voucherBtn = document.querySelector('button[onclick="redeemVoucher(1)"]');
    if (voucherBtn) {
        voucherBtn.onclick = showVoucherSection;
    }
});
function redeemVoucher(router_id, inputId = 'voucher_code_top') {
    const voucherCode = document.getElementById(inputId).value;
    const messageId = inputId.includes('top') ? 'message_top' : 'message_bottom';
    if (!voucherCode) {
        document.getElementById(messageId).innerText = 'Please enter a valid voucher code.';
        return;
    }
    Swal.fire({
        title: 'Processing...',
        html: '<div class="text-center"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-700 mx-auto mb-2"></div><p>Redeeming voucher...</p></div>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    let accountNumber = getAccountNumberFromCookie();
    if (!accountNumber) {
        accountNumber = generateAccountNumber();
    }
    fetch('{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=redeem_voucher', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ voucher_code: voucherCode, account_number: accountNumber, router_id: router_id })
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        if (data.status === 'error') throw new Error(data.message);
        if (data && (data.status === 'success' || data.Status === 'used')) {
            Swal.fire({
                icon: 'success',
                title: 'Voucher Redeemed!',
                text: 'Voucher redeemed successfully. Connecting...',
                showConfirmButton: false,
                timer: 2000
            });
            document.getElementById('usernameInput').value = data.username || accountNumber;
            document.getElementById('passwordInput').value = '1234';
            setUsernameCookie(data.username || accountNumber);
            setTimeout(() => document.getElementById('submitBtn').click(), 2000);
        } else {
            Swal.fire('Voucher Failed', data?.message || 'An error occurred. Please try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Error redeeming voucher:', error);
        Swal.fire('Voucher Failed', error.message || 'An error occurred. Please try again.', 'error');
    });
}
function redeemMpesa() {
    const mpesaCode = document.getElementById('mpesa_code').value;
    if (!mpesaCode) {
        document.getElementById('mpesaMessage').innerText = 'Please enter a valid MPESA code.';
        return;
    }
    Swal.fire({
        title: 'Processing...',
        html: '<div class="text-center"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-700 mx-auto mb-2"></div><p>Verifying M-Pesa code...</p></div>',
        showConfirmButton: false,
        allowOutsideClick: false
    });
    fetch('{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=redeem_mpesa_code', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ mpesa_code: mpesaCode })
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        if (data.status === 'error') throw new Error(data.message);
        if (data && (data.status === 'success')) {
            Swal.fire({
                icon: 'success',
                title: 'M-Pesa Code Verified!',
                text: 'M-Pesa code redeemed successfully. Connecting...',
                showConfirmButton: false,
                timer: 2000
            });
            document.getElementById('usernameInput').value = data.username;
            document.getElementById('passwordInput').value = '1234';
            setUsernameCookie(data.username);
            setTimeout(() => document.getElementById('submitBtn').click(), 2000);
        } else {
            Swal.fire('M-Pesa Failed', data?.message || 'An error occurred. Please try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Error redeeming MPESA code:', error);
        Swal.fire('M-Pesa Failed', error.message || 'An error occurred. Please try again.', 'error');
    });
}

async function handleFreeAccess(event, planId, routerId) {
    event.preventDefault();
    event.stopPropagation();

    Swal.fire({
        title: 'Connecting...',
        html: `<div class="text-center">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-4 border-blue-600 mb-4"></div>
                <p>Setting up your free connection...</p>
               </div>`,
        showConfirmButton: false,
        allowOutsideClick: false
    });

    try {
        let accountNumber = getAccountNumberFromCookie() || generateAccountNumber();
        document.getElementById('usernameInput').value = accountNumber;
        document.getElementById('passwordInput').value = '1234';

        const response = await fetch('{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=grant', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                phone_number: '',   // empty, no phone needed for free plans
                plan_id: planId,
                router_id: routerId,
                account_number: accountNumber
            })
        });

        if (!response.ok) throw new Error('Network response was not ok');
        const data = await response.json();
        if (data.status === 'error') throw new Error(data.message);

        Swal.fire({
            icon: 'success',
            title: 'Connected!',
            html: `<div class="text-center">
                    <i class="fas fa-wifi text-4xl text-green-500 mb-2"></i>
                    <p>You are now connected!</p>
                    <p class="text-sm text-gray-600 mt-2">Redirecting...</p>
                   </div>`,
            showConfirmButton: false,
            timer: 2000
        });

        document.getElementById('usernameInput').value = data.username || accountNumber;
        document.getElementById('passwordInput').value = '1234';
        setUsernameCookie(data.username || accountNumber);
        setTimeout(() => document.getElementById('loginForm').submit(), 2000);

    } catch (error) {
        Swal.fire('Connection Failed', error.message, 'error');
    }
}

async function handlePhoneNumberSubmission(event, planId, routerId) {
    event.preventDefault();
    event.stopPropagation();
    Swal.fire({
        title: 'Enter Your Phone Number',
        html: '<p class="text-sm text-gray-600 mb-2">Enter your number to complete payment</p>',
        input: 'tel',
        inputAttributes: { placeholder: '07XXXXXXXX 0r 01XXXXXXX', class: 'text-center text-lg' },
        inputValidator: (value) => !value ? 'Please enter your phone number!' : null,
        showCancelButton: true,
        confirmButtonColor: '#1e40af',
        confirmButtonText: '<i class="fas fa-credit-card mr-1"></i> Pay Now',
        showLoaderOnConfirm: true,
        preConfirm: async (phoneNumber) => {
            try {
                const formattedPhoneNumber = formatPhoneNumber(phoneNumber);
                let accountNumber = getAccountNumberFromCookie() || generateAccountNumber();
                document.getElementById('usernameInput').value = accountNumber;
                document.getElementById('passwordInput').value = '1234';
                const response = await fetch('{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=grant', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        phone_number: formattedPhoneNumber,
                        plan_id: planId,
                        router_id: routerId,
                        account_number: accountNumber
                    })
                });
                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();
                if (data.status === 'error') throw new Error(data.message);
                showPaymentProcessing();
                checkPaymentStatus(accountNumber);
                return formattedPhoneNumber;
            } catch (error) {
                Swal.fire('Payment Failed', error.message, 'error');
            }
        }
    });
}
function showPaymentProcessing() {
    Swal.fire({
        icon: 'info',
        title: 'Processing Payment',
        html: `<div class="text-center">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-4 border-blue-600 mb-4"></div>
                <p class="mb-2">Payment request sent to your phone</p>
                <p class="text-sm text-gray-600">Enter your M-Pesa PIN to complete payment</p>
              </div>`,
        showConfirmButton: false,
        allowOutsideClick: false
    });
}
function checkPaymentStatus(accountNumber) {
    const checkInterval = setInterval(() => {
        $.ajax({
            url: '{$appUrl}/index.php?_route=plugin/CreateHotspotuser&type=verify',
            method: 'POST',
            data: JSON.stringify({account_number: accountNumber}),
            contentType: 'application/json',
            dataType: 'json',
            success: (data) => {
                if (data.Status === 'success') {
                    clearInterval(checkInterval);
                    Swal.fire({
                        icon: 'success',
                        title: 'Payment Successful!',
                        html: `<div class="text-center">
                                <i class="fas fa-check-circle text-4xl text-green-500 mb-2"></i>
                                <p>Payment verified successfully!</p>
                                <p class="text-sm text-gray-600 mt-2">Connecting...</p>
                              </div>`,
                        showConfirmButton: false
                    });
                    document.getElementById('usernameInput').value = data.username || accountNumber;
                    document.getElementById('passwordInput').value = '1234';
                    setUsernameCookie(data.username || accountNumber);
                    setTimeout(() => document.getElementById('loginForm').submit(), 2000);
                } else if (data.Status === 'danger') {
                    clearInterval(checkInterval);
                    Swal.fire('Payment Issue', data.Message, 'error');
                }
            }
        });
    }, 2000);
    setTimeout(() => {
        clearInterval(checkInterval);
        Swal.fire('Payment Timeout', 'Payment verification timed out. Please try again.', 'warning');
    }, 300000);
}
function autoLogin() {
    let username = getUsernameFromCookie() || getAccountNumberFromCookie();
    if (username) {
        document.getElementById('usernameInput').value = username;
        document.getElementById('passwordInput').value = '1234';
    }
}
document.addEventListener('DOMContentLoaded', function() {
    autoLogin();
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault();
        const username = document.getElementById('usernameInput').value;
        if (!username) {
            Swal.fire('Missing Info', 'Please enter your username or account number.', 'warning');
            return;
        }
        Swal.fire({
            title: 'Connecting',
            html: '<div class="text-center"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-700 mx-auto mb-2"></div><p>Connecting...</p></div>',
            showConfirmButton: false,
            timer: 2000
        }).then(() => document.getElementById('loginForm').submit());
    });
});
</script>


<!-- ================= BUY FOR TV: logic ================= -->
<script>
(function () {
    const API = '{$appUrl}/index.php?_route=plugin/CreateHotspotuser';
    const macInput = document.getElementById('tvMacInput');
    const macHint  = document.getElementById('tvMacHint');
    const tvContainer = document.getElementById('tvPlansContainer');

    // ---- MAC helpers ----
    const cleanMac = (v) => (v || '').replace(/[^0-9a-fA-F]/g, '').toUpperCase().slice(0, 12);
    const formatMac = (v) => cleanMac(v).match(/.{1,2}/g)?.join(':') || '';
    const isValidMac = (v) => /^([0-9A-F]{2}:){5}[0-9A-F]{2}$/.test(v);

    // Auto-format as the user types / pastes (accepts AA-BB-.., AABB.., aa:bb:..)
    macInput.addEventListener('input', () => {
        macInput.value = formatMac(macInput.value);
        const len = cleanMac(macInput.value).length;
        if (len === 0) {
            macHint.className = 'mt-2 text-xs text-gray-500';
            macHint.textContent = '12 characters (0-9, A-F). Colons are added for you.';
        } else if (len < 12) {
            macHint.className = 'mt-2 text-xs text-amber-600';
            macHint.textContent = `${len}/12 characters entered`;
        } else {
            macHint.className = 'mt-2 text-xs text-green-600';
            macHint.textContent = 'MAC address looks good';
        }
    });

    // Deterministic per-TV account number (does not touch the phone's cookie)
    const tvAccountNumber = (mac) => 'TV' + mac.replace(/:/g, '');

    // ---- Render the same packages ----
    const colorSchemes = [
        { grad: 'from-blue-500 to-blue-600', bg: 'bg-blue-100', text: 'text-blue-800' },
        { grad: 'from-green-500 to-emerald-600', bg: 'bg-green-100', text: 'text-green-800' },
        { grad: 'from-purple-500 to-purple-600', bg: 'bg-purple-100', text: 'text-purple-800' },
    ];

    window.renderTvPlans = function (plans) {
        tvContainer.innerHTML = '';
         // Remove free packages
        plans = plans.filter(plan => parseFloat(plan.price) > 0);
        plans.forEach((plan, index) => {
            const colors = colorSchemes[index % colorSchemes.length];
            const isFree = parseFloat(plan.price) === 0;
            const card = document.createElement('div');
            card.className = 'flex flex-col bg-white rounded-lg shadow-md hover:shadow-lg overflow-hidden transition-all duration-300 active:scale-95 cursor-pointer ' +
                (isFree ? 'border-2 border-dashed border-amber-400' : 'border border-gray-100');
            card.innerHTML = `
                <div class='bg-gradient-to-r \${isFree ? 'from-amber-400 to-yellow-500' : colors.grad} text-white py-2'>
                    <h2 class='text-xs sm:text-sm font-bold text-center px-2'\${plan.planname}</h2>
                </div>
                <div class='px-2 py-3 flex-grow \${isFree ? 'bg-amber-50' : colors.bg}'>
                    \${isFree
                        ? `<div class='flex justify-center mb-2'><span class='bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full border border-amber-300'>No Payment Needed</span></div>`
                        : `<p class='text-xl sm:text-2xl font-bold \${colors.text} mb-1 text-center'><span class='text-xs font-medium text-gray-700'>\${plan.currency}</span>\${plan.price}</p>`}
                    <p class='text-xs text-gray-700 mb-2 text-center'><i class='far fa-clock mr-1'></i> \${plan.validity} \${plan.timelimit}</p>
                    <div class='text-xs text-gray-600 text-center space-y-1'>
                        <div><i class='fas fa-tv mr-1'></i>Works on your TV</div>
                        <div><i class='fas fa-shield-alt mr-1'></i>Secure Connection</div>
                    </div>
                </div>
                <div class='px-2 py-2 bg-white'>
                    <button type='button' class='w-full bg-gradient-to-r \${isFree ? 'from-amber-400 to-yellow-500' : colors.grad} text-white font-bold py-2.5 px-3 rounded-lg text-xs sm:text-sm'>
                        <i class='fas fa-tv mr-1'></i> \${isFree ? 'Activate Free' : 'Buy for TV'}
                    </button>
                </div>`;
            card.addEventListener('click', () => buyForTv(plan, isFree));
            tvContainer.appendChild(card);
        });
    };

    // If the plans finished loading before this script ran
    if (window.allPlans) window.renderTvPlans(window.allPlans);

    // ---- Purchase flow ----
    async function buyForTv(plan, isFree) {
        const mac = formatMac(macInput.value);
        if (!isValidMac(mac)) {
            macInput.focus();
            macInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            Swal.fire('MAC Address Needed', 'Please enter your TV\'s full MAC address (e.g. AA:BB:CC:DD:EE:FF) first.', 'warning');
            return;
        }
        const accountNumber = tvAccountNumber(mac);

        if (isFree) {
            const ok = await Swal.fire({
                title: 'Activate TV?',
                html: `<p class="text-sm text-gray-600">TV MAC</p><p class="font-mono font-bold text-lg">${mac}</p>`,
                showCancelButton: true,
                confirmButtonText: 'Yes, activate',
                confirmButtonColor: '#1e40af'
            });
            if (!ok.isConfirmed) return;
            Swal.fire({
                title: 'Activating...',
                html: '<div class="text-center"><div class="inline-block animate-spin rounded-full h-12 w-12 border-b-4 border-blue-600 mb-4"></div><p>Setting up your TV...</p></div>',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            try {
                await requestGrant('', plan, mac, accountNumber);
                showTvSuccess(mac);
            } catch (err) {
                Swal.fire('Activation Failed', err.message, 'error');
            }
            return;
        }

        Swal.fire({
            title: 'Pay for TV',
            html: `<p class="text-sm text-gray-600">TV MAC</p>
                   <p class="font-mono font-bold text-lg mb-2">${mac}</p>
                   <p class="text-sm text-gray-600 mb-1">${plan.planname} &middot; ${plan.currency} ${plan.price}</p>
                   <p class="text-sm text-gray-600 mb-2">Enter the M-Pesa number to pay with</p>`,
            input: 'tel',
            inputAttributes: { placeholder: '07XXXXXXXX or 01XXXXXXXX', class: 'text-center text-lg' },
            inputValidator: (value) => !value ? 'Please enter your phone number!' : null,
            showCancelButton: true,
            confirmButtonColor: '#1e40af',
            confirmButtonText: '<i class="fas fa-credit-card mr-1"></i> Pay Now',
            showLoaderOnConfirm: true,
            preConfirm: async (phoneNumber) => {
                try {
                    await requestGrant(formatPhoneNumber(phoneNumber), plan, mac, accountNumber);
                    showPaymentProcessing();
                    pollTvPayment(accountNumber, mac);
                } catch (err) {
                    Swal.showValidationMessage(err.message);
                }
            }
        });
    }

    async function requestGrant(phone, plan, mac, accountNumber) {
        const response = await fetch(API + '&type=grant', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                phone_number: phone,
                plan_id: plan.planId,
                router_id: plan.routerId,
                account_number: accountNumber,
                mac_address: mac,      // used server-side to bypass the TV by MAC
                device_type: 'tv'
            })
        });
        if (!response.ok) throw new Error('Network response was not ok');
        const data = await response.json();
        if (data.status === 'error') throw new Error(data.message);
        return data;
    }

    function pollTvPayment(accountNumber, mac) {
        let done = false;
        const interval = setInterval(() => {
            $.ajax({
                url: API + '&type=verify',
                method: 'POST',
                data: JSON.stringify({ account_number: accountNumber, mac_address: mac, device_type: 'tv' }),
                contentType: 'application/json',
                dataType: 'json',
                success: (data) => {
                    if (done) return;
                    if (data.Status === 'success') {
                        done = true;
                        clearInterval(interval);
                        clearTimeout(timeout);
                        showTvSuccess(mac);
                    } else if (data.Status === 'danger') {
                        done = true;
                        clearInterval(interval);
                        clearTimeout(timeout);
                        Swal.fire('Payment Issue', data.Message, 'error');
                    }
                }
            });
        }, 2000);
        const timeout = setTimeout(() => {
            if (done) return;
            clearInterval(interval);
            Swal.fire('Payment Timeout', 'Payment verification timed out', 'warning');;
        }, 300000);
    }

    function showTvSuccess(mac) {
        Swal.fire({
            icon: 'success',
            title: 'TV Activated!',
            html: `<div class="text-center">
                    <i class="fas fa-tv text-4xl text-green-500 mb-2"></i>
                    <p class="font-mono font-bold">${mac}</p>
                    <p class="text-sm text-gray-600 mt-2">No login needed. Turn your TV's Wi-Fi off and on (or restart the TV) and it will connect automatically.</p>
                   </div>`,
            confirmButtonColor: '#1e40af'
        });
    }
})();
</script>
</body>
</html>
HTML;


$planStmt->close();
$mysqli->close();

if (isset($_GET['download']) && $_GET['download'] == '1') {
    $filename = "login.html";
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filename));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($htmlContent));
    echo $htmlContent;
    exit;
}

echo $htmlContent;
?>
