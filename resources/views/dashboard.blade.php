<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <script>
        function showContent(id) {
        const contentSections = document.querySelectorAll('#content-container > div');
        contentSections.forEach(section => {
            section.style.display = 'none';
        });
        const selectedContent = document.getElementById(id + '-content');
        if (selectedContent) {
            selectedContent.style.display = 'block';
        }
    }

    </script>
    <h1 class="text-3xl font-bold text-red-500">Dashboard Page</h1>
    <div class="md:flex ">
        <div class="mt-2 sm:w-full md:w-1/5">
            <nav>
                <ul>
                    <li onclick="showContent('totalRevenue')" id="totalRevenue" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer">Total Revenue</li>
                    <li onclick="showContent('totalProducts')" id="totalProducts" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer mt-3">Total Product</li>
                    <li onclick="showContent('addProduct')" id="addProduct" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer mt-3">Add Product</li>
                    <li onclick="showContent('totalUser')" id="totalUser" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer mt-3">Total Users</li>
                    <li onclick="showContent('totalCart')" id="totalCart" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer mt-3">Total Cart Items</li>
                    <li onclick="showContent('totalOrders')" id="totalOrders" class="p-3 bg-slate-100 rounded-lg text-xl font-semibold text-blue-400 cursor-pointer mt-3">Total Orders Items</li>
                </ul>
            </nav>
        </div>

        <?php 
            $productData = [
                ['id' => 1, 'name' => 'Product 1', 'price' => 25.99],
                ['id' => 2, 'name' => 'Product 2', 'price' => 19.99],
                ['id' => 3, 'name' => 'Product 3', 'price' => 29.99],
            ];
        ?>

        <div class="ml-3 p-3" id="content-container">
            @if(session('success'))
                <div class="bg-slate-200 p-3 text-red-400">
                    {{ session('success') }}
                </div>
            @endif

            <div id="totalRevenue-content" style="display: block">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-blue-600">Total Revenue</h2>
                    <p class="text-gray-600 mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in felis vitae libero consectetur dapibus. Vivamus commodo luctus arcu, sed tincidunt orci facilisis in.
                    </p>
                    <div class="mt-8 flex items-center">
                        <div class="bg-blue-500 text-white rounded-full p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m0-4h9m-9-7h9"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-3xl font-bold text-blue-600">&#8377;. {{$totalAmount}}/-</p>
                            <p class="text-gray-600">Total revenue for this month</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="totalProducts-content" style="display: none">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-blue-600">Total Products</h2>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Product ID</th>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Product Price</th>
                                <th class="px-4 py-2">Product Qty.</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($totalProducts as $product): ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo $product->id; ?></td>
                                    <td class="border px-4 py-2"><?php echo $product->productID; ?></td>
                                    <td class="border px-4 py-2"><?php echo $product->productName; ?></td>
                                    <td class="border px-4 py-2">&#8377;. <?php echo $product->price; ?> /-</td>
                                    <td class="border px-4 py-2"><?php echo $product->qty; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="addProduct-content" style="display: none">
                <div class="container mx-auto p-4 bg-gray-100 w-full">
                <h1 class="text-2xl font-semibold mb-4">Add New Product</h1>
                <form enctype="multipart/form-data" action="/addProduct" method="post"  class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    <div class="mb-4">
                        <label for="product_name" class="block  font-bold">Product Name:</label>
                        <input type="text" name="product_name" id="product_name" class="bg-slate-200 p-3 rounded-md w-full outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="productCategory" class="block  font-bold">Product Category:</label>
                        <input type="text" name="productCategory" id="product_name" class="bg-slate-200 p-3 rounded-md w-full outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-bold">Price ($):</label>
                        <input type="number" name="price" id="price" class="bg-slate-200 p-3 rounded-md w-full outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold">Product Image:</label>
                        <input type="file" name="image" id="image" class="bg-slate-200 p-3 rounded-md w-full outline-none">
                    </div>
                    <div class="mb-4">
                        <label for="total_quantity" class="block text-gray-700 font-bold">Total Quantity:</label>
                        <input type="text" name="total_quantity" id="total_quantity" class="bg-slate-200 p-3 rounded-md w-full outline-none">
                    </div>
                    <button type="submit" class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 w-full">Add Product</button>
                </form>
            </div>
            </div>
            <div id="totalUser-content" style="display: none">
                <div class="bg-white p-6 rounded-lg shadow-md">

                <h1 class="text-2xl font-semibold mb-4">Total User</h1>
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">User ID</th>
                            <th class="px-4 py-2">User Name</th>
                            <th class="px-4 py-2">User Role</th>
                            <th class="px-4 py-2">User Email</th>
                            <th class="px-4 py-2">User Verified</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($totalUsers as $item): ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $item->id; ?></td>
                            <td class="border px-4 py-2"><?php echo $item->fullname; ?></td>
                            <td class="border px-4 py-2"><?php echo $item->role; ?></td>
                            <td class="border px-4 py-2"><?php echo $item->email; ?></td>
                            <td class="border px-4 py-2"><?php echo $item->isVerified; ?></td>
                            <td class="border px-4 py-2">
                                <form action="/deleteUser" method="POST">
                                    @csrf
                                    <input type="hidden" name="email" value="<?php echo $item->email; ?>" /> 
                                    <button type="submit" class="bg-slate-300 p-3 cursor-pointer rounded-lg text-xl font-bold ">Delete User</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div id="totalCart-content" style="display: none">
                <div class="bg-white p-6 rounded-lg shadow-md">

                    <h1 class="text-2xl text-red-400 font-semibold mb-4">Total Cart Items</h1>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">User Email</th>
                                <th class="px-4 py-2">P. ID</th>
                                <th class="px-4 py-2">P. Name</th>
                                <th class="px-4 py-2">Qty</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">Total Price</th>
                                <th class="px-4 py-2">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($totalCart as $cart): ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo $cart->id; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->userEmail; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->productID; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->productName; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->qty; ?></td>
                                    <td class="border px-4 py-2">&#8377;. <?php echo $cart->price; ?></td>
                                    <td class="border px-4 py-2">&#8377;. <?php echo $cart->totalPrice; ?></td>
                                    <td class="border px-4 py-2">
                                        <form action="/updateCart" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$item->email}}" name="email" />
                                            <input name="orderStatus" class="p-2 bg-slate-200 rounded-lg border-none" type="text" value="{{$cart->orderStatus}}">
                                            <button type="submit" class="bg-slate-300 p-2 mt-1 cursor-pointer rounded-lg text-base font-bold ">Update Cart</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
            </div>
            <div id="totalOrders-content" style="display: none">
                <h2></h2>
                <div class="bg-white p-6 rounded-lg shadow-md">

                    <h1 class="text-2xl text-red-400 font-semibold mb-4">Total Orders Items</h1>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">P.ID</th>
                                <th class="px-4 py-2">P.Name</th>
                                <th class="px-4 py-2">Qty</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2">T.Price</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Number</th>
                                <th class="px-4 py-2">O.Status</th>
                                <th class="px-4 py-2">Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($totalOrders as $cart): ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo $cart->id; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->userEmail; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->productID; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->productName; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->qty; ?></td>
                                    <td class="border px-4 py-2">&#8377;. <?php echo $cart->price; ?>/-</td>
                                    <td class="border px-4 py-2">&#8377;. <?php echo $cart->totalPrice; ?>/-</td>
                                    <td class="border px-4 py-2"><?php echo $cart->address; ?></td>
                                    <td class="border px-4 py-2"><?php echo $cart->number; ?></td>
                                    <td class="border px-4 py-2">
                                        <form action="/updateOrder" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$item->email}}" name="email" />
                                            <input name="orderStatus" class="p-2 bg-slate-200 rounded-lg border-none" type="text" value="{{$cart->orderStatus}}">
                                            <button type="submit" class="bg-slate-300 p-2 mt-1 cursor-pointer rounded-lg text-base font-bold ">Update Order</button>
                                        </form>
                                    </td>
                                    <td class="border px-4 py-2"><?php echo $cart->paymentMethod; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>

</body>
</html>
</x-layout>