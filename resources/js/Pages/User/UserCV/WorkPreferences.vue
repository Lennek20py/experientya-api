<template>
    
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-8 py-2 max-h-[412px] min-h-[204px]">
    <div class="text-3xl mx-auto font-bold text-gray-900 text-start py-2 flex flex-wrap justify-between">
        <h3>Preferencias Laborales:</h3>
        <div class="flex flex-wrap justify-center">
            <button v-if="formBind" @click="this.formBind = false" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center mx-2 font-semibold px-5">Guardar</button>
            <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-lg font-semibold text-center m-2" v-if="formBind">Cancelar</a>
        </div>
    </div>
    <div v-if="!formBind" class="flex content-end justify-around flex-col ">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px-">Aún no se encuentran registros acerca de las preferencias laborales, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div v-else>
           <div class="flex flex-row justify-around">
             <div class="basis-1/2 grow">
                <div class="pt-1 text-2xl mx-auto font-bold text-gray-800 text-start"><h3>Me interesa: </h3></div>
                    <div class="my-2 md:flex md:items-center py-1">
                        <label class="block text-gray-500">
                        <input class="mr-2 leading-tight" type="checkbox" />
                            <span class="text-base font-medium text-slate-700">
                                Trabajo.
                            </span>
                        </label>
                    </div>
                <div class="my-2 md:flex md:items-center py-1">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-base font-medium text-slate-700">
                            Residencia / Práctica profesional.
                        </span>
                    </label>
                </div>
                <div class="my-2 md:flex md:items-center py-1">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-base font-medium text-slate-700">
                            Educación dual.
                        </span>
                    </label>
                </div>
        	</div>
            <div class="basis-1/2 grow pb-3">
                <div class="pt-1 text-2xl mx-auto font-bold text-gray-800 text-start"><h3>Área de interés: </h3></div>
                <div class="flex py-2 flex-wrap items-center justify-between">
                    <div class="mt-1 grow">
                        <label for="">Área</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                    <div class="mt-1 grow ml-2">
                        <label for="">Campo general</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
                <div class="flex space-y-2">
                    <div class="mt-1 grow">
                        <label for="">Campo específico</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>


                <!-- <div class="my-2 md:flex md:items-center">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-lg font-medium text-slate-700">
                            Trabajo.
                        </span>
                    </label>
                </div> -->
        	</div>
           </div>
           <div class="flex flex-row justify-around">
             <div class="basis-1/2 grow">
                <div class="pt-1 text-2xl mx-auto font-bold text-gray-800 text-start"><h3>Localización de la vacante: </h3></div>
                <div class="flex py-2 flex-wrap items-center">
                    <div class="mt-1 mr-2">
                        <label for="">Estado</label>
                        <div class="mt-1">
                            <select required id="state" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm md:text-sm">
                                <option value>Seleccione un estado</option>
                                <option >
                                    {{  }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-1 mx-2">
                        <label for="">Campo general</label>
                        <div class="mt-1">
                            <select id="town" required class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm md:text-sm">
                                <option value>Seleccione una ciudad</option>
                                    <option >
                                     {{}}
                                    </option>
                                </select>
                        </div>
                    </div>
                </div>
        	</div>
            <div class="basis-1/2 grow">
                <div class="pt-1 text-2xl mx-auto font-bold text-gray-800 text-center"><h3>¿Cambiarías de lugar de residencia?</h3></div>
                    <div class="flex flex-wrap justify-around justify-items-start my-8">
                        <div class="flex items-center">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-1" class="ml-2 text-xl font-medium text-gray-900">Si</label>
                    </div>
                    <div class="flex items-center">
                        <input checked="" id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-2" class="ml-2 text-xl font-medium text-gray-900">No</label>
                    </div>
                    </div>
                </div>
           </div>
    </div>
</div>


</template>

<script>
export default {
    data() {
        return {
            formBind: true,
        }
    }
};
</script>

<style>
</style>