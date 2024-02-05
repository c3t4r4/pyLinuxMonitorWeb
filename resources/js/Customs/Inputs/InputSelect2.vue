<template>
    <Select2 :id="props.id"
             :options="props.options"
             :settings="{ width: '100%'}"
    />
</template>

<script setup>

    const props = defineProps({
        id: {
            type: String,
            default: ""
        },
        options: Object

    });
</script>
