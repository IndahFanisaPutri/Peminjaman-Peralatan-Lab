<x-guest-layout>

<div class="min-h-screen flex items-center justify-center 
bg-gradient-to-br from-indigo-900 via-purple-700 to-indigo-600">


<div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden">


<!-- HEADER -->

<div class="bg-gradient-to-br from-purple-600 to-indigo-500 p-10 text-center text-white">


<div class="mx-auto w-24 h-24 rounded-2xl 
bg-white/20 flex items-center justify-center">

<span class="text-5xl font-bold">
S
</span>

</div>


<h1 class="mt-5 text-3xl font-bold">
SilaLab
</h1>


<p class="mt-2">
Sistem Peminjaman Laboratorium
</p>


</div>





<!-- FORM -->

<div class="p-8">



<!-- PILIH ROLE -->


<div x-data="{role:'user'}">


<div class="grid grid-cols-2 gap-4 mb-8">


<button type="button"
@click="role='user'"
:class="role=='user' ? 
'bg-indigo-600 text-white' :
'bg-gray-100 text-gray-600'"
class="py-3 rounded-xl font-semibold">


🎓 User

</button>




<button type="button"
@click="role='admin'"
:class="role=='admin' ? 
'bg-indigo-600 text-white' :
'bg-gray-100 text-gray-600'"
class="py-3 rounded-xl font-semibold">


🛡 Admin

</button>


</div>





<form method="POST" action="{{route('login')}}">

@csrf


<input type="hidden"
name="role"
x-model="role">



<!-- EMAIL -->


<div>

<label class="font-semibold">
Email
</label>


<input
type="email"
name="email"
required
placeholder="Masukkan email"
class="mt-2 w-full rounded-xl border-gray-300">


</div>





<!-- PASSWORD -->


<div class="mt-5">


<label class="font-semibold">
Password
</label>


<input

type="password"

name="password"

required

placeholder="Masukkan password"

class="mt-2 w-full rounded-xl border-gray-300">


</div>






<div class="mt-4">


<label class="flex gap-2">


<input type="checkbox"
name="remember">


<span>
Ingat saya
</span>


</label>


</div>






<button

class="mt-6 w-full py-3 rounded-xl

bg-gradient-to-r from-indigo-600 to-purple-600

text-white font-bold text-lg">


➜ Masuk


</button>




</form>




</div>





<div class="text-center mt-6">


Belum punya akun?


<a href="{{route('register')}}"
class="text-indigo-600 font-bold">


Daftar sekarang


</a>


</div>




</div>


</div>


</div>


</x-guest-layout>