<template>
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-8 py-2 max-h-[412px]">
    <div class="text-3xl mx-auto font-bold text-gray-900 text-start py-2 flex flex-wrap justify-between">
        <h3>Educación:</h3>
        <div class="flex flex-wrap justify-center">
            <button v-if="formBind" @click="this.formBind = false" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center mx-2 font-semibold px-5">Guardar</button>
            <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-lg font-semibold text-center m-2" v-if="formBind">Cancelar</a>
        </div>
    </div>
    <div v-if="!formBind" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px-">Aún no se encuentran registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div class=" mb-4" v-else>
            <div class="flex flex-row justify-around items-center align-center grow">
                <div class="flex grow ml-1">
                    <div class="mt-3 grow">
                        <label for="">Grado cursado</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
                <div class="flex grow ml-4">
                    <div class="mt-3 grow">
                        <label for="">Estatus</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-start grow">
                <div class="flex grow ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="">Centro de educación</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                        <p id="helper-text-explanation" class=" text-xs text-gray-500">¿No aparece tu centro de educación en la lista? <a href="#" class="text-red-500 hover:underline font-bold">regístralo aquí!</a>.</p>
                    </div>
                </div>
                <div class="flex grow ml-4 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="">Título de la carrera</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-center align-center grow">
                <div class="flex grow ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="">Mes de inicio</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
                    </div>
                </div>

                <div class="flex grow ml-4 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="">Año de inicio</label>
                        <select name="area" id="area" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            <option value="1">Seleccione un algo</option>
                        </select>
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
            formBind: false,
        }
    }
};
</script>

<style>
</style>