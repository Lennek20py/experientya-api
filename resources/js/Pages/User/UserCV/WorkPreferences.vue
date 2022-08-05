<template>
    
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px]">
    <div class="text-2xl mx-auto font-bold text-gray-900 py-2 flex flex-wrap text-center items-center justify-center lg:justify-between lg:text-start lg:text-2xl 2xl:text-3xl">
        <h3>Preferencias Laborales</h3>
    </div>
    <div v-if="!formBind" class="flex content-end justify-around flex-col ">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px-">Aún no se encuentran registros acerca de las preferencias laborales, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div v-else>
           <div class="flex flex-col justify-start lg:flex-row 2xl:justify-around">
             <div class="lg:basis-1/2 grow">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Me interesa: </h3></div>
                    <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                        <label class="block text-gray-500">
                        <input class="mr-2 leading-tight" type="checkbox" />
                            <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                                Trabajo.
                            </span>
                        </label>
                    </div>
                <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                            Residencia / Práctica profesional.
                        </span>
                    </label>
                </div>
                <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                <label class="block text-gray-500">
                    <input class="mr-2 leading-tight" type="checkbox" />
                        <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                            Educación dual.
                        </span> 
                    </label>
                </div>
        	</div>
            <div class="lg:basis-1/2 grow lg:pb-3 lg:px-2">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Área de interés: </h3></div>
                <div class="flex py-0 flex-wrap items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:justify-between 2xl:gap-2 2xl:py-2">
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Área</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo general</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
                <div class="flex space-y-2">
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo específico</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
        	</div>
           </div>
           <div class="flex flex-col lg:flex-row justify-start lg:justify-around">
             <div class="lg:basis-1/2 grow">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Localización de vacante:</h3></div>
                <div class="flex py-2 flex-wrap justify-start gap-2 lg:justify-between lg:flex-nowrap">
                    <div class="mt-1 w-full">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Estado</label>
                        <div class="mt-1">
                            <select required id="state" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione un estado</option>
                                <option >
                                    {{  }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-1 w-full">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Ciudad</label>
                        <div class="mt-1">
                            <select id="town" required class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione una ciudad</option>
                                    <option >
                                     {{}}
                                    </option>
                                </select>
                        </div>
                    </div>
                </div>
        	</div>
            <div class="lg:basis-1/2 grow flex flex-col justify-center content-between">
                <div class="pt-1 text-base font-bold mx-auto text-gray-800 text-center lg:text-xl 2xl:text-2xl"><h3>¿Cambiarías de lugar de residencia?</h3></div>
                    <div class="flex flex-wrap justify-around justify-items-start my-8 lg:my-5 2xl:my--6">
                        <div class="flex items-center justify-around">
                        <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">Si</label>
                    </div>
                    <div class="flex items-center">
                        <input checked="" id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">No</label>
                    </div>
                    </div>
                </div>
           </div>
           <div class="flex flex-wrap justify-center items-center lg:justify-end">
            <button v-if="formBind" @click="this.formBind = false" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center lg:mx-2 font-semibold px-5 w-full lg:w-auto">Guardar</button>
            <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg" v-if="formBind">Cancelar</a>
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