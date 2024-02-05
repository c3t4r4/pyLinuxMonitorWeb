<template>
    <div>
        <a v-if="type === 'show'" :href="routeitem" target="_blank" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-blue-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
        </a>

        <a v-if="type === 'edit'" :href="routeitem" target="_blank" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-yellow-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
        </a>
    </div>
</template>

<script setup>
    import { MagnifyingGlassIcon, PencilSquareIcon } from '@heroicons/vue/24/solid';

    const props = defineProps({
        type: String,
        routeitem: String,
    });
</script>
