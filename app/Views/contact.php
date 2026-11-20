<?= $this->extend("layout/default"); ?>

<?= $this->section("mainContent"); ?>

<!-- Contact Us Section -->
<section class="relative bg-gray-300 text-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <h1 class="text-4xl md:text-5xl font-bold mt-4 mb-4">Contact Us</h1>
    </div>
</section>



<section aria-labelledby="contact-heading" class="bg-white px-4 py-12 text-zinc-950 sm:px-6 lg:px-8 lg:py-20">
    <div class="mx-auto grid max-w-7xl items-start gap-12 lg:grid-cols-[2fr_3fr] lg:gap-20">

        <!-- Dealership contact details -->
        <aside aria-labelledby="contact-info-heading" class="pt-6">
            <h2 id="contact-info-heading" class="text-3xl font-bold tracking-tight">
                Visit or call
            </h2>

            <dl class="mt-6 divide-y divide-zinc-200">
                <div class="py-4">
                    <dt class="text-sm font-medium text-zinc-600">Our location</dt>
                    <dd class="mt-1 text-xl font-semibold">Diversion Road, Brgy. San Miguel, Calasiao, Pangasinan 2418
                    </dd>
                </div>

                <div class="py-4">
                    <dt class="text-sm font-medium text-zinc-600">Call our team</dt>
                    <dd class="mt-1 text-2xl font-semibold">
                        <a href="tel:0743003273" class="hover:text-red-700">
                            (074) 300 3273
                        </a>
                    </dd>
                </div>

                <div class="py-4">
                    <dt class="text-sm font-medium text-zinc-600">Email us</dt>
                    <dd class="mt-1 break-words">
                        <a href="mailto:customercare@toyotailocossur.com"
                            class="underline decoration-zinc-300 underline-offset-4 hover:text-red-700">
                            customer.relations@toyota-dagupan.com
                        </a>
                    </dd>
                </div>

                <div class="py-4">
                    <dt class="text-sm font-medium text-zinc-600">Office hours</dt>
                    <dd class="mt-1">
                        Monday – Saturday<br>
                        8:00 AM – 5:00 PM
                    </dd>
                </div>
            </dl>
        </aside>

        <!-- Contact form -->
        <div x-data="contact" class="min-w-0 pt-6">
            <h2 id="contact-heading" class="text-3xl font-bold tracking-tight sm:text-4xl">
                Send a message
            </h2>

            <p class="mb-8 mt-2 text-sm text-zinc-600">
                Fields marked <span class="text-red-600">*</span> are required.
            </p>

            <form @submit.prevent="onSubmitContact($event)" action="#" method="post"
                class="grid gap-x-6 gap-y-6 sm:grid-cols-2">
                <?= csrf_field('csrf_field') ?>

                <div>
                    <label for="contact-name" class="mb-2 block text-sm font-medium text-zinc-700">
                        Name <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="contact-name" name="name" autocomplete="name" placeholder="Your name"
                        required class="block w-full rounded-none border-0 border-b border-zinc-400 bg-zinc-50
                               px-4 py-3 text-sm text-zinc-900 placeholder:text-zinc-400 transition
                               focus:border-red-600 focus:outline-none focus:ring-2 focus:ring-red-600/15">
                </div>

                <div>
                    <label for="contact-email" class="mb-2 block text-sm font-medium text-zinc-700">
                        Email <span class="text-red-600">*</span>
                    </label>
                    <input type="email" id="contact-email" name="email" autocomplete="email"
                        placeholder="you@example.com" required class="block w-full rounded-none border-0 border-b border-zinc-400 bg-zinc-50
                               px-4 py-3 text-sm text-zinc-900 placeholder:text-zinc-400 transition
                               focus:border-red-600 focus:outline-none focus:ring-2 focus:ring-red-600/15">
                </div>

                <div class="sm:col-span-2">
                    <label for="contact-phone" class="mb-2 block text-sm font-medium text-zinc-700">
                        Phone
                    </label>
                    <input type="tel" id="contact-phone" name="phone" autocomplete="tel" placeholder="+63 123 456 7890"
                        class="block w-full rounded-none border-0 border-b border-zinc-400 bg-zinc-50
                               px-4 py-3 text-sm text-zinc-900 placeholder:text-zinc-400 transition
                               focus:border-red-600 focus:outline-none focus:ring-2 focus:ring-red-600/15">
                </div>

                <div class="sm:col-span-2">
                    <label for="contact-message" class="mb-2 block text-sm font-medium text-zinc-700">
                        Message <span class="text-red-600">*</span>
                    </label>
                    <textarea id="contact-message" name="message" rows="6" placeholder="How can we help?" required
                        class="block w-full resize-y rounded-none border-0 border-b border-zinc-400
                               bg-zinc-50 px-4 py-3 text-sm leading-6 text-zinc-900
                               placeholder:text-zinc-400 transition focus:border-red-600
                               focus:outline-none focus:ring-2 focus:ring-red-600/15"></textarea>
                </div>

                <div class="sm:col-span-2">
                    <button type="submit" class="group inline-flex w-full items-center justify-center gap-3 rounded-none
                               bg-red-600 px-6 py-4 text-sm font-semibold text-white transition-colors
                               hover:bg-red-700 focus-visible:outline focus-visible:outline-2
                               focus-visible:outline-offset-4 focus-visible:outline-red-600 sm:w-auto">
                        Send message
                        <svg class="h-5 w-5 motion-safe:transition-transform motion-safe:group-hover:translate-x-1"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>