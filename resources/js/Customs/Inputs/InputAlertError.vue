<template>
    <div>
        <p v-if="props.error" class="mt-2 text-sm text-red-500" v-html="props.error" />
    </div>
</template>

<script setup>
    const props = defineProps({
        error: {
            type: String,
            default: ""
        }
    });
</script>
