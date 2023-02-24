<template>
    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-100">
        <div>
            <slot name="logo" />

        </div>

        <div class="w-full max-w-xl mt-8 px-8 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
