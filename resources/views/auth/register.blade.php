<x-guest-layout>

<div class="min-h-screen flex items-center justify-center 
bg-gradient-to-br from-indigo-900 via-purple-700 to-indigo-600">


<div class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden">



<div class="bg-gradient-to-br from-purple-600 to-indigo-500 p-10 text-center text-white">


<div class="mx-auto w-24 h-24 rounded-2xl bg-white/20 flex items-center justify-center">


<span class="text-5xl font-bold">
S
</span>


</div>


<h1 class="text-3xl mt-4 font-bold">
SilaLab
</h1>


<p>
Registrasi Sistem Laboratorium
</p>


</div>






<div class="p-8">


<form method="POST" action="{{route('register')}}">

@csrf



<div>


<label>Nama</label>

<input

name="name"

required

class="mt-2 w-full rounded-xl border-gray-300"

placeholder="Nama lengkap">


</div>






<div class="mt-4">

<label>Email</label>

<input

type="email"

name="email"

required

class="mt-2 w-full rounded-xl border-gray-300"

placeholder="Email">


</div>






<div class="mt-4">

<label>Password</label>

<input

type="password"

name="password"

required

class="mt-2 w-full rounded-xl border-gray-300">


</div>





<div class="mt-4">

<label>Konfirmasi Password</label>


<input

type="password"

name="password_confirmation"

required

class="mt-2 w-full rounded-xl border-gray-300">


</div>






<!-- ROLE -->


<div class="mt-5">


<label class="font-semibold">
Daftar Sebagai
</label>


<select

name="role"

class="mt-2 w-full rounded-xl border-gray-300">


<option value="user">

🎓 User

</option>


<option value="admin">

🛡 Admin

</option>


</select>


</div>







<button

class="mt-6 w-full py-3 rounded-xl

bg-gradient-to-r from-indigo-600 to-purple-600

text-white font-bold">


Buat Akun


</button>





</form>




<div class="text-center mt-5">


Sudah punya akun?


<a href="{{route('login')}}"
class="text-indigo-600 font-bold">

Login

</a>


</div>




</div>


</div>


</div>


</x-guest-layout>