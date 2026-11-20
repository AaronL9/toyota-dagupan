<?= $this->extend("layout/default"); ?>
<?= $this->section("mainContent"); ?>

<body class="flex flex-col min-h-screen">

    <section class="relative bg-gray-300 text-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
            <h1 class="text-4xl md:text-5xl font-bold mt-4 mb-4">Showroom</h1>
        </div>
    </section>

    \
    <!-- New Vehicles Section -->
    <section aria-label="New vehicles" class="bg-white px-4 py-12 text-zinc-950 sm:px-6 lg:px-8 lg:py-16">
        <?php
        $escape = static function ($value) {
            return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        };
        ?>

        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[13rem_minmax(0,1fr)] lg:gap-10">

            <!-- Category sidebar -->
            <aside class="lg:sticky lg:top-28 lg:self-start">
                <p id="vehicle-category-label"
                    class="mb-4 text-xs font-semibold uppercase tracking-widest text-zinc-600">
                    Browse by category
                </p>

                <nav role="tablist" aria-labelledby="vehicle-category-label" aria-orientation="vertical"
                    class="border-t border-zinc-300">
                    <?php $haveDefaultActive = false; ?>

                    <?php foreach ($vehicles_category as $row): ?>
                    <?php
                        $categoryId = $escape($row->cat_no);
                        $isActive = !$haveDefaultActive;
                        $haveDefaultActive = true;
                        ?>

                    <button type="button" id="vertical-tab-item-<?= $categoryId ?>"
                        data-hs-tab="#vertical-tab-<?= $categoryId ?>" aria-controls="vertical-tab-<?= $categoryId ?>"
                        aria-selected="<?= $isActive ? 'true' : 'false' ?>" role="tab" class="flex w-full items-center justify-between gap-4
                               border-b border-zinc-200 px-4 py-3.5 text-left
                               text-sm font-semibold text-zinc-600 transition-colors
                               hover:bg-zinc-100 hover:text-zinc-950
                               hs-tab-active:bg-zinc-950 hs-tab-active:text-white
                               focus-visible:outline-2 focus-visible:-outline-offset-2
                               focus-visible:outline-red-600
                               <?= $isActive ? 'active' : '' ?>">
                        <span><?= $escape($row->cat_title) ?></span>
                    </button>
                    <?php endforeach; ?>
                </nav>
            </aside>

            <!-- Vehicle category panels -->
            <div class="min-w-0">
                <?php $haveDefaultPanel = false; ?>

                <?php foreach ($vehicles_category as $row): ?>
                <?php
                    $categoryId = $escape($row->cat_no);
                    $isActivePanel = !$haveDefaultPanel;
                    $haveDefaultPanel = true;
                    ?>

                <div id="vertical-tab-<?= $categoryId ?>" role="tabpanel"
                    aria-labelledby="vertical-tab-item-<?= $categoryId ?>"
                    class="<?= $isActivePanel ? '' : 'hidden' ?>">
                    <h2 class="border-b-2 border-zinc-950 pb-5 text-3xl font-bold
                               leading-tight tracking-tight sm:text-4xl">
                        <?= $escape($row->cat_title) ?>
                    </h2>

                    <!-- Vehicle cards wrap into as many rows as the category needs -->
                    <div class="grid grid-cols-2 gap-x-4 gap-y-8 pt-6
                                md:grid-cols-3 xl:grid-cols-4">
                        <?php foreach ($vehicles as $vehicle): ?>
                        <?php if ($vehicle->cat_no == $row->cat_no): ?>
                        <?php $vehicleTitle = $escape($vehicle->vehicle_title); ?>

                        <article class="min-w-0">
                            <a href="/<?= $escape(url_title($vehicle->vehicle_title, '-', true)) ?>"
                                aria-label="Explore <?= $vehicleTitle ?>" class="group flex h-full flex-col border-b border-zinc-200
                                               pb-4 transition-colors hover:border-red-600
                                               focus-visible:outline-2 focus-visible:outline-offset-4
                                               focus-visible:outline-red-600">
                                <div class="aspect-[4/3] overflow-hidden bg-zinc-50 p-2 sm:p-3">
                                    <img src="uploads/img/variants/<?= $escape($vehicle->variant_filename) ?>"
                                        alt="<?= $vehicleTitle ?>" loading="lazy" class="h-full w-full object-contain
                                                       motion-safe:transition-transform
                                                       motion-safe:duration-300
                                                       motion-safe:group-hover:scale-105">
                                </div>

                                <h3 class="mt-4 break-words text-lg font-bold leading-tight
                                                   tracking-tight text-zinc-950 sm:text-xl">
                                    <?= $vehicleTitle ?>
                                </h3>

                                <span class="mt-auto inline-flex items-center gap-2 pt-3
                                                     text-sm font-semibold text-red-600">
                                    Explore
                                    <span aria-hidden="true">→</span>
                                </span>
                            </a>
                        </article>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>