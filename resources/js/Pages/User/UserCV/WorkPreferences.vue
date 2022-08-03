<template>
    
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m p-8">
    <div class="text-3xl mx-auto font-bold text-gray-900 text-start py-2">
        <h3>Preferencias Laborales:</h3>
    </div>
    <div v-if="!formBind" class="transition ">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px-">Aún no se encuentran registros acerca de las preferencias laborales, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div v-else>
            <div class="">
                <div class="pt-6 text-2xl mx-auto font-bold text-gray-800 text-start"><h3>Me interesa: </h3></div>
                <div class="my-2 md:flex md:items-center">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-lg font-medium text-slate-700">
                            Trabajo.
                        </span>
                    </label>
                </div>
                <div class="my-2 md:flex md:items-center">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-lg font-medium text-slate-700">
                            Residencia / Práctica profesional.
                        </span>
                    </label>
                </div>
                <div class="my-2 md:flex md:items-center">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-lg font-medium text-slate-700">
                            Educación dual.
                        </span>
                    </label>
                </div>
        	</div>
            <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-lg font-semibold text-end pt-6">Cancelar</a>
    </div>
</div>


</template>

<script>
export default {
    data() {
        return {
            formBind: false,
        }
    }
};
</script>

<style>
</style>