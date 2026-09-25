{include file="sections/header.tpl"}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{literal}
<style>
:root {
    --primary-color: #000000;
    --background-color: #FFFFFF;
    --text-color: #000000;
    --border-color: #e5e7eb;
    --button-color: #1A73E8;
    --button-hover-color: #1557B0;
}

body {
    background-color: var(--background-color);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
    color: var(--text-color);
}

.card-simple {
    background: var(--background-color);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 30px;
    border: 1px solid var(--border-color);
}

.header-simple {
    background: #1A73E8;
    color: #FFFFFF;
    padding: 20px 28px;
    border-bottom: 1px solid var(--border-color);
}

.header-simple h2 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-save {
    background-color: var(--button-color);
    color: var(--background-color);
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
    min-width: 120px;
}

.btn-purple {
    background-color: #7A288A;
    border-color: #7A288A;
    color: #FFFFFF;
}

.btn-purple:hover {
    background-color: #5C1A66;
    border-color: #5C1A66;
}

.btn-save:hover {
    background-color: var(--button-hover-color);
}

.btn-copy {
    background-color: var(--button-color);
    color: var(--background-color);
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.2s;
}

.btn-copy:hover {
    background-color: var(--button-hover-color);
}

.form-control {
    border: 1px solid var(--border-color);
}

.form-control:focus {
    outline: none;
    border-color: var(--button-color);
    box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
}

/* Banner ads */
.banner-thumb {
    width: 140px;
    height: 52px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid var(--border-color);
    background: #f3f4f6;
    display: block;
}

.banner-preview-box {
    display: none;
    margin-top: 10px;
    max-width: 420px;
    aspect-ratio: 16 / 6;
    border-radius: 8px;
    overflow: hidden;
    border: 1px dashed var(--border-color);
    background: #f3f4f6;
}

.banner-preview-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.banner-row-2 {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.banner-row-2 .form-group {
    flex: 1 1 200px;
}

.help-note {
    color: #6b7280;
    font-size: 12px;
    margin-top: 4px;
}
</style>
{/literal}

<div class="container-simple">
    <!-- Hotspot Settings -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-wifi"></i> Download Login Page</h2>
        </div>
        <div class="content-simple">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Page Title</label>
                    <input type="text" class="form-control" name="hotspot_title" value="{$hotspot_title}"
                           required placeholder="Hotspot Page Title">
                </div>
                <div class="form-group">
                    <label class="form-label">Router</label>
                    <select class="form-control select2" name="router_id">
                        <option value="">Select a router</option>
                        {foreach $routers as $router}
                            <option value="{$router.id}" {if $router.id eq $selected_router_id}selected{/if}>
                                {$router.name}
                            </option>
                        {/foreach}
                    </select>
                </div>
                <button type="submit" class="btn-save">
                    <i class="fa fa-save"></i> Save Changes
                </button>
                <br>
                <br>
                <aside class="custom-nav">
                    <a href="{$app_url}/download.php?download=1" class="btn btn-lg btn-purple shadow">
                        <i class="fa fa-download"></i> Download Page
                    </a>
                </aside>
            </form>
        </div>
    </div>

    <!-- Banner (Picture) Ads Manager -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-image"></i> Banner Ads (Picture)</h2>
        </div>
        <div class="content-simple">
            <form method="POST" action="" id="banner-form" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save_banner">

                <div class="form-group">
                    <label class="form-label">Banner Image</label>
                    <input type="file" class="form-control" name="banner_image" id="banner_image"
                           accept="image/jpeg,image/png,image/webp" required>
                    <div class="help-note">
                        JPG, PNG or WEBP, up to 2 MB. Best size: 1200 x 450 px. Larger images are shrunk automatically.
                    </div>
                    <div class="banner-preview-box" id="banner_preview_box">
                        <img id="banner_preview_img" src="" alt="Preview">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Title (optional, for your reference)</label>
                    <input type="text" class="form-control" name="banner_title"
                           placeholder="e.g. Weekend Promo" maxlength="150">
                </div>

                <div class="banner-row-2">
                    <div class="form-group">
                        <label class="form-label">Start Date (optional)</label>
                        <input type="date" class="form-control" name="banner_start">
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Date (optional)</label>
                        <input type="date" class="form-control" name="banner_end">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="banner_status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-save">
                    <i class="fa fa-upload"></i> Upload Banner
                </button>
            </form>

            <hr style="margin: 1.5rem 0;">

            <h4>Current Banners</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $banner_ads as $b}
                        <tr>
                            <td>{$b.id}</td>
                            <td>
                                <a href="{$b.preview_url|escape}" target="_blank">
                                    <img class="banner-thumb" src="{$b.preview_url|escape}" alt="Banner {$b.id}">
                                </a>
                            </td>
                            <td>
                                {if $b.title}<strong>{$b.title|escape}</strong><br>{/if}
                            </td>
                            <td>
                                {if $b.start_date || $b.end_date}
                                    {if $b.start_date}{$b.start_date}{else}...{/if}
                                    &rarr;
                                    {if $b.end_date}{$b.end_date}{else}...{/if}
                                {else}
                                    <span class="text-muted">Always</span>
                                {/if}
                            </td>
                            <td>
                                {if $b.is_live eq 1}
                                    <span class="badge badge-success">Live</span>
                                {elseif $b.status eq 1}
                                    <span class="badge badge-warning">Active (outside dates)</span>
                                {else}
                                    <span class="badge badge-danger">Inactive</span>
                                {/if}
                            </td>
                            <td>
                                <a href="{$_url}plugin/hotspot_settings&toggle_banner={$b.id}"
                                   class="btn btn-sm btn-warning" title="Enable / disable">
                                    <i class="fa fa-toggle-on"></i>
                                </a>
                                <a href="{$_url}plugin/hotspot_settings&delete_banner={$b.id}"
                                   class="btn btn-sm btn-danger" title="Delete"
                                   onclick="return confirm('Delete this banner and its image?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        {foreachelse}
                        <tr>
                            <td colspan="6" class="text-center text-muted">No banners yet.</td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Ad Ticker Manager -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-bullhorn"></i> Ticker Ads</h2>
        </div>
        <div class="content-simple">
            <form method="POST" action="" id="ad-form">
                <input type="hidden" name="action" value="save_ad">

                <div class="form-group">
                    <label class="form-label">Ad Message</label>
                    <input type="text" class="form-control" name="ad_message"
                        placeholder="e.g. Unlimited browsing from just Ksh 30!"
                        maxlength="200" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="ad_status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn-save">
                    <i class="fa fa-plus"></i> Add Ad
                </button>
            </form>

            <hr style="margin: 1.5rem 0;">

            <h4>Current Ads</h4>
            <table class="table table-bordered table-striped" style="margin-top: 1rem;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $ticker_ads as $ad}
                    <tr>
                        <td>{$ad.id}</td>
                        <td>{$ad.message}</td>
                        <td>
                            {if $ad.status eq 1}
                                <span class="badge badge-success">Active</span>
                            {else}
                                <span class="badge badge-danger">Inactive</span>
                            {/if}
                        </td>
                        <td>
                            <a href="{$_url}plugin/hotspot_settings&toggle_ad={$ad.id}"
                            class="btn btn-sm btn-warning">
                                <i class="fa fa-toggle-on"></i>
                            </a>

                            <a href="{$_url}plugin/hotspot_settings&delete_ad={$ad.id}"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this ad?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    {foreachelse}
                    <tr>
                        <td colspan="5" class="text-center text-muted">No ads yet.</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Usage Instructions -->
    <div class="card-simple">
        <div class="header-simple">
            <h2><i class="fa fa-info-circle"></i> Add website URL to the MikroTik walled garden</h2>
        </div>
        <div class="content-simple">
            <div class="walled-garden-content">
                <pre id="scriptContent">
/ip hotspot walled-garden
add dst-host=jsdelivr.com
add dst-host=cdn.tailwindcss.com
add dst-host=cdnjs.cloudflare.com
add dst-host=cdn.jsdelivr.net
add dst-host=sweetalert2.github.io
add dst-host=jsdelivr.com
add dst-host=www.jsdelivr.com
add dst-host=ajax.googleapis.com
add dst-host=sweetalert2.github.io
add dst-host=fonts.googleapis.com
add dst-host=fonts.gstatic.com
add dst-host=unpkg.com
add dst-host=kit.fontawesome.com
add dst-host=code.jquery.com
add dst-host={$_domain}
add dst-host=*.{$_domain}
                </pre>
                <button onclick="copyToClipboard()" class="btn-copy">
                    <i class="fa fa-copy"></i> Copy Script
                </button>
            </div>
            <br>
            <br>

            <p class="mt-4">Also consider adding the following domains to the walled garden:</p>
            <div class="walled-garden-content">
                <pre id="scriptContent_2">
/ip hotspot walled-garden ip add action=accept dst-host="{$_domain}"
/ip hotspot walled-garden ip add action=accept dst-host="{$main_domain}"
/ip hotspot walled-garden ip add action=accept dst-host="code.jquery.com"
/ip hotspot walled-garden ip add action=accept dst-host="cdn.jsdelivr.net"
/ip hotspot walled-garden ip add action=accept dst-host="cdnjs.cloudflare.com"
/ip hotspot walled-garden ip add action=accept dst-host="fonts.googleapis.com"
/ip hotspot walled-garden ip add action=accept dst-host="cdn.tailwindcss.com"
/ip hotspot walled-garden ip add action=accept dst-host="*.{$main_domain}"
/ip hotspot walled-garden ip add action=accept dst-host="ajax.googleapis.com"
                </pre>
                <button onclick="copyToClipboardSecond()" class="btn-copy">
                    <i class="fa fa-copy"></i> Copy Script
                </button>
            </div>
        </div>
    </div>
</div>

{literal}
<script>
    function copyToClipboard() {
        const scriptContent = document.getElementById("scriptContent").innerText;
        navigator.clipboard.writeText(scriptContent).then(() => {
            Swal.fire({
                icon: "success",
                title: "Copied!",
                text: "Walled garden script copied to clipboard!",
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(err => console.error("Failed to copy: ", err));
    }

    function copyToClipboardSecond() {
        const scriptContent = document.getElementById("scriptContent_2").innerText;
        navigator.clipboard.writeText(scriptContent).then(() => {
            Swal.fire({
                icon: "success",
                title: "Copied!",
                text: "Walled garden script copied to clipboard!",
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(err => console.error("Failed to copy: ", err));
    }

    // Banner image: live preview and size check before upload
    (function () {
        var input = document.getElementById('banner_image');
        var box = document.getElementById('banner_preview_box');
        var img = document.getElementById('banner_preview_img');
        if (!input) return;

        input.addEventListener('change', function () {
            var file = input.files && input.files[0];
            if (!file) {
                box.style.display = 'none';
                return;
            }
            if (file.size > 2 * 1024 * 1024) {
                Swal.fire('Image too large', 'Please choose an image under 2 MB.', 'warning');
                input.value = '';
                box.style.display = 'none';
                return;
            }
            img.src = URL.createObjectURL(file);
            box.style.display = 'block';
        });
    })();
</script>
{/literal}

{include file="sections/footer.tpl"}
