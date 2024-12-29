<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TaskApp</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 min-h-screen">
<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border border-white/30 w-96 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Edit Details</h3>
            <div class="mt-2 px-7 py-3">
                            <form action="/edit-product/{{$product->id}}" method="post" class="space-y-4">
                                @csrf
                                <input type="hidden" name="_method" value="PUT"/>
                                <div>
                                    <label for="product" class="text-left block text-sm font-medium text-gray-700 dark:text-gray-300">Product Make/Model</label>
                                    <input type="text" id="product" value="{{$product->make}}" name="productmake" placeholder="Enter the product Make/Model" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-200" required>
                                </div>
                                <div>
                                    <label for="productdesc" class="text-left block text-sm font-medium text-gray-700 dark:text-gray-300">Product Description</label>
                                    <input type="text" id="productdesc" value="{{$product->desc}}" name="productdesc" placeholder="Enter the product Description" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-200" required>
                                </div>
                                <div>
                                    <label for="productqt" class="text-left block text-sm font-medium text-gray-700 dark:text-gray-300">Product Quantity</label>
                                    <input type="number" id="productqt" value="{{$product->qt}}" name="productqt" placeholder="Enter product quantity" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-200" required>
                                </div>
                                <div>
                                    <label for="productprice" class="text-left block text-sm font-medium text-gray-700 dark:text-gray-300">Product Price</label>
                                    <input type="number" id="productprice" value="{{$product->price}}" name="productprice" placeholder="Enter product price" class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-200" required>
                                </div>
                                <div class="items-center px-0 py-3">
                                    <a href="{{URL::to('app')}}"><button id="closeModal" type="button" class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Close
                                    </button></a>
                                    <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                        Update Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html>