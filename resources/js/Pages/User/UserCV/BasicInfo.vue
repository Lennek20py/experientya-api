<template>
    
<div class="w-[35rem] h-[412px] w-4xl bg-white rounded-lg border border-gray-200 shadow-m">
    <div class="flex justify-end px-4 pt-4">
    </div>
    <div class="text-3xl mx-auto font-bold md:text-gray-900 text-center sm:text-red-500 py-2">
        <h3>Información Básica</h3>
    </div>
    <div class="flex flex-col items-center pb-10 pt-10 mx-10 md:mx-7">
        <img class="mb-3 w-32 h-32 rounded-full shadow-lg" :src="$page.props.user.profile_photo_path.replace('profile/', 'storage/profile/')" alt="Bonnie image">
        <h5 class="mb-1 text-xl font-semibold text-gray-900 md:text-lg text-center">{{$page.props.user.user_first_name}} {{$page.props.user.user_last_name}}</h5>
        <span class="text-lg font-medium text-gray-500 md:text-base">Misantla, Veracruz</span>
        <div class="flex mt-4 space-x-3 lg:mt-6 items-center">
            <a href="#" class="inline-flex items-center py-2 text-sm font-medium text-center text-gray-600 bg-white rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-20"><svg class="w-6 h-6 items-center text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg> Previsualizar CV</a>
        </div>
    </div>
</div>

</template>

<script>
export default {};
</script>

<style>
</style>