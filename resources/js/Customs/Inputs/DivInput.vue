<template>
    <div :class="`sm:col-span-${col}`">
        <dt :for="id" class="text-sm font-medium text-gray-700"> {{ text }}</dt>
        <div class="mt-1 text-sm">
            <slot />
        </div>
    </div>
</template>

<script setup>


    const props = defineProps({
        id: {
            type: String,
            default: ""
        },
        text: {
            type: String,
            default: ""
        },
        col: {
            type: Number,
            default: 1
        }
    });

</script>
