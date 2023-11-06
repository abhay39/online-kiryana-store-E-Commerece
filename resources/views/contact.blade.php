<x-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    @vite('resources/css/app.css')
</head>
<body>

    <section class="bg-gray-100 py-10 rounded-md">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold mb-6">Contact Us</h1>
            <p class="text-gray-700">We're here to assist you. Feel free to get in touch with us if you have any questions or need help. We look forward to hearing from you.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
                    <address class="text-gray-700">
                        <strong>S.S. Karyana Store</strong><br>
                        pawan pg law gate maheru, Punjab<br>
                        +91-9608870864<br>
                        sskaryanstore@gmail.com
                    </address>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Send Us a Message</h2>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Your Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Your Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700">Message</label>
                            <textarea id="message" name="message" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" rows="4"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

</x-layout>