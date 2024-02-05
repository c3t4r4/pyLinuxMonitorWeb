<template>
    <div class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
        <VueSpinnerPuff v-if="type === 1" :size="size" :color="color" />
        <VueSpinner v-else-if="type === 2" :size="size" :color="color" />
        <VueSpinnerBounce v-else-if="type === 3" :size="size" :color="color" />
        <VueSpinnerScale v-else-if="type === 4" :size="size" :color="color" />
        <h2 class="text-center text-white text-xl font-semibold">{{ title }}</h2>
        <p class="w-1/3 text-center text-white">{{ msg }}</p>
    </div>
</template>

<script setup>
    import { VueSpinner, VueSpinnerBounce, VueSpinnerScale, VueSpinnerPuff} from 'vue3-spinners';

const props = defineProps({
    type: {
        type: Number,
        default: 1
    },
    color: {
        type: String,
        default: "white"
    },
    title: {
        type: String,
        default: "Carregando..."
    },
    msg: {
        type: String,
        default: "Isso pode levar alguns segundos, não feche esta página."
    },
    size: {
        type: String,
        default: "60"
    }
});
</script>
