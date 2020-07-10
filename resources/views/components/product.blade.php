<tr>
    <td class="px-6 py-4 whitespace-no-wrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <img
                    class="h-10 w-10 rounded border-gray-400 focus:border-blue-500"
                    src="{{ asset("img/aig_logo.png")}}"
                    alt="" />
            </div>
            <div class="ml-4">
                <div class="text-sm leading-5 font-medium text-gray-900">AIG Comprehensive</div>
                <div class="text-sm leading-5 text-gray-500">Price: 0.35%</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap">
        <div class="text-sm leading-5 text-gray-900">Comprehensive</div>
        <div class="text-sm leading-5 text-gray-500">Motor Private</div>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            Active
        </span>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
        AIG Insurance
    </td>
    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
        <a href="{{route('products.edit', ['id' => 1])}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    </td>
</tr>