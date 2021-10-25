
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div style="width: 900px" class="container max-w-full mx-auto pt-4 ">
        <form method="POST" action="{{ url('products/store') }}" enctype="multipart/from-data">
            
            @csrf
          

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="name">Name: </label>
                <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="name" name="name" >
                    @error('name')
                    <span role='alert'> {{!! $message !!}} </span>
                    @enderror
            </div>
            <div class="mb-4">
                <label class="font-bold text-gray-800" for="description">Description: </label>
                <textarea class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="description" name="description" > </textarea>
                @error('description')
                <span role='alert'> {{!! $message !!}} </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="price">Price: </label>
                <input type="number" class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="price" name="price">   
                @error('price')
                <span role='alert'> {{!! $message !!}} </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="font-bold text-gray-800" for="category_id">Category id: </label>
                <input type="number" class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="category_id" name="category_id">   
                @error('category_id')
                <span role='alert'> {{!! $message !!}} </span>
                @enderror
            </div>
             

            

             
            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Create</button>
            <a href="/" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
 
        </form>
    </div>
   
</body>
</html>