 @props(['name'])
 
 <button 
  @click="activeFilter = '{{ $name }}'" 
 :class="{'bg-blue-600 text-white': activeFilter === '{{ $name }}', 'bg-gray-100 text-gray-800': activeFilter !== 'hair'}"
class="px-6 py-2 rounded-full font-medium transition-all duration-300 hover:shadow-md">
{{ $name }}
 </button>