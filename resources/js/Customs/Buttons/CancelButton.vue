<template>
    <Link :href="props.link" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-bold text-gray-700 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ props.text }}</Link>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        link: {
            type: String,
            default: ""
        },
        text: {
            type: String,
            default: "Cancelar"
        }
    });
</script>
