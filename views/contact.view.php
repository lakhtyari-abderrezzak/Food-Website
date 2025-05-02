<?php require_once 'views/partials/header.view.php'; ?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <h2 class="text-3xl font-bold text-center mb-12">Contact Us</h2>

        <div class="grid md:grid-cols-2 gap-12 items-start">

            <!-- Contact Form -->
            <form action="contact.php" method="POST" class="bg-white p-8 rounded-lg shadow-lg space-y-6">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                    Send Message
                </button>
            </form>

            <!-- Contact Info + Map -->
            <div class="space-y-8">

                <div>
                    <h4 class="text-xl font-bold mb-2">Our Address</h4>
                    <p class="text-gray-600">
                        123 Food Street,<br> Flavor Town, FT 56789
                    </p>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-2">Phone</h4>
                    <p class="text-gray-600">+1 234 567 890</p>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-2">Email</h4>
                    <p class="text-gray-600">info@foodwebsite.com</p>
                </div>

                <!-- Google Map Embed -->
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9997213561473!2d2.2922926156743135!3d48.85837307928764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdaee265c17%3A0x540cd2e614c45ffb!2sEiffel%20Tower!5e0!3m2!1sen!2sus!4v1617032265412!5m2!1sen!2sus"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

            </div>

        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.view.php'; ?>
