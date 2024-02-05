<template>
    <button class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-bold rounded-md text-white bg-green-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ props.text }}</button>
</template>

<script setup>
    const props = defineProps({
        text: {
            type: String,
            default: "Criar"
        }
    });
</script>


