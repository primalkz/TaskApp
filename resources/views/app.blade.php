<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TaskApp</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div>
            <!-- He who is contented is rich. - Laozi -->
            <div class='flex flex-row items-center justify-center mt-4 justify-around'>
                <h1 class="items-center justify-center text-2xl font-bold text-center text-green-900 dark:text-green-400">Product Listing</h1>
                <div class='flex flex-row items-center'>
                    <button id="openModal" class="px-3 py-2 bg-gray-600 mx-2 rounded-md text-base font-bold text-center text-gray-900 dark:text-gray-100">Add data</button>
                    <button class="px-3 py-2 bg-gray-600 mx-2 rounded-md text-base font-bold text-center text-gray-900 dark:text-gray-100">Import</button>
                    <button class="px-3 py-2 bg-gray-600 mx-2 rounded-md text-base font-bold text-center text-gray-900 dark:text-gray-100">Export</button>
                </div>
            </div>

            <table>

            </table>

            <!-- Modal -->
            <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Add Product</h3>
                        <div class="mt-2 px-7 py-3">
                            <form action="/adddata" method="post" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="product" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Make/Model</label>
                                    <input type="text" id="product" name="product" placeholder="Enter the product Make/Model" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="productdesc" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Description</label>
                                    <input type="text" id="productdesc" name="productdesc" placeholder="Enter the product Description" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="productqt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Quantity</label>
                                    <input type="number" id="productqt" name="productqt" placeholder="Enter product quantity" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="productprice" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Price</label>
                                    <input type="number" id="productprice" name="productprice" placeholder="Enter product price" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                </div>
                                <div class="items-center px-4 py-3">
                                    <button id="closeModal" type="button" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Close
                                    </button>
                                    <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                        Add Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("modal");

            // Get the button that opens the modal
            var btn = document.getElementById("openModal");

            // Get the <span> element that closes the modal
            var span = document.getElementById("closeModal");

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.classList.remove("hidden");
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.classList.add("hidden");
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.add("hidden");
                }
            }
        </script>
    </body>
</html>