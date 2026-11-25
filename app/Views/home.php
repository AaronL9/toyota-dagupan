<?= $this->extend("layout/default"); ?>
<?= $this->section("mainContent"); ?>

<!-- CAROUSEL -->
<section id="home" aria-label="Featured promotions" data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isInfiniteLoop": true
    }' class="relative bg-black">
    <div class="hs-carousel relative h-[320px] w-full overflow-hidden sm:h-[440px] md:h-[520px] lg:h-[640px]">
        <div
            class="hs-carousel-body absolute bottom-0 start-0 top-0 flex flex-nowrap opacity-0 transition-transform duration-700">

            <!-- Slide 1 -->
            <div class="hs-carousel-slide">
                <div class="relative h-full">
                    <img src="/img/carousel2-ExbEmYc-.jpg" alt="Toyota featured promotion" fetchpriority="high"
                        class="h-full w-full object-cover" />

                    <div class="pointer-events-none absolute inset-0 bg-black/30"></div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hs-carousel-slide">
                <div class="relative h-full">
                    <img src="/images/slide-2.jpg" alt="Beach at sunset" class="h-full w-full object-cover" />

                    <div class="pointer-events-none absolute inset-0 bg-black/40"></div>

                    <div class="absolute inset-0 flex items-center">
                        <div class="mx-auto w-full max-w-7xl px-16 sm:px-20 lg:px-24">
                            <div class="max-w-2xl text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hs-carousel-slide">
                <div class="relative h-full">
                    <img src="/images/slide-2.jpg" alt="Beach at sunset" class="h-full w-full object-cover" />

                    <div class="pointer-events-none absolute inset-0 bg-black/40"></div>

                    <div class="absolute inset-0 flex items-center">
                        <div class="mx-auto w-full max-w-7xl px-16 sm:px-20 lg:px-24">
                            <div class="max-w-2xl text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Previous -->
    <button type="button" aria-label="Previous slide"
        class="hs-carousel-prev absolute start-3 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-black/30 text-white backdrop-blur-sm transition-colors hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white sm:start-6 sm:h-12 sm:w-12">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
            aria-hidden="true">
            <path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Next -->
    <button type="button" aria-label="Next slide"
        class="hs-carousel-next absolute end-3 top-1/2 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-black/30 text-white backdrop-blur-sm transition-colors hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white sm:end-6 sm:h-12 sm:w-12">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"
            aria-hidden="true">
            <path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
</section>

<!-- Vehicle Cards Section -->
<section aria-labelledby="featured-vehicles-heading" class="bg-white py-16 text-gray-950 md:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <header class="mb-8 pl-5 sm:mb-10 sm:pl-6">
            <h2 id="featured-vehicles-heading" class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl">
                Featured Vehicles
            </h2>
        </header>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <?php $isFirstVehicle = true; ?>

            <?php foreach ($vehicles as $row): ?>
                <?php
                $isFeatured = $isFirstVehicle;
                $isFirstVehicle = false;
                $title = htmlspecialchars($row->vehicle_title, ENT_QUOTES, 'UTF-8');
                ?>

                <article class="group overflow-hidden rounded-none border border-gray-200
                    <?= $isFeatured
                        ? 'grid bg-gray-950 text-white sm:col-span-2 lg:col-span-3 lg:grid-cols-5'
                        : 'flex flex-col bg-white text-gray-950' ?>">

                    <!-- Vehicle photo -->
                    <div class="flex items-center justify-center bg-gray-100
                        <?= $isFeatured ? 'p-5 sm:p-8 lg:col-span-3' : 'p-4' ?>">
                        <img src="uploads/img/variants/<?= htmlspecialchars($row->variant_filename, ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= $title ?>" loading="lazy" class="w-full object-contain motion-safe:transition-transform
                                   motion-safe:duration-500 motion-safe:group-hover:scale-[1.03]
                                   <?= $isFeatured ? 'h-56 sm:h-72 lg:h-80' : 'h-48 sm:h-52' ?>">
                    </div>

                    <!-- Vehicle details -->
                    <div class="flex min-w-0 flex-1 flex-col
                        <?= $isFeatured ? 'justify-center p-7 sm:p-9 lg:col-span-2' : 'p-6' ?>">

                        <h3 class="break-words font-bold leading-tight tracking-tight
                            <?= $isFeatured ? 'text-4xl sm:text-5xl' : 'text-2xl' ?>">
                            <?= $title ?>
                        </h3>

                        <div class="mt-5">
                            <?php if ($row->variant_isshowprice): ?>
                                <p class="text-xs font-semibold uppercase tracking-widest
                                    <?= $isFeatured ? 'text-gray-300' : 'text-gray-500' ?>">
                                    Starting at
                                </p>

                                <p class="mt-1 text-2xl font-bold tracking-tight">
                                    <span class="text-sm font-medium">PHP</span>
                                    <?= number_format($row->variant_price, 2) ?><sup class="text-xs">*</sup>
                                </p>

                                <p class="mt-1 text-sm <?= $isFeatured ? 'text-gray-300' : 'text-gray-600' ?>">
                                    PHP <?= number_format($row->variant_price_month, 2) ?><sup>*</sup> / month
                                </p>
                            <?php else: ?>
                                <p class="text-sm leading-7 <?= $isFeatured ? 'text-gray-300' : 'text-gray-600' ?>">
                                    <?= htmlspecialchars($row->vehicle_tagline ?? '', ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="<?= $isFeatured ? 'pt-7' : 'mt-auto pt-6' ?>">
                            <a href="/<?= url_title($row->vehicle_title, '-', true) ?>"
                                aria-label="View full specifications for <?= $title ?>" class="inline-flex min-h-11 items-center gap-3 rounded-none text-sm font-semibold
                                       focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-red-600
                                       <?= $isFeatured
                                            ? 'bg-red-600 px-5 text-white hover:bg-red-700'
                                            : 'text-gray-950 hover:text-red-600' ?>">
                                Full Specs
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex flex-col items-start gap-4 border-t border-gray-200 pt-6
                    sm:flex-row sm:items-center sm:justify-between">

            <a href="/showroom" class="inline-flex min-h-12 items-center gap-3 rounded-none bg-red-600 px-6
                      text-sm font-semibold text-white hover:bg-red-700
                      focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-red-600">
                View All Vehicles <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>

<!-- HERO SECTION -->
<!-- <section class="relative lg:grid lg:h-screen lg:place-content-center">
    <div class="absolute inset-0 -z-10">
        <img src="/static/toyota-bg.jpg" class="h-full w-full object-cover" alt="" />
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    <div
        class="mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-4 lg:px-8 lg:py-32">
        <div class="max-w-prose text-left text-white">
            <h1 class="text-4xl font-bold sm:text-5xl">
                Driven by
                <strong class="text-red-500"> Innovation. </strong>
                Powered by Results
            </h1>

            <p class="mt-4 text-base sm:text-lg/relaxed text-white/90">
                Welcome to Toyota Baguio
            </p>
        </div>
    </div>
</section> -->

<!-- Hero / Editorial Section -->
<section aria-labelledby="hero-title" class="bg-white text-zinc-950">

    <!-- Full-width campaign photograph -->
    <div class="relative isolate flex min-h-[30rem] items-end overflow-hidden
                bg-zinc-900 sm:min-h-[36rem] lg:min-h-[clamp(36rem,75vh,52rem)]">

        <img src="/static/toyota-bg.jpg" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover
                   object-[65%_center] lg:object-center">

        <!-- Keep the headline readable and the upper photo visible -->
        <div aria-hidden="true" class="absolute inset-0 -z-10
                   bg-gradient-to-t from-black/85 via-black/25 to-transparent
                   lg:bg-gradient-to-r lg:from-black/80 lg:via-black/25"></div>

        <div class="mx-auto w-full max-w-7xl px-6 pb-10 pt-24
                    sm:px-10 sm:pb-14 lg:px-12 lg:pb-20">
            <h1 id="hero-title" class="text-[clamp(2.5rem,7vw,6.5rem)] font-bold uppercase
                       leading-[0.94] tracking-tight text-white">
                <span class="block">Dealer</span>
                <span class="block">quote</span>
            </h1>
        </div>
    </div>

    <!-- Editorial band -->
    <div class="mx-auto grid max-w-7xl gap-5 px-6 py-10
                sm:px-10 sm:py-14
                lg:grid-cols-12 lg:items-center lg:gap-12 lg:px-12 lg:py-20">

        <h2 class="text-3xl font-semibold tracking-tight sm:text-4xl
                   lg:col-span-7 lg:text-5xl">
            Dealer <span class="text-red-600">Quote Here.</span>
        </h2>

        <p class="max-w-md text-base leading-7 text-zinc-600
                  sm:text-lg sm:leading-8 lg:col-span-5">
            Discover a new perspective on every drive.
            Your next chapter begins with Toyota Dagupan.
        </p>
    </div>

</section>

<!-- SERVICE SECTION -->
<section id="services" aria-labelledby="services-heading"
    class="relative isolate scroll-mt-24 overflow-hidden bg-zinc-950 text-white">
    <!-- Workshop photo -->
    <div class="relative h-56 w-full sm:h-72
                lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-[58%]">
        <img src="/img/maintenance-GiBGTARx.jpg" alt="Toyota Service Center" loading="lazy"
            class="h-full w-full object-cover object-center">
    </div>

    <!-- Angled edge between the text and photo on desktop -->
    <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 hidden w-[53%]
               bg-zinc-950 lg:block
               lg:[clip-path:polygon(0_0,100%_0,82%_100%,0_100%)]"></div>

    <!-- Service details -->
    <div class="relative mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14
                lg:grid lg:min-h-[30rem] lg:grid-cols-12 lg:items-center lg:py-20">
        <div class="lg:col-span-5 lg:pr-8">
            <h2 id="services-heading" class="text-4xl font-bold leading-tight tracking-tight sm:text-5xl">
                Schedule
                <span class="block">Toyota Service</span>
            </h2>

            <p class="mt-5 max-w-md text-base leading-7 text-zinc-300">
                Keep your Toyota running at peak performance with our expert
                maintenance services. Schedule your appointment online and
                experience professional care from certified technicians.
            </p>

            <a href="/schedule" class="group mt-7 inline-flex min-h-12 w-full items-center
                       justify-center gap-4 bg-red-600 px-6 py-3 text-sm
                       font-semibold text-white transition-colors hover:bg-red-700
                       focus-visible:outline-2 focus-visible:outline-offset-4
                       focus-visible:outline-white sm:w-auto">
                Schedule Maintenance
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5 shrink-0 motion-safe:transition-transform
                           motion-safe:group-hover:translate-x-1">
                    <path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>


<!-- Team Section -->
<section id="team" class="bg-white text-black py-16 px-6 scroll-p-24 md:px-16 lg:px-24 xl:px-32">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <div class="flex flex-col items-center lg:items-start gap-6">
            <h2 class="text-center lg:text-left text-4xl md:text-5xl/16 max-w-lg leading-tight text-black">
                The team driving the brand forward.
            </h2>
            <p class="text-center lg:text-left text-sm text-black max-w-md">
                Our marketing specialists, strategists, and storytellers connect
                drivers with the innovation and reliability of Toyota Motor
                Corporation through campaigns that inspire trust and loyalty.
            </p>
            <a href="/agents"
                class="group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md border border-red-600 bg-red-600 px-6 font-medium text-white transition-all duration-100 [box-shadow:5px_5px_rgb(153_27_27)] active:translate-x-0.75 active:translate-y-0.75 active:[box-shadow:0px_0px_rgb(153_27_27)]">
                See more
            </a>
        </div>

        <!-- Right column: team photo -->
        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-none border border-gray-200 bg-gray-100">
            <span class="absolute inset-0 grid place-items-center text-sm font-medium text-gray-500">
                Team photo
            </span>

            <!-- When your photo is ready, remove the span above and uncomment this image. -->
            <img src="/img/team-photo.jpg" alt="Toyota Baguio City marketing team" loading="lazy"
                class="absolute inset-0 h-full w-full object-cover object-center" />

        </div>
        <!-- Right Content - Image Gallery -->
        <!-- <div class="grid grid-cols-2 gap-6 max-w-2xl mx-auto lg:mx-0">
            <?php for ($i = 0; $i < count($agents); $i++): ?>
                <?php if (($i + 1) % 2 != 0): ?>
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl cursor-pointer">
                        <img class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                            src="/img/agents/<?= $agents[$i]->agent_photo ?>" alt="Team Member 1" />
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/90 via-black/60 to-transparent p-4">
                            <h3 class="text-white font-semibold text-lg mb-1">
                                <?php echo "{$agents[$i]->agent_fname} {$agents[$i]->agent_lname}" ?>
                            </h3>
                            <div class="space-y-1 text-xs text-gray-300">
                                <p><?= $agents[$i]->agent_email ?></p>
                                <p><?= $agents[$i]->agent_contact ?></p>
                                <div class="flex gap-3 items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl cursor-pointer mt-12">
                        <img class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105"
                            src="/img/agents/<?= $agents[$i]->agent_photo ?>" alt="Team Member 2" />
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/90 via-black/60 to-transparent p-4">
                            <h3 class="text-white font-semibold text-lg mb-1">
                                <?php echo "{$agents[$i]->agent_fname} {$agents[$i]->agent_lname}" ?>
                            </h3>
                            <p class="text-gray-300 text-xs mb-2">Marketing Professional</p>
                            <div class="space-y-1 text-xs text-gray-300">
                                <p><?= $agents[$i]->agent_email ?></p>
                                <p><?= $agents[$i]->agent_contact ?></p>
                                <div class="flex gap-3 items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div> -->
    </div>

    <!-- Maps Section -->
    <div class="mx-auto mt-12 w-full max-w-7xl overflow-hidden rounded-none border border-gray-200 bg-gray-100">
        <iframe title="Map showing Toyota Baguio City"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4708.682025810466!2d120.35196117588455!3d16.021087840723517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339142aa96efffff%3A0x65e74340954e7a4a!2sTOYOTA%20DAGUPAN%20CITY%20Inc!5e1!3m2!1sen!2sph!4v1795151057079!5m2!1sen!2sph"
            class="block h-72 w-full border-0 md:h-96" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
        </iframe>
    </div>
</section>

<?= $this->endSection() ?>