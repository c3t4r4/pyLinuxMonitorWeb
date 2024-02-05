<template>
    <span v-if="props.status" class="inline-flex rounded-full bg-green-700 px-2 text-white text-xs font-bold leading-5">{{ props.active }}</span>
    <span v-if="props.status" class="inline-flex rounded-full bg-green-700 px-2 text-white text-xs font-bold leading-5">{{ props.active }}</span>
    <span v-if="props.status" class="inline-flex rounded-full bg-green-700 px-2 text-white text-xs font-bold leading-5">{{ props.active }}</span>
    <span v-else class="inline-flex rounded-full bg-red-700 px-2 text-white text-xs font-bold leading-5">{{ props.inative }}</span>
</template>

<script setup>
const props = defineProps({
    status: {
        type: Boolean,
        default: true,
    },
    active: {
        type: String,
        default: "Ativo",
    },
    inative: {
        type: String,
        default: "Inativo",
    }
});
</script>
