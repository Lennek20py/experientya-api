<template>
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px]">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Educación</h3>
    </div>
    <div v-if="!formBind" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div class="2xl:mb-4" v-else>
            <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Grado cursado</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
                <div class="flex grow gap-2 2xl:ml-4 lg:gap-4">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Estatus</label>
                        <select name="area" v-model="this.state" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                            <option value="progress">En curso</option>
                            <option value="done">Finalizado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-start grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Centro de educación</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                        <p id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs text-gray-500">¿No aparece tu centro de educación en la lista? <a href="#" class="text-red-500 hover:underline font-bold">regístralo aquí!</a>.</p>
                    </div>
                </div>
                <div class="flex grow basis-1/2 2xl:ml-4">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Título de la carrera</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de inicio</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>

                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de inicio</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- DATOS FINALIZACIÓN, SELECCIONAR FINALIZADO EN ESTATUS PARA MOSTRAR CON VIF -->
             <div v-if="this.state == 'done'" class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de finalización</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>

                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de finalización</label>
                        <select name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex mt-3 flex-wrap justify-center items-center lg:justify-end 2xl:py-3">
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
            formBind: false,
            state: "1",
            
        }
    }
};
</script>

<style>
</style>