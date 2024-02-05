<template>
    <div class="mt-2 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
        <div class="space-y-1 text-center">
            <svg v-if="file === 'image'" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <svg v-else class="mx-auto h-24 w-24 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" stroke-width="2" stroke-linecap="round"/>
            </svg>

            <slot name="header"/>

            <div class="flex text-sm text-gray-600">
                <label for="image" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span v-if="file === 'image'">Selecione uma Imagem</span>
                    <span v-else>Selecione um Arquivo</span>
                    <slot />
                </label>
                <p class="pl-2">ou arraste e solte</p>
            </div>
            <p class="text-xs text-gray-500">{{ types }} - até {{ size }}</p>
        </div>
    </div>
</template>

<script setup>
    const props = defineProps({
        file: {
            type: String,
            default: "file"
        },
        types: {
            type: String,
            default: "PDF"
        },
        size: {
            type: String,
            default: "10MB"
        },
    });
</script>
